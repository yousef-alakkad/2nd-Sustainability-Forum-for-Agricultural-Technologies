<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Session;
use App\Models\SessionBooking;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\member;

class RegisteredController extends Controller
{
    public function getInfo($code){
        $registered = member:: where('qrcode',$code)->first();
        if (!$registered)
            return response()->json(["status" => "failed", "message" => "الرقم غير موجود"], Response::HTTP_NOT_FOUND);

        return response()->json(["status" => "success", "data" => $registered], Response::HTTP_OK);

    }

}
