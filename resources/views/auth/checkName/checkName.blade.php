@extends('layouts.appDormitory_Director')

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
          <li class="breadcrumb-item"><a href="/Head_Information_Unit/home">หน้าหลัก</a></li>
          <li class="breadcrumb-item active"><a href="/Head_Information_Unit/manageUserAll">เช็กชื่อกิจกรรม</a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>





<div class="container">
  <div class="low">
    <div class="col-sm-6">
      <font size="5">{{$Activity->activityName}}
      </font><br>
    </div>
  </div>
  <br>

  <form action="/checkName/{{$Activity->activityId}}/Submit" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-inline">
      <input type="text" name="id_users" placeholder="กรอกรหัสนักศึกษา" class="form-control" aria-label="Search" />
      <input type="submit" class="btn btn-success" value="เช็กชื่อ" />
    </div>
  </form><br>



  <div class="card">
    <div class="card-body">
      <table class="table table-striped table-light">
        <thead>
          <tr class="table-warning ">
            <th>รหัสนักศึกษา</th>
            <th>ดำเนินการ</th>
          </tr>
        </thead>
        @foreach($data as $user_has_activity)
        @if($user_has_activity -> activityId == $Activity -> activityId)
        <tbody>
          <tr>
            <td> {{$user_has_activity -> id_users}}</td>
            <td>
              <a class="btn btn-danger" href="/Dormitory_Director/checkName/delete_user/{{$user_has_activity -> id_users}}">ลบ</a>
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



@endsection