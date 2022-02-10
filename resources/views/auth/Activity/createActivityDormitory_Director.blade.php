@extends('layouts.appDormitory_Director')

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
            ลักษณะกิจกรรม

            <select class="form-select" name="id_type" class="form-control">
              @foreach($data2 as $type)
              <option value="{{$type->id_type}}">ด้านที่ {{$type->id_type}} {{$type->typeName}}</option>
              @endforeach
            </select>
            <a href="/Dormitory_Director/AddActivityType">เพิ่มลักษณะกิจกรรม</a>
            <br>  
            <span class="text-danger"> @error("id_type"){{$message}}@enderror </span><br><br>
            คะแนนกิจกรรม
            <input type="text" name="activityScore" class="form-control">
            <span class="text-danger"> @error("activityScore"){{$message}}@enderror </span><br><br>
            สถานที่จัดกิจกรรม
            <input type="text" name="activityPlace" class="form-control">
            <span class="text-danger"> @error("activityPlace"){{$message}}@enderror </span><br><br>
            หน่วยงานที่รับผิดชอบโครงการ
            <br>
            <select class="form-select" name="dormResponsibility1" class="form-control">
              @foreach($data as $dorm)
              <option value="{{$dorm->id_dorm}}">{{$dorm->dormName}}</option>
              @endforeach
            </select>
            <a href="#demo" data-toggle="collapse">เพิ่มหน่วยงานรับผิดชอบโครงการ</a>
            <div id="demo" class="collapse">
              <select class="form-select" name="dormResponsibility2" class="form-control">
                @foreach($data as $dorm)
                <option value="{{$dorm->id_dorm}}">{{$dorm->dormName}}</option>
                @endforeach
              </select>
            </div>

            
            <span class="text-danger"> @error("activityResponsible"){{$message}}@enderror </span><br><br>
            จัดกิจกรรมตั้งแต่วันที่<br>
            <input type="text" name="activityStartDate" class="form-control" placeholder="dd/mm/yy"><br>ถึงวันที่
            <span class="text-danger"> @error("activityStartDate"){{$message}}@enderror </span><br>
            <input type="text" name="activityEndDate" class="form-control" placeholder="dd/mm/yy"><br>
            <span class="text-danger"> @error("activityEndDate"){{$message}}@enderror </span><br>
            จำนวนเป้าหมายผู้เข้าร่วมโครงการ
            <input type="text" name="activityTarget" class="form-control"><br>
            <span class="text-danger"> @error("activityTarget"){{$message}}@enderror </span><br>
            งบประมาณที่ใช้ดำเนินโครงการ
            <input type="text" name="activityBudget" class="form-control"><br>
            <span class="text-danger"> @error("activityBudget"){{$message}}@enderror </span><br>
            ปีการศึกษา
            <input type="text" name="semester" class="form-control"><br>
            เอกสารประกอบโครงการ<br><br>
            <input type="file" name="activityFile"><br><br>
            <span class="text-danger"> @error("activityFile"){{$message}}@enderror </span><br>
            @if(Session::has('post_update'))
            <span>{{Session::get('post_update')}}</span>
            @endif
            <br>
            <br>
            <input type="submit" class="btn btn-success" value="สร้างกิจกรรม" formaction="{{url('/Dormitory_Director/createActivity/Submit')}}">
            <input type="submit" class="btn btn-warning" value="บันทึกร่างโครงการ" formaction="{{url('/Dormitory_Director/createActivity/Outline/Submit')}}">
        </form>
      </div>
    </div>
  </div>

</div>

@endsection