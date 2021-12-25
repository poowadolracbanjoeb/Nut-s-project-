@extends('layouts.appDormitory_Chairman')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="activityName" class="form-control" placeholder="ชื่อโครงการ">
                    <span class="text-danger"> @error("activityName"){{$message}}@enderror </span><br><br>
                    <select class="custom-select" name="activityType" class="form-control">
                        <option selected>ลักษณะโครงการ</option>
                        <option value=" ด้านการพัฒนาศักยภาพตนเอง"> ด้านการพัฒนาศักยภาพตนเอง</option>
                        <option value="ด้านการเสริมสร้างจิตสำนึกและความภาคภูมิใจในสถาบัน">ด้านการเสริมสร้างจิตสำนึกและความภาคภูมิใจในสถาบัน</option>
                        <option value=" ด้านการสร้างเสริมจิตสาธารณะ การธำรงไว้ซึ่งสถาบัน ชาติ ศาสนา พระมหากษัตริย์ และประชาคมโลก"> ด้านการสร้างเสริมจิตสาธารณะ การธำรงไว้ซึ่งสถาบัน ชาติ ศาสนา พระมหากษัตริย์ และประชาคมโลก</option>
                        <option value=" ด้านการสร้างเสริมคุณธรรมและจริยธรรม"> ด้านการสร้างเสริมคุณธรรมและจริยธรรม</option>
                        <option value="  ด้านการอนุรักษ์ ศิลปะวัฒนธรรมไทย และภูมิปัญญาท้องถิ่น"> ด้านการอนุรักษ์ ศิลปะวัฒนธรรมไทย และภูมิปัญญาท้องถิ่น</option>
                    </select><br><br>
                    <span class="text-danger"> @error("activityType"){{$message}}@enderror </span><br>

                    <input type="text" name="activityPlace" class="form-control" placeholder="สถานที่ปฏิบัติงาน"><br>
                    <span class="text-danger"> @error("activityPlace"){{$message}}@enderror </span><br>
                    <input type="text" name="activityResponsible" class="form-control" placeholder="หน่วยงานที่รับผิดชอบโครงการ"><br>
                    <span class="text-danger"> @error("activityResponsible"){{$message}}@enderror </span><br>
                    ตั้งแต่วันที่<br>
                    <input type="text" name="activityStartDate" class="form-control" placeholder="วันที่"><br>ถึง<br>
                    <span class="text-danger"> @error("activityStartDate"){{$message}}@enderror </span><br>
                    <input type="text" name="activityEndDate" class="form-control" placeholder="วันที่"><br>
                    <span class="text-danger"> @error("activityEndDate"){{$message}}@enderror </span><br>
                    <input type="text" name="activityTarget" class="form-control" placeholder="จำนวนเป้าหมายผู้เข้าร่วมโครงการ"><br>
                    <span class="text-danger"> @error("activityTarget"){{$message}}@enderror </span><br>
                    <input type="text" name="activityBudget" class="form-control" placeholder="งบประมาณที่ใช้ดำเนินโครงการ"><br>
                    <span class="text-danger"> @error("activityBudget"){{$message}}@enderror </span><br>
                    เอกสารประกอบโครงการ<br><br>
                    <input type="file" name="activityFile"><br><br>
                    <span class="text-danger"> @error("activityFile"){{$message}}@enderror </span><br>
                    @if(Session::has('post_update'))
                    <span>{{Session::get('post_update')}}</span>
                    @endif
                    <br>
                    <br>
                    <input type="submit" class="btn btn-success" value="สร้างกิจกรรม" formaction="{{url('/Dormitory_Chairman/createActivity/Submit')}}">
                    <input type="submit" class="btn btn-warning" value="บันทึกร่างโครงการ" formaction="{{url('/Dormitory_Chairman/createActivity/Outline/Submit')}}">
            </form>
        </div>
    </div>
</div>
@endsection
