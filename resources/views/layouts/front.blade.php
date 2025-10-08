<!doctype html>
<html lang="{{app()->getLocale()}}" style="direction: {{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}};">
<head>
    <meta charset="utf-8"/>
    <title>تسجيل</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Kaiian" name="description"/>
    <meta content="Themesdesign" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('public/favicon.png')}}">

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
            font-family: "hrsd";
            font-size: 18px;
        }

        body {
            /*color: #808184;*/
            color: #158285;
            background: rgb(17,102,141);
            background: -moz-linear-gradient(90deg, rgba(17,102,141,1) 11%, rgba(0,48,81,1) 97%);
            background: -webkit-linear-gradient(90deg, rgba(17,102,141,1) 11%, rgba(0,48,81,1) 97%);
            background: linear-gradient(90deg, rgba(17,102,141,1) 11%, rgba(0,48,81,1) 97%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#11668d",endColorstr="#003051",GradientType=1);
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
            background-color: #d9531e;
            border-color: #d9531e;
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
            background-color: #01619a !important;
        }

        .logo-group {
            display: flex;
            justify-content: space-between;
        }

        a {
            color: #158285;
            text-decoration: none;
        }

        form,.form-div {
            background-color: #0030518c;
            padding: 40px 23px !important;
            border-radius: 16px;
            direction: rtl;
        }

        label{
            color: #fff;
            font-size: 23px;
            margin: 0;
        }

        .form-control:focus ,
        .form-control:focus-visible ,
        .form-control {
            padding-top: 0;
            color: #fff;
            background-color: inherit;
            border: none;
            border-bottom: 3px dotted #fff;
            border-radius: 0;
            font-size: 23px;
        }

        button[type=submit]{
            background-color: #d9531e;
            border-color: #d9531e;
            width: fit-content !important;
            padding: 10px 34px;
            margin: 0 auto;
            font-size: 23px;
        }

        .card {
            margin: 20px !important;
            border-radius: 10px;
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
                margin: 0!important;
                border-radius: 0!important;
            }
            #ramadan{
                width: 300px !important;
            }
            .img1{
                display: none;
            }
        }
    </style>
    @stack('style')
</head>


<body class="">
<div style="position: absolute;top: 0;left: 0;width: 100vw;height: 100vh;overflow:hidden;">
    <img src="{{asset('public/bg3.png')}}" style="position: absolute;
    left: 0;
    top: 0;
    height: 100vh;
    width: auto;
    object-fit: contain;">
    <img src="{{asset('public/bg2.png')}}" style="position: absolute;
                                right: 30px;
                                top: calc(100vh - 300px);
                                height: 300px;
                                width: auto;
                                object-fit: contain;">
    <img src="{{asset('public/bg1.png')}}" class="img1" style="position: absolute;
    right: 0;
    transform: translateX(-50%);
    top: 204px;
    height: auto;
    width: 522px;
    object-fit: contain;">

    @foreach(range(1,2000) as $star)
        <img src="{{asset('public/star.png')}}" style="position: absolute;
    right: {{rand(10,3500)}}px;
    transform: translateX(-100%);
    top: {{rand(10,3500)}}px;
    height: auto;
    z-index: -1;
    width: {{rand(5,15)}}px;
    object-fit: contain;">
    @endforeach
</div>
<div class="home-center">
    <div class="home-desc-center">

        <div class="container-fluid">


            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 m-mobile">
                    <div class="card" style="background-color: inherit!important;background-size: cover;background-repeat: no-repeat;background-position: center;">
                        <div class="card-body">
                            <div class="px-2 py-3">
                                <div class="mt-2 pt-2 ">
                                    <h3 style="color:#d9531e; text-align: center;font-weight: bold;">
                                        <img src="{{asset('public/ramadan.png')}}" width="360" id="ramadan">
                                    </h3>

                                    @if(session()->has('error'))
                                        <div class="alert alert-danger p-2">
                                            {{session()->get('error')}}
                                        </div>
                                    @endif

                                    @yield('content')


                                    <div class="d-flex justify-content-between align-items-center" style="margin-top: 30px">
                                        <p style="text-align: right"><img src="{{asset('public/logo.png')}}" width="140"></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- End Log In page -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{asset('public/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('public/assets/libs/node-waves/waves.min.js')}}"></script>

    <script src="{{asset('public/assets/js/app.js')}}"></script>
    @stack('script')
</body>

</html>
