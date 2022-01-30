@extends('layouts.appDormitory_Director')

@section('content')
<div class="wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>นักศึกษาที่เข้าร่วมกิจกรรม
                    </h1><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Dormitory_Director/home">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"><a href="/Dormitory_Director/showDataActivity">จัดการกิจกรรม</a></li>
                        <li class="breadcrumb-item active"><a href="/Dormitory_Director/showDataActivity">นักศึกษาที่เข้าร่วมกิจกรรม</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <div class="container">
        <div class="low">
            <div class="col-sm-6">
                <font size="5">กิจกรรมต้อนรับน้องใหม่
                </font><br>
            </div>
        </div>
        <div class="row">
            <div class="col-10">

            </div>
            <div class="col">
                <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-light">
                    <thead>
                        <tr class="table-warning ">
                            <th>ชื่อ</th>
                            <th>รหัสนักศึกษา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>555555555555</td>
                            <td>44444444444</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection