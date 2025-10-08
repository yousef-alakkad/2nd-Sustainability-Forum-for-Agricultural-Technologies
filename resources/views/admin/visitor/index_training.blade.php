@extends('layouts.appp')

@section('css')
    <style>
        .red {
            color: red;
        }

        .error {
            color: red;
        }

        .alert-danger {
            background-color: red !important;
        }

        .exhebSuccessMsg {
            display: none;
            color: green;
            font-weight: bold;
        }

        select option:disabled {
            background-color: #eee;
            font-weight: bold;
        }

        .iti {
            position: relative !important;
            /* يخلي القائمة مرتبطة بالـ input */
            display: block;
            width: 100%;
        }

        .iti__country-list {
            left: 2px;
            top: 100% !important;
            /* تخلي القائمة تبدأ مباشرة تحت input */
            bottom: auto !important;
            margin-top: 2px;
            /* مسافة صغيرة */
            z-index: 9999;
            /* عشان ما تختفي خلف عناصر تانية */
        }



        input[type="checkbox"]:checked~.table-toolbar.title {
            display: none !important;
        }

        input[type="checkbox"]:checked~.table-toolbar.search {
            display: block !important;
        }

        .search {
            display: none;
        }

        .flex {
            flex: 1;
            box-sizing: border-box;
        }

        .table-group {
            margin-top: 15px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2), 0 1px 1px rgba(0, 0, 0, 0.14), 0 2px 1px -1px rgba(0, 0, 0, 0.12);
            background: white;
            border: 1px solid #ddd;
            border-radius: 2px;
        }

        .table-group .toolbar-tools {
            font-size: 20px;
            letter-spacing: .005em;
            font-weight: 400;
            display: flex;
            align-items: center;
            flex-direction: row;
            width: 100%;
            height: 50px;
            padding: 0 16px;
        }

        .table-group select,
        .table-group input {
            width: 100%;
            margin-left: 16px;
            border: none;
            background: transparent;
            color: rgba(0, 0, 0, 0.87);
            outline: none;
        }
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Add new Invitation</h4>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <p class="alert alert-success py-1 px-2"
                                style="background-color: rgb(40 199 111)!important;color: #fff!important;">
                                {{ Session::get('success') }}
                            </p>
                        @endif

                        @if (Session::has('error'))
                            <p class="alert alert-danger py-1 px-2" style="color: #fff!important;">
                                {{ Session::get('error') }}
                            </p>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $key => $error)
                                        <li>
                                            <p class="alert alert-danger py-1 px-2" style="color: #fff!important;">
                                                {{ $error }}
                                            </p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal mt-2 pt-2" method="post"
                            action="{{ route('visitor.store.Training') }}" id="reg-form">
                            @csrf

                            <div class="mb-3">
                                <h5> الاسم </h5>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="form-control" />
                            </div>

                            <div class="mb-3">
                                <h5>رقم الجوال</h5>
                                <input type="tel" id="mobile" name="mobile" class="form-control" />

                                <!-- الحقول المخفية -->
                                <input type="hidden" id="full" name="full" value="{{ old('full') }}">
                                <input type="hidden" id="country_code" name="country_code"
                                    value="{{ old('country_code') }}">

                                <p style="color: red" id="output"></p>
                            </div>
                            <div class="mb-3">
                                <h5>البريد الالكتروني </h5>
                                <input type="email" id="email" value="{{ old('email') }}" name="email"
                                    class="form-control" />
                            </div>

                            <div class="mb-3">
                                <h5>المنطقة</h5>
                                <select name="region" class="form-control select2" id="region">
                                    @php
                                        $regions = [
                                            'الرياض',
                                            'الشرقية',
                                            'عسير',
                                            'جازان',
                                            'المدينة المنورة',
                                            'القصيم',
                                            'حائل',
                                            'نجران',
                                            'الجوف',
                                            'الباحة',
                                            'الحدود الشمالية',
                                            'عرعر',
                                        ];
                                    @endphp
                                    @foreach ($regions as $region)
                                        <option value="{{ $region }}"
                                            {{ old('region') == $region ? 'selected' : '' }}>
                                            {{ $region }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <h5>الخلفية التعليمية </h5>
                                <input type="text" class="form-control" id="job_title" name="educational_background"
                                    value="{{ old('educational_background') }}" />
                            </div>

                            <div class="mb-3">
                                <h5>المسمى الوظيفي </h5>
                                <input type="text" class="form-control" id="job_title" name="job_title"
                                    value="{{ old('job_title') }}" />
                            </div>

                            <div class="mb-3">
                                <h5>جهة العمل </h5>
                                <input type="text" class="form-control" id="organization" name="organization"
                                    value="{{ old('organization') }}" />
                            </div>
                            <div class="mb-3">
                                <h5>ما مدى إجادتك للغة الإنجليزية</h5>

                               
                                <select name="english_level" id="english_level" class="form-control">
                                    <option value="">--أختر--</option>
                                    <option value="ممتاز" {{ old('english_level') == 'ممتاز' ? 'selected' : '' }}>ممتاز
                                    </option>
                                    <option value="جيدجدا" {{ old('english_level') == 'جيدجدا' ? 'selected' : '' }}>جيدجدا
                                    </option>
                                    <option value="جيد" {{ old('english_level') == 'جيد' ? 'selected' : '' }}>جيد
                                    </option>
                                    <option value="ضعيف" {{ old('english_level') == 'ضعيف' ? 'selected' : '' }}>ضعيف
                                    </option>
                                </select>
                            </div>


                            <div class="mb-3">
                                <h5>المستوى التعليمي </h5>
                                <div class="radio-group">
                                    @php
                                        $old_level = old('educational_level');
                                    @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="educational_level"
                                            id="bachelor" value="بكالوريوس"
                                            {{ $old_level == 'بكالوريوس' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="bachelor">بكالوريوس
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="educational_level"
                                            id="master" value="ماجستير" {{ $old_level == 'ماجستير' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="master">ماجستير
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="educational_level"
                                            id="phd" value="دكتوراه"
                                            {{ $old_level == 'دكتوراه' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="phd">دكتوراه
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="educational_level"
                                            id="other_level" value="other" {{ $old_level == 'other' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="other_level">Other</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control mt-2" id="other_input"
                                    name="educational_level_other" placeholder="اكتب المستوى التعليمي"
                                    style="{{ old('educational_level') == 'other' ? '' : 'display:none;' }}"
                                    value="{{ old('educational_level_other') }}">
                            </div>

                            <div class="text-center mt-3">
                                <button class="btn btn-primary waves-effect waves-light" id="reg-btn"
                                    style="background-color: #56af78;border-color: #56af78;"
                                    type="submit">{{ __('auth.reg') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script>
        const input = document.querySelector("#mobile");
        const fullInput = document.querySelector("#full");
        const codeInput = document.querySelector("#country_code");
        const output = document.querySelector("#output");

        const iti = window.intlTelInput(input, {
            preferredCountries: ["sa"],
            separateDialCode: true,
            nationalMode: true,
            utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
        });

        // ✅ استرجاع القيمة القديمة (من Laravel)
        @if (old('full'))
            iti.setNumber("{{ old('full') }}");
        @endif

        const handleChange = () => {
            let text;
            if (input.value) {
                if (iti.isValidNumber()) {
                    text = '';
                    $('#reg-btn').removeAttr('disabled');

                    // تحديث الحقول المخفية
                    fullInput.value = iti.getNumber(); // رقم كامل مثل +966512345678
                    codeInput.value = iti.getSelectedCountryData().dialCode; // رمز الدولة مثل 966
                } else {
                    text = "الرقم غير صالح - يرجى ادخال رقم صحيح";
                    $('#reg-btn').attr('disabled', 'disabled');
                }
            } else {
                text = "";
                $('#reg-btn').removeAttr('disabled');
            }
            output.textContent = text;
        };

        input.addEventListener('change', handleChange);
        input.addEventListener('keyup', handleChange);
    </script>

    <script>
        const otherRadio = document.getElementById('other_level');
        const otherInput = document.getElementById('other_input');
        const radios = document.querySelectorAll('input[name="educational_level"]');

        radios.forEach(radio => {
            radio.addEventListener('change', () => {
                if (otherRadio.checked) {
                    otherInput.style.display = 'block';
                    otherInput.required = true; // اجعل الحقل مطلوبًا عند اختياره
                    otherInput.focus();
                } else {
                    otherInput.style.display = 'none';
                    otherInput.required = false; // إزالة الخاصية المطلوبة
                }
            });
        });

        // لتأكد من عرض الحقل عند إعادة تحميل الصفحة إذا كانت القيمة السابقة "other"
        window.addEventListener('DOMContentLoaded', () => {
            if (otherRadio.checked) {
                otherInput.style.display = 'block';
                otherInput.required = true;
            }
        });
    </script>
@endpush
