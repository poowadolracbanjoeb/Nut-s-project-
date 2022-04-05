@extends('layouts.appDormitory_Chairman')


@section('content')
<div class="wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>แก้ไขโครงร่างกิจกรรม
          </h1><br>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Dormitory_Director/home">หน้าหลัก</a></li>
            <li class="breadcrumb-item active"> <a href="/Dormitory_Director/manageActivity">จัดการกิจกรรม</a></li>
            <li class="breadcrumb-item active"> <a href="/Dormitory_Director/editActivity"> แก้ไขกิจกรรม</a></li>
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
            <input type="text" name="activityId" class="form-control" readonly>
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
            <input type="number" name="activityScore" class="form-control">
            <span class="text-danger"> @error("activityScore"){{$message}}@enderror </span><br><br>
            สถานที่จัดกิจกรรม
            <input type="text" name="activityPlace" class="form-control">
            <span class="text-danger"> @error("activityPlace"){{$message}}@enderror </span><br><br>
            หน่วยงานที่รับผิดชอบโครงการ
            <br>
            <select class="form-select" name="dormResponsibility1" class="form-control">
              <option value="">เลือกหน่วยงานที่รับผิดชอบโครงการ</option>
              @foreach($data as $dorm)
              <option value="{{$dorm->dormName}}">{{$dorm->dormName}}</option>
              @endforeach
            </select> 
            <a href="#demo" data-toggle="collapse">เพิ่มหน่วยงานรับผิดชอบโครงการ</a><br>
            <span class="text-danger"> @error("dormResponsibility1"){{$message}}@enderror </span>
            <div id="demo" class="collapse">
              <select class="form-select" name="dormResponsibility2" class="form-control">
                <option value="">เลือกหน่วยงานที่รับผิดชอบโครงการ</option>
                @foreach($data as $dorm)
                <option value="{{$dorm->dormName}}">{{$dorm->dormName}}</option>
                @endforeach
              </select>
              <span class="text-danger"> @error("dormResponsibility2"){{$message}}@enderror </span><br><br>
            </div><br><br>

            จัดกิจกรรมตั้งแต่วันที่<br>
            <span class="glyphicon glyphicon-calendar"></span>
            <input type="text" name="activityStartDate" class="form-control date form-control" placeholder="">
            <span class="text-danger"> @error("activityStartDate"){{$message}}@enderror </span><br><br>ถึงวันที่<br>

            <input type="text" name="activityEndDate" class="form-control date form-control" placeholder="">
            <span class="text-danger"> @error("activityEndDate"){{$message}}@enderror </span><br><br>
            จำนวนเป้าหมายผู้เข้าร่วมโครงการ
            <input type="number" name="activity_Target" class="form-control">
            <span class="text-danger"> @error("activity_Target"){{$message}}@enderror </span><br><br>
            งบประมาณที่ใช้ดำเนินโครงการ
            <input type="number" name="activity_Budget" class="form-control">
            <span class="text-danger"> @error("activity_Budget"){{$message}}@enderror </span><br><br>
            ปีการศึกษา (เช่น 1/2565)
            <input type="text" name="semester" class="form-control">
            <span class="text-danger"> @error("semester"){{$message}}@enderror </span><br><br><br>
            เอกสารประกอบโครงการ<br><br>
            <input type="file" name="activityFile"><br><br>
            <span class="text-danger"> @error("activityFile"){{$message}}@enderror </span><br>

            <script type="text/javascript">
              $('.date').datepicker({
                format: 'yyyy-mm-dd'
              });
            </script>

            <br>
            <br>
            <input type="submit" class="btn btn-success" value="สร้างกิจกรรม" formaction="{{url('/Dormitory_Director/manageActivity/editActivityOutline/submitCreate')}}">
            <input type="submit" class="btn btn-warning" value="บันทึกร่างโครงการ" formaction="{{url('/Dormitory_Director/manageActivity/editActivityOutline/submitSave')}}">
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@include('sweetalert::alert')
@endsection
