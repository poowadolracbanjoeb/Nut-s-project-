@extends('layouts.appDormitory_Director')

@section('content')
<div class="wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>แก้ไขเค้าโครงร่างกิจกรรม
          </h1><br>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/Dormitory_Director/home">หน้าหลัก</a></li>
            <li class="breadcrumb-item active"> <a href="/Dormitory_Director/manageActivity">จัดการกิจกรรม</a></li>
            <li class="breadcrumb-item active"> <a href="/Dormitory_Director/manageActivity/editActivityOutline/{{$Activity->activityId}}"> แก้ไขเค้าโครงร่างกิจกรรม</a></li>
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
            รหัสกิจกรรม
            <input type="text" name="activityId" class="form-control" value="{{$Activity->activityId}}" readonly><br><br>
            ชื่อกิจกรรม
            <input type="text" name="activityName" class="form-control" value="{{$Activity->activityName}}">
            <span class="text-danger"> @error("activityName"){{$message}}@enderror </span><br><br>
            ลักษณะกิจกรรม
            <br>
            <select class="form-select" name="id_type" class="form-control" value="{{$Activity->activityId}}">
              @foreach($data2 as $type)
              <option value="{{$type->id_type}}">ด้านที่ {{$type->id_type}} {{$type->typeName}}</option>
              @endforeach
            </select>
            <a href="/Dormitory_Director/AddActivityType">เพิ่มลักษณะกิจกรรม</a>
            <br>
            <br>
            <br>
            คะแนนกิจกรรม
            <input type="number" name="activityScore" class="form-control" value="{{$Activity->activityScore}}">
            <span class="text-danger"> @error("activityScore"){{$message}}@enderror </span><br><br>
            สถานที่จัดกิจกรรม
            <input type="text" name="activityPlace" class="form-control" value="{{$Activity->activityPlace}}">
            <span class="text-danger"> @error("activityPlace"){{$message}}@enderror </span><br><br>

            เพิ่มหน่วยงานที่รับผิดชอบโครงการ (กรณีมีมากกว่า 1 หอพัก)
            <br>
            <a href="#demo1" data-toggle="collapse">เพิ่มหน่วยงานรับผิดชอบโครงการ 2</a><br>
            <div id="demo1" class="collapse">
              <select class="form-select" name="dormResponsibility1" class="form-control">
                <option value="">เลือกหน่วยงานที่รับผิดชอบโครงการ</option>
                @foreach($data as $dorm)
                <option value="{{$dorm->dormName}}">{{$dorm->dormName}}</option>
                @endforeach
              </select>
              <br><br>
              <a href="#demo2" data-toggle="collapse">เพิ่มหน่วยงานรับผิดชอบโครงการ 3</a><br>
            </div>
            <div id="demo2" class="collapse">
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
            <input type="text" name="activityStartDate" class="form-control date form-control" placeholder=""     value="{{$Activity->activityStartDate}}"
            <span class="text-danger"> @error("activityStartDate"){{$message}}@enderror </span><br><br>ถึงวันที่<br>

            <input type="text" name="activityEndDate" class="form-control date form-control" placeholder=""  value="{{$Activity->activityEndDate}}">
            <span class="text-danger"> @error("activityEndDate"){{$message}}@enderror </span><br><br>
            จำนวนเป้าหมายผู้เข้าร่วมโครงการ
            <input type="number" name="activity_Target" class="form-control"  value="{{$Activity->activity_Target}}">
            <span class="text-danger"> @error("activity_Target"){{$message}}@enderror </span><br><br>
            งบประมาณที่ใช้ดำเนินโครงการ
            <input type="number" name="activity_Budget" class="form-control"  value="{{$Activity->activity_Budget}}">
            <span class="text-danger"> @error("activity_Budget"){{$message}}@enderror </span><br><br>
            ปีการศึกษา (เช่น 1/2565)
            <input type="text" name="semester" class="form-control"  value="{{$Activity->semester}}">
            <span class="text-danger"> @error("semester"){{$message}}@enderror </span><br><br><br>
            เอกสารประกอบโครงการ<br><br>
            <input type="file" name="activityFile" value="{{$Activity->activityFile}}"><br><br>
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




