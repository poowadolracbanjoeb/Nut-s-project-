@extends('layouts.appHead_Information_Unit')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    ชื่อ
                    <input type="text" name="id_users" class="form-control" value="{{$user->name}}"><br><br>
                    รหัสนักศึกษา
                    <input type="text" name="id_users" class="form-control" value="{{$user->id_users}}"><br><br>
                    คณะ
                    <input type="text" name="id_users" class="form-control" value="{{$user->student_faculty}}"><br><br>
                    ชั้นปี
                    <input type="text" name="id_users" class="form-control" value="{{$user->student_degree}}"><br><br>
                    เบอร์โทร
                    <input type="text" name="id_users" class="form-control" value="{{$user->tel}}"><br><br>
                    อีเมล
                    <input type="text" name="id_users" class="form-control" value="{{$user->email}}"><br><br>
                    <br>
                    <br>
                    <input type="submit" class="btn btn-success" value="แก้ไข" formaction="{{url('/Head_Information_Unit/manageUserAll/editActivity/submit')}}">
            </form>
        </div>
    </div>
</div>
</div>
@include('sweetalert::alert')
@endsection