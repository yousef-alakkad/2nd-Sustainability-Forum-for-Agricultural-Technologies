<!doctype html>
<html lang="ar" class="light-theme" dir="rtl">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- loader-->
    <link href="{{asset('public/css/pace.min.css')}}" rel="stylesheet"/>
    <script src="{{asset('public/js/pace.min.js')}}"></script>

    <!--plugins-->
    <link href="{{asset('public/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet"/>

    <!-- CSS Files -->
    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/icons.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css')}}"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <title>Masiratna BrandGuidelines</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap');
    </style>
    <style>
        @font-face {
            font-family: next;
            src: url({{url('public/fonts/next-regular.ttf')}});
        }

        * {
            font-family: "next", sans-serif !important;
            font-weight: 500;
        }

        .iti.iti--allow-dropdown.iti--separate-dial-code {
            width: 100%;
            margin-top: 2px;
        }

        .bg-white {
            --bs-bg-opacity: 1;
            background-color: rgb(247 247 247) !important;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .form-control:focus {
            color: #212529;
            background-color: #fff;
            border-color: #7a8150;
            outline: 0;
            box-shadow: 0 0 0 .25rem rgba(25, 84, 50, 0.66);
        }

        .form-select:focus {
            border-color: #7a8150;
            outline: 0;
            box-shadow: 0 0 0 .25rem rgba(25, 84, 50, 0.66);
        }

        .navbar > .container, .navbar > .container-fluid, .navbar > .container-lg, .navbar > .container-md, .navbar > .container-sm, .navbar > .container-xl, .navbar > .container-xxl {
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
        }

        .form-check-inline {

            display: inline-flex !important;
            -ms-flex-align: center !important;
            align-items: center !important;
            padding-left: 0;
            margin-right: .75rem;
        }

        .mr-2, .mx-2 {
            margin-right: .5rem !important;
        }

        .btn-check:active + .btn-primary, .btn-check:checked + .btn-primary, .btn-primary.active, .btn-primary:active, .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #7a8150;
            border-color: #7a8150;
        }

        .img-logo {
            width: 450px;
        }

        @media screen and (max-width: 600px) {

            .img-logo {
                width: 350px;
            }
        }


        .iti {
            display: block;
            color: #00a79a;
            direction: ltr;
        }
    </style>
</head>

<body>

<div class="login-bg-overlay au-sign-in-basic"></div>

<!--start wrapper-->
<div class="wrapper">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white p-3">
            <div class="container-fluid">
                <a href="javascript:;"><img class="img-logo" src="{{asset('public/icons/logo122.jpeg')}}" alt=""
                                            width="450"/></a>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                </div>
            </div>
        </nav>

    </header>
    <div class="container">


        <div class="row ">
            <div class="col-xl-8 col-lg-8 col-md-8 mx-auto mt-5">

                <div class="card radius-10">
                    <div class="card-body p-4">


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
                            <div class="text-center">
                                <p style="font-weight: 500;font-size: 20px;">للتسجيل يرجى ادخال البيانات الصحيحة </p>
                            </div>
                            <form class="form-horizontal mt-4" action="{{ route('confirm-attend') }}"
                                  method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-12 col-lg-12">

                                </div>
                                <div class="col-12 col-lg-12">
                                    <div class="position-relative border-bottom my-3">
                                    </div>
                                </div>

                                <input type="hidden" name="code" value="{{$member->code}}">

                                <div class="col-12  div2 mb-3">
                                    <label for="member" class="float-left">الاسم  <span
                                            style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="name" readonly
                                           name="name" placeholder="{{__('welcome.name')}}"
                                           value="{{$member->name}}">
                                </div>

                                <div class="col-12 div1 mb-3">
                                    <label for="member" class="float-left"> البريد الالكتروني <span
                                            style="color:red">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" readonly
                                           placeholder="{{__('welcome.email')}}" value="{{$member->email}}">

                                </div>
                                <div class="col-12 div1 mb-3">
                                    <label for="member" class="float-left">رقم الجوال <span
                                            style="color:red">*</span></label>

                                    <input type="text" placeholder="{{__('welcome.mobile')}}"
                                           pattern="[0-9]{9}" maxlength="9"
                                           title="Ten digits code" readonly
                                           style="direction: ltr;text-align: right"
                                           class="form-control" id="mobile" name="mobile"
                                           value="{{$member->mobile}}">
                                </div>
                                <div class="mb-3">
                                    <label for="member" class="float-left">حالة الحضور <span
                                            style="color:red">*</span></label>
                                    <select  class="form-control"  name="status" id="status_reg"  {{$member->status != 0 ? 'disabled' : 'required'}}>
                                        <option value="">--اختر--</option>
                                        <option value="1">تأكيد</option>
                                        <option value="2">إعتذار</option>
                                    </select>

                                </div>



                                @if($member->status == 0)
                                    <div class="col-12 col-lg-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">تسجيل</button>
                                        </div>
                                    </div>
                                    </div>
                                @endif


                                <div class="col-12 col-lg-12 text-center">

                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="my-5">
        <div class="container">
            <div class="d-flex align-items-center gap-4 fs-5 justify-content-center social-login-footer">
                <a href="javascript:;">
                    <ion-icon name="logo-twitter"></ion-icon>
                </a>
                <a href="javascript:;">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
                <a href="javascript:;">
                    <ion-icon name="logo-github"></ion-icon>
                </a>
                <a href="javascript:;">
                    <ion-icon name="logo-facebook"></ion-icon>
                </a>
                <a href="javascript:;">
                    <ion-icon name="logo-pinterest"></ion-icon>
                </a>
            </div>
            <div class="text-center">

                <p>powered by .</p>
                <img class=" img-logo" src="{{asset('public/icons/logo122.jpeg')}}" alt="" width="" height="">

                <p class="text-center pt-2">All right reserved 2025</p>
            </div>
        </div>
    </footer>
</div>
<!--end wrapper-->
<!-- Modal -->


<!-- JS Files-->
<script src="{{asset('public/js/jquery.min.js')}}"></script>
<script src="{{asset('public/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('public/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('public/js/bootstrap.bundle.min.js')}}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js')}}"></script>
<!--plugins-->
<script src="{{asset('public/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<!-- Main JS-->
<script src="{{asset('public/js/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
    @if($member->status != 0)
    $('#status_reg').val({{$member->status}})
    @endif
</script>
</body>

</html>
