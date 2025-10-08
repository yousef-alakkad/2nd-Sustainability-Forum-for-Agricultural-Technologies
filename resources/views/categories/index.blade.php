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
    </style>
@endsection
@section('content')
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- DataTales Example -->
            <div class="card shadow mb-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        جدول المسجلين (الفئات)
                    </h6>

                    <div class="row">
                        <div class="col-md-6">
                            <h4 style="text-align:center">الاسم </h4>
                            <span id="name"></span>
                        </div>
                        <div class="col-md-6">
                            <h4 style="text-align:center">الفئة </h4>
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
                                    <th>الفئة</th>
                                    <th>تاريخ التسجيل</th>
                                    <th>الإجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- مودال الإضافة والتعديل -->
                <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog"
                    aria-labelledby="categoryModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form id="categoryForm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="categoryModalLabel">إضافة / تعديل فئة</h5>
                                    <button type="button" class="close closeAdd" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="category_id">
                                    <div class="form-group">
                                        <label for="category_name">الاسم</label>
                                        <input type="text" class="form-control" name="name" id="category_name"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_type">الفئة</label>

                                        <select name="category" id="category_select" class="form-control" required>
                                            <option value="">اختر فئة</option>
                                            <option value="Speaker">Speaker</option>
                                            <option value="Exhibitor">Exhibitor</option>
                                            <option value="Vip">Vip</option>
                                            <option value="Organizer">Organizer</option>
                                            <option value="Project Lead">Project Lead</option>
                                            <option value="Estidamah">Estidamah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="saveCategoryBtn">حفظ</button>
                                </div>
                            </div>
                        </form>
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


                    ajax: "{{ route('get.register.categories') }}",
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
                        this.api().column(4).every(function() {
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
                            data: 'category',
                            name: 'category'
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
                            columns: [0, 1, 2, 3, 4, 5, 6, 7],
                            modifer: {
                                page: 'all',
                            }
                        }
                    },
                    {
                        text: 'إضافة فئة جديدة',
                        className: 'btn btn-success',
                        action: function (e, dt, node, config) {
                            $('#categoryForm')[0].reset();
                            $('#category_id').val('');
                            $('#categoryModalLabel').text('إضافة فئة جديدة');
                            $('#categoryModal').modal('show');
                        }
                    },

                 ],
                    columnDefs: [{
                            // For Responsive
                            responsivePriority: 13,
                            targets: 0
                        },
                        {
                            targets: -2,
                            render: function(data, type, full) {
                                let created = new Date(Date.parse(full['created_at']));
                                return `${created.toLocaleDateString("en-US")}`;
                            }
                        },
                        {
                            // Actions
                            targets: -1,
                            render: function(data, type, full, meta) {
                                var id = full['id'];


                                return (
                                    '<div style="width:200px">' +
                                    '<a title="حذف" class="btn btn-danger btn-sm" style="text-align:right;margin: .1rem" href="/estidamah/admin/register-categories/' +
                                    id + '" id="delete_btn" > <i class="fa fa-trash"></i></a>' +
                                    '<a title="طباعة البادج" class="btn btn-warning btn-sm" style="text-align:right;margin: .1rem" href="/estidamah/admin/register-categories/printBadge/' +
                                    id + '" target="_blank" >  <i class="fa fa-print"></i></a>' +
                                    '<a title="تعديل" class="btn btn-primary btn-sm editCategoryBtn" style="text-align:right;margin: .1rem" ' +
                                    'data-id="' + id + '" data-name="' + full['name'] +
                                    '" data-category="' + full['category'] +
                                    '" href="javascript:void(0);"> <i class="fa fa-edit"></i></a>' +
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
                                    if (response == 0)
                                        toastr.error('تم تسجيل الحضور لهذا اليوم');
                                    else
                                        toastr.success('تم تأكيد الحضور بنجاح');
                                    table.ajax.reload();
                                },
                                error: function(xhr) {

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

                // زر إضافة فئة جديدة
                $(document).on('click', '#addCategoryBtn', function() {
                    $('#categoryForm')[0].reset();
                    $('#category_id').val('');
                    $('#categoryModalLabel').text('إضافة فئة جديدة');
                    $('#categoryModal').modal('show');
                });

                // زر تعديل الفئة من الجدول
                $(document).on('click', '.editCategoryBtn', function() {
                    var data = $(this).data();
                    $('#category_id').val(data.id);
                    $('#category_name').val(data.name);
                    $('#category_type').val(data.category);
                    $('#categoryModalLabel').text('تعديل الفئة');
                    $('#categoryModal').modal('show');
                });

                // حفظ الفئة (إضافة أو تعديل)
                $(document).on('submit', '#categoryForm', function(e) {
                    e.preventDefault();
                    var id = $('#category_id').val();
                    var url = id ? '/estidamah/admin/register-categories/' + id  : '/estidamah/admin/register-categories';
                    var type = id ? 'PUT' : 'POST';
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: url,
                        type: type,
                        data: $(this).serialize(),
                        success: function(response) {
                            toastr.success(id ? 'تم تعديل الفئة بنجاح' : 'تم إضافة الفئة بنجاح');
                            $('#categoryModal').modal('hide');
                            $('.yajra-datatable').DataTable().ajax.reload();
                        },
                        error: function(xhr) {
                            toastr.error('حدث خطأ ما');
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
