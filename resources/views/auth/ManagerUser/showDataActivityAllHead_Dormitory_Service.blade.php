@extends('layouts.appHead_Dormitory_Service')

@section('content')
<div class="col-sm-6">
    <h3>   ข้อมูลผู้ใช้ -
        <a >
            {{ Auth::user()->name }}
        </a>
    </h3>
</div><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <img src="https://www.mcicon.com/wp-content/uploads/2021/01/People_User_1-copy-4.jpg" width="200">
                <div class="card-body">
                    <a>ชื่อ </a><br>
                    <a>รหัสนักศึกษา </a><br>
                    <a>คณะ</a><br>
                    <a>หอพัก</a><br>
                    <a>เบอร์โทร</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection