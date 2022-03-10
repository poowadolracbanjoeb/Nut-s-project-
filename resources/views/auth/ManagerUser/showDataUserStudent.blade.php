@extends('layouts.appStudent')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>ข้อมูลนักศึกษา
                </h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/Student/home">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active"><a href="/Student/showDataUser">ข้อมูลนักศึกษา</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>ชื่อ </a>
                </div>
                <div class="col-9 bg-light">
                    <a>
                        {{ Auth::user()->name }}
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>รหัสนักศึกษา </a>
                </div>
                <div class="col-9 bg-light">
                    <a>
                        {{ Auth::user()->id_users }}

                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>คณะ</a>
                </div>
                <div class="col-9 bg-light">
                    <a>
                        {{ Auth::user()->student_faculty }}
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>ชั้นปีที่</a>
                </div>
                <div class="col-9 bg-light">
                    <a>
                        {{ Auth::user()->student_degree }}
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>เบอร์โทร</a>
                </div>
                <div class="col-9 bg-light">
                    <a>
                        {{ Auth::user()->tel }}
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3 bg-warning">
                    <a>อีเมล</a>
                </div>
                <div class="col-9 bg-light">
                    <a>
                        {{ Auth::user()->email }}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>

    <div class="row mb-2">
        <div class="col-sm-6">
            <h5>ประวัติหอพัก
            </h5><br>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-4 bg-warning">
                    <a>ปีการศึกษา</a>
                </div>
                <div class="col-4 bg-warning">
                    <a>
                        หมายเลขห้อง
                    </a>
                </div>
                <div class="col-4 bg-warning">
                    <a>
                        หอพักนักศึกษา
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @foreach($data as $data)
            @if($data->id_users == Auth::user()->id_users )
            <div class="row">
                <div class="col-4 bg-light">
                    <a>{{$data->semester}}
                    </a>
                </div>
                <div class="col-4 bg-light">
                    <a>
                        {{$data->room}}
                    </a>
                </div>
                <div class="col-4 bg-light">
                    <a>
                        {{$data->dormName}}
                    </a>
                </div>
            </div>
            @endif
            @endforeach
            <br>
        </div>
    </div>
</div>
@endsection