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
                    {{--                            <a href="{{ url('/export-all-registered') }}" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a> --}}
                    <h6 class="m-0 font-weight-bold text-primary">
                        <a class="btn" data-toggle="modal" data-target="#exampleModal"
                            style="font-weight:bold;float:right;font-size:1.2rem">
                            Partner survey
                        </a>
                    </h6>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered yajra-datatable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company Name</th>
                                    <th>Contact Person</th>
                                    <th>Exhibition Name & Location</th>
                                    <th>Exhibition Date</th>

                                    <th>Saudi Pavilion Marketing Rating</th>
                                    <th>Marketing Material Usefulness</th>
                                    <th>Marketing Helped Attract Visitors</th>
                                    <th>Marketing Suggestions</th>

                                    <th>Stand Design Rating</th>
                                    <th>Stand Space Suitability</th>
                                    <th>Stand Requirements Fulfilled</th>
                                    <th>Stand Improvement Suggestions</th>

                                    <th>Logistics Rating</th>
                                    <th>Materials Delivered On Time</th>
                                    <th>Logistics Issues</th>

                                    <th>Communication Rating</th>
                                    <th>Team Support Rating</th>
                                    <th>Support Comments</th>

                                    <th>Networking Rating</th>
                                    <th>Sales Leads Rating</th>
                                    <th>Brand Exposure Rating</th>
                                    <th>Business Goals Achieved</th>
                                    <th>Key Outcomes</th>

                                    <th>Future Improvements</th>
                                    <th>Additional Services</th>
                                    <th>Interested in Future Exhibitions</th>
                                    <th>How Many Signed During</th>

                                    <th>Created at</th>
                                    <th>Action</th>
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
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-rtl.css" rel="stylesheet" type="text/css" /> --}}
        {{-- <link href="{{ asset('assets/admin/lib/SmartWizard/dist/css/smart_wizard.css')}}" rel="stylesheet" type="text/css" /> --}}
        {{-- <link href="{{ asset('assets/admin/lib/SmartWizard/dist/css/smart_wizard_theme_arrows.css')}}" rel="stylesheet" type="text/css" /> --}}
        {{-- <link href="{{ asset('assets/SmartWizard/theme_new.css')}}" rel="stylesheet" type="text/css" /> --}}
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


                    ajax: "{{ route('get-partner-survey') }}",
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
                            data: 'company_name',
                            name: 'company_name'
                        },
                        {
                            data: 'contact_person',
                            name: 'contact_person'
                        },
                        {
                            data: 'exhibition_name_location',
                            name: 'exhibition_name_location'
                        },
                        {
                            data: 'exhibition_date',
                            name: 'exhibition_date'
                        },

                        {
                            data: 'saudi_pavilion_marketing_rating',
                            name: 'saudi_pavilion_marketing_rating'
                        },
                        {
                            data: 'marketing_material_usefulness',
                            name: 'marketing_material_usefulness'
                        },
                        {
                            data: 'marketing_helped_attract_visitors',
                            name: 'marketing_helped_attract_visitors'
                        },
                        {
                            data: 'marketing_suggestions',
                            name: 'marketing_suggestions'
                        },

                        {
                            data: 'stand_design_rating',
                            name: 'stand_design_rating'
                        },
                        {
                            data: 'stand_space_suitability',
                            name: 'stand_space_suitability'
                        },
                        {
                            data: 'stand_requirements_fulfilled',
                            name: 'stand_requirements_fulfilled'
                        },
                        {
                            data: 'stand_improvement_suggestions',
                            name: 'stand_improvement_suggestions'
                        },

                        {
                            data: 'logistics_rating',
                            name: 'logistics_rating'
                        },
                        {
                            data: 'materials_delivered_on_time',
                            name: 'materials_delivered_on_time'
                        },
                        {
                            data: 'logistics_issues',
                            name: 'logistics_issues'
                        },

                        {
                            data: 'communication_rating',
                            name: 'communication_rating'
                        },
                        {
                            data: 'team_support_rating',
                            name: 'team_support_rating'
                        },
                        {
                            data: 'support_comments',
                            name: 'support_comments'
                        },

                        {
                            data: 'networking_rating',
                            name: 'networking_rating'
                        },
                        {
                            data: 'sales_leads_rating',
                            name: 'sales_leads_rating'
                        },
                        {
                            data: 'brand_exposure_rating',
                            name: 'brand_exposure_rating'
                        },
                        {
                            data: 'business_goals_achieved',
                            name: 'business_goals_achieved'
                        },
                        {
                            data: 'key_outcomes',
                            name: 'key_outcomes'
                        },

                        {
                            data: 'future_improvements',
                            name: 'future_improvements'
                        },
                        {
                            data: 'additional_services',
                            name: 'additional_services'
                        },
                        {
                            data: 'interested_in_future_exhibitions',
                            name: 'interested_in_future_exhibitions'
                        },
                        
                        {
                            data: 'signed_during',
                            name: 'signed_during'
                        },
                        
                        

                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ],

                    dom: 'Bfrtip',
                    // order: [[0, 'desc']],
                    buttons: [{
                        extend: 'excel',
                            exportOptions: {
                                columns: ':visible',
                                modifier: {
                                    page: 'all'
                                }
                            }
                    }, ],
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
                                    // '<div class="d-flex align-items-center col-actions">' +
                                    // '<div class="dropdown">' +
                                    // '<a class="btn btn-sm btn-icon px-0" data-toggle="dropdown">' +
                                    //     '<i class="fa fa-ellipsis-v"></i>'+
                                    // '</a>' +
                                    '<div style="width:200px">' +
                                    '<a title="حذف" class="btn btn-danger btn-sm" style="text-align:right;margin: .1rem" href="../../admin/delete/partner-survey/' +
                                    id + '" id="delete_btn" > <i class="fa fa-trash"></i></a>' +
                                    '<a title="تعديل" target="_blank" class="btn btn-primary btn-sm" style="text-align:right;margin: .1rem" href="../../admin/edit/partner-survey/' +
                                    id + '" >  <i class="fa fa-edit"></i></a>' +
                                    '</div>'
                                    // '</div>' +
                                    // '</div>'
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
                    bootbox.confirm('are you sure ?', function(res) {

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
