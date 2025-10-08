<!doctype html>
<html lang="ar" style="direction: rtl;">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Kaiian" name="description"/>
    <meta content="Themesdesign" name="author"/>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap');

        * {
            font-family: 'Cairo';
            font-size: 18px;
            color: #000;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            color: #000;
        }


        @media (max-width: 994px) {
            .logo-group img {
                margin-bottom: 20px;
            }

        }
    </style>
</head>

<body style="background-color: #f5f7fa;">
<table style="width: 100%" dir="rtl">
    <tr>
        <td>
            <img src="{{asset('public/logo.png')}}" width="250">
        </td>
        <td style="vertical-align: top;">
            <img src="{{asset('public/icons/top.png')}}" style="width: 120px;">
        </td>
    </tr>
    <tr>
        <td colspan="2" style="">
            <p style="padding: 20px;margin: 0 40px;background-color: #fff">
                السيد/ة {{$member->name}}،
                تحية طيبة وبعد،،
                <br>
                <br>
                نقدّر تواصلكم واعتذاركم، ونثمن لكم هذه الروح الطيبة. يبقى حضوركم محل ترحيب دائم، ونتطلع للقائكم في مناسبات قادمة.
                <br>
                <br>
                مع خالص الشكر والتقدير،
                <br>
                مؤسسة كيان الأهلية غير الربحية
            </p>
        </td>
    </tr>
    <tr>
        <td style="vertical-align: bottom;">
            <br>
            <br>
            <span style="width: 40px;padding: 0 30px"></span>
            <img src="{{asset('public/icons/bottom.png')}}" style="width: 100px;">
        </td>
        <td>
        </td>
    </tr>
</table>
</body>
</html>
