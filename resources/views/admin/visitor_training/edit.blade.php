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
            width: 100%;
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

                        <form method="POST" id="addNewVisitor" enctype="multipart/form-data"
                            action="{{ route('UpdateVisitros', $member->id) }}">
                            @csrf
                            @method('put')

                            <div class="form-group mt-2">
                                <label for="name">الاسم <span class="red">*</span></label>
                                <input type="text" name="name" value="{{ old('name', $member->name) }}"
                                    class="form-control" maxlength="20" required>
                            </div>

                            <div class="form-group mt-2">
                                <label for="mobile">رقم الجوال <span class="red">*</span></label>
                                <input type="tel" id="mobile" class="form-control" value="{{ $member->mobile }}"
                                    required>
                                <input type="hidden" name="mobile" id="full_mobile">
                            </div>

                            <div class="form-group mt-2">
                                <label for="email">البريد الإلكتروني <span class="red">*</span></label>
                                <input type="email" name="email" value="{{ old('email', $member->email) }}"
                                    class="form-control" required>
                            </div>

                            <div class="form-group mt-2">
                                <label for="age">العمر</label>
                                <input type="number" name="age" value="{{ old('age', $member->age) }}"
                                    class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label for="gender">الجنس</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">-- اختر --</option>
                                    <option value="ذكر" {{ $member->gender == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                                    <option value="أنثى" {{ $member->gender == 'أنثى' ? 'selected' : '' }}>أنثى</option>
                                </select>
                            </div>

                            <div class="form-group mt-2">
                                <label for="job_title">المسمى الوظيفي</label>
                                <input type="text" name="job_title" value="{{ old('job_title', $member->job_title) }}"
                                    class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label for="organization">جهة العمل</label>
                                <input type="text" name="organization"
                                    value="{{ old('organization', $member->organization) }}" class="form-control">
                            </div>

                            <div class="form-group mt-2">
                                <label>ماهي التقنيات التي تريد التعرف عليها</label>
                                @php
    $technologies = old('technologies', is_array($member->technologies) ? $member->technologies : []);
                                @endphp
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="technologies[]" value="1"
                                        id="greenhouse" {{ in_array(1, $technologies) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="greenhouse">تقنيات البيوت المحمية</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="technologies[]" value="2"
                                        id="soilless" {{ in_array(2, $technologies) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="soilless">تقنيات الزراعة بدون تربة</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="technologies[]" value="3"
                                        id="vertical" {{ in_array(3, $technologies) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="vertical">تقنيات الزراعة العمودية</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="technologies[]" value="4"
                                        id="fertilizers" {{ in_array(4, $technologies) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="fertilizers">الأسمدة وتغذية النباتات</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="technologies[]" value="5"
                                        id="processing" {{ in_array(5, $technologies) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="processing">الصناعات التحويلية للمخلفات
                                        الزراعية</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="technologies[]" value="6"
                                        id="precision" {{ in_array(6, $technologies) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="precision">الزراعة الدقيقة</label>
                                </div>
                            </div>

                            <div class="form-group mt-2">
                                <label for="other">أخرى</label>
                                <input type="text" name="other" value="{{ old('other', $member->other) }}"
                                    class="form-control">
                            </div>

                            <div class="form-group mt-4 text-center">
                                <button type="submit" class="btn btn-info">حفظ التعديلات</button>
                            </div>

                            <span class="exhebSuccessMsg"><i class="fa fa-check"></i> تمت العملية بنجاح</span>
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
        const phoneInput = document.querySelector("#mobile");
        const iti = window.intlTelInput(phoneInput, {
            separateDialCode: true,
            preferredCountries: ["sa", "ae", "eg"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
        });

        const form = document.querySelector("#addNewVisitor");
        form.addEventListener("submit", function(e) {
            if (!iti.isValidNumber()) {
                e.preventDefault();
                alert("رقم الجوال غير صحيح، يرجى التأكد من صحته.");
                return;
            }
            document.querySelector("#full_mobile").value = iti.getNumber();
        });
    </script>
@endpush
