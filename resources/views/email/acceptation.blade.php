<!doctype html>
<html lang="{{app()->getLocale()}}" style="direction: ltr;">
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

<body style="background-color: #00a79a;">
<table style="width: 100%" dir="rtl">

    <tr>
        <td style="padding: 20px"></td>
    </tr>
    <tr>
        <td colspan="2" style="background-color: #fff">


            <p style="text-align: center">
                <img src="{{asset('public/logo-2.png')}}" width="250">
                <img src="{{asset('public/logo.png')}}" width="250">
            </p>
            <p style="padding: 20px;margin: 0 40px;background-color: #fff">
                السلام عليكم ورحمة الله وبركاته،
                <br>
                <br>
                السيد/ة {{$member->name}}،
                تحية طيبة وبعد،،
                <br>
                <br>
                شكرًا لتأكيد حضوركم، مرفق لكم باركود الحضور حيث سيبدأ الحفل بمشيئة الله عند الساعة 7:0 مساءً.
                <br>
            </p>

            <p style="text-align: center;margin: 0 40px;background-color: #fff">
                <a href="{{$link}}" style="text-decoration: none;background-color: #EA7224;border-color: #EA7224;border-radius: 8px;color:#fff;padding: 7px 15px;"
                   type="submit">إضغط هنا
                </a>
            </p>

            <br>
            <span style="width: 40px;padding: 0 30px"></span>
            <img src="{{asset('public/footer.png')}}" style="width: 250px;">
        </td>
    </tr>
</table>
</body>
</html>
