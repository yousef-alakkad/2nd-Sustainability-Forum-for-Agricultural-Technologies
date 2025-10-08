<!doctype html>
<html lang="{{app()->getLocale()}}" style="direction: ltr;">
<head>
    <meta charset="utf-8"/>
    <title>تسجيل</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content=" Masiratna BrandGuidelinesللابتكار" name="description"/>
    <!-- App favicon -->

    <!-- Bootstrap Css -->
    <link href="{{asset('public/assets/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('public/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('public/assets/css/app-rtl.min.css')}}" rel="stylesheet" type="text/css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap');

        @font-face {
            font-family: next;
            src: url({{url('public/fonts/next-regular.ttf')}});
        }

        * {
            font-family: next;
            font-size: 18px;
        }

        body {
            /*color: #808184;*/
            color: #00557c;
            background-image: url("{{asset('public/bg.jpg')}}");
        }

        .ptest {
            padding: 11px;
            background-color: #f7941d;
            color: #fff;
        }

        .card-body.ptest.opst {
            opacity: 0.2;
        }

        .progress-bar {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            overflow: hidden;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            background-color: #f7941d;
            -webkit-transition: width .6s ease;
            transition: width .6s ease;
        }

        .row.row-back {
            border: 1px solid #f7941d;
            border-right: groove #f7941d;
            border-radius: 10px;
            padding: 12px;
        }

        .bg-primary2 {
            --bs-bg-opacity: 1;
            background-color: #f7941d;
        }

        .text-primary {
            color: #f7941d !important;
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

        .btn-check:active + .btn-primary, .btn-check:checked + .btn-primary, .btn-primary.active, .btn-primary:active, .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #f7941d;
            border-color: #f7941d;
        }

        .bg-primary {
            --bs-bg-opacity: 1;
            background-color: #fa8c4e !important;
        }

        .logo-group {
            display: flex;
            justify-content: space-between;
        }

        a {
            color: #158285;
            text-decoration: none;
        }

        /*form, .form-div {*/
        /*    background-color: #ffffff87;*/
        /*    padding: 40px 23px !important;*/
        /*    border-radius: 16px;*/
        /*}*/

        /*label {*/
        /*    color: #514f74;*/
        /*    font-size: 23px;*/
        /*    margin: 0;*/
        /*}*/

        label,
        .form-control:focus,
        .form-control:focus-visible,
        .form-control {
            width: 100%;
            padding: 10px;
            color: #00a79a;
            background-color: inherit;
            border: 1px solid #00557c;
            border-radius: 10px;
            font-size: 16px;
            text-align: right !important;
        }

        button[type=submit] {
            background-color: #29b373;
            border-color: #ffb01d;
            width: fit-content !important;
            padding: 10px 34px;
            margin: 0 auto;
            font-size: 23px;
        }

        .card {
            margin: 20px !important;
            border-radius: 10px;
            background-color: #ffffff54;
        }

        @media (max-width: 994px) {
            #img-div{
                display:none;
            }


            .logo-group {
                display: block;
            }

            .logo-group img {
                margin-bottom: 20px;
            }

            .m-mobile {
                margin: 0 !important;
                padding: 0 !important;
            }

            .card {
                margin: 0 !important;
                border-radius: 0 !important;
            }
        }

        .iti {
            display: block;
            color: #00a79a;
        }

        .footer-img{
            position: absolute;
            bottom: 0;
            right: 0;
            width: 450px;
            z-index: 0;
        }
    </style>
</head>


<body class="mb-5">

<div class="home-center">
    <div class="home-desc-center">

        <div class="container">
            <div class="row justify-content-center mt-5 position-relative" style="background-color: #ffffff;border-radius: 20px;border: 8px solid #00557c;border-right-color: #6866ad;border-bottom-color: #51a6c4;">
                <div class="col-md-7 m-mobile" style="z-index: 1;">
                    <div class="card" style="background-color: inherit;border: none">
                        <div class="card-body">

                            <p style="text-align: center">
                                <img src="{{asset('public/logo-2.png')}}" width="250">
                                <img src="{{asset('public/logo.png')}}" width="250">
                            </p>
                            <div class="px-2 pb-3">
                                <div class="">
{{--                                    <h3 style="color: #EA7224;font-size: 32px;text-align: center">--}}
{{--                                        مؤسسة كيان الأهلية غير الربحية--}}
{{--                                        <br>--}}
{{--                                        <span style="font-size: 16px;font-weight: normal">--}}
{{--                                            Kaiian Non Profit Organization--}}
{{--                                        </span>--}}
{{--                                    </h3>--}}

                                    <div class="d-flex align-items-center">
                                        <div class="" style="border-top: 1px solid #00557c;flex: 1"></div>
                                        <div class="" style="color:#00557c;flex: 2;text-align: center;font-size: 14px;">يرجى تعبئة معلوماتك الشخصية</div>
                                        <div class="" style="border-top: 1px solid #00557c;flex: 1"></div>
                                    </div>


                                    @if(session()->has('error'))
                                        <div class="alert alert-danger p-2 text-center">
                                            {{session()->get('error')}}
                                        </div>
                                    @endif

                                    @if(session()->has('success'))
                                        <div class="alert alert-success p-2 text-center">
                                            {{session()->get('success')}}
                                        </div>
                                    @endif

                                    @php($count = \App\Models\member::where('external',1)->count())

                                    @if ($count >= 30)
                                    <div class="alert alert-danger text-center">
                                        إنتهى التسجيل!
                                    </div>
                                    @else
                                    <form class="form-horizontal mt-4" action="{{ route('store-registration') }}"
                                          method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="name" name="name" required
                                                   placeholder="{{__('welcome.name')}}" value="{{old('name') ?? ''}}">
                                            @error('name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <input type="number" placeholder="{{__('welcome.mobile')}}"
                                                   pattern="[0-9]{9}" maxlength="9"
                                                   title="Ten digits code" required
                                                   class="form-control" id="mobile" name="mobile"
                                                   value="{{old('mobile') ?? ''}}">
                                            @error('full')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <span class="text-danger" id="output" role="alert" style="font-size: 14px;">

                                            </span>
                                        </div>

                                        <div class="mb-3">
                                            <input type="email" class="form-control" id="email" name="email" required
                                                   placeholder="{{__('welcome.email')}}" value="{{old('email') ?? ''}}">
                                            @error('email')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                        <div class="text-center">
                                            <button class="btn btn-primary  waves-effect waves-light w-100"
                                                    style="background-color: #00a79a;border-color: #00a79a;width: 100% !important;border-radius: 8px"
                                                    type="submit">{{__('welcome.register')}}
                                            </button>
                                        </div>

                                    </form>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <img src="{{asset('public/footer.png')}}" width="250" class="footer-img">
            </div>

        </div>
        <!-- End Log In page -->
    </div>
</div>

<!-- JAVASCRIPT -->

</body>

<script src="{{asset('public/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    const input = document.querySelector("#mobile");
    const output = document.querySelector("#output");

    const iti = window.intlTelInput(input, {
        preferredCountries: ["sa"],
        // onlyCountries: ["sa"],
        initialCountry: "SA",
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
</script>

</html>
