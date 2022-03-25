@extends('layouts.appDormitory_Chairman')

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
              <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
              <li class="breadcrumb-item active">จัดการกิจกรรม</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content-header ">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6 ">
            <ol class="breadcrumb float-sm-right d-none d-sm-inline-block">
                <a class="btn btn-success" href="/Dormitory_Chairman/createActivity">สร้างกิจกรรม</a>
                <a class="btn btn-info" href="/Dormitory_Chairman/manageActivity">กิจกรรมที่กำลังดำเนินการ</a>
                <a class="btn btn-warning" href="/Dormitory_Chairman/manageActivity/Outline">เค้าโครงร่างกิจกรรม</a>
                <a class="btn btn-danger" href="/Dormitory_Chairman/manageActivity/Fell">กิจกรรมที่ไม่อนุมัติ</a>
            </ol>
          </div>
        </div>
      </div>
    </section>

<!-- Main content -->
<div class="container">
      <h3>รายการกิจกรรมที่รออนุมัติ</h3>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped w-auto">
                <thead>
                    <tr class="table-primary ">
                        <th scope="row">ลำดับกิจกรรม</th>
                        <th>ชื่อโครงการ</th>
                        <th>ลักษณะโครงการ</th>
                        <th>สถานที่ปฏิบัติงาน</th>
                        <th>วันที่จัดกิจกรรม</th>
                        <th>เอกสารประกอบโครงการ</th>
                        <th>สถานะโครงการ</th>
                        <th>ดำเนินการ</th>
                    </tr>
                </thead>
                @foreach($file as $key=>$data)
                @if($Activity->id_status == 11 || $Activity->id_status == 21|| $Activity->id_status == 31|| $Activity->id_status == 41)
                <tbody>
                    <td>{{$data->activityId}}</td>
                    <td>{{$data->activityName}}</td>
                    <td>{{$data->activityType}}</td>
                    <td>{{$data->activityPlace}}</td>
                    <td>{{$data->activityStartDate}}</td>
                    <td><a class="btn btn-secondary" href="/activityFile/download/{{$data->activityFile}}">ดาวน์โหลด</a></td>
                    <td>{{$data->activityStatusName}}</td>
                    <td><a class="btn btn-secondary" href="/Dormitory_Chairman/manageActivity/activityDetail/{{$data->activityName}}">ดูรายละเอียด</a></td>

                </tbody>
                @endif
                @endforeach
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">ก่อนหน้า</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">ถัดไป</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

</div>


@endsection
