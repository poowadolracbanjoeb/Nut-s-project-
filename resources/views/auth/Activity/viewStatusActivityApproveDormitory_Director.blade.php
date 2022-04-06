@extends('layouts.appDormitory_Director')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>จัดการกิจกรรม
          </h1><br>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Dormitory_Director/home">หน้าหลัก</a></li>
            <li class="breadcrumb-item active"><a href="/Dormitory_Director/manageActivity">จัดการกิจกรรม</a></li>
            <li class="breadcrumb-item active"><a href="/Dormitory_Director/viewStatusActivityApprove">กิจกรรมที่รออนุมัติ</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="row ">
    <div class="col-1">

    </div>
    <a class="btn btn-success" href="/Dormitory_Director/createActivity">สร้างกิจกรรม</a>

    <div class="col-3">

    </div>
    <a class="btn btn-secondary" href="/Dormitory_Director/manageActivity">จัดกิจกรรม</a>
    <a class="btn btn-warning" href="/Dormitory_Director/viewStatusActivityApprove">กิจกรรมที่รออนุมัติ</a>
    <a class="btn btn-secondary" href="/Dormitory_Director/manageActivity/Outline">เค้าโครงร่างกิจกรรม</a>
    <a class="btn btn-secondary" href="/Dormitory_Director/manageActivity/Fell">กิจกรรมที่ไม่อนุมัติ</a>

  </div>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <table class="table table-striped table-light">
          <thead>
            <tr class="table-warning ">
              <th>ชื่อโครงการ</th>
              <th>สถานที่ปฏิบัติงาน</th>
              <th>วันที่จัดกิจกรรม</th>
              <th>สถานะกิจกรรม</th>
              <th>ดำเนินการ</th>
            </tr>
          </thead>
          @foreach($file as $Activity)
          @if($Activity->id_status == 11 || $Activity->id_status == 21|| $Activity->id_status == 31|| $Activity->id_status == 41)
          @if($Activity->userActivityResponsibleActivity == Auth::user()->id_users)
          <tbody>
            <td>{{$Activity->activityName}}</td>
            <td>{{$Activity->activityPlace}}</td>
            <td>{{$Activity->activityStartDate}} ถึง {{$Activity->activityEndDate}}</td>
            <td>รอประธานอนุมัติ</td>
            <td><a class="btn btn-info" href="/Dormitory_Director/manageActivity/activityDetail/{{$Activity->activityName}}">ดูรายละเอียด</a>
            </td>
          </tbody>
          @endif
          @endif
          @endforeach
        </table>
      </div>
    </div>
  </div>

</div>



@endsection