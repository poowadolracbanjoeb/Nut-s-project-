@extends('layouts.appDormitory_Director')

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
            <li class="breadcrumb-item"><a href="/Dormitory_Director/home">หน้าหลัก</a></li>
            <li class="breadcrumb-item active"><a href="/Dormitory_Director/showDataActivityJoin/{{ Auth::user()->id_users }}">กิจกรรมที่เข้าร่วม</a></li>
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


          @foreach($data as $joinActivity)
          @if($joinActivity->id_users == Auth::user()->id_users )
          <tbody>
            <td>{{$joinActivity->	activityName}}</td>
            <td>{{$joinActivity->activityScore}}</td>
            <td><a class="btn btn-info" href="/Dormitory_Director/manageActivity/activityDetail/{{$joinActivity->activityName}}">ดูรายละเอียด</a>
            </td>
          </tbody>
          @endif
          @endforeach
        </table>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-3 bg-warning">
            <a>จำนวนกิจกรรมทั้งหมด </a>
          </div>
          <div class="col-1 bg-light">
          </div>
          <div class="col-1 bg-light">
            <a>{{$user_score -> count_of_activities}}</a>
          </div>
          <div class="col-1 bg-warning">
            <a>กิจกรรม </a>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-3 bg-warning">
            <a>คะแนนทั้งหมด </a>
          </div>
          <div class="col-1 bg-light">
          </div>
          <div class="col-1 bg-light">
            <a>{{$user_score->sum_score }}</a>
          </div>
          <div class="col-1 bg-warning">
            <a>คะแนน </a>
          </div>
    
        </div>
      </div>
    </div>
  </div>
</div>
@endsection