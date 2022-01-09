@extends('layouts.appDormitory_Director')

@section('content')
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
          <select class="custom-select" name="id_type" class="form-control">
            <option value="1">ด้านที่1 การพัฒนาศักยภาพตนเอง</option>
            <option value="2">ด้านที่2 การเสริมสร้างจิตสำนึกและความภาคภูมิใจในสถาบัน</option>
            <option value="3">ด้านที่3 การสร้างเสริมจิตสาธารณะ การธำรงไว้ซึ่งสถาบัน ชาติ ศาสนา พระมหากษัตริย์ และประชาคมโลก</option>
            <option value="4">ด้านที่4 การสร้างเสริมคุณธรรมและจริยธรรม</option>
            <option value="5">ด้านที่ 5การอนุรักษ์ ศิลปะวัฒนธรรมไทย และภูมิปัญญาท้องถิ่น</option>
          </select><br>
          <span class="text-danger"> @error("id_type"){{$message}}@enderror </span><br><br>
          คะแนนกิจกรรม
          <input type="text" name="activityScore" class="form-control">
          <span class="text-danger"> @error("activityScore"){{$message}}@enderror </span><br><br>
          สถานที่จัดกิจกรรม
          <input type="text" name="activityPlace" class="form-control" >
          <span class="text-danger"> @error("activityPlace"){{$message}}@enderror </span><br><br>
          หน่วยงานที่รับผิดชอบโครงการ
          <input type="text" name="activityResponsible" class="form-control" > 
          <span class="text-danger"> @error("activityResponsible"){{$message}}@enderror </span><br><br>
          จัดกิจกรรมตั้งแต่วันที่<br>
          <input type="text" name="activityStartDate" class="form-control" placeholder="dd/mm/yy"><br>ถึงวันที่
          <span class="text-danger"> @error("activityStartDate"){{$message}}@enderror </span><br>
          <input type="text" name="activityEndDate" class="form-control" placeholder="dd/mm/yy"><br>
          <span class="text-danger"> @error("activityEndDate"){{$message}}@enderror </span><br>
          จำนวนเป้าหมายผู้เข้าร่วมโครงการ
          <input type="text" name="activityTarget" class="form-control" ><br>
          <span class="text-danger"> @error("activityTarget"){{$message}}@enderror </span><br>
          งบประมาณที่ใช้ดำเนินโครงการ
          <input type="text" name="activityBudget" class="form-control" ><br>
          <span class="text-danger"> @error("activityBudget"){{$message}}@enderror </span><br>
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


@endsection