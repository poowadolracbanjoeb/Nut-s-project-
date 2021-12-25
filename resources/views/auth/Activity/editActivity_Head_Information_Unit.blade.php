@extends('layouts.appDormitory_Chairman')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('แก้ไขกิจกรรม') }}</div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-6">
                            <form action="/Dormitory_Chairman/manageActivity/editActivity/submit" method="POST" enctype="multipart/form-data">
                                <div class="col-sm-10">
                                    {{csrf_field()}}
                                    <input type="text" name="activityId" value="{{$Activity->activityId}}" readonly ><br>
                                    <input type="text" name="activityName" value="{{$Activity->activityName}}" ><br>
                                    <input type="text" name="activityType"  value="{{$Activity->activityType}}" ><br>
                                    <input type="text" name="activityPlace" value="{{$Activity->activityPlace}}" ><br>
                                    <input type="text" name="activityResponsible" value="{{$Activity->activityResponsible}}" ><br>
                                    <input type="text" name="activityStartDate" value="{{$Activity->activityStartDate}}" ><br>
                                    <input type="text" name="activityEndDate" value="{{$Activity->activityEndDate}}" ><br>
                                    <input type="text" name="activityTarget" value="{{$Activity->activityTarget}}" ><br>
                                    <input type="text" name="activityBudget" value="{{$Activity->activityBudget}}"><br>
                                    <input type="file" name="activityFile" value="{{$Activity->activityFile}}"><br>
                                    <input type="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                    @if(Session::has('post_update'))
                    <span>{{Session::get('post_update')}}</span>
                    @endif
                    <div class="mb-3 row">
                        <div class="col-6"></div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
