<?php

namespace App\Console\Commands;

use App\Helpers\WhatsappHelper;
use App\Models\member;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\MemberTrainig;

class SendApprove extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:approve1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $members = MemberTrainig::where('approve', null)->limit(10)->get();

        foreach ($members as $member) {
            $member->approve = 0;
            $member->save();
            Mail::send('email.approve0', ['member' => $member], function ($m) use ($member) {
                    $m->to($member->email)
                    ->subject('أعتذار بشأن المشاركة في البرنامج التدريبي لتقنيات زراعة الأنسجة النباتية');
            });


        }


    }
}
