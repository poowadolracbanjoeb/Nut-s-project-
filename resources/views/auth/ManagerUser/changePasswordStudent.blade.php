@extends('layouts.appStudent')

@section('content')
<div class="col-sm-6">
    <h3> เปลี่ยนรหัสผ่าน</h3>
</div><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('changePassword') }}">
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">รหัสผ่านเดิม</label>
                            <div class="col-sm-10">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                            <br><br><br>
                            <label for="inputPassword" class="col-sm-2 col-form-label">รหัสผ่านใหม่</label>
                            <div class="col-sm-10">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                            <br><br><br>
                            <label for="inputPassword" class="col-sm-2 col-form-label">ยืนยันรหัสผ่าน</label>
                            <div class="col-sm-10">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">

                            </div>
                            <button type="submit">ยืนยัน</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection