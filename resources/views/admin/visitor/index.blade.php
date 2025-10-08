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
            width: 100%;
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

                        <form class="form-horizontal mt-4 pt-2" method="post" action="{{ route('visitor.store') }}"
                            id="reg-form">
                            @csrf
                            <div class="mb-2">
                                <h5> الاسم </h5>
                                <input type="text" id="name" name="name" value="{{ old('name') ?? '' }}"
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

                            <div class="mb-2">
                                <h5>البريد الالكتروني </h5>
                                <input type="email" id="email" value="{{ old('email') ?? '' }}" name="email"
                                    class="form-control" />
                            </div>

                            <div class="mb-2">
                                <h5>العمر </h5>
                                <input type="number" class="form-control" value="{{ old('age') ?? '' }}" id="age"
                                    name="age" />

                            </div>

                            <div class="mb-2">
                                <h5>الجنس </h5>
                                <select type="text" id="gender" class="form-control" name="gender">
                                    <option value="">--اختر--</option>
                                    <option value="ذكر" {{ old('gender') == 'ذكر' ? 'selected' : '' }}>ذكر
                                    </option>
                                    <option value="أنثى" {{ old('gender') == 'أنثى' ? 'selected' : '' }}>
                                        أنثى</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                    <label for="days" class="form-label">وقت الحضور </label>
                                    <select id="days" name="days"
                                        class="form-select form-control ">
                                        <option value="">-- اختر --</option>
                                        <option value="اليوم الأول"
                                            {{ old('days') == 'اليوم الأول' ? 'selected' : '' }}>اليوم الأول
                                        </option>
                                        <option value="اليوم الثاني"
                                            {{ old('days') == 'اليوم الثاني' ? 'selected' : '' }}>اليوم الثاني
                                        </option>
                                        <option value="اليوم الأول والثاني"
                                            {{ old('days') == 'اليوم الأول والثاني' ? 'selected' : '' }}>اليوم الأول
                                            والثاني
                                        </option>
                                    </select>

                                </div>

                            <div class="mb-2">
                                <h5>المسمى الوظيفي </h5>
                                <input type="text" class="form-control" id="job_title" name="job_title"
                                    value="{{ old('job_title') ?? '' }}" />

                            </div>

                            <div class="mb-2">
                                <h5>جهة العمل </h5>
                                <input type="text" class="form-control" id="organization" name="organization"
                                    value="{{ old('organization') ?? '' }}" />

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
@endpush
