<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ملتقى استدامة للتقنيات الزراعية الثاني</title>
    <link rel="icon" href="{{ asset('public/est/logo2.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/DINNextLTArabic-Regular-3.ttf') format('truetype');
            font-weight: 400;
        }

        @font-face {
            font-family: 'DINNextLTArabic';
            src: url('public/fonts/DINNextLTArabic-Bold-4.ttf') format('truetype');
            font-weight: 700;
        }

        body {
            font-family: 'DINNextLTArabic', sans-serif;
            background: linear-gradient(180deg, #0d7a41 0%, #00C391 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 1rem;
        }


        .invite-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            padding: 2rem 1.5rem;
            text-align: center;
        }

        .card-wrapper {
            width: 100%;
            max-width: 650px;
        }



        .text-header {
            color: #0d7a41;
            font-weight: 700;
            font-size: clamp(1.2rem, 3.5vw, 2rem);
            line-height: 1.5;
            margin-bottom: 1.2rem;
            word-break: break-word;
        }

        .logo2 {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2.2rem;
            flex-wrap: wrap;
            margin-left: 38px;
            margin-bottom: 15px;
        }

        .logo2 img {
            max-height: 60px;
            width: auto;
            filter: drop-shadow(0 3px 6px rgba(0, 0, 0, 0.15));
            transition: transform 0.3s;
        }

        @media (min-width: 768px) {
            .logo2 img {
                max-height: 90px;
            }
        }

        .slogon {
            font-weight: 700;
            font-size: clamp(0.9rem, 2.2vw, 1.3rem);
            color: #C8A94B;
            margin: 1rem 0 1.8rem;
            line-height: 1.6;
        }

        .line-gredian {
            width: 200px;
            height: 6px;
            margin: 1.5rem auto 2rem;
            border-radius: 25px;
            background: linear-gradient(90deg, #0d7a41, #97B85B);
        }

        .details {
            margin-bottom: 2rem;
            font-size: clamp(0.9rem, 2vw, 1.1rem);
            color: #333;
            line-height: 1.8;
        }

        .details p {
            margin: 0.3rem 0;
            font-weight: 600;
        }

        .btn-confirm {
            background: linear-gradient(90deg, #0d7a41, #00A77F);
            color: #fff;
            border: none;
            font-size: clamp(0.95rem, 2.2vw, 1.15rem);
            border-radius: 12px;
            padding: 12px 32px;
            margin-top: 1rem;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .btn-confirm:hover {
            background: linear-gradient(90deg, #007a55, #00c391);
            transform: translateY(-3px);
        }

        @media (max-width: 576px) {
            .logo2 {
                gap: 1.5rem;
                flex-wrap: nowrap;
            }

            .logo2 img {
                max-height: 55px;
            }

            .btn-confirm {
                padding: 14px;
            }
        }

        @media (max-width: 427px) {
            .text-header {
                font-size: 1rem;
                line-height: 1.3;
            }

            .slogon {
                font-size: 0.8rem;
                line-height: 1.4;
            }

            .btn-confirm {
                font-size: 0.9rem;
                padding: 10px 20px;
            }

            .logo2 img {
                max-height: 45px;
            }


        }

         /* HTML: <div class="loader"></div> */
            .loader {
            --d:22px;
            width: 4px;
            height: 4px;
            border-radius: 50%;
            color: #25b09b;
            box-shadow:
                calc(1*var(--d))      calc(0*var(--d))     0 0,
                calc(0.707*var(--d))  calc(0.707*var(--d)) 0 1px,
                calc(0*var(--d))      calc(1*var(--d))     0 2px,
                calc(-0.707*var(--d)) calc(0.707*var(--d)) 0 3px,
                calc(-1*var(--d))     calc(0*var(--d))     0 4px,
                calc(-0.707*var(--d)) calc(-0.707*var(--d))0 5px,
                calc(0*var(--d))      calc(-1*var(--d))    0 6px;
            animation: l27 1s infinite steps(8);
            }
            @keyframes l27 {
            100% {transform: rotate(1turn)}
            }

            /* Overlay لتغطية الصفحة */
            #loaderOverlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(255, 255, 255, 0.7);
                display: none;
                /* مخفي افتراضياً */
                justify-content: center;
                align-items: center;
                z-index: 9999;
            }
    </style>
</head>

<body>
    <div id="loaderOverlay">
        <div class="loader"></div>
    </div>
    <div class="card-wrapper">
        <div class="invite-card">

            <div class="logo2">
                <img src="{{ asset('public/est/logo.png') }}" alt="logo">
                <img src="{{ asset('public/est/logo2.png') }}" alt="logo2">
            </div>

            <h1 class="text-header">
                ملتقى استدامة للتقنيات الزراعية الثاني <br>
            </h1>



            <p class="slogon">التسجيل في ورش الملتقى</p>



            <button class="btn-confirm" id="reg">
                سجل الأن
            </button>
        </div>
    </div>
    <script>
    const btn = document.getElementById('reg');
    const loader = document.getElementById('loaderOverlay');

    btn.addEventListener('click', function() {
        // عرض الـ loader فور الضغط على الزر
        loader.style.display = 'flex';

        // الانتظار دقيقة واحدة قبل الانتقال
            window.location.href = '{{ route('workshop.create') }}';
    });
</script>
</body>

</html>
