@extends('layouts.appDormitory_Counselor')

@section('content')
<div class="wrapper">
    <!-- Content Header (Page header) -->

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>อนุมัติกิจกรรม
                    </h1><br>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Dormitory_Counselor/home">หน้าหลัก</a></li>
                        <li class="breadcrumb-item active"><a href="/Dormitory_Counselor/approveActivity">อนุมัติกิจกรรม</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-light">
                    <thead>
                        <tr class="table-warning ">
                            <th>ชื่อโครงการ</th>
                            <th>สถานที่ปฏิบัติงาน</th>
                            <th>วันที่จัดกิจกรรม</th>
                            <th>เอกสารประกอบโครงการ</th>
                            <th>ดำเนินการ</th>
                        </tr>
                    </thead>
                    @foreach($file as $Activity)
                    @if($Activity->id_status == 21)
                    <tbody>
                        <td>{{$Activity->activityName}}</td>
                        <td>{{$Activity->activityPlace}}</td>
                        <td>{{$Activity->activityStartDate}} ถึง {{$Activity->activityEndDate}}</td>
                        <td><a class="btn btn-info" href="/activityFile/download/{{$Activity->activityFile}}">ดาวน์โหลด</a></td>
                        <td>
                            <a class="btn btn-info" href="/Dormitory_Counselor/approveActivity/approve/{{$Activity->activityId}}">อนุมัติกิจกรรม</a>
                        </td>
                    </tbody>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>

</div>

@endsection