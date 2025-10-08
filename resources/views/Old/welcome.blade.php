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
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Montserrat:wght@100&family=Poppins:wght@400;500;600&family=Roboto+Serif:wght@100&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://db.onlinewebfonts.com/c/d78f5d2c76185fa07aaf8dd729eef33e?family=DIN+Next+LT+Arabic+Light"
          rel="stylesheet">
    <link href="https://db.onlinewebfonts.com/c/513071b47bdba774c93a73ad16a75e3b?family=DIN+Next+LT+Arabic+Bold"
          rel="stylesheet">
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
    <style>
        * {
            font-family: "DIN Next LT Arabic Light";
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .iti.iti--allow-dropdown.iti--separate-dial-code {
            width: 100%;
            margin-top: 2px;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        * {
            margin: 0;
            padding: 0
        }

        .invalidEmailMSG {
            visibility: hidden;
        }

        .footer__heading::after {
            content: '';
        }

        .inBahreenSelect, .passportImageDiv {
            display: none;
        }

        .fit-image {
            display: none;
        }

        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            width: 100% !important;
            margin-right: -2%;
        }

        .filter-option {
            font-size: .9rem;
            color: #000;
        }

        html {
            height: 100%
        }

        #grad1 {
            background-color: #fff;
            background-image: linear-gradient(120deg, #fff, #fff);
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        .form-control {
            padding: 2px;
            font-size: 13px;
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            /*  box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);*/
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;
            position: relative
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }

        #msform input,
        #msform textarea {
            padding: 22px 8px 10px 8px;
            /* border: none;*/
            /* border-bottom: 1px solid #ccc;*/
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            font-size: 17px;
            letter-spacing: 1px
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;

            font-weight: bold;
            border: 2px solid skyblue;
            border-radius: 0.25rem;
            outline-width: 0
        }

        #msform .action-button {
            width: 100px;
            background: #4796b9;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px;
            height: 35px !important;
            line-height: 10px !important;
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
        }

        .form-control {
            padding: 2px;
            font-size: 17px;
        }

        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px
        }

        select.list-dt:focus {
            border-bottom: 2px solid skyblue
        }

        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 22px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey;
            display: flex;
        }

        #progressbar .active {
            color: #000000
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f2c2"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f2c1"
        }

        #progressbar #services:before {
            font-family: FontAwesome;
            content: "\f64a"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #c9a73a;
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 204;
            height: 104;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }

        @media screen and (max-width: 600px) {
            #progressbar li {
                font-size: 10px;
            }

            .fs-title {
                font-size: 18px;

            }

            .msg-content h5 {
                font-size: 3vw;
            }

            #progressbar li:before {

                display: block;
                font-size: 12px;

            }

            #msform input,
            #msform textarea {

                font-size: 12px;
                letter-spacing: 0px
            }

            .form-control {

                padding: 2px;
                font-size: 12px;

            }

            label.float-right, label.labelFloatRight {
                font-size: 12px;
            }

            .col-md-6.mobile-clas {
                text-align: right;
                margin-bottom: 12px;
            }

            .fit-image {
                width: 100%;
                object-fit: cover;

            }

            .row.box {
                display: flex;
                flex-direction: row-reverse;
            }

            .col-md-6.div1 {
                order: 1;
            }

        }

        section.footer {
            background-color: #0c0c0c;
            background-repeat: no-repeat;
            background-attachment: inherit;
            background-size: cover;
            position: relative;
            font-family: 'Poppins';
            padding: 12px 0px;
        }

        section.header {
            background-color: #fff;
            background-repeat: no-repeat;
            background-attachment: inherit;
            background-size: cover;
            text-align: center;
            position: relative;
            font-family: 'Poppins';
            padding: 10px 0px 0px 0px;
        }

        .fa {
            margin-top: 8px !important;
        }

        .footer__content {
            padding: 25px;
            text-align: center;
            color: #fff;

        }

        .form-control {
            display: block;
            width: 100%;
            height: calc(2.5em + 0.75rem + 2px);
        }

        .footer__content img {
            width: 5%;
            position: absolute;
            top: -50px;
            border: 1px solid red;
        }

        .footer__heading {
            position: relative;
        }

        .footer__heading h2 {
            background-color: #0c0c0c;
            display: inline-block;
            padding: 0px 10px;
            /* border: 1px solid; */
            position: relative;
            z-index: 9999;
        }

        /*.footer__heading::after {*/
        /*    content: "";*/
        /*    position: absolute;*/
        /*    left: 50%;*/
        /*    top: 45%;*/
        /*    height: 5px;*/
        /*    margin: 0;*/
        /*    border-radius: 50px;*/
        /*    width: 20%;*/
        /*    transform: translate(-50% , -50%);*/
        /*    background-color: rgb(255, 255, 255);*/
        /*}*/
        .footer__content p {
            font-size: 20px;
            font-weight: 500;
            padding: 10px 0px;
            font-family: sans-serif;
        }

        a.mail {
            color: #fff;
        }

        ul.social__media {
            margin: 0;
            padding: 0;
            display: inline-block;
            margin-top: 15px;
            display: flex;
            justify-content: center;
        }

        ul.social__media li {
            list-style-type: none;
            display: inline-block;
            margin-right: 15px;
        }

        ul.social__media li a {
            color: #FFF;
            font-size: 20px;
        }

        ul.social__media li {

            text-align: center;
            height: 45px;
            width: 45px;
            border-radius: 50px;
            background-color: #bc9432;
            line-height: 40px;
            border: 2px solid #545d5d;
            box-shadow: 0px 1px #FFF;
            box-shadow: 0 2px 10px -1px rgba(0, 0, 0, 0.55), 0 0px 20px 0px rgba(0, 0, 0, 0.55);
        }

        ul.bus__list {
            padding: 0;
            margin: 0;
        }

        ul.bus__list li {
            list-style-type: none;
            margin-bottom: 5px;
        }

        div#main-menu {
            text-align: center;
        }

        .main-menu {
            text-align: center;
        }

        h2.text-date {
            color: #7ac0bb;
            margin-top: 20px;
            font-family: "FrutigerLTArabic-45Light";
            font-size: 25px;
        }

        img.img-line {
            max-height: 15px;
        }

        .col-md-6.mobile-clas {
            text-align: right;
        }

        .bootstrap-select .dropdown-menu.inner, .filter-option-inner-inner {
            text-align: right;
        }

        .new {
            padding: 0px;
            text-align: right;
        }

        .form-group {
            display: block;
            margin-bottom: 15px;
        }

        .form-group input {
            padding: 0;
            height: initial;
            width: initial;
            margin-bottom: 0;
            display: none;
            cursor: pointer;
        }

        .form-group label {
            position: relative;
            cursor: pointer;
        }

        .form-group label:before {
            content: '';
            -webkit-appearance: none;
            background-color: transparent;
            border: 2px solid #4796b9;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
            padding: 10px;
            display: inline-block;
            position: relative;
            vertical-align: middle;
            cursor: pointer;
            margin-left: 5px;
            margin-right: -2rem !important;
        }

        .form-group input:checked + label:after {
            content: '';
            display: block;
            position: absolute;
            top: 5px;
            right: -22px;
            width: 6px;
            height: 14px;
            border: solid #4796b9;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        #msform .action-button {
            color: #fff;
            background-color: #78b7bc;
            border-radius: 30px;
            box-shadow: 5px 5px 1px 0px rgba(16, 117, 176, 0.75);
            transition: all .5s ease-in-out;
            font-size: 17px;
        }

        label.float-right, label.labelFloatRight {
            font-size: 13px;
        }

        .dots-bars-2 {
            margin-top: 5rem;
            width: 40px;
            height: 40px;
            --c: linear-gradient(currentColor 0 0);
            --r1: radial-gradient(farthest-side at bottom, currentColor 93%, #c9a73a);
            --r2: radial-gradient(farthest-side at top, currentColor 93%, #c9a73a);
            background: var(--c),
            var(--r1),
            var(--r2),
            var(--c),
            var(--r1),
            var(--r2),
            var(--c),
            var(--r1),
            var(--r2);
            background-repeat: no-repeat;
            animation: db2 1s infinite alternate;
        }

        @keyframes db2 {
            0%, 25% {
                background-size: 8px 0, 8px 4px, 8px 4px, 8px 0, 8px 4px, 8px 4px, 8px 0, 8px 4px, 8px 4px;
                background-position: 0 50%, 0 calc(50% - 2px), 0 calc(50% + 2px), 50% 50%, 50% calc(50% - 2px), 50% calc(50% + 2px), 100% 50%, 100% calc(50% - 2px), 100% calc(50% + 2px);
            }
            50% {
                background-size: 8px 100%, 8px 4px, 8px 4px, 8px 0, 8px 4px, 8px 4px, 8px 0, 8px 4px, 8px 4px;
                background-position: 0 50%, 0 calc(0% - 2px), 0 calc(100% + 2px), 50% 50%, 50% calc(50% - 2px), 50% calc(50% + 2px), 100% 50%, 100% calc(50% - 2px), 100% calc(50% + 2px);
            }
            75% {
                background-size: 8px 100%, 8px 4px, 8px 4px, 8px 100%, 8px 4px, 8px 4px, 8px 0, 8px 4px, 8px 4px;
                background-position: 0 50%, 0 calc(0% - 2px), 0 calc(100% + 2px), 50% 50%, 50% calc(0% - 2px), 50% calc(100% + 2px), 100% 50%, 100% calc(50% - 2px), 100% calc(50% + 2px);
            }
            95%, 100% {
                background-size: 8px 100%, 8px 4px, 8px 4px, 8px 100%, 8px 4px, 8px 4px, 8px 100%, 8px 4px, 8px 4px;
                background-position: 0 50%, 0 calc(0% - 2px), 0 calc(100% + 2px), 50% 50%, 50% calc(0% - 2px), 50% calc(100% + 2px), 100% 50%, 100% calc(0% - 2px), 100% calc(100% + 2px);
            }
        }

        div.howYouKnowOther {
            display: none;
        }

        .logo {
            width: 500px;
            height: 300px;
        }

        .displayFlex {
            display: flex;
            justify-content: unset;
            align-items: center;
            float: right;
            margin-bottom: 10px;
            width: 100%;
            direction: rtl
        }

        .displayFlex label {
            text-align: right;
        }

        .displayFlex .form-control {
            margin-left: 10px
        }

        .displayFlex label,
        .displayFlex .form-control {
            margin-bottom: 0 !important;
            width: auto !important;
        }

        @media (min-width: 300px) and (max-width: 700px) {
            .logo {
                width: 200px;
                height: 90px;
            }
        }
    </style>

</head>
<body>
<section class="header">
    <!-- <img class=" rounded float-start" src="public/logo240.png" alt="" width="300" height="240"> -->
    <img class="img-svg" src="public/logo.png" width="500" height="275">
    <h3 class="errorRquired1" style="margin-top: -40px">مركز الرياض الدولي للمؤتمرات والمعارض</h3>
    <p class="errorRquired1" style="color:#b0bac1;font-size:20px;">الفترة من 20 إلي 22 أغسطس 2024</p>
    <!--<h2 class="text-date">07-08-09<br> June 2022 </h2>-->
</section>

<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-9 text-center p-0  mb-2">
            <div class="card px-0 pb-0  mb-3">
                <!--<img class="img-line" src="public/w-9.png" alt="">-->
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" action="{{route('saveMembersData')}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <fieldset data-set="1">
                                <h2 style="text-align:center" class="fs-title"> تسجيل الجلسات الحوارية</h2>
                                <div class="form-card">
                                    <div class="row box">
                                        <div class="col-md-6 div1">
                                            <label for="member" class="float-right"
                                                   style="font-size: 20px;font-weight: 600;color:#000;"> *البريد
                                                الإلكتروني </label>
                                            <input dir="rtl" type="email" required id="email" name="email"
                                                   placeholder=""/>
                                            <span class="invalidEmailMSG" style="position:absolute;color:red">*</span>
                                        </div>
                                        <div class="col-md-6 div2">
                                            <label for="member" class="float-right"
                                                   style="font-size: 20px;font-weight: 600;color:#000;">*الاسم
                                                الكامل </label>
                                            <input dir="rtl" type="text" id="name" name="name" placeholder="" required/>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6  mobile-clas">
                                            <label for="member" class="float-right"
                                                   style="font-size: 20px;font-weight: 600;color:#000;">*رقم
                                                الجوال</label>
                                            <br>

                                            <input dir="rtl" type="number" pattern="\d*" maxlength="9" id="mobile"
                                                   name="mobile" placeholder="" required/>

                                        </div>


                                        <div class="col-md-6">
                                            <label for="member" class="float-right"
                                                   style="font-size: 20px;font-weight: 600;color:#000;">*جهة
                                                العمل</label>
                                            <input dir="rtl" type="text" id="side" name="side" placeholder=" "
                                                   required/>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <div class="howYouKnowOther">
                                                <input name="howYouKnowOther" type="text" dir="rtl"
                                                       placeholder="كيف سمعت عنا ؟"/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="member" class="float-right"
                                                   style="font-size: 20px;font-weight: 600;color:#000;">كيف سمعت عنا
                                                ؟</label>
                                            <select style="" name="howYouKnow" id="howYouKnow" dir="rtl"
                                                    class="form-control">
                                                <option vlaue="">الرجاء الإختيار</option>
                                                <option value="حسابات التواصل الأجتماعي">
                                                    حسابات التواصل الأجتماعي
                                                </option>
                                                <option value="قنوات تلفزيونية">
                                                    قنوات تلفزيوينة
                                                </option>
                                                <option value="قنوات إذاعية">
                                                    قنوات إذاعية
                                                </option>
                                                <option value="صديق">
                                                    صديق
                                                </option>
                                                <option value="أخرى">
                                                    أخرى
                                                </option>
                                            </select><br>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="member" class="float-right"
                                                   style="margin-left: auto;font-size: 20px;font-weight: 600;color:#000;">الجلسات
                                                الحوارية</label>
                                        </div>
                                        <div class="col-md-12" id="WorkShopInDay">
                                            <label for="member" style="color: #000" class="float-right"> اليوم الأول
                                                الاثنين 25/12/2023</label>
                                            @foreach ($workshops1 as $worksh)
                                                <div class="displayFlex">
                                                    <input id="worksh_{{ $worksh->id }}" type="checkbox"
                                                           name="workshops[]" value="{{ $worksh->id }}"
                                                           class="form-control">
                                                    <label for="worksh_{{ $worksh->id }}" class="">{{ $worksh->name }}
                                                        : {{ $worksh->start_time }} - {{ $worksh->end_time }} </label>
                                                </div>
                                            @endforeach
                                            <label for="member" style="color: #000" class="float-right"> اليوم الثاني
                                                الثلاثاء 26/12/2023</label>
                                            @foreach ($workshops2 as $worksh)
                                                <div class="displayFlex">
                                                    <input id="worksh_{{ $worksh->id }}" type="checkbox"
                                                           name="workshops[]" value="{{ $worksh->id }}"
                                                           class="form-control">
                                                    <label for="worksh_{{ $worksh->id }}" class="">{{ $worksh->name }}
                                                        : {{ $worksh->start_time }} - {{ $worksh->end_time }} </label>
                                                </div>
                                            @endforeach
                                            <label for="member" style="color: #000" class="float-right"> اليوم الثالث
                                                الاربعاء 27/12/2023</label>
                                            @foreach ($workshops3 as $worksh)
                                                <div class="displayFlex">
                                                    <input id="worksh_{{ $worksh->id }}" type="checkbox"
                                                           name="workshops[]" value="{{ $worksh->id }}"
                                                           class="form-control">
                                                    <label for="worksh_{{ $worksh->id }}" class="">{{ $worksh->name }}
                                                        : {{ $worksh->start_time }} - {{ $worksh->end_time }} </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>


                                    <div class="new" dir="rtl">

                                        <input type="submit" name="next" class="next action-button nextInfoBtn"
                                               value="تسجيل"/>
                                    </div>
                                </div>
                                {{-- <p  style="font-size:1.2rem">بادر بالحضور لتحصل على الشهادة</p> --}}
                                <p class="errorRquired1" style="color:red"></p>
                                <p class="successMSG" style="color:green"></p>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <!--<img src="public/web-03.png" alt="">-->
            </div>


        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js"
        integrity="sha512-yrOmjPdp8qH8hgLfWpSFhC/+R9Cj9USL8uJxYIveJZGAiedxyIxwNw4RsLDlcjNlIRR4kkHaDHSmNHAkxFTmgg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(function () {
        $('#howYouKnow').change(function () {
            if ($(this).val() == 'أخرى') {
                $('.howYouKnowOther').css('display', 'block');
                $('.howYouKnowOther input').attr('required', 'required');
            } else {
                $('.howYouKnowOther').css('display', 'none');
                $('.howYouKnowOther input').removeAttr('required');

            }
        })

        $('#msform').submit(function (e) {
            $('.errorRquired1').text('');
            $('.successMSG').text('');
            e.preventDefault();

            var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
            $("input[name='mobile'").attr('type', 'text');
            $("input[name='mobile'").val(full_number);
            var name = $('#name').val();
            var mobile = $('#mobile').val();
            var email = $('#email').val();
            var side = $('#side').val();
            var side = $('#side').val();
            if ($('#howYouKnow').val() == 'أخرى') {
                var howYouKnow = $('.howYouKnowOther input').val();
            } else {
                var howYouKnow = $('#howYouKnow').val();
            }

            var favourite_day = $('#favourite_day').val();

            var fd = new FormData();

            var url = $(this).attr('action');
            fd.append('name', name);
            fd.append('mobile', mobile);
            fd.append('email', email);
            fd.append('side', side);
            fd.append('howYouKnow', howYouKnow);
            fd.append('favourite_day', favourite_day);

            $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

            $.ajax({
                'url': url,
                'type': 'POST',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    console.log(response.code);
                    if (response == 0) {
                        $('input#mobile').val('');
                        $('input#name').val('');
                        $('input#side').val('');
                        $('input[type="email"]').val('');
                        $('.errorRquired1').text('البريد الإلكتروني مستخدم من قبل شخص آخر');
                    }
                    else {
                        //$('fieldset').html('<p style="color:#7ac0bb">تم التسجيل بنجاح<br>سيتم إرسال البادج الخاص بالدخول على بريدك الإلكتروني<p>');
                        window.location.href = "{{route('ind')}}/print/printBadge/1/" + response.code;
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    // $('h2.msg-header').text('Error');
                    // $('img.fit-image').css('display','none');
                    // $('img.fit-image.error').css('display','block');
                    // $('.msg-content h5').text('حدث خطأ ما');
                }
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
