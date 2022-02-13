@extends('layouts.appDormitory_Counselor')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>ดำเนินการไม่อนุมัติกิจกรรม
          </h1><br>
          <h4>{{$Activity->activityName}}
          </h4><br>
          
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Dormitory_Counselor/home">หน้าหลัก</a></li>
            <li class="breadcrumb-item active"><a href="/Dormitory_Counselor/approveActivity">อนุมัติกิจกรรม</a></li>
            <li class="breadcrumb-item active"><a href="/Dormitory_Counselor/approveActivity/notApprove/{{$Activity->activityId}}">ดำเนินการไม่อนุมัติกิจกรรม</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="row ">
    <div class="col-1">
    </div>
    <a class="btn btn-secondary" href="/Dormitory_Counselor/approveActivity/approve/{{$Activity->activityId}}">ดำเนินการอนุมัติกิจกรรม</a>
    <a class="btn btn-warning" href="/Dormitory_Counselor/approveActivity/notApprove/{{$Activity->activityId}}">ดำเนินการไม่อนุมัติกิจกรรม</a>
  </div>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/Dormitory_Counselor/approveActivity/notapprove/submit" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">

                    <input class="form-control" type="text" name="activityId" value="{{$Activity->activityId}}" readonly><br>
                    ชื่อโครงการ
                    <input class="form-control" type="text" name="activityName" value="{{$Activity->activityName}}" readonly><br>
                    ลักษณะโครงการ
                    <input class="form-control" type="text" name="activityType" value="" readonly><br>
                    สถานที่ปฏิบัติงาน
                    <input class="form-control" type="text" name="activityPlace" value="{{$Activity->activityPlace}}" readonly><br>
                    หน่วยงานที่รับผิดชอบโครงการ
                    <input class="form-control" type="text" name="activityResponsible" value="" readonly><br>
                    วันที่จัดกิจกรรม
                    <input class="form-control" type="text" name="activityStartDate" value="{{$Activity->activityStartDate}}" readonly><br>
                    ถึงวันที่
                    <input class="form-control" type="text" name="activityEndDate" value="{{$Activity->activityEndDate}}" readonly><br>
                    จำนวนเป้าหมายผู้เข้าร่วมโครงการ
                    <input class="form-control" type="text" name="activityTarget" value="{{$Activity->activity_Target}}" readonly><br>
                    งบประมาณที่ใช้ดำเนินโครงการ
                    <input class="form-control" type="text" name="activityBudget" value="{{$Activity->activity_Budget}}" readonly><br>
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
