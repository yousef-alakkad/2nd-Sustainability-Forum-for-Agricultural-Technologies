<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\WorkshopExit;
use App\Models\Registered;


class ExitController extends Controller 
{
    
    public function workshopExit(Request $request)
    {
        $registered = Registered::where('qrcode',$request->qrcode)->first();
        
        if($registered){
            
                $check = WorkshopExit::where('registered_id',$registered->id)->where('workshop_id',$request->workshop_id)->first();
                
                if(!$check){
                    $new = WorkshopExit::create(['registered_id' => $registered->id,'workshop_id' => $request->workshop_id]);
                }
                
                $new = true;
                
                if($new) return response()->json(["status" => "sucess","message" => "تمت العملية بنجاح","member" => $registered], Response::HTTP_CREATED);
                
                return response()->json(["status" => "failed", "message" => "حدث خطأ ما"], Response::HTTP_INTERNAL_SERVER_ERROR);
                

        }
        
       return response()->json(["status" => "failed", "message" => "الرقم غير موجود"], Response::HTTP_NOT_FOUND);
    }

}
