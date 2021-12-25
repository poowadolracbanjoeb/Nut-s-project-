@extends('layouts.appDirector_Dormitory_Service_Division')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('กิจกรรม') }}</div>

                <div class="card-body">
                    <div class="mb-3 row">
                        <table class="table" border="1">
                            <thead>
                                <tr>
                                    <th>รหัสกิจกรรม</th>
                                    <th>ชื่อโครงการ</th>
                                    <th>ลักษณะโครงการ</th>
                                    <th>สถานที่ปฏิบัติงาน</th>
                                    <th>หน่วยงานที่รับผิดชอบโครงการ</th>
                                    <th>วันที่เริ่มจัด</th>
                                    <th>ถึงวันที่</th>
                                    <th>จำนวนเป้าหมายผู้เข้าร่วมโครงการ</th>
                                    <th>งบประมาณที่ใช้ดำเนินโครงการ</th>
                                    <th>เอกสารประกอบโครงการ</th>
                                </tr>
                            </thead>
                            @foreach($file as $key=>$data)
                            @if($data->activityStatus==5)
                            <tbody>
                                <tr>
                                    <td>{{$data->activityId}}</td>
                                    <td>{{$data->activityName}}</td>
                                    <td>{{$data->activityType}}</td>
                                    <td>{{$data->activityPlace}}</td>
                                    <td>{{$data->activityResponsible}}</td>
                                    <td>{{$data->activityStartDate}}</td>
                                    <td>{{$data->activityEndDate}}</td>
                                    <td>{{$data->activityTarget}}</td>
                                    <td>{{$data->activityBudget}}</td>
                                    <td><a href="/activityFile/download/{{$data->activityFile}}">Download</a></td>

                            @endif
                            @endforeach
                            </form>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
