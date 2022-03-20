@extends('layouts.appHead_Information_Unit')

@section('content')
<br>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>นำข้อมูลผู้ใช้เข้า</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/Head_Information_Unit/home">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active"><a href="/Head_Information_Unit/manageUserAll">จัดการข้อมูลผู้ใช้</a></li>
                    <li class="breadcrumb-item active"><a href="/Head_Information_Unit/manageUserAll">นำผู้ใช้เข้า</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="container">
    <div class="card bg-light mt-3">
        <div class="card-body">
            <h3>ข้อมูลผู้ใช้หอพัก</h3><br>
            <form action="{{ route('importUsers') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">นำข้อมูลเข้า</button>
            </form>
        </div>
        <div class="card-body">
            <h3>ข้อมูลประวัติเข้าใช้หอพัก</h3><br>
            <form action="{{ route('importUsersHistory') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">นำข้อมูลเข้า</button>

            </form>
        </div>
        <div class="card-body">
            <h3>ข้อมูลคะแนนผู้เข้าใช้หอพัก</h3><br>
            <form action="{{ route('importUsersScore') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">นำข้อมูลเข้า</button>

            </form>
        </div>
    </div>
</section>

@endsection