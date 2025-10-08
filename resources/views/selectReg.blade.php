<!doctype html>
<html lang="{{app()->getLocale()}}" style="direction: {{app()->getLocale() == 'ar' ? 'rtl' : 'ltr'}};">
<head>
    <meta charset="utf-8"/>
    <title>Kaiian</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
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

        * {
            font-family: "cairo";
        }

        body {
            color: #808184;
        }

        .ptest {
            padding: 11px;
            background-color: #b65331;
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
            background-color: #b65331;
            -webkit-transition: width .6s ease;
            transition: width .6s ease;
        }

        .row.row-back {
            border: 1px solid #b65331;
            border-right: groove #b65331;
            border-radius: 10px;
            padding: 12px;
        }

        .bg-primary2 {
            --bs-bg-opacity: 1;
            background-color: #b65331;
        }

        .text-primary {
            color: #b65331 !important;
        }

        .btn-primary {
            background-color: #b65331;
            border-color: groove #b65331;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #b65331;
            border-color: #b65331;
        }

        .btn-check:active + .btn-primary, .btn-check:checked + .btn-primary, .btn-primary.active, .btn-primary:active, .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #b65331;
            border-color: #b65331;
        }

        .bg-primary {
            --bs-bg-opacity: 1;
            background-color: rgb(181 88 56) !important;
        }

        .logo-group {
            display: flex;
            justify-content: space-between;
        }

        a {
            color: #b55334;
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
    </style>
</head>


<body class="authentication-bg bg-primary">
<div class="home-center">
    <div class="home-desc-center">

        <div class="container">


            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-9 col-xl-6">
                    <a href="{{url('change-lang/'.(app()->getLocale()== 'ar' ? 'en' : 'ar'))}}"
                        class="bg-white p-2 pt-1" style="border-radius: 10px;">
                        {{app()->getLocale()== 'ar' ? 'English' : 'عربي'}}
                    </a>
                    <div class="card">
                        <div class="card-body">
                            <div class="px-2 py-3">


                                <div class="text-center logo-group">
                                        <img src="{{asset('public/assets/images/logo1.png')}}" height="82"
                                             alt="logo">
                                        <img src="{{asset('public/assets/images/logo2.png')}}" height="82"
                                             alt="logo">
                                </div>

                                <div class="mt-3 pt-5 d-flex justify-content-between">
                                    <a href="{{route('individual-registration',[app()->getLocale()])}}" class="btn btn-primary">
                                        {{__('welcome.individual')}}
                                    </a>

                                    <a href="{{route('group-registration',[app()->getLocale()])}}" class="btn btn-secondary">
                                        {{__('welcome.group')}}
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center text-white">

                        <p>©
                            <script>document.write(new Date().getFullYear())</script>
                            Kaiian.
                        </p>
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

</body>

</html>
