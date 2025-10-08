<!doctype html>
<html lang="{{app()->getLocale()}}" style="direction: {{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}};">
<head>
    <meta charset="utf-8"/>
    <title>تسجيل</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Kaiian" name="description"/>
    <meta content="Themesdesign" name="author"/>
    <!-- App favicon -->
    <!--<link rel="shortcut icon" href="{{asset('public/favicon.png')}}">-->

    <!-- Bootstrap Css -->
    <link href="{{asset('public/assets/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{asset('public/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{asset('public/assets/css/app-rtl.min.css')}}" rel="stylesheet" type="text/css"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap');

        @font-face {
            font-family: hrsd;
            src: url({{url('public/fonts/HRSD-Regular.ttf')}});
        }

        * {
            font-family: Cairo;
            font-size: 18px;
        }

        body {
            /*color: #808184;*/
            color: #158285;
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

        form, .form-div {
            background-color: #ffffff87;
            padding: 40px 23px !important;
            border-radius: 16px;
        }

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
            color: #514f74;
            background-color: inherit;
            border: 1px solid #908AA0;
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
    </style>
</head>


<body class="mb-5">

<img src="{{asset('public/icons/top.png')}}" width="250" style="position: absolute;top: 0;left: 20%;width: 120px;">
<img src="{{asset('public/icons/bottom.png')}}" width="250" style="position: absolute;bottom: 0;right: 20%;width: 220px;">
<img src="{{asset('public/icons/left.png')}}" width="250" style="position: absolute;top: 50%;left: 0;width: 60px;">
<div class="home-center">
    <div class="home-desc-center">

        <div class="container">

            <p style="text-align: right">
                <img src="{{asset('public/logo.png')}}" width="250">
            </p>
            <div class="row justify-content-center" style="background-color: #fff;border-radius: 20px">
                <div class="col-md-6 m-mobile">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-2 pb-3">
                                <div class="">
                                    <h3 style="color: #EA7224;font-size: 32px;text-align: center">
                                        مؤسسة كيان الأهلية غير الربحية
                                        <br>
                                        <span style="font-size: 16px;font-weight: normal">
                                            Kaiian Non Profit Organization
                                        </span>
                                    </h3>

                                    <div class="d-flex align-items-center">
                                        <div class="" style="border-top: 1px solid #000000;flex: 1"></div>
                                        <div class="" style="color:#170645;flex: 2;text-align: center;font-size: 14px;">يرجى تعبئة معلوماتك الشخصية</div>
                                        <div class="" style="border-top: 1px solid #000000;flex: 1"></div>
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
                                    <form class="form-horizontal mt-4" action="{{ route('store-confirm') }}"
                                          method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="code" value="{{$member->code}}">

                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   placeholder="{{__('welcome.name')}}" value="{{$member->name}}" disabled>
                                            @error('name')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="tel" placeholder="{{__('welcome.mobile')}}"
                                                   pattern="[0-9]{9}" maxlength="9"
                                                   title="Ten digits code"
                                                   class="form-control" id="mobile" name="mobile" disabled
                                                   value="{{$member->mobile}}">
                                            @error('mobile')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="email" class="form-control" id="email" name="email"
                                                   placeholder="{{__('welcome.email')}}" value="{{$member->email}}" disabled>
                                            @error('email')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>


                                        @if($member->confirmed == 0)
                                        <div class="mb-3">
                                            <select  class="form-control" id="type" name="type" required>
                                                <option value="">نوع الحضور</option>
                                                <option value="0">مجاني</option>
                                                <option value="1">متبرع</option>
                                            </select>
                                            @error('type')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="id_number" name="id_number"
                                                   style="display: none"
                                                   placeholder="{{__('welcome.id_number')}}"
                                                   value="{{$member->id_number}}">
                                            @error('id_number')
                                            <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                        </div>



                                        <div class="text-center">
                                            <button class="btn btn-primary  waves-effect waves-light w-100"
                                                    style="background-color: #EA7224;border-color: #EA7224;width: 100% !important;border-radius: 8px"
                                                    type="submit">تأكيد
                                            </button>
                                        </div>
                                        @else
                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="id_number" name="id_number"
                                                       placeholder="{{__('welcome.id_number')}}" disabled
                                                       value="{{$member->type == 0 ? 'مجاني' : 'متبرع'}}">
                                                @error('id_number')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <input type="text" class="form-control" id="id_number" name="id_number"
                                                       style="display: {{$member->type == 1 ? 'block' : 'none'}}"
                                                       disabled
                                                       placeholder="{{__('welcome.id_number')}}"
                                                       value="{{$member->id_number}}">
                                                @error('id_number')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                        @endif

                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 px-0">
                    <img src="{{asset('public/icons/bg-1.png')}}" style="width: 100%;height: 100%;background-color: #E1E1E1;border-radius: 20px;object-fit: contain;">
                </div>
            </div>

        </div>
        <!-- End Log In page -->
    </div>
</div>

<!-- JAVASCRIPT -->

</body>

<script src="{{asset('public/assets/libs/jquery/jquery.min.js')}}"></script>

<script>
    $('#type').on('change',function (){
        if($(this).val()==1)
            $('#id_number').slideDown()
        else
            $('#id_number').val('').slideUp()
    })
</script>

</html>
