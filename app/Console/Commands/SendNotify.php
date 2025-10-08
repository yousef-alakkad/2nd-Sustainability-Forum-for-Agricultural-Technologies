<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Attend;
use App\Helpers\WhatsappHelper;
use Carbon\Carbon;
class SendNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notify';

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

       $att = Attend::where('date','2025-9-17')->orWhere('date','2025-9-18')->pluck('member_id');
        $member = member::whereIn('id',$att)->where('send_notify', null)->limit(10)->get();
        foreach($member as $m){
            $m->send_notify = 1;
            $m->save();
            Mail::send('email.survey', ['member' => $m], function ($mail) use ($m) {
                $mail->to($m->email)
                     ->subject('شكرًا لمشاركتك في ملتقى استدامة للتقنيات الزراعية الثاني');
            });
        }
        



    }
}
