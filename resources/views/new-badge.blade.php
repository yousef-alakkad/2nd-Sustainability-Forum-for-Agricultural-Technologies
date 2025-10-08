<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Badge</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
    <style>
        @font-face {
            font-family: hrsd;
            src: url({{url('public/fonts/HRSD-Regular.ttf')}}) format('truetype');
        }

        @font-face {
            font-family: 'Cairo';
            font-weight: bold;
            font-style: normal;
            src: url("{{url('storage/fonts/Cairo-Bold.ttf')}}") format('truetype');
        }
        * {
            font-family: "Cairo";
        }

        @media print {
            @page {
                size: 9cm 12.5cm;
                margin: 0;
            }
            *{
                color: #ffffff!important;
                -webkit-print-color-adjust: exact;
            }
        }

        @page {
            size: 9cm 12.5cm;
        }
        .formm {
            background-color: #ffffff2e;
            padding: 42px 13px 25px !important;
            width: 7cm;
            border-radius: 16px;
            margin: auto;
        }

        html,
        body{
            /*height: 12.4cm;*/
            width: 9cm;
            margin: auto;
            overflow: hidden;
        }
        html{
            zoom: 100%;
        }
        p{
            direction: ltr !important;
        }
    </style>
</head>

<body style="direction:rtl;
{{--background-image: url('{{ asset('public/badge.jpg') }}');--}}
background-color: #01619a;
background-size: cover;background-repeat: no-repeat;background-position: center">

<div  style="height:9cm;width:9cm;margin:auto">


    @php(app()->setLocale('ar'))

    <div style=" width:9cm;text-align:center; margin-top:1.5cm;direction: rtl!important;">
        <h3 style="color:#d9531e !important;font-size: 15px; text-align: center;font-weight: bold;margin: 0 auto 5px">
            {!! __('welcome.social') !!}
        </h3>
        <div class="">
            <img src="{{asset('storage/app/public/qrcode/'.$member->id.$qrcode.'.png')}}" style="width: 50px;height: 50px;border: 1px solid #2ca16c;padding: 5px;">
            <p style="color:#fff;font-size: 9px;font-weight: bold;margin-top: 5px;margin-bottom: 0">
                <span>{{$member->name}}</span>
                <span> الاسم : </span>
            </p>
{{--            <p style="color:#fff;font-size: 9px;font-weight: bold;margin-top: 5px;margin-bottom: 0">--}}
{{--                <span>{{$member->position}}</span>--}}
{{--                <span>المنصب : </span>--}}
{{--            </p>--}}
{{--            <p style="color:#fff;font-size: 9px;font-weight: bold;margin-top: 5px;margin-bottom: 0">--}}
{{--                <span>{{$member->entity}}</span>--}}
{{--                <span>الجهة :  </span>--}}
{{--            </p>--}}
            <p style="color:#fff;font-size: 9px;font-weight: bold;margin-top: 5px;margin-bottom: 0">
                <span>{{$member->mobile}}</span>
                <span>الرقم : </span>
            </p>
            <p style="color:#fff;font-size: 9px;font-weight: bold;margin-top: 5px;margin-bottom: 0">
                <span>{{$member->email}}</span>
                <span>البريد : </span>
            </p>
        </div>
    </div>

</div>
</body>

</html>

