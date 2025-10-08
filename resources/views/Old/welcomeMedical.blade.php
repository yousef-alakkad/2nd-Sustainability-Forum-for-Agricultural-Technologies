<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> ملتقى الطب التجميلي</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Montserrat:wght@100&family=Poppins:wght@400;500;600&family=Roboto+Serif:wght@100&display=swap"
        rel="stylesheet">
    <link href="https://db.onlinewebfonts.com/c/d78f5d2c76185fa07aaf8dd729eef33e?family=DIN+Next+LT+Arabic+Light"
          rel="stylesheet">
    <link href="https://db.onlinewebfonts.com/c/513071b47bdba774c93a73ad16a75e3b?family=DIN+Next+LT+Arabic+Bold"
          rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> --}}

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css"
          integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    <style>
        @import url(https://db.onlinewebfonts.com/c/d78f5d2c76185fa07aaf8dd729eef33e?family=DIN+Next+LT+Arabic+Light);
        @import url(https://db.onlinewebfonts.com/c/513071b47bdba774c93a73ad16a75e3b?family=DIN+Next+LT+Arabic+Bold);

        @font-face {
            font-family: "DIN Next LT Arabic Light";
            src: url("https://db.onlinewebfonts.com/t/d78f5d2c76185fa07aaf8dd729eef33e.eot");
            src: url("https://db.onlinewebfonts.com/t/d78f5d2c76185fa07aaf8dd729eef33e.eot?#iefix") format("embedded-opentype"),
            url("https://db.onlinewebfonts.com/t/d78f5d2c76185fa07aaf8dd729eef33e.woff2") format("woff2"),
            url("https://db.onlinewebfonts.com/t/d78f5d2c76185fa07aaf8dd729eef33e.woff") format("woff"),
            url("https://db.onlinewebfonts.com/t/d78f5d2c76185fa07aaf8dd729eef33e.ttf") format("truetype"),
            url("https://db.onlinewebfonts.com/t/d78f5d2c76185fa07aaf8dd729eef33e.svg#DIN Next LT Arabic Light") format("svg");
        }

        @media screen and (max-width: 600px) {
            #msform input, #msform textarea {
                font-size: 17px;
            }
        }
    </style>

    @include('css')
</head>
<body>

{{--<section class="header">--}}

{{--<!-- <img class=" rounded float-start" src="public/logo240.png" alt="" width="300" height="240"> -->--}}
{{--<img class="img-svg" src="public/logo.png" width="500" height="275">--}}
{{--<h3 class="errorRquired1" style="margin-top: -40px">مركز الرياض الدولي للمؤتمرات والمعارض</h3>--}}
{{--<p class="errorRquired1" style="color:#b0bac1;font-size:20px;">الفترة من ٢٤-٢٧ ديسمبر ٢٠٢٣</p>--}}
{{--<!--<h2 class="text-date">07-08-09<br> June 2022 </h2>-->--}}
{{--</section>--}}

<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-9 text-center p-0 mt-3 mb-2">

            <div class="card px-0 pb-0  mb-3">
                <!--<img class="img-line" src="public/w-9.png" alt="">-->
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" method="post" enctype="multipart/form-data">
                            @csrf
                            <fieldset data-set="1">
                                {{--<h2 style="text-align:center" class="fs-title"> المعلومات الشخصية</h2>--}}
                                <div class="form-card" dir="{{$lang=='en'?'ltr':'rtl'}}">

                                    <div class="row box">
                                        <div class="col-md-6 div2">
                                            <label for="member" class="{{$lang=='en'?'float-left':'float-right'}}"
                                                   style="font-size: 20px;font-weight: 600;color:#000;"> {{__('auth.first_name')}}
                                                *</label>
                                            <input dir="{{$lang=='en'?'ltr':'rtl'}}" type="text" id="name" name="name"
                                                   placeholder="" required/>
                                        </div>
                                        <div class="col-md-6 div2">
                                            <label for="member" class="{{$lang=='en'?'float-left':'float-right'}}"
                                                   style="font-size: 20px;font-weight: 600;color:#000;">{{__('auth.last_name')}}
                                                *</label>
                                            <input dir="{{$lang=='en'?'ltr':'rtl'}}" type="text" id="lname"
                                                   name="l_name" placeholder=""
                                                   required/>
                                        </div>
                                        <div class="col-md-6  mobile-clas">
                                            <label for="member" class="{{$lang=='en'?'float-left':'float-right'}}"
                                                   style="font-size: 20px;font-weight: 600;color:#000;">* {{__('auth.mobile')}}</label>
                                            <br>

                                            <input dir="{{$lang=='en'?'ltr':'rtl'}}" type="number" maxlength="9"
                                                   id="mobile"
                                                   name="mobile" placeholder="" required/>
                                        </div>

                                        <div class="col-md-6 div1">
                                            <label for="member" class="{{$lang=='en'?'float-left':'float-right'}}"
                                                   style="font-size: 20px;font-weight: 600;color:#000;">{{__('auth.email')}} {{__('auth.optional')}} </label>
                                            <input dir="{{$lang=='en'?'ltr':'rtl'}}" type="email" id="email"
                                                   name="email" placeholder=""/>
                                            <span class="invalidEmailMSG" style="position:absolute;color:red">*</span>
                                        </div>

                                    </div>


                                    <div class="row mt-1" dir="{{$lang=='en'?'ltr':'rtl'}}">
                                        <div class="col-md-2 div2">
                                            <input id="regBtn" style="padding: 12px 7px 15px 3px;" type="submit"
                                                   name="next" class="next action-button nextInfoBtn"
                                                   value="{{__('auth.reg')}}"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-card2" dir="{{$lang=='en'?'ltr':'rtl'}}">
                                    <div class=" text-center">
                                        <h3 class="mb-2">{{__('auth.thanks')}}</h3>
                                        <p>{{__('auth.success_msg')}}</p>
                                        <h4>{{__('auth.badge_download')}}</h4>
                                        <p class="mb-4">{{__('auth.download_btn')}}
                                        </p>
                                        <a target="_blank" style="padding: 12px 42px 15px 42px;margin-top: 10px"
                                           class="link next text-center action-button nextInfoBtn">تحميل</a>
                                    </div>

                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <!--<img src="public/web-03.png" alt="">-->
            </div>

        </div>
    </div>
</div>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js"
        integrity="sha512-yrOmjPdp8qH8hgLfWpSFhC/+R9Cj9USL8uJxYIveJZGAiedxyIxwNw4RsLDlcjNlIRR4kkHaDHSmNHAkxFTmgg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function () {
        $('.form-card2').hide();
        $('#msform').submit(function (e) {
            $('.errorRquired1').text('');
            $('.successMSG').text('');
            e.preventDefault();

            $('#regBtn').prop("disabled", true);
            $('#regBtn').val('{{__('auth.please_wait')}}')
            // var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
            // $("input[name='mobile'").attr('type', 'text');
            // $("input[name='mobile'").val(full_number);
            var name = $('#name').val();
            var lname = $('#lname').val();
            var mobile = $('#mobile').val();
            var email = $('#email').val();


            var fd = new FormData();

            var url = "{{route('forum-registration')}}";
            fd.append('name', name);
            fd.append('mobile', mobile);
            fd.append('email', email);
            fd.append('l_name', lname);
            fd.append('lang', "{{$lang}}");


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                'url': url,
                'type': 'POST',
                'dataType': 'json',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response == 0) {
                        $('input#mobile').val('');
                        $('input#name').val('');
                        $('input#side').val('');
                        $('input[type="email"]').val('');
                        $('.errorRquired1').text('{{__('auth.email_exists')}}');
                    }
                    $('.link').attr('href', response.link);

                    $('.form-card').hide();
                    $('.form-card2').show();
                    $('.nextInfoBtn').prop("disabled", false);
                    $('#regBtn').val('{{__('auth.reg')}}')


                }
                // ,
                // error: function (xhr) {
                //         $('h2.msg-header').text('Error');
                //         $('img.fit-image').css('display','none');
                //         $('img.fit-image.error').css('display','block');
                //         $('.msg-content h5').text('حدث خطأ ما');
                // }
            });


        });
    });
</script>

<script>
    var phone_number = window.intlTelInput(document.querySelector("#mobile"), {
        separateDialCode: true,
        preferredCountries: ["sa"],
        hiddenInput: "full",
        utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
    });
    $('#selectpicker').selectpicker();
    $('.filter-option-inner-inner').text('قم باختيار واحدة أو أكثر');

    $('#mobile').keypress(function (e) {
        var mobile = $(this).val();
        if (mobile.length == 9) {
            e.preventDefault();
        }
    });
</script>
</body>
</html>
