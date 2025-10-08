<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\WorkShop;

class WorkShopController extends Controller 
{
    public function allWorkshops(){
        $workshops = WorkShop::get();
        return response()->json(["status" => "success", "data" => $workshops], Response::HTTP_OK);
    }
    
}
