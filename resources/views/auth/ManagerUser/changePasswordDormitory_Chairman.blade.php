@extends('layouts.appDormitory_Chairman')

@section('content')
<div class="col-sm-6">
    <h3> เปลี่ยนรหัสผ่าน</h3>
</div><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">รหัสผ่านเดิม</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword">
                        </div>
                        <br><br><br>
                        <label for="inputPassword" class="col-sm-2 col-form-label">รหัสผ่านใหม่</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword">
                        </div>
                        <br><br><br>
                        <label for="inputPassword" class="col-sm-2 col-form-label">ยืนยันรหัสผ่าน</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">

                        </div>
                        <button type="button">ยืนยัน</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
