@extends('layouts.appHead_Information_Unit')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                ชื่อ
                    <input type="text" name="id_users" class="form-control" value="{{$user->name}}" placeholder="ชื่อโครงการ" ><br><br>
                    รหัสนักศึกษา
                    <input type="text" name="id_users" class="form-control" value="{{$user->id_users}}" placeholder="ชื่อโครงการ" ><br><br>
                    คณะ
                    <input type="text" name="id_users" class="form-control" value="{{$user->student_faculty}}" placeholder="ชื่อโครงการ" ><br><br>
                    ชั้นปี
                    <input type="text" name="id_users" class="form-control" value="{{$user->student_degree}}" placeholder="ชื่อโครงการ" ><br><br>
                    เบอร์โทร
                    <input type="text" name="id_users" class="form-control" value="{{$user->tel}}" placeholder="ชื่อโครงการ" ><br><br>
                    อีเมล
                    <input type="text" name="id_users" class="form-control" value="{{$user->email}}" placeholder="ชื่อโครงการ" ><br><br>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-success" value="แก้ไข" formaction="{{url('/Head_Information_Unit/editUserDetail/submit/{activityId}')}}">
            </form>
        </div>
    </div>
</div>
@endsection