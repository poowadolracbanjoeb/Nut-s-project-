@extends('layouts.appHead_Information_Unit')

@section('content')
{{csrf_field()}}
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>ข้อมูลนักศึกษา
        </h1><br>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/Student/home">หน้าหลัก</a></li>
          <li class="breadcrumb-item active"><a href="/Student/showDataUser">ข้อมูลนักศึกษา</a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<div class="container">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-3 bg-warning">
          <a>ชื่อ </a>
        </div>
        <div class="col-9 bg-light">
          <a>
            {{$user->name}}
          </a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-3 bg-warning">
          <a>รหัสนักศึกษา </a>
        </div>
        <div class="col-9 bg-light">
          <a>
          {{$user->id_users}}

          </a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-3 bg-warning">
          <a>คณะ</a>
        </div>
        <div class="col-9 bg-light">
          <a>
            {{$user->student_faculty }}
          </a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-3 bg-warning">
          <a>ชั้นปีที่</a>
        </div>
        <div class="col-9 bg-light">
          <a>
            {{ $user->student_degree }}
          </a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-3 bg-warning">
          <a>เบอร์โทร</a>
        </div>
        <div class="col-9 bg-light">
          <a>
            {{ $user->tel }}
          </a>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-3 bg-warning">
          <a>อีเมล</a>
        </div>
        <div class="col-9 bg-light">
          <a>
            {{ $user->email }}
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection