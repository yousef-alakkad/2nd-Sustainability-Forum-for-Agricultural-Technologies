<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/DINNextLTArabic-Black-4.ttf') format('truetype');
            font-weight: 900;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/DINNextLTArabic-Bold-4.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/DINNEXTLTARABIC-LIGHT-2-2.ttf') format('truetype');
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/DINNextLTArabic-Regular-3.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        /* نسخة ثانية من Regular (ممكن تستغني عنها لو نفس الملف) */
        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/DINNextLTArabic-Regular-3 (1).ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/DINNextLTArabic-UltraLight-3.ttf') format('truetype');
            font-weight: 200;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/din-next-It-w23-medium.ttf') format('truetype');
            font-weight: 500;
            font-style: italic;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/din-next-It-w23-regular.ttf') format('truetype');
            font-weight: 400;
            font-style: italic;
        }

        * {
            font-family: DINNextLTArabic, Cairo, sans-serif !important;

        }

        body {
            margin: 0;
            padding: 0;
            background-color: #005D45;
        }

        .wrapper {
            width: 100%;
            padding: 20px 0;
            background-color: #005D45;
        }

        .card {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
        }

        .title {
            font-size: 16px;
            font-weight: bold;
            color: #005D45;
            line-height: 1.5;
            padding-bottom: 15px;
            word-break: break-word;
        }

        /* لو العنوان طويل جدا (سطرين) صغّر الخط */
        .title:after {
            content: "";
            display: block;
            font-size: 16px !important;
            line-height: 1.4;
        }

        .subtitle {
            font-size: 17px;
            font-weight: bold;
            color: #005D45;
            padding: 12px 0;
        }

        .line {
            width: 180px;
            height: 6px;
            border: none;
            border-radius: 25px;
            background-color: #97B85B;
            margin: 10px auto;
        }

        .details {
            margin: 15px 0;
            font-size: 16px;
            color: #005D45;
            line-height: 1.8;
        }

        .btn {
            display: inline-block;
            background-color: #005D45;
            color: #ffffff !important;
            text-decoration: none;
            font-weight: bold;
            padding: 14px 45px;
            border-radius: 8px;
            text-align: center;
            margin: 12px 0;
            font-size: 16px;
        }

        .footer {
            font-size: 16px;
            color: #131212;
            padding-top: 15px;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td align="center">
                    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="card">
                        <tr>
                            <td align="center" style="padding:20px 0;">
                                <table dir="ltr" cellpadding="0" cellspacing="0" border="0" align="center">
                                    <tr>
                                        <td align="center" style="padding:0 20px;">
                                            <img src="https://registration.estidamah.gov.sa/public/est/logo2.png"
                                                width="135" alt="Logo2"
                                                style="display:block; width:135px; height:90px;">
                                        </td>
                                        <td align="center" style="padding:0 20px;">
                                            <img src="https://registration.estidamah.gov.sa/public/est/logo.png"
                                                width="180" alt="شعار المركز"
                                                style="display:block; width:180px; height:90px;">
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                             <td class="title">
                               نشكر لك حضورك في ملتقى استدامة للتقنيات الزراعية الثاني <br> فقد كانت لمشاركتك إضافة قيمة أسهمت في إثراء الملتقى<br>
                                نأمل منك التكرم بتعبئة الاستبيان عبر الرابط أدناه<br> بما يسهم في تطوير وتحسين فعالياتنا القادمة:

                            </td>
                        </tr>


                       <tr>
                        <td align="center" style="padding:10px;">
                            <table cellspacing="0" cellpadding="0" border="0" align="center">
                                <tr>
                                    <td bgcolor="#005D45" style="padding:14px 45px; border-radius:8px;">
                                        <a href="https://registration.estidamah.gov.sa/survey" target="_blank"
                                            style="color:#ffffff; font-size:16px; text-decoration:none; font-weight:bold; font-family:Tahoma, Arial, sans-serif; display:inline-block;">
                                            تعبئة الاستبيان
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>


                    <!-- الفوتر -->
                    <tr>
                        <td align="center" style="color:#131212; font-size:16px; line-height:1.6; padding:20px;">
                            مع خالص الشكر والتقدير<br>
                            <span style="font-weight:bold; font-size:18px;">المركز الوطني لأبحاث وتطوير الزراعة المستدامة</span>
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>

</body>

</html>
