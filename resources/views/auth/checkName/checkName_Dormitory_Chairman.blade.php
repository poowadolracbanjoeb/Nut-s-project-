@extends('layouts.appDormitory_Chairman')

@section('content')
<br>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>เช็กชื่อกิจกรรม
        </h1><br>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/Dormitory_Chairman/home">หน้าหลัก</a></li>
          <li class="breadcrumb-item active"><a href="/Dormitory_Chairman/manageActivity">จัดการกิจกรรม</a></li>
          <li class="breadcrumb-item active"><a href="/Dormitory_Chairman/manageUserAll">เช็กชื่อกิจกรรม</a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>





<div class="container">
  <div class="card">
    <div class="card-body">
      <div class="low">
        <div class="col-sm-6">
          <font size="5">{{$Activity->activityName}}
          </font><br>
        </div>
      </div>
      <br>

      <form action="/checkName/{{$Activity->activityName}}/Submit" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-inline">
          <input type="text" name="id_users" placeholder="กรอกรหัสนักศึกษา" class="form-control" aria-label="Search" />
          <input type="submit" class="btn btn-success" value="เช็กชื่อ" />
        </div>
        <br>
        <span class="text-danger"> @error("id_users"){{$message}}@enderror </span><br>
      </form><br>


      <table class="table table-striped table-light">
        <thead>
          <tr class="table-warning ">
            <th>รหัสนักศึกษา</th>
            <th>ดำเนินการ</th>
          </tr>
        </thead>
        @foreach($data as $user_has_activity)
        @if($user_has_activity -> activityName == $Activity -> activityName)
        <tbody>
          <tr>
            <td> {{$user_has_activity -> id_users}}</td>
            <td>
              <a class="btn btn-danger" href="/Dormitory_Chairman/checkName/delete_user/{{$user_has_activity -> id_users}}/{{$Activity->activityName}}">ลบ</a>
            </td>
          </tr>
        </tbody>
        @endif
        @endforeach
      </table>
    </div>
  </div>
</div>
</div>
@include('sweetalert::alert')
@endsection