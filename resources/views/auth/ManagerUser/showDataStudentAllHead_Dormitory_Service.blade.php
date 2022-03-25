@extends('layouts.appHead_Dormitory_Service')

@section('content')
<br>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      <h1>นักศึกษา 
        </h1><br>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/Head_Information_Unit/home">หน้าหลัก</a></li>
          <li class="breadcrumb-item active"><a href="/Head_Information_Unit/manageUserAll">จัดการข้อมูลผู้ใช้</a></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>


<div class="container">
  <div class="card bg-light mt-3">
    <div class="card-body">
      <form action="">
        <div class="form-group">
          <input type="text" name="search" placeholder="กรุณากรอกชื่อหรือรหัสนักศึกษา" class="form-control" /><br>
          <select class="form-select" name="semester" class="form-control">
            <option value="">ปีการศึกษา</option>
            <option value="2/2565">2/2565</option>
            <option value="1/2565">1/2565</option>
            <option value="3/2564">3/2564</option>
            <option value="2/2564">2/2564</option>
            <option value="1/2564">1/2564</option>
            <option value="3/2563">3/2563</option>
            <option value="2/2563">2/2563</option>
            <option value="1/2563">1/2563</option>
          </select>
          <select class="form-select" name="semester" class="form-control">
            <option value="">หอพัก</option>
            <option value="2/2565">2/2565</option>
            <option value="1/2565">1/2565</option>
            <option value="3/2564">3/2564</option>
            <option value="2/2564">2/2564</option>
            <option value="1/2564">1/2564</option>
            <option value="3/2563">3/2563</option>
            <option value="2/2563">2/2563</option>
            <option value="1/2563">1/2563</option>
          </select>
          <br>
          <br>
          <input type="submit" class="btn btn-primary" value="ค้นหา" />
        </div>
      </form>
      <br>
      <br>


      <table class="table table-striped table-ligh">
        <thead>
          <tr class="table-warning ">
            <th>รหัสผู้ใช้</th>
            <th>ชื่อผู้ใช้</th>
            <th>อีเมลล์</th>
            <th>เบอร์โทร</th>
            <th>จัดการข้อมูล</th>
          </tr>
        </thead>
        @foreach($data as $Members)
        <tbody>
          <td>{{$Members->id}}</td>
          <td>{{$Members->name}}</td>
          <td>{{$Members->email}}</td>
          <td>{{$Members->tel}}</td>
          <td><a class="btn btn-info" href="/Head_Dormitory_Service/userDetail/{{$Members->id_users}}">ดูข้อมูล</a>
          </td>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection