@extends('layouts.appDormitory_Chairman')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/Dormitory_Chairman/approveActivity/notapprove/submit" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">

                    <input class="form-control" type="text" name="activityId" value="{{$Activity->activityId}}" readonly><br>
                    ชื่อโครงการ
                    <input class="form-control" type="text" name="activityName" value="{{$Activity->activityName}}" readonly><br>
                    ลักษณะโครงการ
                    <input class="form-control" type="text" name="activityType" value="{{$Activity->activityType}}" readonly><br>
                    สถานที่ปฏิบัติงาน
                    <input class="form-control" type="text" name="activityPlace" value="{{$Activity->activityPlace}}" readonly><br>
                    หน่วยงานที่รับผิดชอบโครงการ
                    <input class="form-control" type="text" name="activityResponsible" value="{{$Activity->activityResponsible}}" readonly><br>
                    วันที่จัดกิจกรรม
                    <input class="form-control" type="text" name="activityStartDate" value="{{$Activity->activityStartDate}}" readonly><br>
                    ถึงวันที่
                    <input class="form-control" type="text" name="activityEndDate" value="{{$Activity->activityEndDate}}" readonly><br>
                    จำนวนเป้าหมายผู้เข้าร่วมโครงการ
                    <input class="form-control" type="text" name="activityTarget" value="{{$Activity->activityTarget}}" readonly><br>
                    งบประมาณที่ใช้ดำเนินโครงการ
                    <input class="form-control" type="text" name="activityBudget" value="{{$Activity->activityBudget}}" readonly><br>
                    เหตุผลที่ไม่อนุมัติ<br>
                    <textarea class="form-control" name="activityAdvice" rows="3"></textarea>
                    <span class="text-danger"> @error("activityAdvice"){{$message}}@enderror </span><br><br><br>
                    @if(Session::has('post_update'))
                    <span>{{Session::get('post_update')}}</span>
                    @endif
                    <br>
                    <br>
                    <input type="submit" class="btn btn-danger" value="ไม่อนุมัติกิจกรรม">
            </form>
        </div>
    </div>
</div>

@endsection