<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\member;
use App\Helpers\WhatsappHelper;
use Illuminate\Support\Facades\Mail;

class SendRemember extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:approve0';

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
        $members = member::where('send_remember',0)->where('status',1)->limit(10)->get();
        foreach($members as $member){
            $data = [
                'memberEmail' => $member->email,
                'code' => $member->code,
                'id' => $member->id,
                'name' => $member->name,
                'member'=>$member,
                'lang' => 'ar',
            ];

            if($member->email){
                Mail::send('email.rememmber-invitation', $data, function ($m) use ($data) {
                    $m->to($data['memberEmail'])->subject('تذكير  حضور حفل تدشين مؤسسة كيان غير الربحية');
                    $m->embed(public_path('img2.jpeg'));
                    $m->embed(public_path('img1.png'));
                });
            }


            $text = 'السلام عليكم ورحمة الله وبركاته،';
            $text .= ' \n \n';
            $text .= 'السيد/ة '.$member->name.'،تحية طيبة وبعد،،';
            $text .= ' \n \n';
            $text .= 'نود تذكيركم بدعوتنا لكم لحضور حفل تدشين مؤسسة كيان الأهلية غير الربحية.';
            $text .= ' \n \n';
            $text .= 'حضوركم يشرفنا ويسعدنا، ومشاركتكم تعني لنا الكثير. بانتظاركم بكل ترحيب وتقدير.';
            $text .= ' \n \n';
            $text .= 'تفاصيل الحفل:-';
            $text .= ' \n';
            $text .= '•	التاريخ: يوم الأربعاء الموافق ٣٠ أبريل ٢٠٢٥م';
            $text .= ' \n ';
            $text .= '•	التوقيت: ٦:٠٠ مساءً';
            $text .= ' \n';
            $text .= '• الموقع: https://maps.app.goo.gl/Tv1GUnrMoLsFHi8r6?g_st=ic';
            $text .= ' \n \n';
            $text .= 'كما نود إبلاغكم بأنه عند وصولكم إلى الفندق، سيتم توفير خدمة وقوف السيارة من قبل فريق التنظيم، حيث سيتولى أحد الأعضاء استلام المركبة وإيقافها نيابةً عنكم بكل عناية واهتمام.';
            $text .= ' \n \n';
            $text .= 'نرجو منكم إبراز رسالة الدعوة عند الوصول، ليتم التعرّف عليكم وتقديم الخدمة بسلاسة، ثم إرشادكم مباشرة إلى موقع الفعالية.';
            $text .= ' \n \n';
            $text .= 'مع خالص التحيات،';
            $text .= ' \n \n';
            $text .= 'مؤسسة كيان الأهلية غير الربحية';

            $attachment1 = url('public/img1.png');
            $attachment2 = url('public/img2.jpeg');


            WhatsappHelper::sendMessage($member->mobile,$text);
            WhatsappHelper::sendImage($member->mobile,$attachment1, '');
            WhatsappHelper::sendImage($member->mobile,$attachment2,'');

            $member->send_remember = 1;
            $member->save();
        }
    }
}
