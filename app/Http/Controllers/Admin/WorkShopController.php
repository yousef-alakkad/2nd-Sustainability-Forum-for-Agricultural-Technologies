<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\WorkShop;
use Str;
use Session;
use Storage;
use DataTables;

class WorkShopController extends Controller
{
    public function index(){
        return view('admin.workshop.index');
    }
    
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = WorkShop::all();
            return Datatables::of($data)
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a> ';
                    return $actionBtn;
                })
                ->addColumn('persons', function($row){
                    return $row->members;
                    info($row->members);
                })
                ->rawColumns(['action', 'persons'])
                ->make(true);
        }
    }
    
    public function store(Request $request){
        $start_time = $request->startTime.''.$request->fromDateSelect;
        $end_time = $request->endTime.''.$request->toDateSelect;
        
        $newRecord = WorkShop::create([
            'name' => $request->name,
            'day' => $request->day,
            'speaker' => $request->speaker,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'room' => $request->room,
            'place' => $request->place,
        ]);
        
        if($newRecord)
            return true;
        return false;
    }
    
    public function destroy($id){
        $del = WorkShop::where('id',$id)->first();
        
        $del->delete();
        
        return true;
    }
    
    public function editWorkShop(Request $request,$id){
        $start_time = $request->startTime.''.$request->fromDateSelect;
        $end_time = $request->endTime.''.$request->toDateSelect;
        
        WorkShop::where('id',$id)->update([
            'name' => $request->name,
            'speaker' => $request->speaker,
            'day' => $request->day,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'room' => $request->room,
            'place' => $request->place,
        ]);
        
        return redirect()->back();
    }

}
