<!doctype html>
<html lang="{{app()->getLocale()}}" style="direction: {{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}};">

<head>
    <meta charset="utf-8" />
    <title>Wad</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Wad" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('public/favicon.png')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('public/assets/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('public/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('public/assets/css/app-rtl.min.css')}}" rel="stylesheet" type="text/css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap');

        @font-face {
            font-family: hrsd;
            src: url('{{url('public/fonts/HRSD-Regular.ttf')}}');
        }

        * {
            font-family: "cairo";
            font-size: 18px;
        }

        body {
            color: #158285;
            height: 100% !important;
        }

        .btn-primary {
            background-color: #f7941d;
            border-color: groove #f7941d;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #f7941d;
            border-color: #f7941d;
        }

        .btn-check:active+.btn-primary,
        .btn-check:checked+.btn-primary,
        .btn-primary.active,
        .btn-primary:active,
        .show>.btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #f7941d;
            border-color: #f7941d;
        }

        .bg-primary {
            --bs-bg-opacity: 1;
            background-color: #1c569f !important;
        }

        a {
            color: #158285;
            text-decoration: none;
        }

        @media (max-width: 994px) {

            .logo-group {
                display: block;
            }

            .logo-group img {
                margin-bottom: 20px;
            }
        }

        .authentication-bg::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-image: linear-gradient(135deg, #fe931f 0%, #56af79 51%, #1d858e 100%);
            color: white;
            opacity: 0.63;
        }

        .iti {
            width: 100%;
            display: block;
        }

        .iti__country-list {
            left: 0;
        }

        .select2-container {
            direction: rtl;
        }

        .select2-container--default .select2-selection--single {
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 4px;
            height: 40px;
        }

        .iti__country-list {
            text-align: right;
        }

        .select2-container--default .select2-results>.select2-results__options {
            text-align: right;
        }
    </style>
</head>


<body class="authentication-bg bg-primary position-relative">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8 col-lg-9 col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">

                                    <a href="wad-programs.com" class="text-center d-block mx-auto">
                                        <img src="{{asset('public/assets/images/logo.png')}}" height="82" alt="logo">
                                        <h3 class="mt-4">ملتقى المهارات والتدريب وعد بمنطقة نجران</h3>
                                    </a>

                                    <div class="d-flex justify-content-around mt-3">
                                        <div class="text-center mt-3">
                                            <a href="{{url('resend-badge')}}"
                                                class="btn btn-primary waves-effect waves-light"
                                                style="background-color: #fd931e;border-color: #fd931e;"
                                                type="submit">إعادة إرسال الدعوة
                                            </a>
                                        </div>

                                        <div class="text-center mt-3">
                                            <a href="{{url('edit-link')}}"
                                                class="btn btn-primary waves-effect waves-light"
                                                style="background-color: #1d848f;border-color: #1d848f;"
                                                type="submit">تعديل تسجيل سابق
                                            </a>
                                        </div>
                                    </div>

                                    <div class="mt-2 pt-2 ">

                                        @if(session()->has('error'))
                                        <div class="alert alert-danger p-2">
                                            {{session()->get('error')}}
                                        </div>
                                        @endif
                                        @if(session()->has('success'))
                                        <div class="alert alert-success p-2">
                                            {{session()->get('success')}}
                                        </div>
                                        @endif
                                        @if ($errors->any())
                                        <div class="alert alert-danger p-2">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        <form class="form-horizontal mt-4 pt-2" method="post" id="reg-form">
                                            @csrf
                                            <div class="mb-3">
                                                <h5> الاسم الأول </h5>
                                                <input type="text" id="first_name" name="first_name"
                                                    value="{{old('first_name') ?? ''}}" class="form-control" />
                                            </div>
                                            <div class="mb-3">
                                                <h5> الاسم الأخير</h5>
                                                <input type="text" id="last_name" name="last_name"
                                                    value="{{old('last_name') ?? ''}}" class="form-control" />
                                            </div>

                                            <div class="mb-3">
                                                <h5> {{__('auth.mobile')}}</h5>

                                                <input type="number" maxlength="9" id="mobile"
                                                    value="{{old('mobile') ?? ''}}" name="mobile"
                                                    class="form-control" />
                                                <p id="output"></p>

                                            </div>

                                            <div class="mb-3">
                                                <h5>البريد الالكتروني </h5>
                                                <input type="email" id="email" value="{{old('email') ?? ''}}"
                                                    name="email" class="form-control" />
                                            </div>

                                            <div class="mb-3">
                                                <h5>المنطقة </h5>
                                                {{-- <input type="text" id="city" value="{{old('city') ?? ''}}" --}}
                                                    {{-- name="city" class="form-control" />--}}
                                                <select type="text" id="city" class="form-control select2" name="city">
                                                    <option value="">--اختر--</option>
                                                    @foreach($cities as $city)
                                                    <option value="{{$city['name_ar']}}" {{old('city')==$city['name_ar']
                                                        ? 'selected' : '' }}>{{$city['name_ar']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <h5>الجنس </h5>
                                                <select type="text" id="gender" class="form-control" name="gender">
                                                    <option value="">--اختر--</option>
                                                    <option value="ذكر" {{old('gender')=='ذكر' ? 'selected' : '' }}>ذكر
                                                    </option>
                                                    <option value="أنثى" {{old('gender')=='أنثى' ? 'selected' : '' }}>
                                                        أنثى</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <h5>المهنة </h5>
                                                <select type="text" id="job" class="form-control" name="job">
                                                    <option value="">--اختر--</option>
                                                    <option value="طالب" {{old('job')=='طالب' ? 'selected' : '' }}>طالب
                                                    </option>
                                                    <option value="موظف" {{old('job')=='موظف' ? 'selected' : '' }}>موظف
                                                    </option>
                                                    <option value="باحث عن عمل" {{old('job')=='باحث عن عمل' ? 'selected'
                                                        : '' }}>باحث عن عمل</option>
                                                </select>
                                            </div>

                                            <div class="mb-3 job-divs" style="display: none;">
                                                <h5>المسمى الوظيفي </h5>
                                                <select type="text" id="position" class="form-control" name="position">
                                                    <option value="">--اختر--</option>
                                                    <option value="رئيس مجلس إدارة" {{old('position')=='رئيس مجلس إدارة'
                                                        ? 'selected' : '' }}>رئيس مجلس إدارة </option>
                                                    <option value="رئيس تنفيذي" {{old('position')=='رئيس تنفيذي'
                                                        ? 'selected' : '' }}>رئيس تنفيذي</option>
                                                    <option value="مدير عام" {{old('position')=='مدير عام' ? 'selected'
                                                        : '' }}>مدير عام</option>
                                                    <option value="مدير إدارة" {{old('position')=='مدير إدارة'
                                                        ? 'selected' : '' }}>مدير إدارة</option>
                                                    <option value="الوطائف التخصصية"
                                                        {{old('position')=='الوطائف التخصصية' ? 'selected' : '' }}>
                                                        الوطائف التخصصية</option>
                                                    <option value="الوظائف الإدارية"
                                                        {{old('position')=='الوظائف الإدارية' ? 'selected' : '' }}>
                                                        الوظائف الإدارية</option>
                                                    <option value="وطائف أخرى" {{old('position')=='وطائف أخرى'
                                                        ? 'selected' : '' }}>وطائف أخرى</option>
                                                </select>
                                            </div>

                                            <div class="mb-3 others-divs" style="display: none;">
                                                <h5>أدخل المسمى الوظيفي </h5>
                                                <input type="text" id="others" value="{{old('others') ?? ''}}"
                                                    name="others" class="form-control" />
                                            </div>

                                            <div class="mb-3 job-divs" style="display: none;">
                                                <h5>جهة العمل </h5>
                                                <input type="text" id="side" value="{{old('side') ?? ''}}" name="side"
                                                    class="form-control" />
                                            </div>

                                            <div class="mb-3">
                                                <h5>نوع الحضور </h5>
                                                <select type="text" id="registration_type" class="form-control"
                                                    name="registration_type">
                                                    <option value="1" {{old('registration_type')=='1' ? 'selected' : ''
                                                        }}>التسجيل في الحفل الرئيسي</option>
                                                    <option value="2" {{old('registration_type')=='2' ? 'selected' : ''
                                                        }}>التسجيل في الحفل الرئيسي وورش العمل التدريبية</option>
                                                    <option value="3" {{old('registration_type')=='3' ? 'selected' : ''
                                                        }}>التسجيل في ورش العمل التدريبية</option>
                                                </select>
                                            </div>

                                           



                                            <div class="text-center mt-3">
                                                <button class="btn btn-primary waves-effect waves-light" id="reg-btn"
                                                    style="background-color: #56af78;border-color: #56af78;"
                                                    type="submit">{{__('auth.reg')}}
                                                </button>
                                            </div>

                                        </form>


                                    </div>
                                </div>
                            </div>

                            <div class="mt-2 text-center text-dark" style="direction: ltr">

                                <p>©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>
                                    Wad.
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- End Log In page -->
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script src="{{asset('public/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
    <script src="{{asset('public/assets/js/app.js')}}"></script>


    <script>
        $('.select2').select2()
    $('#registration_type').on('change', function () {
        if ($(this).val() != 1) {
            $('#work-shops').slideDown()
        } else {
            $('#work-shops').slideUp()
        }
    })

    $('#job').on('change', function () {
        if ($(this).val() == 'موظف') {
            $('.job-divs').slideDown()
            $('.job-divs').find('select').attr('required','required')
            $('.job-divs').find('input').attr('required','required')
        } else {
            $('.job-divs').slideUp()
            $('.job-divs').find('select').removeAttr('required','required').val('')
            $('.job-divs').find('input').removeAttr('required','required').val('')
        }
    })

    $('#position').on('change', function () {
        if ($(this).val() == 'وطائف أخرى') {
            $('.others-divs').slideDown()
            $('.others-divs').find('input').attr('required','required')
        } else {
            $('.others-divs').slideUp()
            $('.others-divs').find('input').removeAttr('required','required').val('')
        }
    })



    @foreach(\App\Models\Workshop::all() as $workshop)
    $('#go{{$workshop->id}}').on('change',function(){
        if($(this).is(':checked')){
            @foreach(\App\Models\Workshop::where('start_time','>=',$workshop->start_time)->where('end_time','<=',$workshop->end_time)->where('id','!=',$workshop->id)->get() as $workshopSameTime)
            $('#go{{$workshopSameTime->id}}').prop('disabled', 'disabled');
            @endforeach
        }else{
            @foreach(\App\Models\Workshop::where('start_time','>=',$workshop->start_time)->where('end_time','<=',$workshop->end_time)->where('id','!=',$workshop->id)->get() as $workshopSameTime)
            $('#go{{$workshopSameTime->id}}').removeAttr('disabled');
            @endforeach
        }
    });
    @endforeach
    @if(old('workshop'))
        @foreach(\App\Models\Workshop::whereIn('id',old('workshop'))->get() as $workshop)
        @foreach(\App\Models\Workshop::where('start_time','>=',$workshop->start_time)->where('end_time','<=',$workshop->end_time)->where('id','!=',$workshop->id)->get() as $workshopSameTime)
        $('#go{{$workshopSameTime->id}}').prop('disabled', 'disabled');
        @endforeach
        @endforeach
    @endif
    </script>

    <script>
        const input = document.querySelector("#mobile");
    const output = document.querySelector("#output");

    const iti = window.intlTelInput(input, {
        preferredCountries: ["sa"],
        onlyCountries: ["sa"],
        separateDialCode: true,
        nationalMode: true,
        hiddenInput: "full",
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
    });

    const handleChange = () => {
        let text;
        if (input.value) {
            if (iti.isValidNumber()) {
                text = ''
                $('#reg-btn').removeAttr('disabled')
            }else {
                text = "الرقم غير صالح - يرجى ادخال رقم صحيح";
                $('#reg-btn').attr('disabled','disabled')
            }
            // text = iti.isValidNumber()
            //     ? "الرقم صحيح : " + iti.getNumber()
            //     : "الرقم غير صالح - يرجى ادخال رقم صحيح";
        } else {
            text = "";
            $('#reg-btn').removeAttr('disabled')
        }
        const textNode = document.createTextNode(text);
        output.innerHTML = "";
        output.appendChild(textNode);
    };

    // listen to "keyup", but also "change" to update when the user selects a country
    input.addEventListener('change', handleChange);
    input.addEventListener('keyup', handleChange);

    // var phone_number = window.intlTelInput(document.querySelector("#mobile"), {
    //     separateDialCode: true,
    //     preferredCountries: ["sa"],
    //     hiddenInput: "full",
    //     utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
    // });
    // $('#selectpicker').selectpicker();
    // $('.filter-option-inner-inner').text('قم باختيار واحدة أو أكثر');
    //
    // $('#mobile').keypress(function (e) {
    //     var mobile = $(this).val();
    //     if (mobile.length == 9) {
    //         e.preventDefault();
    //     }
    // });
    </script>
</body>

</html>
