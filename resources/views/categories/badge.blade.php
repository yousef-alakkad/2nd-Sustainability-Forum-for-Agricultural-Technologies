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
                size: 9.5cm 13cm;
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
                width: 9.5cm !important;
                height: 13cm !important;
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
                height: 13cm !important;
                width: 9.5cm !important;
                page-break-after: avoid !important;
                page-break-before: avoid !important;
                page-break-inside: avoid !important;
            }
        }






        #bodyy {
            height: 13cm;
            width: 9.5cm;
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



    <!-- البادج -->
    <div id="bodyy">
        <div class="image-badge" style="position:absolute; width:9.5cm;text-align:center; top:0; height:13cm;">
            <img src="{{ asset('public/est/badgec.png') }}" style="height:13cm;width:9.5cm;" />
        </div>



        <div
            style="line-height:40px; position:absolute; width:9.5cm;text-align:center; top:3.9cm; color:#black; font-size:22pt; font-weight:bold;">
            {{ $category->name }}
        </div>


    </div>

    <!-- الأزرار -->
    <div id="buttons">
        <button type="button" class="btn btn-badge" onclick="window.print();">
            طباعة بطاقة الحضور
        </button>

    </div>

    <script>
        window.print();
    </script>

</body>

</html>
