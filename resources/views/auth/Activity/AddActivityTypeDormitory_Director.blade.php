@extends('layouts.appDormitory_Director')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>เพิ่มลักษณะกิจกรรม
        </h1><br>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/Dormitory_Director/home">หน้าหลัก</a></li>
          <li class="breadcrumb-item active"> <a href="/Dormitory_Director/manageActivity">จัดการกิจกรรม</a></li>
          <li class="breadcrumb-item active"> <a href="/Dormitory_Director/createActivity"> สร้างกิจกรรม</a></li>
          <li class="breadcrumb-item active"> <a href="/Dormitory_Director/createActivity"> เพิ่มลักษณะกิจกรรม</a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<div class="container">
  <div class="card">
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          ชื่อลักษณะกิจกรรม
          <input type="text" name="activityName" class="form-control">
          <span class="text-danger"> @error("activityName"){{$message}}@enderror </span><br><br>

          <input type="submit" class="btn btn-success" value="ยืนยัน" formaction="{{url('/Dormitory_Director/createActivity/Submit')}}">
          <input type="submit" class="btn btn-warning" value="ยกเลิก" formaction="{{url('/Dormitory_Director/createActivity/Outline/Submit')}}">
      </form>
    </div>
  </div>
</div>


@endsection