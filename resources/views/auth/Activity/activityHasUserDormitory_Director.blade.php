@extends('layouts.appDormitory_Director')

@section('content')
<div class="wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>นักศึกษาที่เข้าร่วมกิจกรรม
                    </h1><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Dormitory_Director/home">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"><a href="/Dormitory_Director/manageActivity">จัดการกิจกรรม</a></li>
                        <li class="breadcrumb-item active"><a href="/Dormitory_Director/manageActivity/activityHasUser/{{$Activity->activityName}}">นักศึกษาที่เข้าร่วมกิจกรรม</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <div class="container">
        <div class="row">
            <div class="col-10">

            </div>
            <div class="col">
                <a class="btn btn-warning" href="/export/UserHasActivity/{{$Activity -> activityName}}">ดาวน์โหลด</a>
            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <div class="low">
                    <div class="col-sm-6">
                        <font size="5">{{$Activity -> activityName}}
                        </font><br>
                    </div>
                </div><br>
                <table class="table table-striped table-light">
                    <thead>
                        <tr class="table-warning ">
                            <th>รหัสนักศึกษา</th>
                        </tr>
                    </thead>
                    @foreach($data as $user_has_activity)
                    @if($user_has_activity -> activityName == $Activity -> activityName)
                    <tbody>
                        <tr>
                            <td> {{$user_has_activity -> id_users}}</td>

                        </tr>
                    </tbody>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection