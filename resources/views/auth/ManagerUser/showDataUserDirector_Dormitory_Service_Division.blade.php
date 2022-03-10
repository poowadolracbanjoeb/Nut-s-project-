@extends('layouts.appDirector_Dormitory_Service_Division')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>ข้อมูลนักศึกษา
                </h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/Director_Dormitory_Service_Division/home">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active"><a href="/Director_Dormitory_Service_Division/showDataUser">ข้อมูลผู้ใช้ระบบ</a></li>
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
                        {{ Auth::user()->name }}
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>รหัสผู้ใช้ระบบ </a>
                </div>
                <div class="col-9 bg-light">
                    <a>
                        {{ Auth::user()->id_users }}

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
                        {{ Auth::user()->tel }}
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
                        {{ Auth::user()->email }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection