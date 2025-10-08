<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MemberTrainig;
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





class EstidamahTrainingController extends Controller
{

    public function index(){
        return view('training.index') ;

    }

    public function getData(Request $request)
    {
            $data = MemberTrainig::when(isset($request->approve) && $request->approve ==1 ,function($q){
                $q->where('approve',1);
            })->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                 ->editColumn('approve',function ($q){
                    if($q->approve == "1"){
                        return  "تم القبول" ;
                    }elseif($q->approve == "0"){
                        return  "تم الرفض" ;

                    }else{
                        return "-";

                    }
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

        $closingTime = Carbon::parse('2025-09-08 23:00:00');
        $now = Carbon::now();
        $registrationClosed = $now->greaterThanOrEqualTo($closingTime);
        if($registrationClosed){
            return view('training.landig_page') ;
        }
        return view('training.registration') ;

    }


   public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|unique:member_trainigs,mobile',
            'email' => 'required|email|unique:member_trainigs,email',
            'region' => 'required',
            'english_level' => 'required',
            'educational_level' => 'required|string',
            'educational_background' => 'required|string',
            'educational_level_other' => 'nullable|string|max:255',
            'job_title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
        ], [
            'english_level.required' => 'حقل مدى إجادتك للغة الإنجليزية مطلوب.',
            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'الاسم يجب أن يكون نصاً.',
            'name.max' => 'الاسم طويل جداً.',

            'mobile.required' => 'رقم الجوال مطلوب.',
            'mobile.string' => 'رقم الجوال يجب أن يكون نصاً.',
            'mobile.unique' => 'رقم الجوال مسجل مسبقاً.',

            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.email' => 'البريد الإلكتروني غير صالح.',
            'email.unique' => 'البريد الإلكتروني مسجل مسبقاً.',

            'region.required' => 'المنطقة مطلوبة.',

            'educational_level.required' => 'المستوى التعليمي مطلوب.',
            'educational_level.string' => 'المستوى التعليمي غير صالح.',

            'educational_background.required' => 'الخلفية التعليمية مطلوبة.',
            'educational_background.string' => 'الخلفية التعليمية غير صالحة.',

            'educational_level_other.string' => 'المستوى التعليمي الآخر غير صالح.',
            'educational_level_other.max' => 'المستوى التعليمي الآخر طويل جداً.',

            'job_title.required' => 'المسمى الوظيفي مطلوب.',
            'job_title.string' => 'المسمى الوظيفي يجب أن يكون نصاً.',
            'job_title.max' => 'المسمى الوظيفي طويل جداً.',

            'organization.required' => 'جهة العمل مطلوبة.',
            'organization.string' => 'جهة العمل يجب أن تكون نصاً.',
            'organization.max' => 'جهة العمل طويلة جداً.',
        ]);

        $educational_level = $validated['educational_level'] === 'other'
            ? $validated['educational_level_other']
            : $validated['educational_level'];

        $qrcode = MemberTrainig::max('qrcode');
        $qrcode = $qrcode ? ($qrcode + 1) : 100000;

        $member = MemberTrainig::create([
            'name' => $validated['name'],
            'mobile' => $request->full,
            'email' => $validated['email'],
            'region' => $validated['region'],
            'english_level' => $validated['english_level'],
            'educational_background' => $validated['educational_background'],
            'educational_level' => $educational_level,
            'job_title' => $validated['job_title'],
            'organization' => $validated['organization'],
            'qrcode' => $qrcode,
            'code' => time() . \Str::random(30),
        ]);

        \Storage::disk('public')->put('qrcode_training/'.$member->id.$qrcode.'.png',base64_decode(\DNS2D::getBarcodePNG((string)$member->qrcode , 'QRCODE',3,3,array(0 ,0 ,0))));


         if ($member->email) {


            Mail::send('email.invitation_training', ['member' => $member], function ($m) use ($member) {
                    $m->to($member->email)
                    ->subject('تأكيد استلام طلب التسجيل – البرنامج التدريبي لتقنيات زراعة الأنسجة النباتية');
                });
        }

                              return redirect()->route('success.registration')->with('success', true);


    }


    public function approve($status , $id){
         $member = MemberTrainig::findOrFail($id);
         $member->approve = $status;
         $member->save();
         if($status == 1){
             Mail::send('email.approve1', ['member' => $member], function ($m) use ($member) {
                    $m->to($member->email)
                    ->subject('إشعار بقبولكم في البرنامج التدريبي لتقنيات زراعة الأنسجة النباتية');
                });
         }else{
            Mail::send('email.approve0', ['member' => $member], function ($m) use ($member) {
                    $m->to($member->email)
                    ->subject('أعتذار بشأن المشاركة في البرنامج التدريبي لتقنيات زراعة الأنسجة النباتية');
            });
         }


               return redirect()->route('estidamah.training.index')->with('success', true);
    }










        public function badge($id)
        {
            $member = MemberTrainig::where('code',$id)->first();
            if(!$member)
                abort(404);
            return view('badge_training',compact('member'));

        }


        public function print(){
            return view('training.print');
        }








    }
