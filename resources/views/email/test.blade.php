<html>
<head>
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


        .btn-check:active + .btn-primary,
        .btn-check:checked + .btn-primary,
        .btn-primary.active,
        .btn-primary:active,
        .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #3b917f;
            border-color: #3b917f;
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
<body>
<div class="home-center">
    <div class="home-desc-center">

        <div class="container">


            <div class="row justify-content-center mt-5">
                <div class="col-md-8 col-lg-9 col-xl-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-2 py-3">

                                <div class="text-center logo-group">
                                    <img src="{{asset('public/assets/images/logo1.png')}}" height="82"
                                         alt="logo">
                                    <img src="{{asset('public/assets/images/logo2.png')}}" height="82"
                                         alt="logo">
                                </div>

                                <div>
                                    <p>لقد تمت العملية بنجاح</p>

                                    <div class="d-flex flex-column align-items-center">
                                        @foreach($qrcodes as $qrcode)
                                            <a href="{{url('/badge/'.$code.'/'.$qrcode)}}" class="btn btn-primary">
                                                {{__('welcome.bade')  . ' ' . ($loop->index +1)}}
                                            </a>
                                        @endforeach
                                    </div>
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

</body>
</html>
