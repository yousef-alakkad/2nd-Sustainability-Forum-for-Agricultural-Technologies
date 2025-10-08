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
    top: 100% !important;   /* تخليها تبدأ تحت السيليكت */
    bottom: auto !important;
    margin-top: 2px;        /* مسافة صغيرة */
    z-index: 9999;          /* عشان ما تختفي تحت عناصر ثانية */
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
                                <label for="days">وقت الحضور</label>
                                <select name="days" id="days" class="form-control">
                                    <option value="">-- اختر --</option>
                                    <option value="اليوم الأول" {{ $member->days == 'اليوم الأول' ? 'selected' : '' }}>اليوم الأول</option>
                                    <option value="اليوم الثاني" {{ $member->days == 'اليوم الثاني' ? 'selected' : '' }}>اليوم الثاني</option>
                                    <option value="اليوم الأول والثاني" {{ $member->days == 'اليوم الأول والثاني' ? 'selected' : '' }}>اليوم الأول والثاني</option>
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
