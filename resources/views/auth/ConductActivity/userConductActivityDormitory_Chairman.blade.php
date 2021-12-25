@extends('layouts.appDormitory_Chairman')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('อนุมัติกิจกรรม') }}</div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-6">
                            <form action="/Director_Dormitory_Service_Division/approveActivity/approve/submit" method="POST" enctype="multipart/form-data">
                                <div class="col-sm-10">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$Activity->id}}"><br>
                                    <input type="hidden" name="status" value="{{$Activity->id}}"><br>
                                    <input type="text" name="title" placeholder="ชื่อกิจกรรม" value="{{$Activity->title}}" readonly><br>
                                    <input type="text" name="description" placeholder="รายละเอียดกิจกรรม" value="{{$Activity->description}}" readonly><br>
                                    กรอกรหัสเช็กชื่อ
                                    <input type="text"><br>
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


            <div class="card">
                <div class="card-header">{{ __('นักศึกษาที่เข้าร่วมกิจกรรม') }}</div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-6">

                        </div>
                    </div>
 
                </div>
            </div>
        </div>
    </div>
</div>



@endsection