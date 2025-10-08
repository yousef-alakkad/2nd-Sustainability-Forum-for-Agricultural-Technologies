<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\SessionBooking;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\WorkshopRegistered;
use App\Models\WorkshopAttend;
use App\Models\AttendTraining;
use App\Models\member;
use App\Models\MemberTrainig;
use App\Models\Attend;
use DB;


class AttendController extends Controller
{

    public function attend(Request $request)
    {
        $registered = member::where('qrcode',$request->qrcode)->first();
        if (!$registered)
            return response()->json(["status" => "failed", "message" => "الرقم غير موجود"], Response::HTTP_NOT_FOUND);


        $mytime = \Carbon\Carbon::now();

        if($registered){
            $check = Attend::where('member_id',$registered->id)->where('date',$mytime->toDateString())->first();

            if($check)
                return response()->json(["status" => "failed", "message" => "تم التسجيل مسبقا لتاريخ اليوم"], Response::HTTP_FORBIDDEN );

            $new = Attend::create([
                'member_id' => $registered->id,
                'date' => $mytime->toDateString(),
                'time'=>$mytime->format('H'),
            ]);

            if($new) {
                return response()->json(["status" => "sucess", "message" => "تمت العملية بنجاح", "member" => $registered], Response::HTTP_CREATED);
            }
            return response()->json(["status" => "failed", "message" => "حدث خطأ ما"], Response::HTTP_INTERNAL_SERVER_ERROR );
        }

        return response()->json(["status" => "failed", "message" => "الرقم غير موجود"], Response::HTTP_NOT_FOUND);
    }

    public function attendTraining(Request $request)
    {
        $registered = MemberTrainig::where('qrcode',$request->qrcode)->first();
        if (!$registered)
            return response()->json(["status" => "failed", "message" => "الرقم غير موجود"], Response::HTTP_NOT_FOUND);

        if ($registered->approve == 0)
            return response()->json(["status" => "failed", "message" => "لم يتم قبول المتدرب"], Response::HTTP_NOT_FOUND);


        $mytime = \Carbon\Carbon::now();

        if($registered){
            $check = AttendTraining::where('member_id',$registered->id)->where('date',$mytime->toDateString())->first();

            if($check)
                return response()->json(["status" => "failed", "message" => "تم التسجيل مسبقا لتاريخ اليوم"], Response::HTTP_FORBIDDEN );

            $new = AttendTraining::create([
                'member_id' => $registered->id,
                'date' => $mytime->toDateString(),
                'time'=>$mytime->format('H'),
            ]);

            if($new) {
                return response()->json(["status" => "sucess", "message" => "تمت العملية بنجاح", "member" => $registered], Response::HTTP_CREATED);
            }
            return response()->json(["status" => "failed", "message" => "حدث خطأ ما"], Response::HTTP_INTERNAL_SERVER_ERROR );
        }

        return response()->json(["status" => "failed", "message" => "الرقم غير موجود"], Response::HTTP_NOT_FOUND);
    }


    public function workshopAttend(Request $request)
    {
        $registered = member::where('qrcode',$request->qrcode)->first();

        if($registered){

            $check = DB::table('members_workshops')->where('member_id',$registered->id)->where('work_shop_id',$request->workshop_id)->first();

             if($check){

                $secondCheck = DB::table('attends_work_shops')->where('member_id',$registered->id)->where('work_shop_id',$request->workshop_id)->first();

                if(!$secondCheck){
                    $new = DB::table('attends_work_shops')->insert(['member_id' => $registered->id,'work_shop_id' => $request->workshop_id]);
                }

                $new = true;

                if($new) return response()->json(["status" => "sucess","message" => "تمت العملية بنجاح","member" => $registered], Response::HTTP_CREATED);

                return response()->json(["status" => "failed", "message" => "حدث خطأ ما"], Response::HTTP_INTERNAL_SERVER_ERROR);

             }else{
                 return response()->json(["status" => "failed", "message" => "غير مسجل في الورشة"], Response::HTTP_UNAUTHORIZED );
             }
        }

       return response()->json(["status" => "failed", "message" => "الرقم غير موجود"], Response::HTTP_NOT_FOUND);
    }

}
