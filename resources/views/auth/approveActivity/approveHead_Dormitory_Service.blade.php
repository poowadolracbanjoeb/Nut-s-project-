@extends('layouts.appHead_Dormitory_Service')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>ดำเนินการอนุมัติกิจกรรม
          </h1><br>
          <h4>{{$Activity->activityName}}
          </h4><br>
          
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Head_Dormitory_Service/home">หน้าหลัก</a></li>
            <li class="breadcrumb-item active"><a href="/Head_Dormitory_Service/approveActivity">อนุมัติกิจกรรม</a></li>
            <li class="breadcrumb-item active"><a href="/Head_Dormitory_Service/approveActivity/approve/{{$Activity->activityId}}">ดำเนินการอนุมัติกิจกรรม</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="row ">
    <div class="col-1">
    </div>
    <a class="btn btn-warning" href="/Head_Dormitory_Service/approveActivity/approve/{{$Activity->activityId}}">ดำเนินการอนุมัติกิจกรรม</a>
    <a class="btn btn-secondary" href="/Head_Dormitory_Service/approveActivity/notApprove/{{$Activity->activityId}}">ดำเนินการไม่อนุมัติกิจกรรม</a>
  </div>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="/Head_Dormitory_Service/approveActivity/approve/submit" method="POST" enctype="multipart/form-data">
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
                    <input class="form-control" type="text" name="activity_Target" value="{{$Activity->activity_Target}}" readonly><br>
                    งบประมาณที่ใช้ดำเนินโครงการ
                    <input class="form-control" type="text" name="activity_Budget" value="{{$Activity->activity_Budget}}" readonly><br>
                    <input class="form-control" type="file" name="activityFile" value="{{$Activity->activityFile}}">
                    <span class="text-danger"> @error("activityFile"){{$message}}@enderror </span><br><br><br>
                    @if(Session::has('post_update'))
                    <span>{{Session::get('post_update')}}</span>
                    @endif
                    <br>
                    <br>
                    <input type="submit" class="btn btn-success" value="อนุมัติกิจกรรม">
            </form>
        </div>
    </div>
</div>

@include('sweetalert::alert')
@endsection
