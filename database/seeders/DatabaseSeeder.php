<?php

namespace Database\Seeders;

use App\Models\Session;
use App\Models\SessionBooking;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;
use App\Models\MemberTrainig;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


         \App\Models\User::create([
            'name'=>'Admin',
            'email'=>'admin@admin.admin',
            'password'=>bcrypt('@event#admin#2025@')
        ]);


    }
}
