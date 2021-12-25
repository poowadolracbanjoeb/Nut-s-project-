@extends('layouts.appHead_Dormitory_Service')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/Director_Dormitory_Service_Division/approveActivity/approve/submit" method="POST" enctype="multipart/form-data">
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
            </form>
        </div>
    </div>
</div>

@endsection
