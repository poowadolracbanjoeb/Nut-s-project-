@extends('layouts.appHead_Information_Unit')

@section('content')
<br>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>จัดการข้อมูลผู้ใช้</h1><br>
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
            <h3>ค้นหาผู้ใช้</h3><br>

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
        </div>
    </div>
</div>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-body">
            <br>
            <div class="row">
                <div class="col-10">
                    <a class="btn btn-success" href="/Head_Information_Unit/manageUserAll/importUsers">นำผู้ใช้เข้า</a>
                </div>

            </div>
            <br>


            <table class="table table-striped table-ligh">
                <thead>
                    <tr class="table-warning ">
                        <th>รหัสผู้ใช้</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>ดำเนินการ</th>
                    </tr>
                </thead>
                @foreach($data as $Members)
                <tbody>
                    <td>{{$Members->id_users}}</td>
                    <td>{{$Members->name}}</td>
                    <td><a class="btn btn-info" href="/Head_Information_Unit/userDetail/{{$Members->id_users}}">ดูข้อมูล</a>
                        <a class="btn btn-warning" href="/Head_Information_Unit/editUserDetail/{{$Members->id_users}}">แก้ไข</a>
                        <a class="btn btn-danger" href="">ลบ</a>
                    </td>


                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $data->links() !!}
            </div>

        </div>
    </div>
</div>

@endsection