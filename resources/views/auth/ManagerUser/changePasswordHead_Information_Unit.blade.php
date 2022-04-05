@extends('layouts.appHead_Information_Unit')

@section('content')

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
                <div class=" row">
                    <div class="col-md-4">
                    </div>

                    <span class="text-danger col-md-6"> @error("current_password"){{$message}}@enderror </span>
                </div><br>


                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">รหัสผ่านใหม่</label>

                    <div class="col-md-6">
                        <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                    </div>
                </div>
                <div class=" row">
                    <div class="col-md-4">
                    </div>
                    <span class="text-danger"> @error("new_password"){{$message}}@enderror </span>
                </div><br>


                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">ยืนยันรหัสผ่านใหม่อีกครั้ง</label>

                    <div class="col-md-6">
                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                    </div>
                </div>
                <div class=" row">
                    <div class="col-md-4">
                    </div>
                    <span class="text-danger"> @error("new_confirm_password"){{$message}}@enderror </span>
                </div><br>

                <br>


                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            เปลี่ยนรหัสผ่าน
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
