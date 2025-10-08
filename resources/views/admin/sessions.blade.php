@extends('layouts.appp')
@section('content')
    @push('style')
        <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.bootstrap4.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap4.min.css" rel="stylesheet">
    @endpush
    <div class="row ">
        <div class="col-md-12">
            <div class="card shadow-base bd-0 overflow-hidden">
                <div class="card-header">
                    {{--<a  class="btn btn-secondary pull-left" href="">{{ __('config.back') }}  <i class="icon ion-android-arrow-back"> </i>  </a>--}}
                    <h5 class="card-title mt-2">إحصائيات التسجيلات للجلسات</h5>
                    {{--                    <p class="card-subtitle">{{ __('admin/slider.title.insert.sub_value') }}</p>--}}
                </div>
                <div class="card-body  pt-10">
                    <!--section-about -->
                    <section class="section section-new-user">
                        <table  class="datatable table display responsive nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th> وقت الجلسة </th>
                                <th> العدد المطلوب </th>
                                <th>  العدد الحالي يوم 10 </th>
                                <th>  العدد الحالي يوم 11 </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($sessions as $key => $val)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td style="direction: ltr">{{$val->to . ' - ' . $val->from}}</td>
                                    <td>{{$val->max_count}}</td>
                                    <td>{{$val->current_count_10}}</td>
                                    <td>{{$val->current_count_11}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <h6 class=" mt-2 text-center">   اجمالي العدد يوم 10 [{{$sessions->sum('current_count_10').'/'.$sessions->sum('max_count')}}] </h6>
                        <h6 class=" mt-2 text-center">   اجمالي العدد يوم 11 [{{$sessions->sum('current_count_11').'/'.$sessions->sum('max_count')}}] </h6>
                    </section>
                    <!--end section-about-->
                </div>
            </div>
        </div>
    </div>

    @push('script')
    @endpush
@endsection
