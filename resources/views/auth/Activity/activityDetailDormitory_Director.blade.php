@extends('layouts.appDormitory_Director')

@section('content')

<div class="wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>ดูรายละเอียดกิจกรรม
          </h1><br>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Dormitory_Director/home">หน้าหลัก</a></li>
            <li class="breadcrumb-item active"><a href="/Dormitory_Director/manageActivity">จัดการกิจกรรม</a></li>
            <li class="breadcrumb-item active"><a href="/Dormitory_Director/manageActivity/activityDetail/{{$Activity->activityName}}">ดูรายละเอียดกิจกรรม</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="container">
    <div class="card">
      <div class="card-body">
        <form>
          {{csrf_field()}}
          <div class="form-group">
            รหัสกิจกรรม
            <input class="form-control" type="text" name="activityId" value="{{$Activity->activityId}}" readonly><br>
            ชื่อโครงการ
            <input class="form-control" type="text" name="activityName" value="{{$Activity->activityName}}" readonly><br>
            ลักษณะโครงการ
            <input class="form-control" type="text" name="activityType" value="{{$Activity->id_type}}" readonly><br>
            สถานที่ปฏิบัติงาน
            <input class="form-control" type="text" name="activityPlace" value="{{$Activity->activityPlace}}" readonly><br>
            วันที่จัดกิจกรรม
            <input class="form-control" type="text" name="activityStartDate" value="{{$Activity->activityStartDate}}" readonly><br>
            ถึงวันที่
            <input class="form-control" type="text" name="activityEndDate" value="{{$Activity->activityEndDate}}" readonly><br>
            จำนวนเป้าหมายผู้เข้าร่วมโครงการ
            <input class="form-control" type="text" name="activityTarget" value="{{$Activity->activity_Target}}" readonly><br>
            งบประมาณที่ใช้ดำเนินโครงการ
            <input class="form-control" type="text" name="activityBudget" value="{{$Activity->activity_Budget}}" readonly><br>
            คะแนนกิจกรรม
            <input class="form-control" type="text" name="activityBudget" value="{{$Activity->activityScore}}" readonly><br>
            เอกสารประกอบโครงการ<br>
            <td><a class="btn btn-info" href="/activityFile/download/{{$Activity->activityFile}}">ดาวน์โหลด</a></td>
        </form>
      </div>
    </div>
  </div>

  @endsection