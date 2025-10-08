<?php

namespace App\Exports;

use App\Disneyplus;
use App\Models\Session;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Attend;
use App\Models\member;

class AllRegisteredExport implements FromCollection , WithHeadings
{
    protected $date;

     function __construct() {

     }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $visitors = member::select('name','email','mobile')->get();

//        foreach ($visitors as $visitor){
//            $visitor->day = $visitor->day.'-09-2024';
//            if ($visitor->reg_type == 0) {
//                $session = Session::find($visitor->session_id);
//                $visitor->session_id = $session->from . ' - ' . $session->to;
//            } elseif ($visitor->reg_type == 1){
//                $visitor->session_id = '-';
//            } elseif ($visitor->reg_type == 2){
//                $visitor->session_id = '12 PM - 2 PM';
//            } else{
//                $visitor->session_id = '12 PM - 2 PM';
//            }
//            if ($visitor->reg_type ==0)
//                $visitor->reg_type = 'نسجيل خارجي';
//            elseif ($visitor->reg_type == 1)
//                $visitor->reg_type = 'دعوة غير مؤكدة';
//            elseif ($visitor->reg_type == 2)
//                $visitor->reg_type = 'دعوة مؤكدة';
//            elseif ($visitor->reg_type == 3)
//                $visitor->reg_type = 'VIP خارجي';
//            else
//                $visitor->reg_type = '-';
//        }

        return $visitors;
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Mobile',
        ];
    }

}
