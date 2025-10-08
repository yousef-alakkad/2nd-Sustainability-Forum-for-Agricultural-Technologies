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

        .dtsb-criteria {
            width: 100%;
            margin: auto;
            text-align: center;
        }

        .dtsb-inputCont {
            display: initial;
        }

        div.dtsb-searchBuilder {
            margin-bottom: -2rem;
        }

        td {
            direction: ltr;
        }

        .dt-button {
            background: #007bff !important;
            /* أزرق Bootstrap */
            color: #fff !important;
            border: none !important;
            border-radius: 5px;
            padding: 6px 12px;
            margin-left: 5px;
        }

        .dt-button:hover {
            background: #0056b3 !important;
            color: #fff !important;
        }
    </style>
@endsection
@section('content')
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-2">
                <div class="card-header py-3">
                    {{--                            <a href="{{ url('/export-all-registered') }}" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a> --}}
                    <h6 class="m-0 font-weight-bold text-primary">
                        <a class="btn" data-toggle="modal" data-target="#exampleModal"
                            style="font-weight:bold;float:right;font-size:1.2rem">
                            جدول المسجلين في التدريب الاستدامة
                        </a>
                    </h6>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="text-align:center">الاسم </h4>
                            <span id="name"></span>
                        </div>
                        <div class="col-md-12">
                            <h4 style="text-align:center">الايميل</h4>
                            <span id="reg_type"></span>
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
                                    <th>الجوال</th>
                                    <th>المنطقة</th>
                                    <th>المستوى العلمي</th>
                                    <th>الخلفية التعليمية</th>
                                    <th>المسمى الوظيفي</th>
                                    <th>جهة العمل</th>
                                    <th>اللغة الأنكليزية</th>
                                    <th>الحالة</th>
                                    <th>QrCode</th>
                                    <th>تاريخ التسجيل</th>
                                    <th>الوقت</th>
                                    <th>الإجراء</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>

    @push('style')
        <link href="{{ asset('assets/SmartWizard/bootstrap.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('assets/SmartWizard/theme-ar.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    @push('script')
        <script src="{{ asset('assets/SmartWizard/jquery.min.js') }}"></script>

        <script src="{{ asset('assets/SmartWizard/bootstrap.js') }}"></script>
        <script src="{{ asset('assets/SmartWizard/custom_js.js') }}"></script>

        <script src="{{ asset('assets/SmartWizard/validator.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/admin/lib/SmartWizard/dist/js/jquery.smartWizard.js') }}"></script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.js"></script>
        <script
            src="https://nightly.datatables.net/searchbuilder/js/dataTables.searchBuilder.js?_=40f0e1a3ea332af586366e40955c1713">
        </script>
        <script type="text/javascript">
            var serialNumber = 0;
            $(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var table = $('.yajra-datatable').DataTable({


                    ajax: "{{ route('registeredMembersTraining') }}",
                    "initComplete": function() {
                        // Select the column whose header we need replaced using its index(0 based)
                        this.api().column(1).every(function() {
                            var column = this;
                            // Put the HTML of the <select /> filter along with any default options
                            var select = $(
                                    '<select class="form-control input-sm"><option value="">All</option></select>'
                                )
                                // remove all content from this column's header and
                                // append the above <select /> element HTML code into it
                                .appendTo($('#name'))
                                // execute callback when an option is selected in our <select /> filter
                                .on('change', function() {
                                    // escape special characters for DataTable to perform search
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
                                    // Perform the search with the <select /> filter value and re-render the DataTable
                                    column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });
                            // fill the <select /> filter with unique values from the column's data
                            column.data().unique().sort().each(function(d, j) {
                                select.append("<option value='" + d + "'>" + d +
                                    "</option>")
                            });
                        });
                        this.api().column(2).every(function() {
                            var column = this;
                            // Put the HTML of the <select /> filter along with any default options
                            var select = $(
                                    '<select class="form-control input-sm"><option value="">All</option></select>'
                                )
                                // remove all content from this column's header and
                                // append the above <select /> element HTML code into it
                                .appendTo($('#reg_type'))
                                // execute callback when an option is selected in our <select /> filter
                                .on('change', function() {
                                    // escape special characters for DataTable to perform search
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );
                                    // Perform the search with the <select /> filter value and re-render the DataTable
                                    column
                                        .search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });
                            // fill the <select /> filter with unique values from the column's data
                            column.data().unique().sort().each(function(d, j) {
                                select.append("<option value='" + d + "'>" + d +
                                    "</option>")
                            });
                        });

                    },
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'mobile',
                            name: 'mobile'
                        },
                        {
                            data: 'region',
                            name: 'region'
                        },
                        {
                            data: 'educational_level',
                            name: 'educational_level'
                        },
                         {
                            data: 'educational_background',
                            name: 'educational_background'
                        },
                        {
                            data: 'job_title',
                            name: 'job_title'
                        },
                        {
                            data: 'organization',
                            name: 'organization'
                        },

                        {
                            data: 'english_level',
                            name: 'english_level'
                        },


                        {
                            data: 'approve',
                            name: 'approve'
                        },



                        {
                            data: 'qrcode',
                            name: 'qrcode'
                        },

                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },
                    ],
                    dom: 'Bfrtip',
                    // order: [[0, 'desc']],
                    buttons: [{
                            extend: 'excel',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8,9,10,11,12],
                                modifer: {
                                    page: 'all',
                                }
                            }
                        },

                        {
                            text: '+ تسجيل يدوي', // اسم الزر
                            className: 'btn btn-primary dt-button', // ستايل الزر (Bootstrap)
                            action: function(e, dt, node, config) {
                                window.location.href = "/admin/create/visitor/training";
                                // غير المسار حسب الروت عندك
                            }
                        }
                    ],
                    columnDefs: [{
                            // For Responsive
                            responsivePriority: 13,
                            targets: 0
                        },
                        {
                            targets: -3,
                            render: function(data, type, full) {
                                let created = new Date(Date.parse(full['created_at']));
                                return created.toLocaleString("en-US", {
                                    year: "numeric",
                                    month: "2-digit",
                                    day: "2-digit",

                                });
                            }

                        },
                        {
                            targets: -2,
                            render: function(data, type, full) {
                                let created = new Date(Date.parse(full['created_at']));
                                return created.toLocaleString("en-US", {

                                    hour: "2-digit",
                                    minute: "2-digit"
                                });
                            }

                        },
                        {
                            // Actions
                            targets: -1,
                            render: function(data, type, full, meta) {
                                var id = full['id'];
                                var code = full['qrcode'];
                                var randomCode = full['code'];
                                var approve = full['approve'];
                                var ap = '';
                                var attend = '';
                                if(approve == "-") {
                                    ap =  '<a title="رفض" class="btn btn-secondary  btn-sm" style="text-align:right;margin: .1rem" href="../approve/0/' +
                                    id + '">  <i class="fa fa-times-circle"></i></a>' +
                                    '<a title="قبول"  class="btn btn-primary btn-sm" style="text-align:right;margin: .1rem" href="../approve/1/' +
                                    id + '" >  <i class="fa fa-check-circle"></i></a>' ;
                                }

                                if(approve == "تم القبول") {
                                   attend =  '<a title="تسجيل حضور" class="btn btn-success btn-sm" style="text-align:right;margin: .1rem" href="../../attendVisitor-training/' +
                                    code + '" id="attend_btn" >  <i class="fa fa-check"></i></a>';
                                }

                                return (

                                    '<div style="width:200px">' +
                                    '<a title="حذف" class="btn btn-danger btn-sm" style="text-align:right;margin: .1rem" href="../../deleteMemberTraining/' +
                                    id + '" id="delete_btn" > <i class="fa fa-trash"></i></a>' +
                                    attend +
                                    '<a title="طباعة البادج" class="btn btn-warning btn-sm" style="text-align:right;margin: .1rem" href="../../badge-training/' +
                                    randomCode + '" target="_blank" >  <i class="fa fa-print"></i></a>' +
                                    ap +
                                     '<a title="تعديل" target="_blank" class="btn btn-info btn-sm" style="text-align:right;margin: .1rem" href="../../admin/edit/visitor/training/' +
                                    id + '" >  <i class="fa fa-edit"></i></a>' +
                                    '</div>'

                                );


                            }
                        }
                    ]
                });


                $(document).on('click', '#attend_btn', function(e) {
                    e.preventDefault();

                    var url = $(this).attr('href');
                    bootbox.confirm('سيتم تأكيد الحضور هل أنت متأكد ؟', function(res) {

                        if (res) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            // ضبط إعدادات toastr مرة واحدة
                            toastr.options = {
                                "closeButton": true,
                                "progressBar": true,
                                "positionClass": "toast-top-right", // بدلاً من object غريب
                                "timeOut": "5000",
                                "extendedTimeOut": "1000",
                                "showDuration": "300",
                                "hideDuration": "1000"
                            };

                            $.ajax({
                                url: url,
                                type: 'get', // الأفضل POST للتسجيل
                                dataType: 'json',
                                data: {
                                    _token: $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    if (response.status === 'exists') {
                                        toastr.warning(response.message ||
                                            'تم تسجيل الحضور لهذا اليوم');
                                    } else if (response.status === 'success') {
                                        toastr.success(response.message ||
                                            'تم تأكيد الحضور بنجاح');
                                    } else {
                                        toastr.info(response.message || 'تمت العملية');
                                    }

                                    if (typeof table !== 'undefined') {
                                        table.ajax.reload();
                                    }
                                },
                                error: function(xhr) {
                                    let res = xhr.responseJSON;
                                    if (res && res.message) {
                                        toastr.error(res.message);
                                    } else {
                                        toastr.error('حصل خطأ غير متوقع');
                                    }
                                }
                            });
                        }

                    });
                });

                $(document).on('click', '#delete_btn', function(e) {
                    e.preventDefault();

                    var url = $(this).attr('href');
                    bootbox.confirm('سيتم حذف بيانات العضو المسجل ,هل أنت متأكد ؟', function(res) {

                        if (res) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                'url': url,
                                'type': 'DELETE',
                                'dataType': 'json',
                                data: {
                                    '_token': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    toastr.options = {
                                        "debug": false,
                                        position: {
                                            X: 'Left',
                                            Y: 'Top'
                                        },
                                        "fadeIn": 300,
                                        "fadeOut": 1000,
                                        "timeOut": 5000,
                                        "extendedTimeOut": 1000
                                    }
                                    table.ajax.reload();
                                },
                                error: function(xhr) {

                                }
                            });
                        }

                    });
                });

                $(document).on('click', '#send_btn', function(e) {
                    e.preventDefault();

                    var url = $(this).attr('href');
                    bootbox.confirm('سيتم الارسال هل أنت متأكد ؟', function(res) {

                        if (res) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                'url': url,
                                'type': 'post',
                                'dataType': 'json',
                                data: {
                                    '_token': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    toastr.options = {
                                        "debug": false,
                                        position: {
                                            X: 'Left',
                                            Y: 'Top'
                                        },
                                        "fadeIn": 300,
                                        "fadeOut": 1000,
                                        "timeOut": 5000,
                                        "extendedTimeOut": 1000
                                    };
                                    toastr.success('تم تأكيد الحضور بنجاح');
                                    table.ajax.reload();
                                },
                                error: function(xhr) {

                                }
                            });
                        }

                    });
                });

                $(document).on('click', '#resend_btn', function(e) {
                    e.preventDefault();

                    var url = $(this).attr('href');
                    bootbox.confirm('سيتم إعادة إرسال الفيزا هل أنت متأكد ؟', function(res) {

                        if (res) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });

                            $.ajax({
                                'url': url,
                                'type': 'GET',
                                'dataType': 'json',
                                data: {
                                    '_token': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(response) {
                                    toastr.options = {
                                        "debug": false,
                                        position: {
                                            X: 'Left',
                                            Y: 'Top'
                                        },
                                        "fadeIn": 300,
                                        "fadeOut": 1000,
                                        "timeOut": 5000,
                                        "extendedTimeOut": 1000
                                    };
                                    toastr.success(' تم الإرسال بنجاح');
                                    table.ajax.reload();
                                },
                                error: function(xhr) {
                                    toastr.error('حدث خطأ ما');
                                }
                            });
                        }

                    });
                });

                $(document).on('submit', '#updateLeader', function(e) {
                    e.preventDefault();

                    var id = $(this).attr('action');
                    var name = $(this).serialize();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        'url': 'leads/' + id,
                        'type': 'PUT',
                        'dataType': 'json',
                        data: name,
                        success: function(response) {
                            toastr.success('Leader updated successfully');
                            table.ajax.reload();
                            $(".closeAdd").click();
                        },
                        error: function(xhr) {
                            toastr.error('Something went wrong !');
                            $(".closeAdd").click();
                        }
                    });

                });

                $('#myModal').on('shown.bs.modal', function() {
                    $('#myInput').trigger('focus')
                });

                $(document).on('submit', '#addNewLeader', function(e) {
                    e.preventDefault();

                    var url = $(this).attr('action');
                    var name = $(this).serialize();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        'url': url,
                        'type': 'POST',
                        'dataType': 'json',
                        data: name,
                        success: function(response) {
                            toastr.success('Leader added successfully');
                            table.ajax.reload();
                            $(".closeAdd").click();
                        },
                        error: function(xhr) {
                            toastr.error('Something went wrong !');
                            $(".closeAdd").click();
                        }
                    });

                });

            });
        </script>
    @endpush
@endsection
