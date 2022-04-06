@extends('layouts.appDormitory_Counselor')

@section('content')
<div class="wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>ข้อมูลกิจกรรมนักศึกษา
          </h1><br>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/Dormitory_Counselor/home">หน้าหลัก</a></li>
            <li class="breadcrumb-item active"><a href="/Dormitory_Counselor/showDataActivityAll">กิจกรรมทั้งหมด</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <table class="table table-striped table-light">
          <thead>
            <tr class="table-warning ">
              <th>ชื่อกิจกรรม</th>
              <th>คะแนนกิจกรรม</th>
              <th>ดำเนินการ</th>
            </tr>
          </thead>
          @foreach($file as $Activity)
          @if($Activity->id_status == 51)
          @if($Activity->dormResponsibleActivity == $myDorm->dormName || $Activity->dormResponsibleActivity == "all")
          <tbody>
            <td>{{$Activity->activityName}}</td>
            <td>{{$Activity->activityScore}}</td>
            <td><a class="btn btn-info" href="/Dormitory_Counselor/manageActivity/activityDetail/{{$Activity ->activityName}}">ดูรายละเอียด</a>
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
