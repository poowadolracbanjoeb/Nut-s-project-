@extends('layouts.appStudent')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>ข้อมูลกิจกรรมนักศึกษา
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
                    <a>จำนวนกิจกรรมทั้งหมด </a>
                </div>
                <div class="col-9 bg-light">
                    <a>

                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>คะแนนทั้งหมด </a>
                </div>
                <div class="col-9 bg-light">
                    <a>

                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection