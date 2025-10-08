<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\WhatsappHelper;
use App\Http\Controllers\Controller;
use App\Models\SessionBooking;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\member;
use App\Models\MemberTrainig;
use App\Models\Attend;
use App\Models\WorkShops;
use Str;
use Session;
use Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use PDF;
use Illuminate\Support\Facades\File;
use Mpdf\Mpdf;

use App\Services\OutlookOAuthService;
class VisitorController extends Controller
{
    public function index(){
        return view('admin.visitor.index');
    }

    public function showVisitors(){
        return view('admin.visitor.show');
    }

    public function showWinners(){
        return view('admin.visitor.winners');
    }

    public function indexExheb(){
        return view('admin.exheb.index');
    }

    public function showExheb (){
        return view('admin.exheb.show');
    }
    public function showCompany (){
        return view('admin.visitor.show_company');
    }

    public function print(){
        return view('admin.visitor.print');
    }

    public function printBadge($code,$qrcode){
        $member = member::where('code', $code)->first();
        $withImage = 1;
        if ($member)
            return view('badge', compact('member','qrcode','withImage'));
        else
            return 'This Link Unavailable';
//        $visitor = member::where('code',$code)->get()->first();
//
//        return view('printBadge',["visitor"=>$visitor,"withImage"=>$withImage]);
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
            'days.required' => 'وقت الحضور مطلوب.',
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
            'days' => $validated['days'],
            'gender' => $validated['gender'],
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
                     ->subject('تأكيد التسجيل – ملتقى استدامة للتقنيات الزراعية (النسخة الثانية)');
                 });
         }

       return redirect()->route('estidamah.index')->with('success','تم التسجيل بنجاح');
    }

    public function storeExheb(Request $request){
        $code = Str::random(40);
        $newmember = member::create([
            'name' => $request->name,
            'badgeName' => $request->name,
            'mobile' => '-',
            'email' => $code,
            'type' => $request->type,
            'badgeSide' => $request->company,
            'badgeJob' => $request->position,
            'nationality' => '-',
            'address' => $request->country,
            'howYouKnow' => '-',
            'member' => '-',
            'inBahreen' => '-',
            'code' => $code,
            'qrcode' => random_int(100000, 999999)
        ]);

        if($newmember)
            return $newmember;

        return false;
    }

   public function rememmberInvitation($id){

        $member = member::find($id);
        if(!$member)
            return redirect()->back()->with('error','غير موجود');


        $data = [
            'memberEmail' => $member->email,
            'code' => $member->code,
            'id' => $member->id,
            'name' => $member->name,
            'member'=>$member,
            'lang' => 'ar',
        ];
        Mail::send('email.rememmber-invitation', $data, function ($m) use ($data) {
            $m->to($data['memberEmail'])->subject('تذكير  حضور حفل تدشين مؤسسة كيان غير الربحية');
            $m->embed(public_path('img2.jpeg'));
            $m->embed(public_path('img1.png'));
        });


        $text = 'السلام عليكم ورحمة الله وبركاته،';
        $text .= ' \n \n';
        $text .= 'السيد/ة '.$member->name.'،تحية طيبة وبعد،،';
        $text .= ' \n \n';
        $text .= 'نود تذكيركم بدعوتنا لكم لحضور حفل تدشين مؤسسة كيان الأهلية غير الربحية.';
        $text .= ' \n \n';
        $text .= 'حضوركم يشرفنا ويسعدنا، ومشاركتكم تعني لنا الكثير. بانتظاركم بكل ترحيب وتقدير.';
        $text .= ' \n \n';
        $text .= 'تفاصيل الحفل:-';
        $text .= ' \n';
        $text .= '•	التاريخ: يوم الأربعاء الموافق ٣٠ أبريل ٢٠٢٥م';
        $text .= ' \n ';
        $text .= '•	التوقيت: ٦:٠٠ مساءً';
        $text .= ' \n';
        $text .= '• الموقع: https://maps.app.goo.gl/Tv1GUnrMoLsFHi8r6?g_st=ic';
        $text .= ' \n \n';
        $text .= 'كما نود إبلاغكم بأنه عند وصولكم إلى الفندق، سيتم توفير خدمة وقوف السيارة من قبل فريق التنظيم، حيث سيتولى أحد الأعضاء استلام المركبة وإيقافها نيابةً عنكم بكل عناية واهتمام.';
        $text .= ' \n \n';
        $text .= 'نرجو منكم إبراز رسالة الدعوة عند الوصول، ليتم التعرّف عليكم وتقديم الخدمة بسلاسة، ثم إرشادكم مباشرة إلى موقع الفعالية.';
        $text .= ' \n \n';
        $text .= 'مع خالص التحيات،';
        $text .= ' \n \n';
        $text .= 'مؤسسة كيان الأهلية غير الربحية';

        $attachment1 = url('public/img1.png');
        $attachment2 = url('public/img2.jpeg');


         WhatsappHelper::sendMessage($member->mobile,$text);
        WhatsappHelper::sendImage($member->mobile,$attachment1, '');
        WhatsappHelper::sendImage($member->mobile,$attachment2,'');

            return redirect()->back()->with('success','تمت التذكير بنجاح');
    }

    public function edit($id){
        $member = member::find($id);
        return view('admin.visitor.edit',compact('member'));
    }

    public function update(Request $request, $id)
    {
        // جلب العضو
        $member = Member::findOrFail($id);

        // التحقق من البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|unique:members,mobile,' . $member->id,
            'email' => 'required|email|unique:members,email,' . $member->id,
            'age' => 'required|integer|min:1|max:120',
            'gender' => 'required',
            'days' => 'required',
            'job_title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',

        ], [
            'name.required' => 'الاسم مطلوب.',
            'days.required' => 'وقت الحضور مطلوب.',
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
            'job_title.required' => 'المسمى الوظيفي مطلوب.',
            'organization.required' => 'جهة العمل مطلوبة.',

        ]);

        // تحديث بيانات العضو
        $member->update([
            'name' => $validated['name'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'],
            'age' => $validated['age'],
            'days' => $validated['days'],
            'gender' => $validated['gender'],
            'job_title' => $validated['job_title'],
            'organization' => $validated['organization'],

        ]);


        return redirect()->route('estidamah.index')->with('success','تم تحديث البيانات بنجاح');
    }

    public function indexTraining(){
        return view('admin.visitor.index_training');
    }

    public function editTraining($id){
         $member = MemberTrainig::find($id);
        return view('admin.visitor.edit_training',compact('member'));
    }

    public function storeTraining(Request $request)
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

       return redirect()->route('estidamah.training.index')->with('success','تم التسجيل بنجاح');

    }



    public function updateTraining(Request $request, $id)
    {
        // جلب العضو
        $member = MemberTrainig::findOrFail($id);

        // التحقق من البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|unique:member_trainigs,mobile,' . $member->id,
            'email' => 'required|email|unique:member_trainigs,email,' . $member->id,
            'region' => 'required',
            'english_level' => 'required',
            'educational_level' => 'required|string',
            'educational_background' => 'required|string',
            'educational_level_other' => 'nullable|string|max:255',
            'job_title' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
        ]);


        $educational_level = $validated['educational_level'] === 'other'
            ? $validated['educational_level_other']
            : $validated['educational_level'];
        // تحديث بيانات العضو
        $member->update([
            'name' => $validated['name'],
            'mobile' => $validated['mobile'],
            'email' => $validated['email'],
            'region' => $validated['region'],
            'english_level' => $validated['english_level'],
            'educational_background' => $validated['educational_background'],
            'educational_level' => $educational_level,
            'job_title' => $validated['job_title'],
            'organization' => $validated['organization'],
        ]);


        return redirect()->route('estidamah.training.index')->with('success','تم تحديث البيانات بنجاح');
    }

    public function indexWorkshop(){
        return view('admin.visitor.index_workshop');
    }

    public function editWorkshop($id){
         $member = WorkShops::find($id);
        return view('admin.visitor.edit_workshop',compact('member'));
    }

    public function storeWorkshop(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string',

        ]);



       

        $member = WorkShops::create([
            'name' => $validated['name'],
            'mobile' => $request->full,

        ]);


       return redirect()->route('workshops.index')->with('success','تم التسجيل بنجاح');

    }



    public function updateWorkshop(Request $request, $id)
    {
        // جلب العضو
        $member = WorkShops::findOrFail($id);

        // التحقق من البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string',

        ]);



        $member->update([
            'name' => $validated['name'],
            'mobile' => $validated['mobile'],

        ]);


        return redirect()->route('workshops.index')->with('success','تم تحديث البيانات بنجاح');
    }



}
