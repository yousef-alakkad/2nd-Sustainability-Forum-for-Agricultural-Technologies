<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\SessionBooking;
use Illuminate\Http\Request;
use App\Models\member;
use App\Models\WorkShop;
use App\Models\Attend;
use App\Models\AttendsWorkShop;
use App\Models\WorkShopRegisteredMember;
use DB;
use DataTables;
use Illuminate\Support\Facades\File;
use Mpdf\Mpdf;

class AttendController extends Controller
{
    public function index(){
        return view('admin.attend.index');
    }

    public function store(Request $request){
        $booking = member::where('qrcode',$request->qrcode)->first();
        if(!$booking){
            return response(['status'=>false,'message'=>'رقم الكود غير موجود'],400);
        }


        $mytime = \Carbon\Carbon::now();


        $check = Attend::where([
            ['member_id','=',$booking->id],
            ['date','=',$mytime->format('Y-m-d')],
        ])->first();


        if($check){
            return response(['status'=>false,'message'=>'تم التسجيل مسبقا لهذا اليوم'],400);
        }

        $new = Attend::create([
            'member_id' => $booking->id,
            'date' => $mytime->format('Y-m-d'),
            'time'=>$mytime->format('H'),
        ]);

        if($new)
            return true;

        return false;
    }

    public function attendPerDayReg(){
        $workshos = Attend::
        select('date','time', DB::raw('count(*) as total'))
            ->groupBy('date')->orderBy('date')->get();

        $count = Attend::LeftJoin('members' , 'members.id' ,'attends.member_id')->count();

        return view('admin.attend.attendPerDay1',compact('workshos','count'));
    }

    public function attendPerDayRiyadh(){
        $workshos = Attend::
        LeftJoin('members' , 'members.id' ,'attends.member_id')
        ->where('members.type',2)
        ->select('date','time', DB::raw('count(*) as total'))
            ->groupBy('date')->orderBy('date')->get();

        $count = Attend::LeftJoin('members' , 'members.id' ,'attends.member_id')
        ->where('members.type',2)->count();

        return view('admin.attend.attendPerDay2',compact('workshos','count'));
    }

    public function BrowseAttendersReg($date){
        $results = Attend::where('date',$date)->get();
        $route = '/estidamah/admin/getBrowseEventAttendersData1/'.$date;
        $eventDate = $date;
        return view('admin.attend.browseAttenders',compact('results','route','eventDate'));
    }

    public function BrowseAttenderstraining($date){
        $results = Attend::LeftJoin('members' , 'members.id' ,'attends.member_id')
        ->where('members.type',2)->where('date',$date)->get();
        $route = '/admin/getBrowseEventAttendersData2/'.$date;
        $eventDate = $date;
        return view('admin.attend.browseAttenders',compact('results','route','eventDate'));
    }

    public function getEventData1(Request $request,$date)
    {
        if ($request->ajax()) {
            $data = Attend::selectRaw('attends.id  , attends.created_at , member_id')->where('date',$date)->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })

                ->addColumn('name', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->name;
                })
                ->addColumn('email', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->email;
                })
                ->addColumn('entity', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->entity;
                })
                ->addColumn('mobile', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->mobile;
                })
                ->addColumn('time', function($row){
                    return $row->created_at->format('h:i A');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getEventData2(Request $request,$date)
    {
        if ($request->ajax()) {
            $data = Attend::Join('members' , 'members.id' ,'attends.member_id')
        ->where('members.type',2)->selectRaw('attends.id  , attends.created_at , member_id')->where('date',$date)->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })

                ->addColumn('name', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->name;
                })
                ->addColumn('email', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->email;
                })
                ->addColumn('entity', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->entity;
                })
                ->addColumn('mobile', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->mobile;
                })
                ->addColumn('time', function($row){
                    return $row->created_at->format('h:i A');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function indexWorkShop(){
        $workshops = WorkShop::all();
        return view('admin.attend.indexWorkShop',compact('workshops'));
    }

    public function attendAndPrintView(){
          return view('admin.attend.attendAndPrint');
    }

    public function storeWorkShop(Request $request){
        $memeber = member::where('qrcode',$request->qrcode)->first();

        if($memeber->type == 0){
                 return redirect()->back()->with('error', 'تم التسجيل مسبقا لهذا اليوم');

        }else{
            $check = DB::table('members_workshops')->where('member_id',$memeber->id)->where('work_shop_id',$request->name)->first();

            if(!$check) {
                    return redirect()->back()->with('error', 'تم التسجيل مسبقا لهذا اليوم');

            }
            $mytime = \Carbon\Carbon::now();
            $new = AttendsWorkShop::create([
                'member_id' => $memeber->id,
                'work_shop_id' => $request->name,
            ]);

             if($new){
                    return $memeber;
             }else{
                    return false;
             }
        }
    }

    public function attendPerWorkShop(){
        $workshos = AttendsWorkShop::select('work_shop_id', DB::raw('count(*) as total'))
        ->groupBy('work_shop_id')
        ->get();

        $count = AttendsWorkShop::count();

        return view('admin.attend.attendPerWorkShop',compact('workshos','count'));
    }

    public function intersetedInWorkShop(){
        $workshos = WorkShopRegisteredMember::select('work_shop_id', DB::raw('count(*) as total'))
        ->groupBy('work_shop_id')
        ->get();

        $count = WorkShopRegisteredMember::count();

        return view('admin.attend.interestedWorkShop',compact('workshos','count'));
    }

    public function viewIntersetedInWorkShop($id){
        $results = WorkShopRegisteredMember::where('work_shop_id',$id)->get();
        $route = '/admin/getBrowseInterestedInWorkshop/'.$id;
        return view('admin.attend.browseInterstedInWorkShop',compact('results','route'));
    }

    public function storeByCode($code, Request $request)
    {
        $member = Member::where('qrcode', $code)->first();
        $mytime = now();

        if (!$member) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'العضو غير موجود'
                ], 404);
            }
            return redirect()->back()->with('error', 'العضو غير موجود');
        }

        // تحقق من التسجيل في نفس اليوم
        $check = Attend::where('member_id', $member->id)
            ->whereDate('date', $mytime->toDateString())
            ->first();

        if ($check) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'exists',
                    'message' => 'تم التسجيل مسبقاً لهذا اليوم',
                    'name'    => $member->name
                ], 409);
            }
            return redirect()->back()->with('error', 'تم التسجيل مسبقاً لهذا اليوم');
        }

        // إنشاء سجل الحضور
        $new = Attend::create([
            'member_id' => $member->id,
            'date'      => $mytime->toDateString(),
            'time'      => $mytime->format('H:i:s'),
        ]);

        if ($new) {
            if ($request->ajax()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'تم تسجيل الحضور بنجاح',
                    'name'    => $member->name
                ], 200);
            }
            return redirect()->back()->with('success', 'تم تسجيل الحضور بنجاح');
        }

        if ($request->ajax()) {
            return response()->json([
                'status' => 'error',
                'message' => 'حصل خطأ غير متوقع'
            ], 500);
        }

        return redirect()->back()->with('error', 'حصل خطأ غير متوقع');
}


    public function saveAttendAndPrint(Request $request)
    {
        $request->validate([
            'qrcode' => 'required|string'
        ]);

        // البحث عن العضو
        $member = Member::where('qrcode', $request->qrcode)->first();

        if (!$member) {
            return response()->json([
                'status' => 'error',
                'message' => 'الكود غير صحيح'
            ], 404);
        }



        $mytime = now();

        $check = Attend::where('member_id', $member->id)
            ->whereDate('date', $mytime->toDateString())
            ->first();

        if ($check) {
            return response()->json([
                'status' => 'warning',
                'message' => 'تم التسجيل مسبقاً لهذا اليوم'
            ], 409);
        }

        // إنشاء سجل الحضور
        $new = Attend::create([
            'member_id' => $member->id,
            'date'      => $mytime->toDateString(),
            'time'      => $mytime->format('H:i:s'),
        ]);

        if ($new) {
                if ($request->ajax()) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'تم الحفظ بنجاح',
                        'id' => $member->id,
                        'name' => $member->name,
                    ]);
                }
        }

        return response()->json([
            'status' => 'error',
            'message' => 'لم يتم حفظ الحضور'
        ], 500);
    }


    public function BrowseWorkShopAttenders($id){
        $results = AttendsWorkShop::where('work_shop_id',$id)->get();
        $route = '/admin/getBrowseWorkShopAttendersData/'.$id;
         return view('admin.attend.browseWorkShopAttenders',compact('results','route'));
    }

    public function getBrowseWorkShopAttendersData(Request $request,$id){
        if ($request->ajax()) {
            $data = AttendsWorkShop::where('work_shop_id',$id)->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('name', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->name;
                })
                ->addColumn('email', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->email;
                })
                ->addColumn('side', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->side;
                })
                ->addColumn('job', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->job;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function getBrowseInterestedInWorkshop(Request $request,$id)
    {
        if ($request->ajax()) {
            $data = WorkShopRegisteredMember::where('work_shop_id',$id)->get();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('name', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->name;
                })
                ->addColumn('email', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->email;
                })
                ->addColumn('side', function($row){
                    $member = member::where('id',$row->member_id)->first();
                    return $member->side;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function destroy($id){
        $result = Attend::find($id);

        if (!$result)
            return response(['status'=>false,'message'=>'Attend not founded!'],400);
        $result->delete();
        return response(['status'=>true,'message'=>'Attend deleted successfully'],200);

    }
}
