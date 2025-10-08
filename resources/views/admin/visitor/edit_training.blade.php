@extends('layouts.appp')

@section('css')
    <style>
        .red,
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
            position: relative; /* مهم عشان القائمة ترتبط بالـ input */
            display: block;
            width: 100%;
        }

        .iti__country-list {
            left:2px;
            top: 100% !important;   /* تخليها تبدأ تحت السيليكت */
            bottom: auto !important;
            margin-top: 2px;        /* مسافة صغيرة */
            z-index: 9999;          /* عشان ما تختفي تحت عناصر ثانية */
        }


        .form-check-label {
            margin-left: 5px;
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
                        <h4>تعديل بيانات الزائر</h4>
                    </div>
                    <div class="card-body">

                        {{-- رسائل النجاح والخطأ --}}
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
                            <div class="alert alert-danger text-white">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>
                                            <p style="color: #ddd" class="mb-0">{{ $error }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal mt-2 pt-2" method="post"
                            action="{{ route('UpdateVisitros.Training', $member->id) }}" id="reg-form">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <h5> الاسم </h5>
                                <input type="text" id="name" name="name" value="{{ old('name', $member->name) }}"
                                    class="form-control" />
                            </div>

                            <div class="mb-3 form-group">
                                <h5>رقم الجوال</h5>
                                <input type="tel" id="mobile" value="{{ old('mobile', $member->mobile) }}"
                                    class="form-control" />
                                <p style="color: red" id="output"></p>
                            </div>

                            <div class="mb-3">
                                <h5>البريد الالكتروني </h5>
                                <input type="email" id="email" value="{{ old('email', $member->email) }}"
                                    name="email" class="form-control" />
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
                                            {{ old('region', $member->region) == $region ? 'selected' : '' }}>
                                            {{ $region }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <h5>الخلفية التعليمية </h5>
                                <input type="text" class="form-control" id="job_title" name="educational_background"
                                    value="{{ old('educational_background', $member->educational_background) }}" />
                            </div>

                            <div class="mb-3">
                                <h5>المسمى الوظيفي </h5>
                                <input type="text" class="form-control" id="job_title" name="job_title"
                                    value="{{ old('job_title', $member->job_title) }}" />
                            </div>

                            <div class="mb-3">
                                <h5>جهة العمل </h5>
                                <input type="text" class="form-control" id="organization" name="organization"
                                    value="{{ old('organization', $member->organization) }}" />
                            </div>
                            <div class="mb-3">
                                <h5>ما مدى إجادتك للغة الإنجليزية</h5>
                                <select name="english_level" id="english_level" class="form-control">
                                    <option value="">--أختر--</option>
                                    <option value="ممتاز"  {{ old('english_level', $member->english_level) == "ممتاز" ? 'selected' : '' }}>ممتاز
                                    </option>
                                    <option value="جيدجدا" {{ old('english_level', $member->english_level) == "جيدجدا" ? 'selected' : '' }}>جيدجدا
                                    </option>
                                    <option value="جيد" {{ old('english_level', $member->english_level) == "جيد" ? 'selected' : '' }}>جيد
                                    </option>
                                    <option value="ضعيف" {{ old('english_level', $member->english_level) == "ضعيف" ? 'selected' : '' }}>ضعيف
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <h5>المستوى التعليمي </h5>
                                <div class="radio-group">
                                    @php
                                        $l = ["بكالوريوس", "ماجستير", 'دكتوراه'];
                                        $level = old('educational_level', $member->educational_level);
                                    @endphp
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="educational_level"
                                            id="bachelor" value="بكالوريوس"
                                            {{ $level == "بكالوريوس" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="bachelor"> بكالوريوس</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="educational_level"
                                            id="master" value="ماجستير" {{ $level == "ماجستير" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="master"> ماجستير</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="educational_level"
                                            id="phd" value="دكتوراه" {{ $level == 'دكتوراه' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="phd"> دكتوراه</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="educational_level"
                                            id="other_level" value="other"
                                            {{ $level == 'other' || !in_array($member->educational_level, $l) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="other_level">اخرى</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control mt-2" id="other_input"
                                    name="educational_level_other" placeholder="اكتب المستوى التعليمي"
                                    style="{{ in_array($member->educational_level, $l) ? 'display:none;' : '' }}"
                                    value="{{ old('educational_level_other', $member->educational_level) }}">
                            </div>

                            <div class="text-center mt-3">
                                <button class="btn btn-primary waves-effect waves-light" id="reg-btn"
                                    style="background-color: #56af78;border-color: #56af78;" type="submit">
                                    حفظ التعديلات
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
        document.addEventListener('DOMContentLoaded', function() {


            // التعامل مع حقل Other في المستوى التعليمي
            const otherRadio = document.getElementById('other_level');
            const otherInput = document.getElementById('other_input');
            const radios = document.querySelectorAll('input[name="educational_level"]');

            radios.forEach(radio => {
                radio.addEventListener('change', () => {
                    if (otherRadio.checked) {
                        otherInput.style.display = 'block';
                        otherInput.required = true;
                        otherInput.focus();
                    } else {
                        otherInput.style.display = 'none';
                        otherInput.required = false;
                    }
                });
            });

            // عند تحميل الصفحة، إذا كان Other محدد مسبقاً
            if (otherRadio.checked) {
                otherInput.style.display = 'block';
                otherInput.required = true;
            }

        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const phoneInput = document.querySelector("#mobile");
            if (phoneInput) {
                const iti = window.intlTelInput(phoneInput, {
                    separateDialCode: true,
                    preferredCountries: ["sa", "ae", "eg"],
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
                });

                // ✅ ضبط الرقم المخزن سابقًا إذا كان موجود
                @if (old('mobile', $member->mobile))
                    iti.setNumber("{{ old('mobile', $member->mobile) }}");
                @endif

                const form = document.querySelector("#reg-form");
                if (form) {
                    form.addEventListener("submit", function(e) {
                        if (!iti.isValidNumber()) {
                            e.preventDefault();
                            alert("رقم الجوال غير صحيح، يرجى التأكد من صحته.");
                            return;
                        }
                        let hiddenInput = document.querySelector("#full_mobile");
                        if (!hiddenInput) {
                            hiddenInput = document.createElement('input');
                            hiddenInput.type = 'hidden';
                            hiddenInput.name = 'mobile';
                            hiddenInput.id = 'full_mobile';
                            form.appendChild(hiddenInput);
                        }
                        hiddenInput.value = iti.getNumber();
                    });
                }
            }
        });
    </script>
    </script>
@endpush
