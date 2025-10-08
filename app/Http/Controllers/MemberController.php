<?php

namespace App\Http\Controllers;

use Alkoumi\LaravelArabicNumbers\Numbers;
use App\Helpers\WhatsappHelper;
use App\Models\Attend;
use App\Models\Session;
use App\Models\SessionBooking;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Remittance;
use App\Models\member;
use App\Models\WorkShop;
use App\Models\WorkShopRegisteredMember;
use Illuminate\Support\Facades\Route;
use Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Storage;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MemberController extends Controller
{

    public function registrationView()
    {
        app()->setLocale('ar');
        return view('register');
    }

    public function sumView()
    {
        app()->setLocale('ar');
        $sum = member::sum('amount');
        $members = member::where('confirmed',2)->get();

        return view('sum',compact('members','sum'));
    }

    public function confirmView($code)
    {
        app()->setLocale('ar');
        $member = member::where('code',$code)->first();
        if (!$member)
            abort(404);

        return view('confirm',compact('member'));
    }

    public function confirmAttView($code)
    {
        app()->setLocale('ar');
        $member = member::where('code',$code)->first();
        if (!$member)
            abort(404);

        return view('confirm2',compact('member'));
    }

    public function spinView()
    {
        app()->setLocale('ar');
        $ids = Attend::pluck('member_id')->toArray();
        $members = member::where('award',0)->whereIn('id',$ids)->get();

        $newMembers = [];
        foreach ($members as $member){
            $newMembers[] = [
                'id'=>$member->id,
                'ar'=>Numbers::ShowInArabicDigits($member->qrcode),
                'name'=>$member->name,
            ];
        }
        return view('spin',compact('newMembers'));
    }

    public function storeRegistration(Request $request)
    {

        app()->setLocale('ar');

//        $request->dd();
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:members,email|email',
            'full' => 'required|unique:members,mobile',
        ],[
            'full.unique'=>'رقم الجوال موجود مسبقاً'
            ]);
        $count = member::where('external',1)->count();
        if ($count >= 30){
            return redirect()->back()->with('error','إنتهى التسجيل!');
        }

        $qrcode = member::max('qrcode');
        $qrcode = $qrcode ? ($qrcode +1) : 100000;

        $member = member::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->full,
            'type'=>1,
            'external'=>1,
            'status'=>1,
            'qrcode'=>$qrcode,
            'code'=>time() . Str::random(30),
        ]);

        \Storage::disk('public')->put('qrcode/'.$member->id.$qrcode.'.png',base64_decode(\DNS2D::getBarcodePNG((string)$member->qrcode , 'QRCODE',3,3,array(0 ,0 ,0))));

//        $attachment = url('public/inv.png');
        // Email Send
        if ($member->email){
            $data = [
                'memberEmail' => $member->email,
                'qrcode' => $qrcode,
                'member'=>$member,
                'link2'=>url('print/printBadge/'.$member->code.'/'.$member->qrcode),
            ];

            Mail::send('email.invitation', $data, function ($m) use ($data) {
                $m->to($data['memberEmail'])->subject('دعوة لحضور حفل جائزة Masiratna للابتكار');
            });
        }

        // Whatsapp Send


        return redirect()->back()->with('success','تم التسجيل بنجاح');
    }

    public function storeConfirm(Request $request)
    {
        app()->setLocale('ar');
        $data = $request->all();

        $member = member::where('code',$request->code)->first();
        if (!$member)
            return redirect()->back()->with('error','حدث خطأ ما!');

        $member->update([
            'type'=>$data['type'],
            'confirmed'=>1,
            'id_number'=>$data['id_number'] ?? null,
        ]);


//        $link = url('/badge' . '/' . $member->code);

//        \Storage::disk('public')->put('qrcode/'.$member->id.$qrcode.'.png',base64_decode(\DNS2D::getBarcodePNG((string)$member->qrcode , 'QRCODE',3,3,array(255 ,255 ,255))));
//
//        $data = [
//            'memberEmail' => $member->email,
//            'code' => $member->code,
//            'qrcode' => $qrcode,
//            'id' => $member->id,
//            'name' => $member->name,
//            'member'=>$member,
//            'lang' => 'ar',
//        ];
//
//        Mail::send('email.qrcode', $data, function ($m) use ($data) {
//            $m->to($data['memberEmail'])->subject('QR Code Ticket for Ramadan Iftar Gathering');
//        });

        return redirect()->back()->with('success','تم التعديل بنجاح');
    }

    public function storeConfirmAtt(Request $request)
    {
        app()->setLocale('ar');

        $member = member::where('code',$request->code)->first();
        if (!$member)
            return redirect()->back()->with('error','حدث خطأ ما!');

        $member->update([
            'status'=>$request->status,
        ]);


        if ($member->status == 1 && $member->email) {
            $data = [
                'memberEmail' => $member->email,
                'member' => $member,
                'link' => url('/print/printBadge/'.$member->code.'/'.$member->qrcode),
            ];

            Mail::send('email.acceptation', $data, function ($m) use ($data) {
                $m->to($data['memberEmail'])->subject('دعوة لحضور حفل جائزة Masiratna للابتكار');
            });

        }else{
            $data = [
                'memberEmail' => $member->email,
                'member' => $member,
            ];
//            if($member->email){
//                   Mail::send('email.refuse', $data, function ($m) use ($data) {
//                    $m->to($data['memberEmail'])->subject('دعوة لحضور حفل تدشين مؤسسة كيان غير الربحية');
//                });
//
//            }

        }

        return redirect()->back()->with('success','تم تأكيد حالة الحضور بنجاح');
    }

    public function storeWinner(Request $request)
    {
        $member = member::find($request->member_id);

        if ($member)
            $member->update([
                'award'=>1
            ]);
        return redirect()->back();

        return redirect()->route('success',[$member->id,$member->code]);
    }

    public function confirm($id,$code,Request $request){
        app()->setLocale('ar');
        $member = \App\Models\member::where('id',$id)->where('code',$code)->first();
        if (!$member)
            abort(404);
        $lang = 'ar';

        $data['session'] = 3;
        $session = \App\Models\Session::find($data['session']);
        $member->update([
            'name' => $request->name . ' ' . $request->l_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'reg_type' => 2,
        ]);

        $sessionBooking = SessionBooking::whereNull('member_id')
            ->where('session_id',$data['session'])
            ->where('day',10)
            ->orderBy('id','asc')->first();

//        foreach ($sessionBookings as $sessionBooking){
        $sessionBooking->update([
            'member_id'=>$member->id,
        ]);

        $qrcode = $sessionBooking->qrcode;
//        }

        $session->update([
            'current_count_10' => $session->current_count_10 + 1
        ]);

        $link = url('/badge' . '/' . $member->code);

        \Storage::disk('public')->put('qrcode/'.$member->id.$qrcode.'.png',base64_decode(\DNS2D::getBarcodePNG((string)$qrcode , 'QRCODE',3,3)));

        $data = [
            'memberEmail' => $member->email,
            'code' => $member->code,
            'qrcode' => $qrcode,
            'id' => $member->id,
            'name' => $member->name,
            'member'=>$member,
            'lang' => 'ar',
        ];

        Mail::send('email.qrcode', $data, function ($m) use ($data) {
            $m->to($data['memberEmail'])->subject('QR Code Ticket for Ramadan Iftar Gathering');
        });

        return redirect()->route('success',[$member->id,$member->code]);
    }

    public function badgeView($code,$qrcode)
    {
        $member = member::where('code', $code)->first();
        if ($member)
            return view('badge', compact('member','qrcode'));
        else
            return 'This Link Unavailable';
    }

    public function download_pdf($code,$qrcode)
    {
        try {

            $member = member::where('code', $code)->first();

            $data =['member' => $member,'qrcode'=>$qrcode,'withImage' =>0];

            return view('badge', $data);
        } catch (Exception $ex) {
            return Errors::catchErrorAdmin($ex);
        }
    }

    public function checkEmail($email)
    {
        $member = member::where('email', $email)->first();
        if ($member)
            return false;
        return true;
    }
}
