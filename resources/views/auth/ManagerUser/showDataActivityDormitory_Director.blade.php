@extends('layouts.appDormitory_Director')

@section('content')
<div class="wrapper">
  <!-- Content Header (Page header) -->

  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>กิจกรรมที่เข้าร่วม
          </h1><br>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Dormitory_Director/home">หน้าหลัก</a></li>
            <li class="breadcrumb-item active"><a href="/Dormitory_Director/showDataActivity">กิจกรรมที่เข้าร่วม</a></li>
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
              <th>ชื่อโครงการ</th>
              <th>ดำเนินการ</th>
            </tr>
          </thead>
          @foreach($joinActivity as $joinActivity)
          <tbody>
            <td>{{$joinActivity->activityId}}</td>
            <td><a class="btn btn-info" href="">ดูรายละเอียด</a>
            </td>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
  </div>

</div>
@endsection