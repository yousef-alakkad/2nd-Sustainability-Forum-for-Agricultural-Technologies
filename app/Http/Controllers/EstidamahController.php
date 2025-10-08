<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\member;
use App\Models\Attend;
use Str;
use Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Support\Facades\File;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Session;
use App\Services\OutlookOAuthService;
use DataTables;
use Carbon\Carbon;





class EstidamahController extends Controller
{

    public function index(){
        return view('estidamah.index') ;

    }

    public function getData(Request $request)
    {
            $data = member::get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->editColumn('design',function ($q){
                    return '<a target="_blank" href="' . asset('storage/app/'.$q->design) .'" >عرض</a>';
                })
                ->editColumn('img',function ($q){
                    return $q->img ?'<a target="_blank" href="' . asset('storage/app/'.$q->img) .'" >عرض</a>' : '-';
                })
                ->rawColumns(['action','img','design'])
                ->make(true);

    }

    public function create(){
        $closingTime = Carbon::parse('2025-09-17 08:00:00');
        $now = Carbon::now();
        $registrationClosed = $now->greaterThanOrEqualTo($closingTime);
        if(true){
            return view('estidamah.registration') ;

        }

        return view('estidamah.landig_page') ;

    }


    public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|unique:members,mobile',
            'email' => 'required|email|unique:members,email',
            'age' => 'required|integer|min:1|max:120',
            'gender' => 'required',
            'days' => 'required',
            'job_title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
        ], [
            'name.required' => 'الاسم مطلوب.',
            'days.required' => 'يوم الحضور مطلوب.',
            'mobile.required' => 'رقم الجوال مطلوب.',
            'mobile.unique' => 'رقم الجوال مستخدم مسبقاً.',
            'email.required' => 'الايميل مطلوب.',
            'email.email' => 'صيغة الايميل غير صحيحة.',
            'email.unique' => 'الايميل مستخدم مسبقاً.',
            'age.required' => 'العمر مطلوب.',
            'age.integer' => 'العمر يجب أن يكون رقماً.',
            'age.min' => 'العمر يجب أن يكون أكبر من 0.',
            'age.max' => 'العمر غير صالح.',
            'gender.required' => 'الجنس مطلوب.',
            'gender.in' => 'الجنس يجب أن يكون ذكر أو أنثى.',
            'job_title.required' => 'المسمى الوظيفي مطلوب.',
            'organization.required' => 'جهة العمل مطلوبة.',

        ]);

        // إنشاء QR code
        $qrcode = Member::max('qrcode');
        $qrcode = $qrcode ? ($qrcode +1) : 100000;

        $member = Member::create([
            'name' => $validated['name'],
            'mobile' => $request->full,
            'email' => $validated['email'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'days' => $validated['days'],
            'job_title' => $validated['job_title'],
            'organization' => $validated['organization'],
            'qrcode' => $qrcode,
            'code' => time() . Str::random(30),
        ]);

        \Storage::disk('public')->put(
            'qrcode/'.$member->id.$qrcode.'.png',
            base64_decode(\DNS2D::getBarcodePNG((string)$member->qrcode, 'QRCODE', 3, 3, [0,0,0]))
        );

        if ($member->email) {
             Mail::send('email.invitation', ['member' => $member], function ($m) use ($member) {
                     $m->to($member->email)
                     ->subject('تأكيد التسجيل – ملتقى استدامة للتقنيات الزراعية الثاني');
                 });
         }

       return redirect()->route('registration.badge',$member->code)->with('success', true);
    }






        public function RememmberInvitation($id){

            $member = Member::find($id);
            if(!$member){
                return response(['status'=>false,'message'=>'Member not founded!'],400);
            }

            $accessToken = OutlookOAuthService::getAccessToken();

            config(['mail.mailers.smtp.password' => $accessToken]);
            Mail::send('email.rememmber-invitation'.$member->type, ['member' => $member], function ($m) use ($member) {
                    $m->to($member->email)
                    ->subject('تذكير تسجيل-معرض مسيرتنا للجامعات الأسترالية 2025');
            });

                        return redirect()->back()->with('success','تم التذكير بنجاح');


        }




        public function badge2($id)
        {
            $member = Member::where('code',$id)->first();
            if(!$member)
                abort(404);

            $mytime = now();

            $check = Attend::where('member_id', $member->id)
                ->whereDate('date', $mytime->toDateString())
                ->first();

                $attend = "تم التسجيل مسبقبا في هذا اليوم";

            if (!$check) {
                 $new = Attend::create([
                    'member_id' => $member->id,
                    'date'      => $mytime->toDateString(),
                    'time'      => $mytime->format('H:i:s'),
                ]);
                $attend = "تم تسجيل الحضور بنجاح ";
            }


            return view('badge',compact('member','attend'));

        }

         public function badge($id)
        {
            $member = Member::where('code',$id)->first();
            if(!$member)
                abort(404);

            return view('badge',compact('member'));

        }


        public function print(){
            return view('estidamah.print');
        }

        public function print2(){
            return view('estidamah.print2');
        }






    }
