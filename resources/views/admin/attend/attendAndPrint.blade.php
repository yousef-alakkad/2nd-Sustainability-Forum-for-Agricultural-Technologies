@extends('layouts.appp')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-base bd-0 overflow-hidden">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title mt-2">تسجيل الحضور الملتقى وطباعة </h5>
                </div>

                <div class="card-body pt-4">
                    <!-- قسم تسجيل الحضور -->
                    <section class="section section-new-user">
                        <h4 id="registeredMemberName" class="text-center"></h4>

                        <form id="add-form" method="POST" action="{{ url()->current() }}" class="needs-validation"
                            novalidate>
                            @csrf
                            <div class="form-material my-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <input type="text" class="form-control text-center" name="qrcode"
                                                id="qrcode" value="{{ old('badge_no') }}" required
                                                placeholder="ادخل رقم البادج">
                                            <div class="invalid-feedback">مطلوب</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center pt-4">
                                    <div class="col-md-6 text-center">
                                        <button type="submit" class="btn btn-success w-50">
                                            طباعة + تسجيل الحضور
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                    <!-- نهاية القسم -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(function() {
            $("#add-form").on('submit', function(e) {
                e.preventDefault();

                let $form = $(this);
                let url = $form.attr('action');
                let formData = $form.serialize();

                $('#registeredMemberName').text('');

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        toastr.success(response.message || 'تم الحفظ بنجاح');
                        $('#registeredMemberName').text(response.name);

                        // تنظيف الحقل بعد الإرسال
                        $("#qrcode").val('').focus();

                        // فتح صفحة البادج في نافذة جديدة
                        window.open(`../badge/${response.id}`, "_blank");
                    },
                    error: function(xhr) {
                        $("#qrcode").val('').focus();

                        if (xhr.responseJSON) {
                            let res = xhr.responseJSON;

                            // لو فيه رسالة عامة من السيرفر
                            if (res.message) {
                                toastr.error(res.message);
                            }

                            // لو فيه أخطاء تحقق (Validation Errors)
                            if (res.errors) {
                                $.each(res.errors, function(key, messages) {
                                    toastr.error(messages[0]); // يعرض أول خطأ فقط
                                    // لو حاب تضيف الخطأ تحت الحقل نفسه:
                                    $(`[name=${key}]`).addClass('is-invalid')
                                        .after(
                                            `<div class="invalid-feedback d-block">${messages[0]}</div>`
                                        );
                                });
                            }
                        } else {
                            toastr.error('حصل خطأ غير متوقع، حاول مرة أخرى');
                        }
                    }
                });

            });
        });
    </script>
@endpush
