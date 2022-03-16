@extends('layouts.appHead_Information_Unit')

@section('content')
<br>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>จัดการข้อมูลผู้ใช้</h1><br>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/Head_Information_Unit/home">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active"><a href="/Head_Information_Unit/manageUserAll">จัดการข้อมูลผู้ใช้</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="container">
    <div class="card bg-light mt-3">
        <div class="card-body">
            <h3>นำข้อมูลผู้ใช้เข้า</h3><br>
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">นำข้อมูลเข้า</button>

            </form>
        </div>
    </div>
</section>
<br>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-body">
            <h3>ค้นหาผู้ใช้</h3><br>
            
            <form action="">
                <div class="form-group">
                    <input type="text" name="q" placeholder="กรุณากรอกชื่อหรือรหัสผู้ใช้งาน" class="form-control" /><br>
                    <input type="submit" class="btn btn-primary" value="ค้นหา" />
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-body">
            <br>
            <div class="row">
                <div class="col-10">

                </div>
                <div class="col">
                    <a class="btn btn-warning" href="{{ route('export') }}">นำข้อมูลออก</a>
                </div>

            </div>
            <br>


            <table class="table table-striped table-ligh">
                <thead>
                    <tr class="table-warning ">
                        <th>รหัสผู้ใช้</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>ดำเนินการ</th>
                    </tr>
                </thead>
                @foreach($data as $Members)
                <tbody>
                    <td>{{$Members->id_users}}</td>
                    <td>{{$Members->name}}</td>
                    <td><a class="btn btn-info" href="">ดูข้อมูล</a>
                        <a class="btn btn-warning" href="">แก้ไข</a>
                        <a class="btn btn-danger" href="">ลบ</a>
                    </td>


                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {!! $data->links() !!}
            </div>

        </div>
    </div>
</div>

@endsection