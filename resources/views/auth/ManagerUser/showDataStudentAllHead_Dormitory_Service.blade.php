@extends('layouts.appHead_Dormitory_Service')

@section('content')
<br>

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>ข้อมูลผู้ใช้ หอพักชายที่ 
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
                    <input type="text" name="q" placeholder="ค้นหารายชื่อนักศึกษา" class="form-control" /><br>
                    <input type="submit" class="btn btn-primary" value="Search" />
                </div>
            </form>
            <div class="row">
                <div class="col-10">

                </div>
                <div class="col">
                    <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
                </div>

            </div>
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
