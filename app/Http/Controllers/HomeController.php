<?php

namespace App\Http\Controllers;

use App\Helpers\WhatsappHelper;
use App\Models\Session;
use App\Models\SessionBooking;
use Illuminate\Http\Request;
use App\Models\member;
use App\Models\AttendTraining;
use App\Models\Attend;
use App\Models\MemberTrainig;
use App\Models\Survey;
use App\Models\PartnerSurvey;
use App\Models\AttendsWorkShop;
use App\Models\Remittance;
use App\Models\WorkShop;
use App\Models\User;
use App\Models\WorkShops;
use Illuminate\Support\Facades\Mail;
use DataTables;
use Storage;
use Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FestivalExport;
use App\Exports\WorkShopExport;
use App\Exports\AllRegisteredExport;
use App\Exports\AllRegisteredExportInWorkshop;
use App\Exports\InterestedInWorkShop;
use App\Models\WorkShopRegisteredMember;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('sendInvitaions');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $member = member::count();
        $training = MemberTrainig::count();
        $workshop = WorkShops::count();
        $survey = Survey::count();

        return view('home',compact('member','training','workshop','survey'));
    }


    public function index2()
    {
        return view('remittance');
    }

    public function visaIndex()
    {
        return view('visa');
    }

    public function getData(Request $request)
    {
//        if ($request->ajax()) {
            $data = member::where('type',1)->get();
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
//        }
    }

    public function getData2(Request $request)
    {
//        if ($request->ajax()) {
            $data = member::where('type',2)->get();
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
//        }
    }
    public function getDataW(Request $request)
    {
//        if ($request->ajax()) {
            $data = member::where('award',1)->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
//        }
    }
    public function getCompanyData(Request $request)
    {
        if ($request->ajax()) {
            $data = member::where('type',2)->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getExhebsData(Request $request)
    {
        if ($request->ajax()) {
            $data = member::where('type',1)->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getVisaMembers(Request $request)
    {
        if ($request->ajax()) {
            $data = member::where([
                ['member','=','No'],
                ['inBahreen','=','No'],
            ])->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getRemittance(Request $request)
    {
        if ($request->ajax()) {
            $data = Remittance::get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->editColumn('memeber_id', function($q){
                   $member = member::where('id',$q->memeber_id)->first();
                   return $member->name;
                })
                ->editColumn('datee', function($q){
                $newDate = \Carbon\Carbon::createFromFormat('Y-m-d', $q->datee)->format('d/m/Y');

                return $newDate;
                })
                ->editColumn('is_accept', function($row){
                   if($row->is_accept == 0)
                     return 'لم يتم التأكيد بعد';
                   if($row->is_accept == 1)
                     return 'يحتاج الفيزا لإكمال التأكيد';

                   return 'تم التأكيد';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getAll(Request $request)
    {
        if ($request->ajax()) {
            $data = member::get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function reminder($id){
        $member = member::find($id);
        $data = [
            'memberEmail' => $member->email,
            'code' => $member->code,
            'qrcode' => $member->qrcode,
            'id' => $member->id,
            'name' => $member->name,
            'member'=>$member,
            'lang' => 'ar',
        ];

        Mail::send('email.qrcode', $data, function ($m) use ($data) {
            $m->to($data['memberEmail'])->subject('QR Code Ticket for Ramadan Iftar Gathering');
        });
        return true;
    }

    public function destroy($id){
        $member = member::find($id);
        Attend::where('member_id',$id)->delete();

        $member->delete();

        return true;
    }

    public function destroyTraining($id){
        $member = MemberTrainig::find($id);
        AttendTraining::where('member_id',$id)->delete();

        $member->delete();

        return true;
    }

    public function destroyWorkshop($id){
        $member = WorkShops::find($id);
        // AttendWorkshop::where('member_id',$id)->delete();

        $member->delete();

        return true;
    }

    public function deleteWinner($id){
        $member = member::find($id);

        $member->update([
            'award'=>0
        ]);

        return true;
    }

    public function destroyRemittance($id){
        $memberRemittance = Remittance::where('id',$id)->first();
        $memberRemittance->delete();
        return true;
    }

    public function approve($id){
        $remittance = Remittance::where('id',$id)->first();
        $member = member::find($remittance->memeber_id);
        $needVisa = 0;
        if($member->member == 'No' && $member->inBahreen == 'No' ){
            $needVisa = 1;
            $remittance->update([
                'is_accept' => 1
            ]);
        }else{
            $needVisa = 2;
            $remittance->update([
                'is_accept' => 2
            ]);
        }



        $link = url('/badge'.'/'.$member->code);
        $data = array('memberEmail' => $member->email,'link' => $link,'needVisa' => $needVisa);

        Mail::send('email.confirm',$data,function($m) use($data){
            $m->from('Registration@roshandubai.com');
            $m->to($data['memberEmail'])->subject('Confirmation Email!');
        });

        return true;

    }

    public function addVisa(Request $request,$id){
        $fileName = null;
        if($request->file('visaFile')){
            $file = $request->file('visaFile');
            $fileName   = Str::random(30).'.'. $file->getClientOriginalExtension();
            Storage::disk('public')->put('Visa/'.$fileName,file_get_contents($file));
        }

        member::where('id',$id)->update([
                'visaFile' => $fileName,
                'status' => 1
        ]);

        $member = member::where('id',$id)->first();

        $link = 'https://festival-gcc.org/storage/app/public/Visa/'.$fileName;
        $data = array('memberEmail' => $member->email,'link' => $link);

        Mail::send('email.visaMail',$data,function($m) use($data){
            $m->from('Registration@roshandubai.com');
            $m->to($data['memberEmail'])->subject('Visa Confirmation Email!');
        });

        return redirect()->back();
    }

    public function allUsers(){
        $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function destroyUser($id){
        $member = User::find($id);
        WorkShopRegisteredMember::where('member_id',$id)->delete();
        Attend::where('member_id',$id)->delete();
        AttendsWorkShop::where('member_id',$id)->delete();
        $member->delete();

        return true;
    }

    public function showVisitor($id){
        $member = member::where('id',$id)->first();

        return view('admin.visitor.showVisitor',compact('member'));
    }

    public function resendVisa($id){
        $member = member::where('id',$id)->first();


        if($member->visaFile != null){
            $link = 'https://festival-gcc.org/storage/app/public/Visa/'.$member->visaFile;
            $data = array('memberEmail' => $member->email,'link' => $link);
            Mail::send('email.visaMail',$data,function($m) use($data){
                $m->from('Registration@roshandubai.com');
                $m->to($data['memberEmail'])->subject('Visa Confirmation Email!');
            });

            return true;
        }

        return false;


    }

    public function sessions(){
        $sessions = Session::all();

        return view('admin.sessions',compact('sessions'));
    }

    public function exportByDate($date,$type){
        return Excel::download(new FestivalExport($date,$type), 'Registeration-'.$date.'.xlsx');
    }

    public function exportByWorkShop($id){
        return Excel::download(new WorkShopExport($id), 'WorkShopVisitors--'.$id.'.xlsx');
    }

    public function exportInterestedInWorkShop($id){
        return Excel::download(new InterestedInWorkShop($id), 'WorkShopInterestedVisitors--'.$id.'.xlsx');
    }

    public function exportAllRegistered(){
        return Excel::download(new AllRegisteredExport(), 'Registered.xlsx');
    }

    public function exportAllRegisteredInWorkShops(){
        return Excel::download(new AllRegisteredExportInWorkshop(), 'Registered.xlsx');
    }

    public function sendInvitaions(){
        $invs = json_decode(file_get_contents('public/invitations.json'));

        foreach ($invs as $inv){
            $code = time() . \Str::random(30);
            $qrcode = member::max('qrcode');
            $qrcode = $qrcode ? ($qrcode +1) : 100000;

            $newmember = member::create([
                'name' => $inv->name ,
                'mobile' => $inv->mobile,
                'type' => 1,
                'excel' => 1,
                'code' => $code,
                'qrcode' => $qrcode,
            ]);

            \Storage::disk('public')->put('qrcode/'.$newmember->id.$qrcode.'.png',base64_decode(\DNS2D::getBarcodePNG((string)$newmember->qrcode , 'QRCODE',3,3,array(255 ,255 ,255))));

            $link = 'https://invitation.kaiianngo.com/confirm-attend/'.$newmember->code;

            $text = 'السلام عليكم ورحمة الله وبركاته،';
            $text .= ' \n \n';
            $text .= 'السيد/ة '.$newmember->name.'،تحية طيبة وبعد،،';
            $text .= ' \n \n';
            $text .= 'يسعدنا ويشرفنا دعوتكم لحضور حفل تدشين مؤسسة كيان الأهلية غير الربحية، وذلك بدعوة كريمة من الأستاذ وليد العرجاني والأستاذ بدر العرجاني، في أمسية نحتفي بها معكم ببداية مشوارٍ يحمل بين طياته رسالة سامية، ورؤية نطمح من خلالها إلى إحداث أثرٍ إيجابي ومستدام في مجتمعنا.';
            $text .= ' \n \n';
            $text .= 'يسرنا أن تكونوا معنا في هذه المناسبة الخاصة، حيث نُطل معاً على مرحلة جديدة من العطاء والمسؤولية الاجتماعية، ونستعرض خلالها أهداف المؤسسة وبرامجها المستقبلية.';
            $text .= ' \n \n';
            $text .= '- تفاصيل الحفل:';
            $text .= ' \n';
            $text .= '•	التاريخ: يوم الأربعاء الموافق ٣٠ أبريل ٢٠٢٥م';
            $text .= ' \n ';
            $text .= '•	التوقيت: ٦:٠٠ مساءً';
            $text .= ' \n';
            $text .= '•	الموقع: فندق هيلتون الرياض';
            $text .= ' \n \n';
            $text .= 'لطفًا، نأمل تأكيد حضوركم عبر الرابط التالي:';
            $text .= ' \n';
            $text .= $link;
            $text .= ' \n \n';
            $text .= 'مع أطيب التحيات والتقدير،';
            $text .= ' \n';
            $text .= 'مؤسسة كيان الأهلية غير الربحية';

            WhatsappHelper::sendMessage($newmember->mobile,$text);
        }

        return 1;
    }
}
