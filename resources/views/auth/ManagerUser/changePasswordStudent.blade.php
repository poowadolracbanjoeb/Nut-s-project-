@extends('layouts.appStudent')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>เปลี่ยนรหัสผ่าน
                </h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/Student/home">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active"><a href="/Student/changePassword">เปลี่ยนรหัสผ่าน</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('changePassword') }}">
                @csrf
                <div class="form-group row">
                    <label for="id_users" class="col-md-4 col-form-label text-md-right">รหัสนักศึกษา</label>
                    <div class="col-md-6">
                        <input value="{{ Auth::user()->id_users }}" id="id_users" type="id_users" class="id_users" name="id_users" readonly>
                    </div>
                </div><br>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">รหัสผ่านเดิม</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">รหัสผ่านใหม่</label>

                    <div class="col-md-6">
                        <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">ยืนยันรหัสผ่านใหม่อีกครั้ง</label>

                    <div class="col-md-6">
                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                    </div>

                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            เปลี่ยนรหัสผ่าน
                        </button>
                    </div>
                </div>
            </form>
            @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
            @endforeach
            @if(Session::has('post_update'))
            <span>{{Session::get('post_update')}}</span>
            @endif
        </div>
    </div>
</div>

@endsection