@extends('layouts.appp')

@section('css')
<style>
    .red, .error { color: red; }
    .alert-danger { background-color: red !important; }

    .dtsb-criteria { width: 100%; margin: auto; text-align: center; }
    .dtsb-inputCont { display: initial; }
    div.dtsb-searchBuilder { margin-bottom: -2rem; }
</style>
@endsection

@section('content')
<div id="content">
    <input type="hidden" id="route" value="{{ $route }}"/>

    <div class="container-fluid">
        <div class="card shadow mb-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <a class="btn" data-toggle="modal" data-target="#exampleModal" style="font-weight:bold;float:right;font-size:1.2rem">
                        جدول الحضور التدريب
                    </a>
                    <br>
                    <a class="btn">التاريخ: {{$eventDate}}</a>
                </h6>
                <div class="row">
                    <div class="col-md-12">
                        <h4 style="text-align:center">الاسم </h4>
                        <span id="name"></span>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered yajra-datatable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>التسلسل</th>
                                <th>الاسم</th>
                                <th>البريد الالكتروني</th>
                                <th>رقم الجوال</th>
                                <th>وقت الحضور</th>
                                <th>الإجراء</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style')
<link href="{{ asset('assets/SmartWizard/bootstrap.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/SmartWizard/theme-ar.css')}}" rel="stylesheet" type="text/css" />
@endpush

@push('script')
<script src="{{ asset('assets/SmartWizard/jquery.min.js')}}"></script>
<script src="{{ asset('assets/SmartWizard/bootstrap.js')}}"></script>

{{-- Bootbox (لو مش موجود عندك محليًا) --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js" integrity="sha512-tbZy0tQe9tHZiHN1f+Vw8yH8vP5ZVn0mKk3t2oXx4mJ6uZkR9QYy1xY9s4EoJ1aX1Z3G8lqS4m3C2vU8j8r6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('assets/SmartWizard/custom_js.js')}}"></script>
<script src="{{ asset('assets/SmartWizard/validator.min.js')}}"></script>
<script src="{{ asset('assets/admin/lib/SmartWizard/dist/js/jquery.smartWizard.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
<script src="https://nightly.datatables.net/searchbuilder/js/dataTables.searchBuilder.js"></script>

<script type="text/javascript">
$(function () {
    // 1) إعداد CSRF مرة واحدة
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    // 2) إعداد toastr مرة واحدة
    toastr.options = {
        "positionClass": "toast-top-right",
        "timeOut": 5000
    };

    // 3) جدول الحضور
    var table = $('.yajra-datatable').DataTable({
        ajax: $('#route').val(),
        columns: [
            {data: 'name', name: 'name'},  // للتسلسل (سيُعاد حسابه بالرندر)
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'mobile', name: 'mobile'},
            {data: 'time', name: 'time'},
            {data: 'action', name: 'action'}
        ],
        columnDefs: [
            {
                targets: 0,
                render: function (data, type, full, meta) {
                    return meta.row + 1; // رقم تسلسلي
                }
            },
            {
                targets: -1,
                render: function (data, type, full) {
                    let id = full['id'];
                    let delUrl = "{{ route('attends.destroy', ':id') }}".replace(':id', id);
                    return `
                        <a title="حذف" class="btn btn-danger btn-sm delete_btn" href="${delUrl}">
                            <i class="fa fa-trash"></i>
                        </a>

                    `;
                }
            }
        ],
        initComplete: function () {
            // فلتر أسماء في رأس الجدول المخصص
            this.api().columns(1).every(function () {
                var column = this;
                var select = $('<select class="form-control input-sm"><option value="">الكل</option></select>')
                    .appendTo($('#name'))
                    .on('change', function () {
                        var val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });
                column.data().unique().sort().each(function (d) {
                    select.append("<option value='" + d + "'>" + d + "</option>");
                });
            });
        }
    });

    // ========= معالجة ARIA مع Bootbox =========
    // دالة تأكيد آمنة: تضمن إزالة aria-hidden عند الفتح ونقل التركيز بشكل صحيح، وطمس التركيز قبل الإغلاق
    function safeConfirm(message, onConfirm) {
        var trigger = document.activeElement; // الزر الذي فتح الديالوج

        var dialog = bootbox.confirm({
            message: message,
            // اجعل backdrop افتراضي، وkeyboard=true عادي
            callback: function (result) {
                if (result && typeof onConfirm === 'function') {
                    onConfirm();
                }
            }
        });

        // عند الفتح: أزل aria-hidden واضبط التركيز على زر الإقرار
        dialog.on('shown.bs.modal', function () {
            var $m = $(this);
            $m.removeAttr('aria-hidden').removeAttr('inert');
            // ابحث عن الزر الأساسي وضع عليه التركيز
            var $primary = $m.find('.bootbox-accept, .btn-primary').first();
            if ($primary.length) {
                $primary.trigger('focus');
            } else {
                // كخطة بديلة
                $m.find('button, [tabindex]:not([tabindex="-1"])').first().trigger('focus');
            }
        });

        // قبل الإخفاء: لو التركيز داخل المودال، بلّره وأعده للزر المُشغّل
        dialog.on('hide.bs.modal', function () {
            var modalEl = this;
            if (modalEl.contains(document.activeElement)) {
                document.activeElement.blur();
            }
            if (trigger && typeof trigger.focus === 'function') {
                // أعد التركيز بعد دورة حدث قصيرة
                setTimeout(function () { trigger.focus(); }, 0);
            }
        });

        // بعد الإخفاء: اجعل العنصر inert (لمنع أي وصول بالتركيز لو بقي في DOM)
        dialog.on('hidden.bs.modal', function () {
            $(this).attr('aria-hidden', 'true').attr('inert', '');
        });

        return dialog;
    }

    // مساعد عام لتنفيذ طلب مع تأكيد
    function confirmAndRequest(url, type, actionText) {
        safeConfirm(actionText + " هل أنت متأكد؟", function () {
            $.ajax({
                url: url,
                type: type,
                success: function () {
                    toastr.success(actionText + " تم بنجاح");
                    table.ajax.reload();
                },
                error: function () {
                    toastr.error("حدث خطأ ما!");
                }
            });
        });
    }

    // اعتراض الحذف
    $(document).on('click', '.delete_btn', function (e) {
        e.preventDefault();
        confirmAndRequest($(this).attr('href'), 'DELETE', 'الحذف');
    });

    // اعتراض تأكيد الحضور
    $(document).on('click', '.attend_btn', function (e) {
        e.preventDefault();
        confirmAndRequest($(this).attr('href'), 'GET', 'تأكيد الحضور');
    });

    // حماية إضافية عامة: أي مودال Bootstrap قبل ما يختفي، لو التركيز داخله نبلّره
    $(document).on('hide.bs.modal', '.modal', function () {
        if (this.contains(document.activeElement)) {
            document.activeElement.blur();
        }
    });
});
</script>
@endpush
