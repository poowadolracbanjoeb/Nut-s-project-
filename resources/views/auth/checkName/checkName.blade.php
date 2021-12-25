@extends('layouts.appDormitory_Director')

@section('content')
<br>

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>เช็กชื่อกิจกรรม 
          </h1><br>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Head_Information_Unit/home">หน้าหลัก</a></li>
            <li class="breadcrumb-item active"><a href="/Head_Information_Unit/manageUserAll">เช็กชื่อกิจกรรม</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>


<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <input type="text" name="q" placeholder="ค้นหารายชื่อนักศึกษา" class="form-control" /><br>
                    <input type="submit" class="btn btn-primary" value="ค้นหา" />
                    <input type="submit" class="btn btn-primary" value="ดูนักศึกษาที่เข้าร่วม" />
                </div>
            </form>
            <div class="row">
                <div class="col-10">

                </div>
            </div>
            <br>


            <table class="table table-striped table-ligh">
                <thead>
                    <tr class="table-warning ">
                        <th>รหัสผู้ใช้</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>อีเมลล์</th>
                        <th>เบอร์โทร</th>
                        <th>เช็กชื่อ</th>
                    </tr>
                </thead>
                @foreach($data as $Members)
                <tbody>
                    <td>{{$Members->id}}</td>
                    <td>{{$Members->name}}</td>
                    <td>{{$Members->email}}</td>
                    <td>{{$Members->tel}}</td>
                    <td><a class="btn btn-info" data-toggle="modal" data-target="#exampleModal">เลือก</a>
                    </td>


                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ยืนยันการเช็กชื่อ
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" href ="/checkName/Submit/{activityId}/{id}" >ตกลง</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        
      </div>
    </div>
  </div>
</div>

@endsection
 