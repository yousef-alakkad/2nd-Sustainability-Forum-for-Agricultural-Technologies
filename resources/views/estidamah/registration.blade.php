<!doctype html>
<html lang="rtl" style="direction: rtl;">

<head>
    <meta charset="utf-8" />
    <title>ملتقى استدامة التقنيات الزراعية</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Wad" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="icon" href="{{ asset('public/est/logo.png') }}" type="image/png">
    <!-- Bootstrap Css -->
    <link href="{{ asset('public/assets/css/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('public/assets/css/app-rtl.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

    <style>
        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/DINNextLTArabic-Black-4.ttf') format('truetype');
            font-weight: 900;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/DINNextLTArabic-Bold-4.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/DINNEXTLTARABIC-LIGHT-2-2.ttf') format('truetype');
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/DINNextLTArabic-Regular-3.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        /* نسخة ثانية من Regular (ممكن تستغني عنها لو نفس الملف) */
        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/DINNextLTArabic-Regular-3 (1).ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/DINNextLTArabic-UltraLight-3.ttf') format('truetype');
            font-weight: 200;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/din-next-It-w23-medium.ttf') format('truetype');
            font-weight: 500;
            font-style: italic;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/din-next-It-w23-regular.ttf') format('truetype');
            font-weight: 400;
            font-style: italic;
        }


        * {
            font-family: "DINNextLTArabic";
            font-size: 18px;
        }

        body {
            color: #333333;
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



        .authentication-bg::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-image: linear-gradient(135deg, #168145 0%, rgb(117, 111, 80) 100%);
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
        .logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem; /* المسافة الافتراضية بين الصور */
        }

        .logo-img {
            max-height: 100px;
            transition: max-height 0.3s ease;
        }
        .title{
            color: #fff !important;
            background: linear-gradient(135deg, #0d7a41, #28a745)!important;
            padding: 12px 25px !important;
            border-radius: 12px !important;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15) !important;
        }

        /* للشاشات المتوسطة والصغيرة */
        @media (max-width: 768px) {
            .logos {
                gap: 1rem;       /* تقليل المسافة بين الصور */
                padding: 0 0.5rem; /* مسافة صغيرة من الجانبين */
                overflow: hidden;  /* منع الصور من الخروج */
            }
            .logo-img {
                max-height: 60px; /* تصغير الصور */
            }
        }

        /* للشاشات الصغيرة جداً */
        @media (max-width: 570px) {
            .logo-img {
                max-height: 60px;
            }
        }

        /* للشاشات الصغيرة جداً جداً */
        @media (max-width: 425px) {
            .logo-img {
                max-height: 50px;
            }
            .title{
                font-size: 18px;
                padding: 12px 9px !important;

            }
        }

        /* للشاشات الصغيرة جداً جداً جداً */
        @media (max-width: 320px) {
            .logo-img {
                max-height: 45px;
            }
            .title{
                font-size: 15px;
                padding: 12px 5px !important;

            }


        }

    </style>
</head>


<body class="authentication-bg bg-primary position-relative">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container-fluid vh-100">
                <div class="row h-100">

                    <div class="col-md-6 d-none d-md-flex position-relative p-0">
                        <div class="w-100 h-100"
                            style="background: url('{{ asset('public/est/bg.jpg') }}') center center / cover no-repeat;">
                        </div>

                        <div class="position-absolute bottom-0 start-0 p-4">
                            <img src="{{ asset('public/est/logo3.png') }}" alt="شعار المركز" class="img-fluid"
                                style="max-height: 70px;">
                        </div>
                    </div>

                    <!-- القسم الأيسر: الفورم -->
                    <div class="col-md-6 d-flex align-items-center bg-white">
                        <div class="w-100 px-4  py-5" style=" direction: rtl;">

                            <!-- الهيدر -->
                            <div class="mb-5 d-flex justify-content-center align-items-center logos" style="gap: 2rem;">
                                <img src="{{ asset('public/est/logo.png') }}" class="img-fluid logo-img"
                                    alt="المركز الوطني">
                                <img src="{{ asset('public/est/logo2.png') }}" class="img-fluid logo-img"
                                    alt="">
                            </div>

                            <h3 class="fw-bold mb-2 text-center title" style="color: #0d7a41; line-height: 1.6;">
                                ملتقى استدامة للتقنيات الزراعية الثاني
                            </h3>

                            <!-- الفورم -->
                            <form method="post" action="{{ route('estidamah.store') }}" id="reg-form">
                                @csrf

                                <!-- الاسم -->
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold">الأسم <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                                        class="form-control rounded-3 shadow-sm @error('name') is-invalid @enderror" />
                                    @error('name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- رقم الجوال -->
                                <div class="mb-4">
                                    <label for="mobile" class="form-label fw-semibold">رقم الجوال <span
                                            class="text-danger">*</span></label>
                                    <input type="tel" id="mobile" name="mobile" value="{{ old('mobile') }}"
                                        class="form-control rounded-3 shadow-sm @error('mobile') is-invalid @enderror" />
                                    <!-- حقل مخفي لتخزين الرقم كامل -->
                                    <input type="hidden" id="full" name="full"
                                        value="{{ old('full') }}">

                                    <!-- حقل مخفي لتخزين رمز الدولة -->
                                    <input type="hidden" id="country_code" name="country_code"
                                        value="{{ old('country_code') }}">
                                    <p class="text-danger small" id="output"></p>
                                    @error('mobile')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- البريد الإلكتروني -->
                                <div class="mb-4">
                                    <label for="email" class="form-label fw-semibold">البريد الإلكتروني <span
                                            class="text-danger">*</span></label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        class="form-control rounded-3 shadow-sm @error('email') is-invalid @enderror" />
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- العمر -->
                                <div class="mb-4">
                                    <label for="age" class="form-label fw-semibold">العمر <span
                                            class="text-danger">*</span></label>
                                    <input type="number" id="age" name="age" value="{{ old('age') }}"
                                        class="form-control rounded-3 shadow-sm @error('age') is-invalid @enderror" />
                                    @error('age')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- الجنس -->
                                <div class="mb-4">
                                    <label for="gender" class="form-label fw-semibold">الجنس <span
                                            class="text-danger">*</span></label>
                                    <select id="gender" name="gender"
                                        class="form-select rounded-3 shadow-sm @error('gender') is-invalid @enderror">
                                        <option value="">-- اختر --</option>
                                        <option value="ذكر" {{ old('gender') == 'ذكر' ? 'selected' : '' }}>ذكر
                                        </option>
                                        <option value="أنثى" {{ old('gender') == 'أنثى' ? 'selected' : '' }}>أنثى
                                        </option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- الجنس -->
                                <div class="mb-4">
                                    <label for="days" class="form-label fw-semibold">وقت الحضور <span
                                            class="text-danger">*</span></label>
                                    <select id="days" name="days"
                                        class="form-select rounded-3 shadow-sm @error('days') is-invalid @enderror">
                                        <option value="">-- اختر --</option>
                                        <option value="اليوم الأول"
                                            {{ old('days') == 'اليوم الأول' ? 'selected' : '' }}>اليوم الأول
                                        </option>
                                        <option value="اليوم الثاني"
                                            {{ old('days') == 'اليوم الثاني' ? 'selected' : '' }}>اليوم الثاني
                                        </option>
                                        <option value="اليوم الأول والثاني"
                                            {{ old('days') == 'اليوم الأول والثاني' ? 'selected' : '' }}>اليوم الأول
                                            والثاني
                                        </option>
                                    </select>
                                    @error('days')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- المسمى الوظيفي -->
                                <div class="mb-4">
                                    <label for="job_title" class="form-label fw-semibold">المسمى الوظيفي <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="job_title" name="job_title"
                                        value="{{ old('job_title') }}"
                                        class="form-control rounded-3 shadow-sm @error('job_title') is-invalid @enderror" />
                                    @error('job_title')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- جهة العمل -->
                                <div class="mb-4">
                                    <label for="organization" class="form-label fw-semibold">جهة العمل <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="organization" name="organization"
                                        value="{{ old('organization') }}"
                                        class="form-control rounded-3 shadow-sm @error('organization') is-invalid @enderror" />
                                    @error('organization')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- أخرى -->
                                <div class="mb-5">
                                    <label for="other" class="form-label fw-semibold">أخرى</label>
                                    <input type="text" id="other" name="other" value="{{ old('other') }}"
                                        class="form-control rounded-3 shadow-sm " />

                                </div>

                                <!-- زر التسجيل -->
                                <div class="text-center">
                                    <button type="submit"
                                        class="btn btn-lg px-5 py-2 text-white fw-bold rounded-3 shadow"
                                        style="background-color: #0d7a41; border: none;">
                                        تسجيل
                                    </button>
                                </div>
                            </form>



                        </div>
                    </div>

                </div>
            </div>



            <!-- End Log In page -->
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script src="{{ asset('public/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
    <script src="{{ asset('public/assets/js/app.js') }}"></script>


    <script>
        $('.select2').select2()
    </script>



    <script>
    const input = document.querySelector("#mobile");
    const fullInput = document.querySelector("#full");
    const codeInput = document.querySelector("#country_code");
    const output = document.querySelector("#output");

    const iti = window.intlTelInput(input, {
        preferredCountries: ["sa"],
        separateDialCode: true,
        nationalMode: true,
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
    });

    // ✅ استرجاع القيمة القديمة (الرقم الكامل)
    @if(old('full'))
        iti.setNumber("{{ old('full') }}");
    @endif

    const handleChange = () => {
        let text;
        if (input.value) {
            if (iti.isValidNumber()) {
                text = '';
                $('#reg-btn').removeAttr('disabled');

                // تحديث الحقول المخفية
                fullInput.value = iti.getNumber();
                codeInput.value = iti.getSelectedCountryData().dialCode;

            } else {
                text = "الرقم غير صالح - يرجى إدخال رقم صحيح";
                $('#reg-btn').attr('disabled', 'disabled');
            }
        } else {
            text = "";
            $('#reg-btn').removeAttr('disabled');
        }
        output.textContent = text;
    };

    input.addEventListener('change', handleChange);
    input.addEventListener('keyup', handleChange);
</script>
</body>

</html>
