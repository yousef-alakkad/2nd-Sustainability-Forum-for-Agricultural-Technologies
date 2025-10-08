<?php

use App\Models\SessionBooking;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Services\OutlookOAuthService;
use Illuminate\Support\Facades\Mail;
use App\Models\member;




Route::get('/send-test-mail', function () {


                $member = Member::first();
                Mail::send('email.invitation', ['member' => $member], function ($m) use ($member) {
                    $m->to('Test39@datatime4it.com')
                    ->subject('تاكيد ملتقى استدامة للتقنيات الزراعية 2 - الزراعة النسيجية');
                });


    return 'تم إرسال البريد بنجاح!';
});

Route::get('/', function () {

    return  redirect('/event');
});


Route::get('/change-lang/{type}/{lang}', function($type,$lang){
    if (!in_array($lang, ['en', 'ar'])) {
        abort(404);
    }

    \app()->setLocale($lang);
    session()->put('my_locale', $lang);
    $url = $type == 1 ? 'vip' : 'registration';
    return redirect()->to(\url($url).'/'.app()->getLocale());
})->name('change-language');


Route::get('/event',function(){
    return view('estidamah.landig_page');
});

Route::get('/training',function(){
    return view('training.landig_page');
});

Route::get('/workshop',function(){
    return view('workshop.landig_page');
});

Route::get('/survey',function(){
    return view('email.survey');
});



Route::get('/success-registration',function(){
    return view('training.success');
})->name('success.registration');

Route::get('/success-registration',function(){
    return view('training.success');
})->name('success.registration');

Route::get('/success-registration-workshop',function(){
    return view('workshop.success');
})->name('success.registration.workshops');

Route::get('/success-survey',function(){
    return view('survey.success');
})->name('survey.success');



Route::get('/registration', [App\Http\Controllers\EstidamahController::class, 'create'])->name('estidamah.create');
Route::post('/registration', [App\Http\Controllers\EstidamahController::class, 'store'])->name('estidamah.store');

Route::get('/registration-training', [App\Http\Controllers\EstidamahTrainingController::class, 'create'])->name('estidamah.training.create');
Route::post('/registration-training', [App\Http\Controllers\EstidamahTrainingController::class, 'store'])->name('estidamah.training.store');


Route::get('/registration-workshop', [App\Http\Controllers\WorkShopsController::class, 'create'])->name('workshop.create');
Route::post('/registration-workshop', [App\Http\Controllers\WorkShopsController::class, 'store'])->name('workshop.store');


Route::get('/registration-survey', [App\Http\Controllers\SurveyController::class, 'create'])->name('survey.create');
Route::post('/registration-survey', [App\Http\Controllers\SurveyController::class, 'store'])->name('survey.store');




Route::get('/badge/{id}', [App\Http\Controllers\EstidamahController::class, 'badge'])->name('registration.badge');
Route::get('/badge2/{id}', [App\Http\Controllers\EstidamahController::class, 'badge2'])->name('registration.badge2');
Route::get('/badge-training/{id}', [App\Http\Controllers\EstidamahTrainingController::class, 'badge'])->name('registration.training.badge');
Route::get('/badge-workshop/{id}', [App\Http\Controllers\WorkShopsController::class, 'badge'])->name('registration.workshop.badge');









Route::get('/success/{id}/{code}', function($id,$code){
    $member = \App\Models\member::where('id',$id)->where('code',$code)->first();
    if (!$member)
        abort(404);
    $code = $member->code;
    $id = $member->id;
    $qrcode = $member->qrcode;

    $lang =$member->lang;
    app()->setLocale('ar');
    return view('success',compact('member','qrcode','code','lang'));
})->name('success');

Route::get('/confirm/{id}/{code}', function($id,$code){
    $member = \App\Models\member::where('id',$id)->where('code',$code)->first();
    if (!$member || $member->reg_type == 2)
        abort(404);
    $lang = 'ar';
    app()->setLocale($lang);

    return view('confirm',compact('member','lang'));
})->name('confirm');

Route::post('/store-confirm/{id}/{code}', [\App\Http\Controllers\MemberController::class,'confirm'])->name('confirm.store');



//Route::get('registration', [App\Http\Controllers\MemberController::class, 'registrationView']);
//Route::post('/store-registration', [App\Http\Controllers\MemberController::class, 'storeRegistration'])->name('store-registration');

// Route::get('registration', [App\Http\Controllers\MemberController::class, 'registrationView']);
// Route::post('/store-registration', [App\Http\Controllers\MemberController::class, 'storeRegistration'])->name('store-registration');

Route::get('confirm-attend/{code}', [App\Http\Controllers\MemberController::class, 'confirmAttView']);
Route::post('/confirm-attend', [App\Http\Controllers\MemberController::class, 'storeConfirmAtt'])->name('confirm-attend');

Route::get('confirm/{code}', [App\Http\Controllers\MemberController::class, 'confirmView']);
Route::post('/store-confirm', [App\Http\Controllers\MemberController::class, 'storeConfirm'])->name('store-confirm');

Route::get('sum', [App\Http\Controllers\MemberController::class, 'sumView']);

Route::get('spin', [App\Http\Controllers\MemberController::class, 'spinView']);
Route::post('/store-winner', [App\Http\Controllers\MemberController::class, 'storeWinner'])->name('store-winner');

// Badge
Route::get('/badge/{code}/{qrcode}', [App\Http\Controllers\MemberController::class, 'download_pdf']);
Route::get('/badgepdf/{code}', [App\Http\Controllers\MemberController::class, 'download_pdf']);

// email

Route::get('/email',function (){
    $member = \App\Models\member::first();

    $qrcode = $member->qrcode;

    $data = [
        'memberEmail' => $member->email,
        'code' => $member->code,
        'member'=>$member,
        'id' => $member->id,
        'qrcode' => $qrcode,
        'name' => $member->name,
        'lang' => 'ar',
    ];

    return view('email.invitation', $data);
});

// export Registered Members
Route::get('export-all-registered', [App\Http\Controllers\HomeController::class, 'exportAllRegistered']);


Route::get('export-all-registered-in-workshops', [App\Http\Controllers\HomeController::class, 'exportAllRegisteredInWorkShops']);


//Route::get('/registration', [App\Http\Controllers\MemberController::class, 'registrationView']);
Route::get('/work-registration', [App\Http\Controllers\MemberController::class, 'registrationView']);

Route::get('/company-registration/{lang?}', [App\Http\Controllers\MemberController::class, 'companyRegistrationView']);
Route::post('/saveMembersCompanyData', [App\Http\Controllers\MemberController::class, 'saveCompanyData'])->name('companyMember.save');

Route::post('/saveMembersData', [App\Http\Controllers\MemberController::class, 'save'])->name('saveMembersData');



// Link For Payment Datails
Route::get('/bank-details/{code}', [App\Http\Controllers\MemberController::class, 'bankDetailsView']);
Route::post('/bank-details/{code}', [App\Http\Controllers\MemberController::class, 'savebankDetailsView']);
// Check Email
Route::get('checkEmail/{email}', [App\Http\Controllers\MemberController::class, 'checkEmail']);

Auth::routes(["register" => false]);
//Attend By Qrcode
Route::get('/attendVisitor/{code}', [App\Http\Controllers\Admin\AttendController::class, 'storeByCode']);
Route::get('/attendVisitor-training/{code}', [App\Http\Controllers\Admin\AttendTrainingController::class, 'storeByCode']);
//Resend Visa
Route::get('resendVisa/{id}', [App\Http\Controllers\HomeController::class, 'resendVisa']);
// Export Excel For Festival Attending
Route::get('admin/export/{date}/{type}', [App\Http\Controllers\HomeController::class, 'exportByDate']);

// Export Excel For WorkShops Attending
Route::get('export-workshop/{id}', [App\Http\Controllers\HomeController::class, 'exportByWorkShop']);
// Export Excel For Interested Memeber Of Workshops
Route::get('export-interested-in-workshop/{id}', [App\Http\Controllers\HomeController::class, 'exportInterestedInWorkShop']);
// Get All Users
Route::get('/getAllUsers', [App\Http\Controllers\HomeController::class, 'getUsers'])->name('getUsers');
Route::delete('/deleteUser/{id}', [App\Http\Controllers\HomeController::class, 'destroyUser']);
// Get All Registered Memebers

    Route::delete('/attend/training/{id}',[App\Http\Controllers\Admin\AttendTrainingController::class, 'destroy'])->name('attends.destroy.training');

Route::get('/winnersMembers', [App\Http\Controllers\HomeController::class, 'getDataW'])->name('winnersMembers');
Route::get('/registeredCompanyMemebers', [App\Http\Controllers\HomeController::class, 'getCompanyData'])->name('registeredCompanyMembers');
Route::get('/registeredExhebs', [App\Http\Controllers\HomeController::class, 'getExhebsData'])->name('registeredExhebs');
Route::post('/reminder/{id}', [App\Http\Controllers\HomeController::class, 'reminder']);
Route::delete('/deleteMember/{id}', [App\Http\Controllers\HomeController::class, 'destroy']);
Route::delete('/deleteMemberTraining/{id}', [App\Http\Controllers\HomeController::class, 'destroyTraining']);
Route::delete('/deleteMemberWorkshop/{id}', [App\Http\Controllers\HomeController::class, 'destroyWorkshop']);
Route::delete('/deleteWinner/{id}', [App\Http\Controllers\HomeController::class, 'deleteWinner']);
Route::get('/show-visitor/{id}', [App\Http\Controllers\HomeController::class, 'showVisitor']);
// Get All Remittance Memebers
Route::get('/remittance', [App\Http\Controllers\HomeController::class, 'index2']);
Route::get('/remittanceMemebers', [App\Http\Controllers\HomeController::class, 'getRemittance'])->name('MembersRemittance');
Route::delete('/deleteRemittance/{id}', [App\Http\Controllers\HomeController::class, 'destroyRemittance']);
Route::get('/approve/{id}', [App\Http\Controllers\HomeController::class, 'approve']);
// Get Visa Info
Route::get('/visaMembers', [App\Http\Controllers\HomeController::class, 'getVisaMembers'])->name('getVisaMembers');
// Get Workshop Info
Route::get('/workShopInfo', [App\Http\Controllers\Admin\WorkShopController::class, 'getData'])->name('getWorkShopData');
Route::delete('/deleteWorkShop/{id}', [App\Http\Controllers\Admin\WorkShopController::class, 'destroy']);
Route::put('/edit-workshop/{id}', [App\Http\Controllers\Admin\WorkShopController::class, 'editWorkShop']);
// Get All Data For Printing
Route::get('/all', [App\Http\Controllers\HomeController::class, 'getAll'])->name('allRegistration');
Route::get('/sendInvitaions', [App\Http\Controllers\HomeController::class, 'sendInvitaions'])->name('sendInvitaions');
Route::get('/print/printBadge/{withImage}/{code}', [\App\Http\Controllers\Admin\VisitorController::class,'printBadge']);
Route::group(['prefix'=>'admin','middleware'=>['auth']],function (){

    Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/sessions', [App\Http\Controllers\HomeController::class, 'sessions'])->name('sessions');

    Route::get('/create/visitor', [\App\Http\Controllers\Admin\VisitorController::class,'index'])->name('createVisitros');
    Route::post('/create/visitor', [\App\Http\Controllers\Admin\VisitorController::class,'store'])->name('visitor.store');
    Route::get('/edit/visitor/{id}', [\App\Http\Controllers\Admin\VisitorController::class,'edit']);
    Route::put('/update/visitor/{id}', [\App\Http\Controllers\Admin\VisitorController::class,'update'])->name('UpdateVisitros');


    Route::get('/create/visitor/training', [\App\Http\Controllers\Admin\VisitorController::class,'indexTraining'])->name('createVisitrosTraining');
    Route::post('/create/visitor/training', [\App\Http\Controllers\Admin\VisitorController::class,'storeTraining'])->name('visitor.store.Training');
    Route::get('/edit/visitor/training/{id}', [\App\Http\Controllers\Admin\VisitorController::class,'editTraining']);
    Route::put('/update/visitor/training/{id}', [\App\Http\Controllers\Admin\VisitorController::class,'updateTraining'])->name('UpdateVisitros.Training');

    Route::get('/create/visitor/workshop', [\App\Http\Controllers\Admin\VisitorController::class,'indexWorkshop'])->name('createVisitrosWraining');
    Route::post('/create/visitor/workshop', [\App\Http\Controllers\Admin\VisitorController::class,'storeWorkshop'])->name('visitor.store.Workshop');
    Route::get('/edit/visitor/workshop/{id}', [\App\Http\Controllers\Admin\VisitorController::class,'editWorkshop']);
    Route::put('/update/visitor/workshop/{id}', [\App\Http\Controllers\Admin\VisitorController::class,'updateWorkshop'])->name('UpdateVisitros.Workshop');


    Route::get('/show/visitors', [\App\Http\Controllers\Admin\VisitorController::class,'showVisitors'])->name('showVisitors');
    Route::get('/show/winners', [\App\Http\Controllers\Admin\VisitorController::class,'showWinners'])->name('showWinners');
    Route::get('/rememmber-invitation/visitors/{id}', [\App\Http\Controllers\Admin\VisitorController::class,'rememmberInvitation'])->name('rememmber-invitation.Visitors');


        Route::get('/show/registration-survey', [\App\Http\Controllers\SurveyController::class,'index'])->name('survey.index');
        Route::get('/show/registration-workshops', [\App\Http\Controllers\WorkShopsController::class,'index'])->name('workshops.index');
        Route::get('/show/registration-training', [\App\Http\Controllers\EstidamahTrainingController::class,'index'])->name('estidamah.training.index');
        Route::get('/show/registration', [\App\Http\Controllers\EstidamahController::class,'index'])->name('estidamah.index');

        Route::get('/print/registration-training', [\App\Http\Controllers\EstidamahTrainingController::class,'print'])->name('Print.training.estidamah');
        Route::get('/print/registration', [\App\Http\Controllers\EstidamahController::class,'print'])->name('Print.estidamah');
        Route::get('/print/riyadh', [\App\Http\Controllers\EstidamahController::class,'print2'])->name('PrintRiyadh');

        Route::get('/rememmber-invitation/{id}', [\App\Http\Controllers\EstidamahController::class,'RememmberInvitation'])->name('rememmber.invitation');
        Route::get('/registeredMemebers', [App\Http\Controllers\EstidamahController::class, 'getData'])->name('registeredMembers');
        Route::get('/registeredMemebersTraining', [App\Http\Controllers\EstidamahTrainingController::class, 'getData'])->name('registeredMembersTraining');
        Route::get('/registeredMemebersWorkShops', [App\Http\Controllers\WorkShopsController::class, 'getData'])->name('registeredMembersWorkShops');
        Route::get('/approve/{status}/{id}', [App\Http\Controllers\EstidamahTrainingController::class, 'approve'])->name('approve.training');
        Route::get('/registeredMemebersSurveys', [App\Http\Controllers\SurveyController::class, 'getData'])->name('registeredMembersSurveys');




    Route::get('/create/workshop-visitor', [\App\Http\Controllers\Admin\VisitorController::class,'indexExheb'])->name('createExhebs');;
    Route::post('/create/workshop-visitor', [\App\Http\Controllers\Admin\VisitorController::class,'storeExheb']);
    Route::get('/show/workshop-visitor', [\App\Http\Controllers\Admin\VisitorController::class,'showExheb'])->name('showExhebs');
    Route::get('/show/company-visitor', [\App\Http\Controllers\Admin\VisitorController::class,'showCompany'])->name('company');

    Route::get('/remittance', [App\Http\Controllers\HomeController::class, 'index2']);


    Route::get('/attend', [App\Http\Controllers\Admin\AttendController::class, 'index']);
    Route::post('/attend', [App\Http\Controllers\Admin\AttendController::class, 'store']);

    Route::get('/attend-training', [App\Http\Controllers\Admin\AttendTrainingController::class, 'index']);
    Route::post('/attend-training', [App\Http\Controllers\Admin\AttendTrainingController::class, 'store']);



    Route::get('/attendWorkShop', [App\Http\Controllers\Admin\AttendController::class, 'indexWorkShop']);
    Route::post('/attendWorkShop', [App\Http\Controllers\Admin\AttendController::class, 'storeWorkShop']);


    Route::get('/attend&print', [App\Http\Controllers\Admin\AttendController::class, 'attendAndPrintView']);
    Route::post('/attend&print', [App\Http\Controllers\Admin\AttendController::class, 'saveAttendAndPrint']);

    Route::get('/attend&print/training', [App\Http\Controllers\Admin\AttendTrainingController::class, 'attendAndPrintView']);
    Route::post('/attend&print/training', [App\Http\Controllers\Admin\AttendTrainingController::class, 'saveAttendAndPrint']);




    Route::get('/attends-per-day-reg', [App\Http\Controllers\Admin\AttendController::class, 'attendPerDayReg']);
    Route::get('/attends-per-day-training', [App\Http\Controllers\Admin\AttendTrainingController::class, 'attendPerDay']);

    Route::get('/attends-per-workshop', [App\Http\Controllers\Admin\AttendController::class, 'attendPerWorkShop']);

    Route::get('/interested-in-workshop', [App\Http\Controllers\Admin\AttendController::class, 'intersetedInWorkShop']);
    Route::get('/view-interested-in-workshop/{id}', [App\Http\Controllers\Admin\AttendController::class, 'viewIntersetedInWorkShop']);
    Route::get('/getBrowseInterestedInWorkshop/{id}', [App\Http\Controllers\Admin\AttendController::class, 'getBrowseInterestedInWorkshop']);

    Route::get('/BrowseEventAttendersReg/{date}',[App\Http\Controllers\Admin\AttendController::class, 'BrowseAttendersReg']);
    Route::get('/BrowseEventAttendersTrainig/{date}',[App\Http\Controllers\Admin\AttendTrainingController::class, 'BrowseAttendersTrainig']);

    Route::get('/getBrowseEventAttendersData1/{date}',[App\Http\Controllers\Admin\AttendController::class, 'getEventData1']);
    Route::get('/getBrowseEventAttendersData2/{date}',[App\Http\Controllers\Admin\AttendTrainingController::class, 'getEventData1']);


    Route::get('/BrowseWorkShopAttenders/{id}',[App\Http\Controllers\Admin\AttendController::class, 'BrowseWorkShopAttenders']);
    Route::get('/getBrowseWorkShopAttendersData/{id}',[App\Http\Controllers\Admin\AttendController::class, 'getBrowseWorkShopAttendersData']);

    Route::delete('/attend/{id}',[App\Http\Controllers\Admin\AttendController::class, 'destroy'])->name('attends.destroy');

    Route::get('/print/visitor', [\App\Http\Controllers\Admin\VisitorController::class,'print']);
    Route::get('/print/printBadge/{code}/{qrcode}', [\App\Http\Controllers\Admin\VisitorController::class,'printBadge']);


    Route::get('/visa', [App\Http\Controllers\HomeController::class, 'visaIndex']);
    Route::post('/addVisa/{id}', [App\Http\Controllers\HomeController::class, 'addVisa']);

    Route::get('/workshop', [App\Http\Controllers\Admin\WorkShopController::class, 'index']);
    Route::post('/workshop', [App\Http\Controllers\Admin\WorkShopController::class, 'store']);

    Route::get('/allUsers',[App\Http\Controllers\HomeController::class, 'allUsers']);




    Route::get('/create/manager', [\App\Http\Controllers\Admin\VisitorController::class,'createManager']);
    Route::get('/create/speak', [\App\Http\Controllers\Admin\VisitorController::class,'createSpeak']);
    Route::post('/reg/exheb', [\App\Http\Controllers\Admin\VisitorController::class,'storeExheb']);
    Route::post('/reg/manager', [\App\Http\Controllers\Admin\VisitorController::class,'storeManager']);
    Route::post('/reg/speak', [\App\Http\Controllers\Admin\VisitorController::class,'storeSpeak']);





    Route::get('/get-register-categories', [App\Http\Controllers\RegisterCategoriesController::class, 'getData'])->name('get.register.categories');
    Route::get('/register-categories', [App\Http\Controllers\RegisterCategoriesController::class, 'index'])->name('index.register.categories');
    Route::post('/register-categories', [App\Http\Controllers\RegisterCategoriesController::class, 'store'])->name('store.register.categories');
    Route::put('/register-categories/{id}', [App\Http\Controllers\RegisterCategoriesController::class, 'update'])->name('update.register.categories');
    Route::delete('/register-categories/{id}', [App\Http\Controllers\RegisterCategoriesController::class, 'destroy'])->name('destroy.register.categories');
    Route::get('/register-categories/printBadge/{id}', [App\Http\Controllers\RegisterCategoriesController::class, 'printBadge'])->name('print.register.categories');

        Route::delete('/delete/survey/{id}', [App\Http\Controllers\SurveyController::class, 'destroy'])->name('destroy.survey');



});

Route::get('/e-test',function (){
    return view('email.test',['link'=>'asd','name'=>'asd']);
});
