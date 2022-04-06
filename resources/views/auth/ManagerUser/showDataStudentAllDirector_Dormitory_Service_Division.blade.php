@extends('layouts.appDirector_Dormitory_Service_Division')

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
                    <li class="breadcrumb-item"><a href="/Director_Dormitory_Service_Division/home">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active"><a href="/Director_Dormitory_Service_Division/showDataStudentAll">ดูข้อมูลผู้ใช้</a></li>
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
                    <select class="form-select" name="dorm" class="form-control">
                        <option value="">หอพัก</option>
                        @foreach($data as $dorm)
                        <option value="{{$dorm->dormName}}">{{$dorm->dormName}}</option>
                        @endforeach
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
            <table class="table table-striped table-ligh">
                <thead>
                    <tr class="table-warning ">
                        <th>รหัสผู้ใช้</th>
                        <th>ดำเนินการ</th>
                    </tr>
                </thead>
                @foreach($data2 as $Members)
                <tbody>
                    <td>{{$Members->id_users}}</td>
                    <td><a class="btn btn-info" href="/Director_Dormitory_Service_Division/userDetail/{{$Members->id_users}}">ดูข้อมูล</a>
                    </td>
                </tbody>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $data2->links() !!}
            </div>

        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection