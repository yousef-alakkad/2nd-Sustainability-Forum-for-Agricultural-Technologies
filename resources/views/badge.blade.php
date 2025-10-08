<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Badge</title>
    <style>
        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('/estidamah/public/fonts/DINNextLTArabic-Black-4.ttf') format('truetype');
            font-weight: 900;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('/estidamah/public/fonts/DINNextLTArabic-Bold-4.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('/estidamah/public/fonts/DINNEXTLTARABIC-LIGHT-2-2.ttf') format('truetype');
            font-weight: 250;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('/estidamah/public/fonts/DINNextLTArabic-Regular-3.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        /* نسخة ثانية من Regular (ممكن تستغني عنها لو نفس الملف) */
        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('/estidamah/public/fonts/DINNextLTArabic-Regular-3 (1).ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('/estidamah/public/fonts/DINNextLTArabic-UltraLight-3.ttf') format('truetype');
            font-weight: 200;
            font-style: normal;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('/estidamah/public/fonts/din-next-It-w23-medium.ttf') format('truetype');
            font-weight: 500;
            font-style: italic;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('/estidamah/public/fonts/din-next-It-w23-regular.ttf') format('truetype');
            font-weight: 400;
            font-style: italic;
        }

        * {
            font-family: DINNextLTArabic, Cairo, sans-serif !important;

        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'DINNextLTArabic';
            background: #f5f5f5;
            text-align: center;
        }

        @media print {

            @page {
                size: 9.8cm 12.8cm;
                margin: 0;
            }
            *{
                font-family: DINNextLTArabic;

            }

            html,
            body {
                font-family: DINNextLTArabic;
                margin: 0 !important;
                padding: 0 !important;
                width: 9.8cm !important;
                height: 12.8cm !important;
                overflow: hidden !important;
                background: none !important;
            }

            .image-badge,
            #success,
            #buttons {
                display: none !important;
            }

            #bodyy {
                margin: 0 auto !important;
                position: relative !important;
                height: 12.8cm !important;
                width: 9.8cm !important;
                page-break-after: avoid !important;
                page-break-before: avoid !important;
                page-break-inside: avoid !important;
            }
        }






        #bodyy {
            height: 12.8cm;
            width: 9.8cm;
            margin: 40px auto 20px auto;
            position: relative;
        }

        #buttons {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
            margin-bottom: 40px;

        }

        .btn {
            display: block;
            color: #fff;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            padding: 0.6rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.35rem;
            min-width: 200px;
            font-weight: bold;
            font-size: 21px;
        }

        .btn-badge {
            background-color: #56af78;
            font-family: "DINNextLTArabic";
            font-weight: bold;
            font-size: 21px;
            border: none;
        }

        .btn-secondary {
            background-color: #fd931e;
        }
    </style>
</head>

<body style="direction:ltr">

    <div id="success">
        @if (session('success'))
            <div class="alert alert-success">
                شكرًا لتسجيلك، سيتم إرسال التفاصيل التسجيل على بريدك الإلكتروني
            </div>
        @elseif(isset($attend))
            <div class="alert alert-success" style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 12px; border-radius: 6px; font-size: 18px; margin-bottom: 16px;">
                {{ $attend }}
            </div>
        @endif
    </div>

    <!-- البادج -->
    <div id="bodyy">
        <div class="image-badge" style="position:absolute; width:9.5cm;text-align:center; top:0; height:13cm;">
            <img src="{{ asset('public/est/badge.png') }}" style="height:12.8cm;width:9.8cm;" />
        </div>

        <div style="position:absolute; width:9.5cm;text-align:center; top:6cm;">
            <img src="{{ asset('storage/app/public/qrcode/' . $member->id . $member->qrcode . '.png') }}" alt="barcode"
                width="90" />
        </div>

        <div
            style="line-height:18px; position:absolute; width:9.5cm;text-align:center; top:8.5cm; color:#black; font-size:12pt; font-weight:bold;">
            {{ $member->qrcode }}
        </div>

        <div
            style="line-height:40px; position:absolute; width:9.5cm;text-align:center; top:3.9cm; color:#black; font-size:22pt; font-weight:bold;">
            {{ $member->name }}
        </div>


    </div>

    <!-- الأزرار -->
    <div id="buttons">
        <button type="button" class="btn btn-badge" onclick="window.print();">
            طباعة بطاقة الحضور
        </button>
        <a href="{{ url('training') }}" class="btn btn-secondary">
            العودة للصفحة الرئيسية
        </a>
    </div>

    <script>
        window.print();
    </script>

</body>

</html>
