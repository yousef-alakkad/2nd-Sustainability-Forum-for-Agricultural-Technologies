<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\member;
use Str;
use Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Support\Facades\File;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Session;
use App\Services\OutlookOAuthService;





class MasiratnaController extends Controller
{
    public function index(){
        return view('masiratna.index') ;

    }

    public function Jeddahindex(){
        return view('masiratna.jeddah_registration') ;

    }


    public function Riyadhindex(){
        return view('masiratna.riyadh_registration') ;

    }

    public function JeddahRegistration(Request $request){

         $validated = $request->validate([
        'name'   => 'required|string|max:255',
        'email'  => [
            'required',
            'email',
            Rule::unique('members')->where(function ($query) use ($request) {
                return $query->where('type',1);
            }),
        ],
        'mobile' => [
            'required',
            'string',
            'min:8',
            'max:20',
            Rule::unique('members')->where(function ($query) use ($request) {
                return $query->where('type', 1);
            }),
        ],
        'city'   => 'required|string|max:100',
    ], [
        'name.required'   => 'الاسم الكامل مطلوب',
        'email.required'  => 'البريد الإلكتروني مطلوب',
        'email.email'     => 'يجب إدخال بريد إلكتروني صحيح',
        'email.unique'    => 'هذا البريد الإلكتروني مسجل مسبقاً لهذا النوع',
        'mobile.required' => 'رقم الجوال مطلوب',
        'mobile.unique'   => 'رقم الجوال مسجل مسبقاً لهذا النوع',
        'city.required'   => 'المدينة مطلوبة',
        'type.required'   => 'نوع العضو مطلوب',
    ]);

        $qrcode = member::max('qrcode');
        $qrcode = $qrcode ? ($qrcode +1) : 100000;

        $member = member::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'city'=>$request->city,
            'type'=>1,
            'qrcode'=>$qrcode,
            'code'=>time() . Str::random(30),
            'source' => Session::get('from_source', 'direct'),

        ]);

        \Storage::disk('public')->put('qrcode/'.$member->id.$qrcode.'.png',base64_decode(\DNS2D::getBarcodePNG((string)$member->qrcode , 'QRCODE',3,3,array(0 ,0 ,0))));


        if ($member->email) {
             $accessToken = OutlookOAuthService::getAccessToken();

            // تحديث كلمة المرور ديناميكيًا
            config(['mail.mailers.smtp.password' => $accessToken]);

        //    Mail::send('email.invitation', ['member' => $member], function ($m) use ($member) {
        //         $m->to($member->email)
        //         ->subject('تسجيلك مؤكد لمعرض مسيرتنا للجامعات الاسترالية 2025 .. ننتظر جيتك');
        //     });
        }



        return redirect()->back()->with('success','تم التسجيل بنجاح، ستصلك رسالة تأكيد على بريدك الإلكتروني');


    }


    public function RiyadhRegistration(Request $request){
       $validated = $request->validate([
        'name'   => 'required|string|max:255',
        'email'  => [
            'required',
            'email',
            Rule::unique('members')->where(function ($query) use ($request) {
                return $query->where('type',2);
            }),
        ],
        'mobile' => [
            'required',
            'string',
            'min:8',
            'max:20',
            Rule::unique('members')->where(function ($query) use ($request) {
                return $query->where('type', 2);
            }),
        ],
        'city'   => 'required|string|max:100',
    ], [
        'name.required'   => 'الاسم الكامل مطلوب',
        'email.required'  => 'البريد الإلكتروني مطلوب',
        'email.email'     => 'يجب إدخال بريد إلكتروني صحيح',
        'email.unique'    => 'هذا البريد الإلكتروني مسجل مسبقاً لهذا النوع',
        'mobile.required' => 'رقم الجوال مطلوب',
        'mobile.unique'   => 'رقم الجوال مسجل مسبقاً لهذا النوع',
        'city.required'   => 'المدينة مطلوبة',
        'type.required'   => 'نوع العضو مطلوب',
    ]);

        $qrcode = member::max('qrcode');
        $qrcode = $qrcode ? ($qrcode +1) : 100000;

        $member = member::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile'=>$request->mobile,
            'city'=>$request->city,
            'type'=>2,
            'qrcode'=>$qrcode,
            'code'=>time() . Str::random(30),
            'source' => Session::get('from_source', 'direct'),

        ]);

            \Storage::disk('public')->put('qrcode/'.$member->id.$qrcode.'.png',base64_decode(\DNS2D::getBarcodePNG((string)$member->qrcode , 'QRCODE',3,3,array(0 ,0 ,0))));

            if ($member->email) {

                 $accessToken = OutlookOAuthService::getAccessToken();

                // تحديث كلمة المرور ديناميكيًا
                config(['mail.mailers.smtp.password' => $accessToken]);
            Mail::send('email.invitation', ['member' => $member], function ($m) use ($member) {
                    $m->to($member->email)
                    ->subject('تسجيلك مؤكد لمعرض مسيرتنا للجامعات الاسترالية 2025 .. ننتظر جيتك');
                });
             }




            return redirect()->back()->with('success','تم التسجيل بنجاح، ستصلك رسالة تأكيد على بريدك الإلكتروني');

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




        public function download_pdf($id)
        {
            $member = Member::findOrFail($id);

            $logoData   = public_path('masiratna/assets/Images/logos.png');
            $footerData = public_path('masiratna/assets/Images/bg.png');
            $qrcodeData = storage_path('app/public/qrcode/' . $member->id . $member->qrcode . '.png');

            $html = view('badge', compact('member', 'logoData', 'qrcodeData', 'footerData'))->render();

           $mpdf = new \Mpdf\Mpdf([
                'default_font' => 'dejavusans',
                'mode' => 'utf-8',
                'format' => [90, 125], // 9cm × 12.5cm
            ]);

            $mpdf->SetDirectionality('rtl');

            // تفعيل الألوان والخلفيات
            $mpdf->showImageErrors = true;
            $mpdf->useSubstitutions = false;
            $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::DEFAULT_MODE);

            return $mpdf->Output("badge.pdf", "I");
        }

        public function showJeddha(){
            return view('masiratna.show');
        }

         public function showRiyadh(){
            return view('masiratna.show2');
        }

        public function print(){
            return view('masiratna.print');
        }

        public function print2(){
            return view('masiratna.print2');
        }






    }
