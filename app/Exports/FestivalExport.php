<?php

namespace App\Exports;

use App\Disneyplus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Attend;
use App\Models\member;
use App\Models\AttendTraining;
use App\Models\MemberTrainig;

class FestivalExport implements FromCollection , WithHeadings
{
    protected $date;
    protected $type;

     function __construct($date,$type) {
            $this->date = $date;
            $this->type = $type;
     }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if($this->type == 1){
            $attenders = Attend::
                where('date', $this->date)
                ->pluck('member_id');
                $visitors = Member::select('name','email','mobile')
                        ->whereIn('id', $attenders)
                        ->get();

                return $visitors;
        }else{
             $attenders = AttendTraining::
                where('date', $this->date)
                ->pluck('member_id');
                $visitors = MemberTrainig::select('name','email','mobile')
                        ->whereIn('id', $attenders)
                        ->get();

                return $visitors;
        }

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
