<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>الرياض-تسجيل</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="icon" href="{{ asset('public/masiratna/assets/Images/Masiratna-header-logo.png') }}" type="image/png"> --}}

    <link rel="icon" type="image/png" href="{{ asset('public/masiratna/assets/favicon/favicon-96x96.png') }}"
        sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('public/masiratna/assets/favicon/favicon.svg') }}" />
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('public/masiratna/assets/favicon/apple-touch-icon.png') }}" />
    <meta name="apple-mobile-web-app-title" content="Masiratna" />
    <link rel="manifest" href="{{ asset('public/masiratna/assets/favicon/site.webmanifest') }}" />


    <!-- أيقونات Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- خط Cairo -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css"
        rel="stylesheet" />

    <style>
        @font-face {
            font-family: "Tajawal";
            src: url("public/masiratna/assets/Fonts/Arabic-Tajawal/Tajawal-ExtraLight.ttf") format("truetype");
            font-weight: 200;
        }

        @font-face {
            font-family: "Tajawal";
            src: url("public/masiratna/assets/Fonts/Arabic-Tajawal/Tajawal-Light.ttf") format("truetype");
            font-weight: 300;
        }

        @font-face {
            font-family: "Tajawal";
            src: url("public/masiratna/assets/Fonts/Arabic-Tajawal/Tajawal-Regular.ttf") format("truetype");
            font-weight: 400;
        }

        @font-face {
            font-family: "Tajawal";
            src: url("public/masiratna/assets/Fonts/Arabic-Tajawal/Tajawal-Medium.ttf") format("truetype");
            font-weight: 500;
        }

        @font-face {
            font-family: "Tajawal";
            src: url("public/masiratna/assets/Fonts/Arabic-Tajawal/Tajawal-Bold.ttf") format("truetype");
            font-weight: 700;
        }

        @font-face {
            font-family: "Tajawal";
            src: url("public/masiratna/assets/Fonts/Arabic-Tajawal/Tajawal-ExtraBold.ttf") format("truetype");
            font-weight: 800;
        }

        @font-face {
            font-family: "Tajawal";
            src: url("public/masiratna/assets/Fonts/Arabic-Tajawal/Tajawal-Black.ttf") format("truetype");
            font-weight: 900;
        }

        :root {
            --gold: #c09c58;
            --dark: #000000;
            --light: #f5efe4;
            --transition: all 0.3s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: var(--dark);
            font-family: "Tajawal";
            color: #fff;
            line-height: 1.6;
        }

        .iti {
            width: 100%;
            color: #000000;
            margin-bottom: 15px;
        }

        /* التكيف مع الشاشات الصغيرة */
        .container {
            width: min(1200px, 95%);
            margin: 0 auto;
            padding: 20px 10px;
            display: grid;
            grid-template-columns: 1fr;
            gap: 30px;
        }

        /* البطاقات العامة */
        .card {
            background: var(--dark);
            border: 1px solid var(--gold);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 0 15px rgba(192, 156, 88, 0.2);
            transition: var(--transition);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(192, 156, 88, 0.3);
        }

        h2 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 30.9px;
            color: var(--gold);

        }

        .underline {
            display: block;
            width: 60px;
            height: 3px;
            background: var(--gold);
            margin: 5px auto 25px;
            border-radius: 3px;
        }

        /* بطاقة الحدث */
        .event-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            font-size: 1rem;
        }

        .event-header span {
            color: var(--gold);
            font-weight: bold;
        }

        .event-box .Jeddah-Hilton-img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
            object-fit: cover;
        }

        .event-box .Jeddah-Hilton-img2 {
            width: 50%;

            object-fit: cover;
        }



        .event-details {
            font-size: 13px;
            line-height: 1.6;
        }





        .event-details .icon {
            width: 40px;
            height: 40px;
            margin-left: 8px;
            margin-bottom: 5px;
            vertical-align: middle;
        }

        /* أزرار الحدث */
        .event-buttons {
            display: grid;
            grid-template-columns: 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }

        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 4px;
            color: #fff;
            font-weight: 700;
            border: 1px solid var(--gold);
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: var(--transition);
            text-decoration: none;
        }

        .icon2 {
            width: 40px;
            height: 40px;
            margin-left: 10px;
            vertical-align: middle;
        }

        .btn:hover {
            background: linear-gradient(45deg, #e1b96d, var(--gold));
            transform: translateY(-2px);
        }

        /* العد التنازلي */
        .countdown {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            text-align: center;
            padding-top: 15px;
            margin-top: auto;
            gap: 10px;
        }

        .countdown span {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: white;
            font-size: clamp(1.5rem, 8vw, 3rem);
        }

        .countdown div {
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            padding: 0 10px;
        }

        .countdown div:not(:last-child) {
            border-left: 1px solid #f5eeee;
        }

        .countdown small {
            font-weight: bold;
            font-size: clamp(0.8rem, 2.5vw, 1.1rem);
        }


        /* بطاقة التسجيل */
        /* بطاقة التسجيل */
        .register-box {
            display: flex;
            flex-direction: column;
        }

        .register-box form {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .register-box input,
        .register-box button {
            width: 100%;
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-family: 'Cairo', sans-serif;
            font-size: 20.1px;
        }

        .register-box input:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(192, 156, 88, 0.2);
            outline: none;
        }

        .register-box button {
            background: linear-gradient(90deg, #c09c58, #b88a3c);
            color: #000;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: 0.3s ease;
            font-size: clamp(1rem, 3vw, 1.4rem);
        }

        .register-box button:hover {
            background: linear-gradient(90deg, #b88a3c, #c09c58);
            transform: scale(1.03);
        }

        .success-msg {
            font-size: 22.1px;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
            font-weight: bold;
            color: var(--gold);
        }

        /* اجعل الأعمدة أقل عددياً وكل خانة أعرض */
        .partners-logos {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            /* بدل 120px إلى 160px أو 200px */
            gap: 30px;
            align-items: center;
            justify-items: center;
        }

        /* زيّن الحجم الفعلي للصور */
        .partners-logos img {
            width: 100%;
            max-width: 220px;
            /* أقصى عرض للشعار — زِد القيمة إن أردت أكبر */
            max-height: 120px;
            /* ارتفاع أقصى — زِد القيمة إن أردت */
            object-fit: contain;
            opacity: 0.95;
            transition: var(--transition);
            border: 1px solid var(--gold);
            border-radius: 8px;
            padding: 12px;
            background: var(--dark);
        }

        /* الفوتر */
        .footer {
            background: var(--light);
            padding: 30px 20px 0;
            text-align: center;
            margin-top: 40px;
        }

        .footer-container {
            max-width: 900px;
            margin: 0 auto;
        }

        /* أزرار الاتصال */
        .footer-contacts {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .contact-btn {
            display: inline-flex;
            align-items: center;
            justify-content: flex-start;
            background-color: #000;
            color: #fff;
            padding: 12px 24px;
            border-radius: 20px;
            font-weight: 700;
            text-decoration: none;
            transition: 0.3s;
            gap: 30px;
            direction: ltr;
            font-size: clamp(0.8rem, 2.5vw, 1.1rem);
        }

        .contact-btn i {
            color: var(--gold);
            font-size: 1.2rem;
        }

        .contact-btn:hover {
            background-color: #333;
            transform: scale(1.05);
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 31px;
            border: 1px solid var(--gold);
            border-radius: 20px;
            color: var(--dark);
            text-decoration: none;
            transition: var(--transition);
            margin-bottom: 40px;
            font-size: clamp(0.9rem, 2.5vw, 1.1rem);
        }

        .back-btn:hover {
            background: var(--gold);
        }

        /* الفوتر السفلي */
        .footer-bottom {
            width: 100%;
            background: var(--dark);
            color: #fff;
            margin-top: 20px;
            font-size: 0.9rem;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
        }








        .register-box form input,
        .register-box form button {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 20.1px;
            font-weight: bold;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        .register-box form button {
            background: linear-gradient(90deg, #c09c58, #b88a3c);
            color: #000000;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .register-box form button:hover {
            background: linear-gradient(90deg, #b88a3c, #c09c58);
            transform: scale(1.03);
        }

        /* تحسينات للشاشات المتوسطة */
        @media (min-width: 768px) {
            .container {
                grid-template-columns: 1fr 1fr;
            }

            .partners-card {
                grid-column: span 2;
            }

            .event-buttons .btn {
                font-size: 1rem;
                padding: 12px;
            }

            .event-details {
                font-size: 14px;
            }




        }

        .error-msg {
            color: #ff4d4d;
            /* أحمر واضح */
            font-size: 13px;
            margin-top: 5px;
            margin-bottom: 0;
            display: block;
            text-align: right;
            font-weight: bold;
        }

        .form-group input:invalid {
            border: 1px solid #ff4d4d;
        }

        .form-group input:focus:invalid {
            outline: none;
            box-shadow: 0 0 5px rgba(255, 77, 77, 0.7);
        }

        /* تحسينات للشاشات الكبيرة */
        @media (min-width: 992px) {
            .container {
                grid-template-columns: 1fr 1fr;
            }

            .card {
                padding: 30px;
            }

            .event-details {
                font-size: 18px;
            }


        }



        /* تحسينات للشاشات الصغيرة جدًا */
        @media (max-width: 480px) {
            .event-buttons {
                grid-template-columns: 1fr;
            }



            .countdown div:nth-child(odd) {
                border-left: none;
            }


            .footer-contacts {
                flex-direction: column;
                align-items: center;
            }

            .countdown {
                grid-template-columns: repeat(3, 1fr) !important;
                /* 3 أعمدة دايمًا */
                gap: 5px;
            }

            .countdown div {
                padding: 5px;
                border-left: none !important;
                /* نشيل الخط الفاصل */
            }

            .footer-contacts {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .contact-btn {
                width: 100%;
                justify-content: center;
                font-size: 1rem;
                padding: 12px;
            }

            .footer-contacts {
                flex-direction: column;
                align-items: stretch;
                gap: 10px;
            }

            .contact-btn {
                width: 100%;
                justify-content: center;
                font-size: 1rem;
                padding: 12px;
            }
        }








        @media (min-width: 1200px) {
            .event-details {
                font-size: 23px;

            }
        }

        .iti-mobile .iti__country {
            padding: 8px 40px;
            line-height: 1.5em;
        }
    </style>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-984850681"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-984850681');
    </script>

    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '3991251947793865');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1"
            src="https://www.facebook.com/tr?id=3991251947793865&ev=PageView&noscript=1" />
    </noscript>

    <script type="text/javascript">
        _linkedin_partner_id = "8634081";
        window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
        window._linkedin_data_partner_ids.push(_linkedin_partner_id);
    </script>
    <script type="text/javascript">
        (function(l) {
            if (!l) {
                window.lintrk = function(a, b) {
                    window.lintrk.q.push([a, b])
                };
                window.lintrk.q = []
            }
            var s = document.getElementsByTagName("script")[0];
            var b = document.createElement("script");
            b.type = "text/javascript";
            b.async = true;
            b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
            s.parentNode.insertBefore(b, s);
        })(window.lintrk);
    </script>
    <noscript>
        <img height="1" width="1" style="display:none;" alt=""
            src="https://px.ads.linkedin.com/collect/?pid=8634081&fmt=gif" />
    </noscript>

    <script>
        ! function(e, t, n, s, u, a) {
            e.twq || (s = e.twq = function() {
                    s.exe ? s.exe.apply(s, arguments) : s.queue.push(arguments);
                },
                s.version = '1.1', s.queue = [], u = t.createElement(n), u.async = !0, u.src =
                'https://static.ads-twitter.com/uwt.js',
                a = t.getElementsByTagName(n)[0], a.parentNode.insertBefore(u, a))
        }(window, document, 'script');
        twq('init', 'o0dbp'); // Twitter/X Pixel ID
        twq('track', 'PageView');
    </script>

    <!-- TikTok Pixel Code Start -->
    <script>
        ! function(w, d, t) {
            w.TiktokAnalyticsObject = t;
            var ttq = w[t] = w[t] || [];
            ttq.methods = ["page", "track", "identify", "instances", "debug", "on", "off", "once", "ready", "alias",
                "group", "enableCookie", "disableCookie", "holdConsent", "revokeConsent", "grantConsent"
            ], ttq.setAndDefer = function(t, e) {
                t[e] = function() {
                    t.push([e].concat(Array.prototype.slice.call(arguments, 0)))
                }
            };
            for (var i = 0; i < ttq.methods.length; i++) ttq.setAndDefer(ttq, ttq.methods[i]);
            ttq.instance = function(t) {
                for (
                    var e = ttq._i[t] || [], n = 0; n < ttq.methods.length; n++) ttq.setAndDefer(e, ttq.methods[n]);
                return e
            }, ttq.load = function(e, n) {
                var r = "https://analytics.tiktok.com/i18n/pixel/events.js",
                    o = n && n.partner;
                ttq._i = ttq._i || {}, ttq._i[e] = [], ttq._i[e]._u = r, ttq._t = ttq._t || {}, ttq._t[e] = +new Date,
                    ttq._o = ttq._o || {}, ttq._o[e] = n || {};
                n = document.createElement("script");
                n.type = "text/javascript", n.async = !0, n.src = r + "?sdkid=" + e + "&lib=" + t;
                e = document.getElementsByTagName("script")[0];
                e.parentNode.insertBefore(n, e)
            };


            ttq.load('D2M1QVBC77U4ENLNJ9N0');
            ttq.page();
        }(window, document, 'ttq');
    </script>
    <!-- TikTok Pixel Code End -->
</head>

<body>
    <div class="container">
        <!-- بطاقة الحدث -->
        <div class="card event-box">
            <div class="event-header">
                <span style="font-weight: bold;font-size:30.9px;">الريـــــاض</span>
                <img class="Jeddah-Hilton-img2" src="{{ asset('public/masiratna/assets/Images/movinpiclogo.png') }}"
                    alt="Jeddah Hilton">
            </div>
            <img class="Jeddah-Hilton-img" src="{{ asset('public/masiratna/assets/Images/riyadh_hotel.jpg') }}"
                alt="Jeddah Hilton">
            <div class="event-details">
                <p>
                    <img src="{{ asset('public/masiratna/assets/Images/location.png') }}" alt="الموقع" class="icon">
                    <a href="https://maps.app.goo.gl/eRFCWfq8HpkRw97E9" style="text-decoration: none;color: white;">فندق
                        موفنبيك الرياض، الطريق الدائري الشمالي</a>

                </p>
                <p>
                    <img src="{{ asset('public/masiratna/assets/Images/hall.png') }}" alt="قاعة" class="icon">
                    قاعة أوبال
                </p>
                <p>
                    <img src="{{ asset('public/masiratna/assets/Images/calendar-dark.png') }}" alt="التاريخ"
                        class="icon">
                    9 سبتمبر 2025
                </p>
                <p>
                    <img src="{{ asset('public/masiratna/assets/Images/time.png') }}" alt="الوقت" class="icon">
                    04:00 عصراً - 09:00 ليلاً
                </p>
            </div>
            <div class="event-buttons">
                <a href="https://maps.app.goo.gl/eRFCWfq8HpkRw97E9" target="_blank" class="btn">
                    <img src="{{ asset('public/masiratna/assets/Images/google_maps.png') }}" alt="قاعة"
                        class="icon2">خريطة الموقع
                </a>
            </div>
            <div class="countdown">
                <div>
                    <span id="days">00</span>
                    <small>يوم</small>
                </div>
                <div>
                    <span id="hours">00</span>
                    <small>ساعة</small>
                </div>
                <div>
                    <span id="minutes">00</span>
                    <small>دقيقة</small>
                </div>

            </div>
        </div>

        <!-- بطاقة التسجيل -->
        <div class="card register-box">
            <h2>سجل هنا</h2>
            <span class="underline"></span>

                @if (session('success'))
                    <p class="success-msg">{{ session('success') }}</p>
                @endif
            <form action="{{ route('masiratna.RiyadhRegistration') }}" method="POST" id="registrationForm"
                onsubmit="fireTrackingEvents()">
                @csrf
                <input type="text" name="name" placeholder="أدخل اسمك الكامل" value="{{ old('name') }}">
                @error('name')
                    <p class="error-msg">{{ $message }}</p>
                @enderror

                <input type="email" name="email" placeholder="أدخل بريدك الإلكتروني" value="{{ old('email') }}">
                @error('email')
                    <p class="error-msg">{{ $message }}</p>
                @enderror

                <input type="tel" id="mobile" class="form-control" required />
                <input type="hidden" name="mobile" id="full_mobile" />
                @error('mobile')
                    <p class="error-msg">{{ $message }}</p>
                @enderror

                <input type="text" name="city" value="الرياض" readonly>
                @error('city')
                    <p class="error-msg">{{ $message }}</p>
                @enderror

                <button type="submit" style="font-weight:bold;"> سجل الآن</button>

            </form>
        </div>


        <!-- بطاقة الجهات المشاركة -->
        <div class=" partners-card">
            <h2>الجهات المشاركة في المعرض</h2>
            <span class="underline"></span>
            <div class="partners-logos">

                <img src="{{ asset('public/masiratna/assets/UNI Logos/1.png') }}" alt="image_1">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/2.png') }}" alt="image_2">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/3.png') }}" alt="image_3">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/4.png') }}" alt="image_4">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/5.png') }}" alt="image_5">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/6.png') }}" alt="image_6">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/7.png') }}" alt="image_7">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/28.png') }}" alt="image_28">

                <img src="{{ asset('public/masiratna/assets/UNI Logos/9.png') }}" alt="image_9">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/10.png') }}" alt="image_10">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/11.png') }}" alt="image_11">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/12.png') }}" alt="image_12">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/13.png') }}" alt="image_13">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/14.png') }}" alt="image_14">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/15.png') }}" alt="image_15">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/16.png') }}" alt="image_16">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/17.png') }}" alt="image_17">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/8.png') }}" alt="image_8">

                <img src="{{ asset('public/masiratna/assets/UNI Logos/19.png') }}" alt="image_19">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/20.png') }}" alt="image_20">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/21.png') }}" alt="image_21">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/22.png') }}" alt="image_22">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/23.png') }}" alt="image_23">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/24.png') }}" alt="image_24">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/25.png') }}" alt="image_25">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/26.png') }}" alt="image_26">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/27.png') }}" alt="image_27">
                <img src="{{ asset('public/masiratna/assets/UNI Logos/18.png') }}" alt="image_18">


                <img src="{{ asset('public/masiratna/assets/UNI Logos/29.png') }}" alt="image_29">


            </div>
        </div>
    </div>

    <!-- الفوتر -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-contacts">
                <a href="https://wa.me/+966592364444" target="_blank" class="contact-btn">
                    <i class="fa-brands fa-whatsapp"></i>
                    +966 59 236 4444
                </a>
                <a href="https://wa.me/+966551468888" target="_blank" class="contact-btn">
                    <i class="fa-brands fa-whatsapp"></i>
                    +966 55 146 8888
                </a>
                <a href="mailto:info@masiratna.com" class="contact-btn">
                    <i class="fa-solid fa-envelope"></i>
                    info@masiratna.com
                </a>
            </div>

            <a href="{{ route('masiratna.index') }}" class="back-btn">الرجوع للصفحة الرئيسية</a>
        </div>
    </footer>

    <div class="footer-bottom">©Masiratna 2025</div>


    <script>
        // عد تنازلي
        function updateCountdown() {
            const countDownDate = new Date("Sep 9, 2025 21:00:00").getTime();
            const now = new Date().getTime();
            const distance = countDownDate - now;

            if (distance > 0) {
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

                document.getElementById("days").textContent = days.toString().padStart(2, '0');
                document.getElementById("hours").textContent = hours.toString().padStart(2, '0');
                document.getElementById("minutes").textContent = minutes.toString().padStart(2, '0');
            } else {
                document.querySelector(".countdown").innerHTML =
                    '<div style="grid-column: span 4; color: var(--gold); font-weight: bold; padding: 10px;">انتهى الحدث</div>';
            }
        }

        // تحديث العد التنازلي كل ثانية
        updateCountdown();
        setInterval(updateCountdown, 1000);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script>
        const phoneInput = document.querySelector("#mobile");

        const iti = window.intlTelInput(phoneInput, {
            initialCountry: "auto",
            geoIpLookup: function(callback) {
                fetch("https://ipapi.co/json/") // خدمة مجانية تجيب كود الدولة
                    .then(res => res.json())
                    .then(data => callback(data.country_code))
                    .catch(() => callback("sa")); // إذا فشل الطلب نخلي السعودية
            },
            separateDialCode: true,
            preferredCountries: ["sa", "ae", "eg"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
        });

        // عند الإرسال نخزن الرقم الكامل
        const form = document.querySelector("#registrationForm");
        form.addEventListener("submit", function(e) {
            if (!iti.isValidNumber()) {
                e.preventDefault();
                alert("رقم الجوال غير صحيح.");
                return;
            }
            document.querySelector("#full_mobile").value = iti.getNumber();
        });
    </script>

    <script>
        function fireTrackingEvents() {
            // Facebook
            fbq('track', 'CompleteRegistration');

            // Google Ads
            gtag('event', 'conversion', {
                'send_to': 'AW-984850681/lv2UCOzliJwaEPnBztUD'
            });


            // LinkedIn
            window.lintrk('track', {
                conversion_id: 23196521
            });

            // Twitter/X
            twq('event', 'tw-o0dbp-qdxgj');

            // TikTok
            ttq.track('CompleteRegistration', {
                value: 0,
                currency: 'USD',
                contents: [{
                    content_id: 'registration_form',
                    content_type: 'form',
                    content_name: 'Complete Registration'
                }]
            });

            return true;
        }
    </script>







</body>

</html>
