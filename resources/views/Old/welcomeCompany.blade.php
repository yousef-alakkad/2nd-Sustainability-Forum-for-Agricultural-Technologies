<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Kaiian</title>
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
    </style>
    @include('css')
</head>
<body>


<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-9 text-center p-0  mb-2">

            <div class="card px-0 pb-0  mb-3">
                <!--<img class="img-line" src="public/w-9.png" alt="">-->
                <div class="row">
                    <div class="col-md-12 mx-0">

                        <form id="msform" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <fieldset data-set="1">
                                {{--<h2 style="text-align:center" class="fs-title"> تسجيل الأفراد</h2>--}}
                                <div class="form-card" dir="{{$lang=='en'?'ltr':'rtl'}}">
                                    <div class="row box">
                                        <div class="col-md-6 div2">
                                            <label for="member" class="{{$lang=='en'?'float-left':'float-right'}}"
                                                   style="font-size: 20px;font-weight: 600;color:#000;">{{__('auth.first_name')}}
                                                *</label>
                                            <input dir="{{$lang=='en'?'ltr':'rtl'}}" type="text" id="name" name="name"
                                                   placeholder="{{__('auth.first_name')}} *" required/>
                                        </div>
                                        <div class="col-md-6 div2">
                                            <label for="member" class="{{$lang=='en'?'float-left':'float-right'}}"
                                                   style="font-size: 20px;font-weight: 600;color:#000;">{{__('auth.last_name')}}
                                                *</label>
                                            <input dir="{{$lang=='en'?'ltr':'rtl'}}" type="text" id="l_name"
                                                   name="l_name" placeholder=""
                                                   required/>
                                        </div>


                                        <div class="col-md-6 div1">
                                            <label for="member" class="{{$lang=='en'?'float-left':'float-right'}}"
                                                   style="font-size: 20px;font-weight: 600;color:#000;">{{__('auth.email')}}
                                                *
                                                <span id="invalidEmailMSG" style="color:red"></span>
                                            </label>
                                            <input dir="{{$lang=='en'?'ltr':'rtl'}}" type="email" id="email"
                                                   name="email" placeholder=""/>

                                        </div>
                                        <div class="col-md-6 div1 ">

                                            <div class="col-md-12  mobile-clas"
                                                 style="padding-right: 0px;padding-left: 0px;">
                                                <label for="member" class="{{$lang=='en'?'float-left':'float-right'}}"
                                                       style="font-size: 20px;font-weight: 600;color:#000;">{{__('auth.mobile')}}
                                                    *</label>
                                                <br>

                                                <input dir="{{$lang=='en'?'ltr':'rtl'}}" type="number" pattern="\d*"
                                                       maxlength="9" id="mobile"
                                                       name="mobile" placeholder="" required/>
                                            </div>
                                        </div>


                                        <div class="col-md-6 div2">
                                            <label for="member" class="{{$lang=='en'?'float-left':'float-right'}}"
                                                   style="font-size: 20px;font-weight: 600;color:#000;">{{__('auth.company_name')}}
                                                *</label>
                                            <input dir="{{$lang=='en'?'ltr':'rtl'}}" type="text" id="company_name"
                                                   name="company_name"
                                                   placeholder="" required/>
                                        </div>
                                        <div class="col-md-6 div2">
                                            <label for="member" class="{{$lang=='en'?'float-left':'float-right'}}"
                                                   style="font-size: 20px;font-weight: 600;color:#000;">{{__('auth.position')}}
                                                *</label>
                                            <input dir="{{$lang=='en'?'ltr':'rtl'}}" type="text" id="position"
                                                   name="position" placeholder=""
                                                   required/>
                                        </div>


                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-2 div2">
                                            <input id="regBtn" style="padding: 12px 7px 15px 3px;" type="submit"
                                                   name="next"
                                                   class="next action-button nextInfoBtn" value="{{__('auth.reg')}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-card2" dir="{{$lang=='en'?'ltr':'rtl'}}">
                                    <div class=" text-center">

                                        <h3 class="mb-2">{{__('auth.thanks')}}</h3>
                                        <h5>{{__('auth.company_msg')}}</h5>
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
            e.preventDefault()
            $('.errorRquired1').text('');
            $('.successMSG').text('');
            e.preventDefault();

            $('#regBtn').prop("disabled", true);
            $('#regBtn').val('{{__('auth.please_wait')}}')
            var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
            $("input[name='mobile'").attr('type', 'text');
            $("input[name='mobile'").val(full_number);
            var name = $('#name').val();
            var lname = $('#l_name').val();
            var mobile = $('#mobile').val();
            var email = $('#email').val();
            var company = $('#company_name').val();
            var pos = $('#position').val();

            var fd = new FormData();

            var url = "{{route('companyMember.save')}}";
            fd.append('name', name);
            fd.append('l_name', lname);
            fd.append('mobile', mobile);
            fd.append('email', email);
            fd.append('company_name', company);
            fd.append('position', pos);
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
                    console.log(response);
                    if (response.status == -1) {
                        $('#invalidEmailMSG').text('{{__('auth.email_exists')}}')
                        $('.nextInfoBtn').prop("disabled", false);
                        $('#regBtn').val('{{__('auth.reg')}}')
                        return;
                    }
                    if (response == 0) {
                        $('input#mobile').val('');
                        $('input#name').val('');
                        $('input#side').val('');
                        $('input[type="email"]').val('');
                        $('.errorRquired1').text('{{__('')}}');
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
