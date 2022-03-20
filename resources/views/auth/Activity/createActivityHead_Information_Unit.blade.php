@extends('layouts.appHead_Information_Unit')

@section('content')
<div class="wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>สร้างกิจกรรม
          </h1><br>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Dormitory_Director/home">หน้าหลัก</a></li>
            <li class="breadcrumb-item active"> <a href="/Dormitory_Director/manageActivity">จัดการกิจกรรม</a></li>
            <li class="breadcrumb-item active"> <a href="/Dormitory_Director/createActivity"> สร้างกิจกรรม</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="container">
    <div class="card">
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group">
            ชื่อกิจกรรม
            <input type="text" name="activityName" class="form-control">
            <span class="text-danger"> @error("activityName"){{$message}}@enderror </span><br><br>
            รหัสกิจกรรม
            <input type="text" name="activityId" class="form-control">
            <span class="text-danger"> @error("activityId"){{$message}}@enderror </span><br><br>

            ลักษณะกิจกรรม
            <br>

            <select class="form-select" name="id_type" class="form-control">
              @foreach($data2 as $type)
              <option value="{{$type->id_type}}">ด้านที่ {{$type->id_type}} {{$type->typeName}}</option>
              @endforeach
            </select>

            <a href="/Dormitory_Director/AddActivityType">เพิ่มลักษณะกิจกรรม</a>
            <br>
            <br>
            <br>
            คะแนนกิจกรรม
            <input type="text" name="activityScore" class="form-control">
            <span class="text-danger"> @error("activityScore"){{$message}}@enderror </span><br><br>
            สถานที่จัดกิจกรรม
            <input type="text" name="activityPlace" class="form-control">
            <span class="text-danger"> @error("activityPlace"){{$message}}@enderror </span><br><br>
            หน่วยงานที่รับผิดชอบโครงการ
            <br>
            <select class="form-select" name="dormResponsibility1" class="form-control">
              <option value="">เลือกหน่วยงานที่รับผิดชอบโครงการ</option>
              @foreach($data as $dorm)
              <option value="{{$dorm->id_dorm}}">{{$dorm->dormName}}</option>
              @endforeach
            </select>
            <a href="#demo" data-toggle="collapse">เพิ่มหน่วยงานรับผิดชอบโครงการ</a><br>
            <span class="text-danger"> @error("dormResponsibility1"){{$message}}@enderror </span>
            <div id="demo" class="collapse">
              <select class="form-select" name="dormResponsibility2" class="form-control">
                <option value="">เลือกหน่วยงานที่รับผิดชอบโครงการ</option>
                @foreach($data as $dorm)
                <option value="{{$dorm->id_dorm}}">{{$dorm->dormName}}</option>
                @endforeach
              </select>
              <span class="text-danger"> @error("dormResponsibility2"){{$message}}@enderror </span><br><br>
            </div><br><br><br>

            จัดกิจกรรมตั้งแต่วันที่<br>
            <span class="glyphicon glyphicon-calendar"></span>
            <input type="text" name="activityStartDate" class="form-control date form-control" placeholder=""><br>ถึงวันที่
            <span class="text-danger"> @error("activityStartDate"){{$message}}@enderror </span><br>
            <input type="text" name="activityEndDate" class="form-control date form-control" placeholder=""><br>
            <span class="text-danger"> @error("activityEndDate"){{$message}}@enderror </span><br><br>
            จำนวนเป้าหมายผู้เข้าร่วมโครงการ
            <input type="number" name="activity_Target" class="form-control"><br>
            <span class="text-danger"> @error("activity_Target"){{$message}}@enderror </span><br>
            งบประมาณที่ใช้ดำเนินโครงการ
            <input type="number" name="activity_Budget" class="form-control"><br>
            <span class="text-danger"> @error("activity_Budget"){{$message}}@enderror </span><br>
            ปีการศึกษา
            <input type="text" name="semester" class="form-control">
            <span class="text-danger"> @error("semester"){{$message}}@enderror </span><br><br>
            เอกสารประกอบโครงการ<br><br>
            <input type="file" name="activityFile"><br><br>
            <span class="text-danger"> @error("activityFile"){{$message}}@enderror </span><br>

              <script type="text/javascript">
                $('.date').datepicker({
                  format: 'yyyy-mm-dd'
                });
              </script>

            @if(Session::has('post_update'))
            <span>{{Session::get('post_update')}}</span>
            @endif
            <br>
            <br>
                    <input type="submit" class="btn btn-success" value="สร้างกิจกรรม" formaction="{{url('/Head_Information_Unit/createActivity/Submit')}}">
                    <input type="submit" class="btn btn-warning" value="บันทึกร่างโครงการ" formaction="{{url('/Head_Information_Unit/createActivity/Outline/Submit')}}">
            </form>
        </div>
    </div>
</div>


@endsection