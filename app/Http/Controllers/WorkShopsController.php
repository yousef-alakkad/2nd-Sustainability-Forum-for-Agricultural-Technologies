<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkShops;
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
class WorkShopsController extends Controller
{
    public function index(){
        return view('workshop.index') ;

    }

    public function getData(Request $request)
    {
            $data = WorkShops::get();
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

        return view('workshop.registration') ;

    }


   public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string',

        ], [

            'name.required' => 'حقل الاسم مطلوب.',
            'name.string' => 'الاسم يجب أن يكون نصاً.',
            'name.max' => 'الاسم طويل جداً.',

            'mobile.required' => 'رقم الجوال مطلوب.',
            'mobile.string' => 'رقم الجوال يجب أن يكون نصاً.',
            'mobile.unique' => 'رقم الجوال مسجل مسبقاً.',


        ]);

        $member = WorkShops::create([
            'name' => $validated['name'],
            'mobile' => $request->full,

        ]);



        return redirect()->route('success.registration.workshops')->with('success', true);


    }


    public function approve($status , $id){
         $member = WorkShops::findOrFail($id);
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
            $member = WorkShops::where('code',$id)->first();
            if(!$member)
                abort(404);
            return view('badge_workshop',compact('member'));

        }


        public function print(){
            return view('workshops.print');
        }






    }
