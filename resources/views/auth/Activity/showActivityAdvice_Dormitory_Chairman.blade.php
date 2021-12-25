@extends('layouts.appDormitory_Chairman')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('คำอธิบายกิจกรรม') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">

                            {{$Activity->activityAdvice}}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection