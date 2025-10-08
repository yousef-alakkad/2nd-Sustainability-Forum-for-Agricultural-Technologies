@extends('layouts.appp')
@push('css')
    <style>
        h4 {
            color: white;
        }

        h2 {
            color: white;
        }
    </style>
@endpush
@section('content')
    <div class="row ">
        <div class="col-sm-6 col-lg-4">
            <div class="card shadow-base bg-primary card-img-holder text-white">
                <div class="card-body">
                    <h4 class=" mb-2 text-center">
                        عدد زوار الملتقى
                    </h4>
                    <h2 class="mb-0 text-center">
                        {{ $member }}
                    </h2>
                </div>
            </div>

        </div>
         <div class="col-sm-6 col-lg-4">

            <div class="card shadow-base bg-primary card-img-holder text-white">
                <div class="card-body">
                    <h4 class=" mb-2 text-center">
                        عدد المسجلين للتدريب
                    </h4>
                    <h2 class="mb-0 text-center">
                        {{ $training }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">

            <div class="card shadow-base bg-primary card-img-holder text-white">
                <div class="card-body">
                    <h4 class=" mb-2 text-center">
                        عدد المسجلين للورش
                    </h4>
                    <h2 class="mb-0 text-center">
                        {{ $workshop }}
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">

            <div class="card shadow-base bg-primary card-img-holder text-white">
                <div class="card-body">
                    <h4 class=" mb-2 text-center">
                        عدد المسجلين للاستبيان
                    </h4>
                    <h2 class="mb-0 text-center">
                        {{ $survey }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush
