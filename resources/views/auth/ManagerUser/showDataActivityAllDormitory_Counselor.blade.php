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
          <li class="breadcrumb-item"><a href="/Student/home">หน้าหลัก</a></li>
            <li class="breadcrumb-item active"><a href="/Student/showDataActivityJoin/{{ Auth::user()->id_users }}">กิจกรรมที่เข้าร่วม</a></li>
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
          @foreach($data as $Activity)
          <tbody>
            <td>{{$Activity->activityName}}</td>
            <td>{{$Activity->activityScore}}</td>
            <td><a class="btn btn-info" href="/Student/manageActivity/activityDetail/{{$Activity ->activityId}}">ดูรายละเอียด</a>
            </td>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
