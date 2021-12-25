@extends('layouts.appDormitory_Director')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <table class="table table-striped w-auto">
                <thead>
                    <tr class="table-primary ">
                        <th scope="row">รหัสกิจกรรม</th>
                        <th>ชื่อโครงการ</th>
                        <th>ลักษณะโครงการ</th>
                        <th>สถานที่ปฏิบัติงาน</th>
                        <th>วันที่จัดกิจกรรม</th>
                        <th>เอกสารประกอบโครงการ</th>
                        <th>สถานะโครงการ</th>
                        <th>ดำเนินการ</th>
                    </tr>
                </thead>
                @foreach($file as $key=>$data)
                @if($data->activityStatus==5)
                <tbody>
                    <td>{{$data->activityId}}</td>
                    <td>{{$data->activityName}}</td>
                    <td>{{$data->activityType}}</td>
                    <td>{{$data->activityPlace}}</td>
                    <td>{{$data->activityStartDate}}</td>
                    <td><a class="btn btn-secondary" href="/activityFile/download/{{$data->activityFile}}">ดาวน์โหลด</a></td>
                    <td>{{$data->activityStatusName}}</td>
                    <td><a class="btn btn-warning" href="/Dormitory_Director/manageActivity/activityDetail/{{$data->activityId}}">ดูรายละเอียด</a>
                    <a class="btn btn-success" href="/Dormitory_Director/showActivityAdvice/{{$data->activityId}}">ดำเนินกิจกรรม</a>
                    

                </tbody>
                @endif
                @endforeach
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>



@endsection
