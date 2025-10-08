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
                عزيزي/عزيزتي {{$member->name}}،
                <br>
                <br>
                يسرنا دعوتكم لحضور حفل تدشين مؤسسة كيان غير الربحية، حيث نسعى من خلال هذه المناسبة إلى إحداث أثر إيجابي في المجتمع وتعزيز فرص المشاركة للجميع.

                <br>
                <br>
                يُرجى استكمال التسجيل عبر منصتنا لضمان تأكيد حضوركم بسهولة عبر الرابط التالي:
                <br>
            </p>
            <p style="text-align: center;margin: 0 40px;background-color: #fff">
                <a href="#" style="text-decoration: none;background-color: #EA7224;border-color: #EA7224;border-radius: 8px;color:#fff;padding: 7px 15px;"
                        type="submit">رابط التسجيل
                </a>
            </p>
            <p style="padding: 20px;margin: 0 40px;background-color: #fff">

                <br>
                <br>
                📅 التاريخ: 19 مارس 2025
                <br>
                📍 المكان: [موقع الحدث]
                <br>
                ⏰ الوقت: [وقت الحدث]

                <br>
                <br>
                لمزيد من المعلومات أو أي استفسارات، لا تترددوا في التواصل معنا عبر البريد الإلكتروني: Accreditation@Kayan.org.sa

                <br>
                <br>
                نتطلع للترحيب بكم ومشاركتكم هذه اللحظة الاستثنائية!

                <br>
                <br>
                تحياتنا،
                <br>
                فريق دعم مؤسسة كيان غير الربحية
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
