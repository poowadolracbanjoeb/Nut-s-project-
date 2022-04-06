@extends('layouts.appHead_Information_Unit')

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
          <li class="breadcrumb-item"><a href="/Head_Information_Unit/home">หน้าหลัก</a></li>
          <li class="breadcrumb-item active"> <a href="/Head_Information_Unit/manageActivityAll">จัดการกิจกรรม</a></li>
          <li class="breadcrumb-item active"> <a href="/Head_Information_Unit/createActivity"> สร้างกิจกรรม</a></li>
          <li class="breadcrumb-item active"> <a href="/Head_Information_Unit/createActivity"> เพิ่มลักษณะกิจกรรม</a></li>
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
          ด้านที่
          <input type="text" name="typeId" class="form-inline">
          <span class="text-danger"> @error("typeId"){{$message}}@enderror </span><br><br>
          ชื่อลักษณะกิจกรรม
          <input type="text" name="typeName" class="form-control">
          <span class="text-danger"> @error("typeName"){{$message}}@enderror </span><br><br>

          <input type="submit" class="btn btn-success" value="ยืนยัน" formaction="{{url('/AddActivityType/Submit')}}">
      </form>
    </div>
  </div>
</div>
</div>
@include('sweetalert::alert')
@endsection