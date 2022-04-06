<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\users_has_activities;
use App\Models\activities_types;
use App\Models\dormitories;
use App\Models\activity_responsible_dorm;
use App\Models\user_score;
use RealRashid\SweetAlert\Facades\Alert;


class ActivityController extends Controller
{
    //--------------------Dormitory_Director-------------------------------------


    public function createActivityDormitory_Director()
    {
        $type = activities_types::all();
        $dorm = dormitories::all();
        return view('auth.Activity.createActivityDormitory_Director')->with('data', $dorm)->with('data2', $type);
    }

    public function manageActivityDormitory_Director(Request $request)
    {
        $myDorm = DB::table('dormitory_user_history')->where('id_users', auth()->user()->id_users)->first();
        $search =  $request->input('q');
        if ($search != "") {
            $Activity = Activity::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
                ->paginate(10);
            $Activity->appends(['q' => $search]);
        } else {
            $Activity = Activity::paginate(10);
            return view('auth.Activity.manageActivityDormitory_Director', compact('myDorm'))->with('file', $Activity);
        }
    }

    public function AddActivityTypeDormitory_Director()
    {
        return view('auth.Activity.AddActivityTypeDormitory_Director');
    }
    public function AddActivityTypeDormitory_Chairman()
    {
        return view('auth.Activity.AddActivityTypeDormitory_Chairman');
    }
    public function AddActivityTypeHead_Information_Unit()
    {
        return view('auth.Activity.AddActivityTypeHead_Information_Unit');
    }



    public function conductActivityDormitory_Director()
    {
        $file = Activity::all();
        return view('auth.Activity.conductActivityDormitory_Director', compact('file'));
    }

    public function userConductActivityDormitory_Director($activityId)
    {
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.ConductActivity.userConductActivityDormitory_Director', compact('Activity'));
    }

    public function viewStatusActivityApproveDormitory_Director()
    {
        $file = Activity::all();
        return view('auth.Activity.viewStatusActivityApproveDormitory_Director', compact('file'));
    }



    public function submitCreateActivityDormitory_Director(Request $request)
    {
        $this->validate(
            $request,
            [
                'activityName' => 'required|unique:activities',
                'activityScore' => 'required',
                'activityPlace' => 'required',
                'activityStartDate' => 'required',
                'activityEndDate' => 'required',
                'activity_Target' => 'required',
                'activity_Budget' => 'required',
                'semester' => 'required',
                'activityFile' => 'required',
            ],
            [
                'activityName.required'    => 'กรุณากรอกชื่อกิจกรรม',
                'activityName.unique'    => 'มีชื่อกิจกรรมนี้แล้ว กรุณากรอกใหม่อีกครั้ง',
                'activityScore.required'    => 'กรุณากรอกคะแนนกิจกรรม',
                'activityPlace.required'    => 'กรุณากรอกชื่อสถานที่จัดกิจกรรม',
                'activityStartDate.required'    => 'กรุณาเลือกวันที่เริ่มต้นจัดกิจกรรม',
                'activityEndDate.required'    => 'กรุณาเลือกวันที่จัดกิจกรรมวันสุดท้าย',
                'activity_Target.required'    => 'กรุณากรอกจำนวนเป้าหมายผู้เข้าร่วมโครงการ',
                'activity_Budget.required'    => 'กรุณากรอกงบประมาณที่ใช้ดำเนินโครงการ',
                'semester.required'    => 'กรุณากรอกปีการศึกษา',
                'activityFile.required'    => 'กรุณาแนบไฟล์อกสารประกอบโครงการ'

            ]
        );
        $myDorm = DB::table('dormitory_user_history')->where('id_users', auth()->user()->id_users)->first();

        $data1 = new Activity;
        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $activityFile = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $activityFile);
            $data1->activityFile = $activityFile;
        }
        $data1->activityName = $request->activityName;
        $data1->activityPlace = $request->activityPlace;
        $data1->activityStartDate = $request->activityStartDate;
        $data1->activityEndDate = $request->activityEndDate;
        $data1->activityScore = $request->activityScore;
        $data1->id_type = $request->id_type;
        $data1->activity_Target = $request->activity_Target;
        $data1->activity_Budget = $request->activity_Budget;
        $data1->semester = $request->semester;
        $data1->userActivityResponsibleActivity = auth()->user()->id_users;
        $data1->id_status = 11;
        $data1->dormResponsibleActivity = $myDorm;
        $data1->save();

        $data2 = new activity_responsible_dorm;
        $data2->activityName = $request->activityName;
        $data2->dormName = $myDorm;
        $data2->save();

        if ($request->dormResponsibility1 != null) {
            $data2 = new activity_responsible_dorm;
            $data2->activityName = $request->activityName;
            $data2->dormName = $request->dormResponsibility1;
            $data2->save();
        }

        if ($request->dormResponsibility2 != null) {
            $data2 = new activity_responsible_dorm;
            $data2->activityName = $request->activityName;
            $data2->dormName = $request->dormResponsibility1;
            $data2->save();
        }

        Alert::success('สร้างกิจกรรมสำเร็จ');
        return back();
    }





    public function activityDetailDormitory_Director($activityName)
    {
        $file = Activity::all();
        $Activity = DB::table('activities')->where('activityName', $activityName)->first();
        return view('auth.Activity.activityDetailDormitory_Director', compact('Activity'));
    }


    public function submitSaveEditActivityOutline_Dormitory_Chairman(Request $request)
    {
        $this->validate(
            $request,
            [
                'activityName' => 'required|unique:activities',
            ],
            [
                'activityName.required'    => 'กรุณากรอกชื่อกิจกรรม',
                'activityName.unique'    => 'มีชื่อกิจกรรมนี้แล้ว กรุณากรอกใหม่อีกครั้ง',
            ]
        );

        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $filename = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $filename);
            DB::table('activities')->where('activityId', $request->activityId)->update([
                'activityFile' => $filename
            ]);
        }

        DB::table('activities')->where('activityId', $request->activityId)->update([
            'activityName' => $request->activityName,
            'id_type' =>  $request->id_type,
            'activityPlace' => $request->activityPlace,
            'activityStartDate' => $request->activityStartDate,
            'activityEndDate' => $request->activityEndDate,
            'activity_Target' =>  $request->activity_Target,
            'activity_Budget' => $request->activity_Budget,
            'semester' =>   $request->semester,
            'activityScore' =>  $request->activityScore,
        ]);

        Alert::success('บันทึกร่างโครงการสำเร็จ');
        return back();
    }



    public function submitSaveEditActivityOutline_Head_Information_Unit(Request $request)
    {
        $this->validate(
            $request,
            [
                'activityName' => 'required|unique:activities',
            ],
            [
                'activityName.required'    => 'กรุณากรอกชื่อกิจกรรม',
                'activityName.unique'    => 'มีชื่อกิจกรรมนี้แล้ว กรุณากรอกใหม่อีกครั้ง',
            ]
        );

        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $filename = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $filename);
            DB::table('activities')->where('activityId', $request->activityId)->update([
                'activityFile' => $filename
            ]);
        }

        DB::table('activities')->where('activityId', $request->activityId)->update([
            'activityName' => $request->activityName,
            'id_type' =>  $request->id_type,
            'activityPlace' => $request->activityPlace,
            'activityStartDate' => $request->activityStartDate,
            'activityEndDate' => $request->activityEndDate,
            'activity_Target' =>  $request->activity_Target,
            'activity_Budget' => $request->activity_Budget,
            'semester' =>   $request->semester,
            'activityScore' =>  $request->activityScore,
        ]);

        Alert::success('บันทึกร่างโครงการสำเร็จ');
        return back();
    }


    public function showActivityAdvice_Dormitory_Director($activityId)
    {
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.Activity.showActivityAdvice_Dormitory_Director', compact('Activity'));
    }


    public function editActivityOutline_Dormitory_Director($activityId)
    {
        $type = activities_types::all();
        $dorm = dormitories::all();
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.Activity.editActivityOutline_Dormitory_Director', compact('Activity'))->with('data', $dorm)->with('data2', $type);
    }


    public function delete_user_has_Activity_Dormitory_Director($id_user, $activityName)
    {
        DB::table('users_has_activities')->where('id_users', $id_user)->where('activityName', $activityName)->delete();
        $count_user_has_activities = DB::table('users_has_activities')->where('id_users', $id_user)->count();
        $sum_user_has_activities = DB::table('users_has_activities')->where('id_users', $id_user)->sum('activityScore');

        DB::table('user_score')->where('id_users', $id_user)->update([
            'count_of_activities' => $count_user_has_activities,
            'sum_score' =>  $sum_user_has_activities
        ]);
        Alert::success('ลบสำเร็จ');
        return back();
    }



    public function deleteActivity_Dormitory_Director(Request $request)
    {
        DB::table('activities')->where('activityId', $request->activityId)->delete();
        return back();
    }

    public function manageActivityOutlineDormitory_Director()
    {
        $file = Activity::all();
        return view('auth.Activity.manageActivityOutlineDormitory_Director', compact('file'));
    }

    public function manageActivityOutlineDormitory_Chairman()
    {
        $file = Activity::all();
        return view('auth.Activity.manageActivityOutlineDormitory_Chairman', compact('file'));
    }

    public function manageActivityFellDormitory_Director()
    {
        $file = Activity::all();
        return view('auth.Activity.manageActivityFellDormitory_Director', compact('file'));
    }

    public function manageActivityFellDormitory_Chairman()
    {
        $file = Activity::all();
        return view('auth.Activity.manageActivityFellDormitory_Chairman', compact('file'));
    }

    public function submitCreateActivityOutlineDormitory_Director(Request $request)
    {
        $this->validate(
            $request,
            [
                'activityName' => 'required ',
            ],
            [
                'activityName.required'    => 'กรุณากรอกชื่อกิจกรรม',
            ]
        );

        $data1 = new Activity;
        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $activityFile = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $activityFile);
            $data1->activityFile = $activityFile;
        }
        $data1->activityName = $request->activityName;
        $data1->id_type = $request->id_type;
        if ($request->activityId != null) {
            $data1->activityId = $request->activityPlace;
        }

        if ($request->activityPlace != null) {
            $data1->activityPlace = $request->activityPlace;
        }
        if ($request->activityStartDate != null) {
            $data1->activityStartDate = $request->activityStartDate;
        }
        if ($request->activityEndDate != null) {
            $data1->activityEndDate = $request->activityEndDate;
        }
        if ($request->activityScore != null) {
            $data1->activityScore = $request->activityScore;
        }
        if ($request->activity_Target != null) {
            $data1->activity_Target = $request->activity_Target;
        }
        if ($request->activity_Budget != null) {
            $data1->activity_Budget = $request->activity_Budget;
        }
        if ($request->semester != null) {
            $data1->semester = $request->semester;
        }
        $data1->userActivityResponsibleActivity = auth()->user()->id_users;
        $data1->id_status = 10;
        $data1->save();
        Alert::success('บันทึกร่างโครงการสำเร็จ');
        return back();
    }



    public function activityHasUserDormitory_Director($activityName)
    {
        $user_has_activity = users_has_activities::all();
        $Activity = DB::table('activities')->where('activityName', $activityName)->first();
        return view('auth.Activity.activityHasUserDormitory_Director', compact('Activity'))->with('data', $user_has_activity);
    }

    public function SubmitAddActivityTypeDormitory_Director(Request $request)
    {
        $this->validate(
            $request,
            [
                'typeId' => 'required ',
                'typeName' => 'required '
            ],
            [
                'typeId.required'    => 'กรุณากรอกด้านกิจกรรม',
                'typeName.required'    => 'กรุณากรอกชื่อลักษณะกิจกรรม'

            ]
        );


        $data = new activities_types;
        $data->id_type = $request->typeId;
        $data->typeName = $request->typeName;
        $data->save();
        return back()->with('post_update', 'บันทึกเค้าโครงร่างกิจกรรมสำเร็จ');
    }

    public function SubmitAddActivityTypeDormitory_Chairman(Request $request)
    {
        $this->validate(
            $request,
            [
                'typeId' => 'required ',
                'typeName' => 'required '
            ],
            [
                'typeId.required'    => 'กรุณากรอกด้านกิจกรรม',
                'typeName.required'    => 'กรุณากรอกชื่อลักษณะกิจกรรม'

            ]
        );


        $data = new activities_types;
        $data->id_type = $request->typeId;
        $data->typeName = $request->typeName;
        $data->save();
        return back()->with('post_update', 'บันทึกเค้าโครงร่างกิจกรรมสำเร็จ');
    }
    public function SubmitAddActivityTypeHead_Information_Unit(Request $request)
    {
        $this->validate(
            $request,
            [
                'typeId' => 'required ',
                'typeName' => 'required '
            ],
            [
                'typeId.required'    => 'กรุณากรอกด้านกิจกรรม',
                'typeName.required'    => 'กรุณากรอกชื่อลักษณะกิจกรรม'

            ]
        );


        $data = new activities_types;
        $data->id_type = $request->typeId;
        $data->typeName = $request->typeName;
        $data->save();
        return back()->with('post_update', 'บันทึกเค้าโครงร่างกิจกรรมสำเร็จ');
    }







    //---------------------------------------------------------------------------------------------------------------------------------






    //-----------------Dormitory_Chairman-----------------------------------------
    public function viewStatusActivityApproveDormitory_Chairman()
    {
        $file = Activity::all();
        return view('auth.Activity.viewStatusActivityApproveDormitory_Chairman', compact('file'));
    }


    public function createActivityDormitory_Chairman()
    {
        $type = activities_types::all();
        $dorm = dormitories::all();
        return view('auth.Activity.createActivityDormitory_Chairman')->with('data', $dorm)->with('data2', $type);
    }




    public function manageActivityDormitory_Chairman()
    {
        $file = Activity::all();
        return view('auth.Activity.manageActivityDormitory_Chairman', compact('file'));
    }




    public function approveActivityDormitory_Chairman()
    {
        $file = Activity::all();
        return view('auth.Activity.approveActivityDormitory_Chairman', compact('file'));
    }

    public function conductActivityDormitory_Chairman()
    {
        $file = Activity::all();
        return view('auth.Activity.conductActivityDormitory_Chairman', compact('file'));
    }

    public function submitCreateActivityDormitory_Chairman(Request $request)
    {
        $this->validate(
            $request,
            [
                'activityName' => 'required|unique:activities',
                'activityScore' => 'required',
                'activityPlace' => 'required',
                'activityStartDate' => 'required',
                'activityEndDate' => 'required',
                'activity_Target' => 'required',
                'activity_Budget' => 'required',
                'semester' => 'required',
                'activityFile' => 'required',
            ],
            [
                'activityName.required'    => 'กรุณากรอกชื่อกิจกรรม',
                'activityName.unique'    => 'มีชื่อกิจกรรมนี้แล้ว กรุณากรอกใหม่อีกครั้ง',
                'activityScore.required'    => 'กรุณากรอกคะแนนกิจกรรม',
                'activityPlace.required'    => 'กรุณากรอกชื่อสถานที่จัดกิจกรรม',
                'activityStartDate.required'    => 'กรุณาเลือกวันที่เริ่มต้นจัดกิจกรรม',
                'activityEndDate.required'    => 'กรุณาเลือกวันที่จัดกิจกรรมวันสุดท้าย',
                'activity_Target.required'    => 'กรุณากรอกจำนวนเป้าหมายผู้เข้าร่วมโครงการ',
                'activity_Budget.required'    => 'กรุณากรอกงบประมาณที่ใช้ดำเนินโครงการ',
                'semester.required'    => 'กรุณากรอกปีการศึกษา',
                'activityFile.required'    => 'กรุณาแนบไฟล์อกสารประกอบโครงการ'

            ]
        );
        $myDorm = DB::table('dormitory_user_history')->where('id_users', auth()->user()->id_users)->first();

        $data1 = new Activity;
        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $activityFile = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $activityFile);
            $data1->activityFile = $activityFile;
        }
        $data1->activityName = $request->activityName;
        $data1->activityPlace = $request->activityPlace;
        $data1->activityStartDate = $request->activityStartDate;
        $data1->activityEndDate = $request->activityEndDate;
        $data1->activityScore = $request->activityScore;
        $data1->id_type = $request->id_type;
        $data1->activity_Target = $request->activity_Target;
        $data1->activity_Budget = $request->activity_Budget;
        $data1->semester = $request->semester;
        $data1->userActivityResponsibleActivity = auth()->user()->id_users;
        $data1->id_status = 21;
        $data1->dormResponsibleActivity = $myDorm;
        $data1->save();

        $data2 = new activity_responsible_dorm;
        $data2->activityName = $request->activityName;
        $data2->dormName = $myDorm;
        $data2->save();

        if ($request->dormResponsibility1 != null) {
            $data2 = new activity_responsible_dorm;
            $data2->activityName = $request->activityName;
            $data2->dormName = $request->dormResponsibility1;
            $data2->save();
        }

        if ($request->dormResponsibility2 != null) {
            $data2 = new activity_responsible_dorm;
            $data2->activityName = $request->activityName;
            $data2->dormName = $request->dormResponsibility1;
            $data2->save();
        }

        Alert::success('สร้างกิจกรรมสำเร็จ');
        return back();
    }


    public function submitCreateActivityOutlineDormitory_Chairman(Request $request)
    {
        $this->validate(
            $request,
            [
                'activityName' => 'required ',
            ],
            [
                'activityName.required'    => 'กรุณากรอกชื่อกิจกรรม',
            ]
        );

        $data1 = new Activity;
        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $activityFile = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $activityFile);
            $data1->activityFile = $activityFile;
        }
        $data1->activityName = $request->activityName;
        $data1->id_type = $request->id_type;
        if ($request->activityId != null) {
            $data1->activityId = $request->activityPlace;
        }

        if ($request->activityPlace != null) {
            $data1->activityPlace = $request->activityPlace;
        }
        if ($request->activityStartDate != null) {
            $data1->activityStartDate = $request->activityStartDate;
        }
        if ($request->activityEndDate != null) {
            $data1->activityEndDate = $request->activityEndDate;
        }
        if ($request->activityScore != null) {
            $data1->activityScore = $request->activityScore;
        }
        if ($request->activity_Target != null) {
            $data1->activity_Target = $request->activity_Target;
        }
        if ($request->activity_Budget != null) {
            $data1->activity_Budget = $request->activity_Budget;
        }
        if ($request->semester != null) {
            $data1->semester = $request->semester;
        }
        $data1->userActivityResponsibleActivity = auth()->user()->id_users;
        $data1->id_status = 10;
        $data1->save();
        Alert::success('บันทึกร่างโครงการสำเร็จ');
        return back();
    }

    public function approveDormitory_Chairman($activityId)
    {
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.approveActivity.approveDormitory_Chairman', compact('Activity'));
    }

    public function notapproveDormitory_Chairman($activityId)
    {
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.approveActivity.notApproveDormitory_Chairman', compact('Activity'));
    }

    public function submitApproveDormitory_Chairman(Request $request)
    {
        $request->validate([
            'activityFile' => 'required '
        ]);

        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $filename = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $filename);
            DB::table('activities')->where('activityId', $request->activityId)->update([
                'activityFile' => $filename
            ]);
        }
        DB::table('activities')->where('activityId', $request->activityId)->update([
            'id_status' => 21
        ]);
        return back()->with('post_update', 'อนุมัติสำเร็จแล้ว');
    }

    public function submitNotApproveDormitory_Chairman(Request $request)
    {
        $request->validate([
            'activityAdvice' => 'required '
        ]);
        DB::table('activities')->where('activityId', $request->activityId)->update([
            'id_status' => 20,
            'activityAdvice' => $request->activityAdvice
        ]);


        return back()->with('post_update', 'ไม่อนุมัติสำเร็จแล้ว');
    }

    public function userConductActivityDormitory_Chairman($activityId)
    {
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.ConductActivity.userConductActivityDormitory_Chairman', compact('Activity'));
    }

    public function scoreConductActivityDormitory_Chairman($activityId)
    {
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.ConductActivity.scoreConductActivityDormitory_Chairman', compact('Activity'));
    }



    public function showActivityAdvice_Dormitory_Chairman($activityId)
    {
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.Activity.showActivityAdvice_Dormitory_Chairman', compact('Activity'));
    }


    public function editActivityOutline_Dormitory_Chairman($activityId)
    {
        $type = activities_types::all();
        $dorm = dormitories::all();
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.Activity.editActivityOutline_Dormitory_Chairman', compact('Activity'))->with('data', $dorm)->with('data2', $type);
    }

    public function editActivityOutline_Head_Information_Unit($activityId)
    {
        $type = activities_types::all();
        $dorm = dormitories::all();
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.Activity.editActivityOutline_Head_Information_Unit', compact('Activity'))->with('data', $dorm)->with('data2', $type);
    }

    public function editActivity_Head_Information_Unit($activityId)
    {
        $type = activities_types::all();
        $dorm = dormitories::all();
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.Activity.editActivity_Head_Information_Unit', compact('Activity'))->with('data', $dorm)->with('data2', $type);
    }




    public function deleteActivity_Dormitory_Chairman(Request $request)
    {
        DB::table('activities')->where('activityId', $request->activityId)->delete();
        return back();
    }

    public function activityDetailDormitory_Chairman($activityName)
    {
        $Activity = DB::table('activities')->where('activityName', $activityName)->first();
        return view('auth.Activity.activityDetailDormitory_Chairman', compact('Activity'));
    }



    //-------------------------------------------------------------------------------------------------------------------












    public function createActivityHead_Information_Unit()
    {
        $type = activities_types::all();
        $dorm = dormitories::all();
        return view('auth.Activity.createActivityHead_Information_Unit')->with('data', $dorm)->with('data2', $type);
    }








    public function approveActivityDirector_Dormitory_Service_Division()
    {
        $file = Activity::all();
        return view('auth.Activity.approveActivityDirector_Dormitory_Service_Division', compact('file'));
    }
    public function approveActivityDormitory_Counselor()
    {
        $file = Activity::all();
        return view('auth.Activity.approveActivityDormitory_Counselor', compact('file'));
    }
    public function approveActivityHead_Dormitory_Service()
    {
        $file = Activity::all();
        return view('auth.Activity.approveActivityHead_Dormitory_Service', compact('file'));
    }






    public function viewAllActivityDormitory_Counselor()
    {
        $file = Activity::all();
        return view('auth.Activity.viewAllActivityDormitory_Counselor', compact('file'));
    }
    public function viewAllActivityDirector_Dormitory_Service_Division()
    {
        $file = Activity::all();
        return view('auth.Activity.viewAllActivityDirector_Dormitory_Service_Division', compact('file'));
    }
    public function viewAllActivityHead_Dormitory_Service()
    {
        $file = Activity::all();
        return view('auth.Activity.viewAllActivityHead_Dormitory_Service', compact('file'));
    }



    public function manageActivityAllHead_Information_Unit(Request $request)
    {
        $search =  $request->input('q');
        if ($search != "") {
            $Activity = Activity::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
                ->paginate(10);
            $Activity->appends(['q' => $search]);
        } else {
            $Activity = Activity::paginate(10);
            return view('auth.Activity.manageActivityAllHead_Information_Unit')->with('file', $Activity);
        }
    }
    public function manageActivityAllOutlineHead_Information_Unit(Request $request)
    {
        $search =  $request->input('q');
        if ($search != "") {
            $Activity = Activity::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
                ->paginate(10);
            $Activity->appends(['q' => $search]);
        } else {
            $Activity = Activity::paginate(10);
            return view('auth.Activity.manageActivityAllOutlineHead_Information_Unit')->with('file', $Activity);
        }
    }


    public function submitCreateActivityHead_Information_Unit(Request $request)
    {
       $this->validate(
            $request,
            [
                'activityName' => 'required|unique:activities',
                'activityScore' => 'required',
                'activityPlace' => 'required',
                'activityStartDate' => 'required',
                'activityEndDate' => 'required',
                'activity_Target' => 'required',
                'activity_Budget' => 'required',
                'semester' => 'required',
                'activityFile' => 'required',
            ],
            [
                'activityName.required'    => 'กรุณากรอกชื่อกิจกรรม',
                'activityName.unique'    => 'มีชื่อกิจกรรมนี้แล้ว กรุณากรอกใหม่อีกครั้ง',
                'activityScore.required'    => 'กรุณากรอกคะแนนกิจกรรม',
                'activityPlace.required'    => 'กรุณากรอกชื่อสถานที่จัดกิจกรรม',
                'activityStartDate.required'    => 'กรุณาเลือกวันที่เริ่มต้นจัดกิจกรรม',
                'activityEndDate.required'    => 'กรุณาเลือกวันที่จัดกิจกรรมวันสุดท้าย',
                'activity_Target.required'    => 'กรุณากรอกจำนวนเป้าหมายผู้เข้าร่วมโครงการ',
                'activity_Budget.required'    => 'กรุณากรอกงบประมาณที่ใช้ดำเนินโครงการ',
                'semester.required'    => 'กรุณากรอกปีการศึกษา',
                'activityFile.required'    => 'กรุณาแนบไฟล์อกสารประกอบโครงการ'

            ]
        );
        $myDorm = DB::table('dormitory_user_history')->where('id_users', auth()->user()->id_users)->first();

        $data1 = new Activity;
        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $activityFile = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $activityFile);
            $data1->activityFile = $activityFile;
        }
        $data1->activityName = $request->activityName;
        $data1->activityPlace = $request->activityPlace;
        $data1->activityStartDate = $request->activityStartDate;
        $data1->activityEndDate = $request->activityEndDate;
        $data1->activityScore = $request->activityScore;
        $data1->id_type = $request->id_type;
        $data1->activity_Target = $request->activity_Target;
        $data1->activity_Budget = $request->activity_Budget;
        $data1->semester = $request->semester;
        $data1->userActivityResponsibleActivity = auth()->user()->id_users;
        $data1->id_status = 51;
        $data1->dormResponsibleActivity = $myDorm;
        $data1->save();

        $data2 = new activity_responsible_dorm;
        $data2->activityName = $request->activityName;
        $data2->dormName = $myDorm;
        $data2->save();

        if ($request->dormResponsibility1 != null) {
            $data2 = new activity_responsible_dorm;
            $data2->activityName = $request->activityName;
            $data2->dormName = $request->dormResponsibility1;
            $data2->save();
        }

        if ($request->dormResponsibility2 != null) {
            $data2 = new activity_responsible_dorm;
            $data2->activityName = $request->activityName;
            $data2->dormName = $request->dormResponsibility1;
            $data2->save();
        }

        Alert::success('สร้างกิจกรรมสำเร็จ');
        return back();
    }


    public function submitCreateActivityOutlineHead_Information_Unit(Request $request)
    {
        $this->validate(
            $request,
            [
                'activityName' => 'required ',
            ],
            [
                'activityName.required'    => 'กรุณากรอกชื่อกิจกรรม',
            ]
        );

        $data1 = new Activity;
        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $activityFile = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $activityFile);
            $data1->activityFile = $activityFile;
        }
        $data1->activityName = $request->activityName;
        $data1->id_type = $request->id_type;
        if ($request->activityId != null) {
            $data1->activityId = $request->activityPlace;
        }

        if ($request->activityPlace != null) {
            $data1->activityPlace = $request->activityPlace;
        }
        if ($request->activityStartDate != null) {
            $data1->activityStartDate = $request->activityStartDate;
        }
        if ($request->activityEndDate != null) {
            $data1->activityEndDate = $request->activityEndDate;
        }
        if ($request->activityScore != null) {
            $data1->activityScore = $request->activityScore;
        }
        if ($request->activity_Target != null) {
            $data1->activity_Target = $request->activity_Target;
        }
        if ($request->activity_Budget != null) {
            $data1->activity_Budget = $request->activity_Budget;
        }
        if ($request->semester != null) {
            $data1->semester = $request->semester;
        }
        $data1->userActivityResponsibleActivity = auth()->user()->id_users;
        $data1->id_status = 10;
        $data1->save();
        Alert::success('บันทึกร่างโครงการสำเร็จ');
        return back();
    }

















    public function approveDormitory_Counselor($activityId)
    {
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.approveActivity.approveDormitory_Counselor', compact('Activity'));
    }
    public function approveHead_Dormitory_Service($activityId)
    {
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.approveActivity.approveHead_Dormitory_Service', compact('Activity'));
    }
    public function approveDirector_Dormitory_Service_Division($activityId)
    {
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.approveActivity.approveDirector_Dormitory_Service_Division', compact('Activity'));
    }




    public function notapproveDormitory_Counselor($activityId)
    {
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.approveActivity.notApproveDormitory_Counselor', compact('Activity'));
    }
    public function notapproveHead_Dormitory_Service($activityId)
    {
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.approveActivity.notApproveHead_Dormitory_Service', compact('Activity'));
    }
    public function notapproveDirector_Dormitory_Service_Division($activityId)
    {
        $Activity = DB::table('activities')->where('activityId', $activityId)->first();
        return view('auth.approveActivity.notApproveDirector_Dormitory_Service_Division', compact('Activity'));
    }








    public function submitApproveDormitory_Counselor(Request $request)
    {
        $request->validate([
            'activityFile' => 'required '
        ]);
        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $filename = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $filename);
            DB::table('activities')->where('activityId', $request->activityId)->update([
                'activityFile' => $filename
            ]);
        }
        DB::table('activities')->where('activityId', $request->activityId)->update([
            'id_status' => 31
        ]);
        return back()->with('post_update', 'อนุมัติสำเร็จแล้ว');
    }

    public function submitNotApproveDormitory_Counselor(Request $request)
    {
        $request->validate([
            'activityAdvice' => 'required '
        ]);
        DB::table('activities')->where('activityId', $request->activityId)->update([
            'id_status' => 30,
            'activityAdvice' => $request->activityAdvice
        ]);
        return back()->with('post_update', 'ไม่อนุมัติสำเร็จแล้ว');
    }

    public function submitApproveHead_Dormitory_Service(Request $request)
    {
        $request->validate([
            'activityFile' => 'required '
        ]);
        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $filename = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $filename);
            DB::table('activities')->where('activityId', $request->activityId)->update([
                'activityFile' => $filename
            ]);
        }
        DB::table('activities')->where('activityId', $request->activityId)->update([
            'id_status' => 41
        ]);
        return back()->with('post_update', 'อนุมัติสำเร็จแล้ว');
    }
    public function submitNotApproveHead_Dormitory_Service(Request $request)
    {
        $request->validate([
            'activityAdvice' => 'required '
        ]);
        DB::table('activities')->where('activityId', $request->activityId)->update([
            'id_status' => 40,
            'activityAdvice' => $request->activityAdvice
        ]);
        return back()->with('post_update', 'ไม่อนุมัติสำเร็จแล้ว');
    }

    public function submitApproveDirector_Dormitory_Service_Division(Request $request)
    {
        $request->validate([
            'activityFile' => 'required '
        ]);
        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $filename = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $filename);
            DB::table('activities')->where('activityId', $request->activityId)->update([
                'activityFile' => $filename
            ]);
        }
        DB::table('activities')->where('activityId', $request->activityId)->update([
            'id_status' => 51
        ]);
        return back()->with('post_update', 'อนุมัติสำเร็จแล้ว');
    }

    public function submitNotApproveDirector_Dormitory_Service_Division(Request $request)
    {
        $request->validate([
            'activityAdvice' => 'required '
        ]);
        DB::table('activities')->where('activityId', $request->activityId)->update([
            'id_status' => 50,
            'activityAdvice' => $request->activityAdvice
        ]);
        return back()->with('post_update', 'ไม่อนุมัติสำเร็จแล้ว');
    }





    public function deleteActivityAll_Head_Information_Unit(Request $request)
    {
        DB::table('activities')->where('activityId', $request->activityId)->delete();
        return back();
    }

    public function submitCreateEditActivity_Dormitory_Director(Request $request)
    {
        $this->validate(
            $request,
            [
                'activityName' => 'required ',
                'activityScore' => 'required ',
                'activityPlace' => 'required ',
                'dormResponsibility1' => 'required|min:1',
                'activityStartDate' => 'required ',
                'activityEndDate' => 'required ',
                'activity_Target' => 'required ',
                'activity_Budget' => 'required ',
                'semester' => 'required ',
                'activityFile' => 'required',
            ],
            [
                'activityName.required'    => 'กรุณากรอกชื่อกิจกรรม',
                'activityScore.required'    => 'กรุณากรอกคะแนนกิจกรรม',
                'activityPlace.required'    => 'กรุณากรอกชื่อสถานที่จัดกิจกรรม',
                'dormResponsibility1.required'    => 'กรุณาเลือกหน่วยงานที่รับผิดชอบโครงการ',
                'activityStartDate.required'    => 'กรุณาเลือกวันที่เริ่มต้นจัดกิจกรรม',
                'activityEndDate.required'    => 'กรุณาเลือกวันที่จัดกิจกรรมวันสุดท้าย',
                'activity_Target.required'    => 'กรุณากรอกจำนวนเป้าหมายผู้เข้าร่วมโครงการ',
                'activity_Budget.required'    => 'กรุณากรอกงบประมาณที่ใช้ดำเนินโครงการ',
                'semester.required'    => 'กรุณากรอกปีการศึกษา',
                'activityFile.required'    => 'กรุณาแนบไฟล์อกสารประกอบโครงการ'

            ]
        );

        $myDorm = DB::table('dormitory_user_history')->where('id_users', auth()->user()->id_users)->first();

        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $filename = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $filename);
            DB::table('activities')->where('activityId', $request->activityId)->update([
                'activityFile' => $filename
            ]);
        }

        DB::table('activities')->where('activityId', $request->activityId)->update([
            'activityName' => $request->activityName,
            'id_type' =>  $request->id_type,
            'activityPlace' => $request->activityPlace,
            'activityStartDate' => $request->activityStartDate,
            'activityEndDate' => $request->activityEndDate,
            'activity_Target' =>  $request->activity_Target,
            'activity_Budget' => $request->activity_Budget,
            'semester' =>   $request->semester,
            'activityScore' =>  $request->activityScore,
            'userActivityResponsibleActivity' => auth()->user()->id_users,
            'id_status' =>  11,

        ]);

        if ($request->dormResponsibility1 != null) {
            $data2 = new activity_responsible_dorm;
            $data2->activityName = $request->activityName;
            $data2->dormName = $request->dormResponsibility1;
            $data2->save();
        }

        if ($request->dormResponsibility2 != null) {
            $data2 = new activity_responsible_dorm;
            $data2->activityName = $request->activityName;
            $data2->dormName = $request->dormResponsibility1;
            $data2->save();
        }

        Alert::success('สร้างกิจกรรมสำเร็จ');
        return back();
    }

    public function submitCreateEditActivity_Dormitory_Chairman(Request $request)
    {
        $this->validate(
            $request,
            [
                'activityName' => 'required|unique:activities',
                'activityScore' => 'required',
                'activityPlace' => 'required',
                'dormResponsibility1' => 'required|min:1',
                'activityStartDate' => 'required',
                'activityEndDate' => 'required',
                'activity_Target' => 'required',
                'activity_Budget' => 'required',
                'semester' => 'required',
                'activityFile' => 'required',
            ],
            [
                'activityName.required'    => 'กรุณากรอกชื่อกิจกรรม',
                'activityName.unique'    => 'มีชื่อกิจกรรมนี้แล้ว กรุณากรอกใหม่อีกครั้ง',
                'activityScore.required'    => 'กรุณากรอกคะแนนกิจกรรม',
                'activityPlace.required'    => 'กรุณากรอกชื่อสถานที่จัดกิจกรรม',
                'dormResponsibility1.required'    => 'กรุณาเลือกหน่วยงานที่รับผิดชอบโครงการ',
                'activityStartDate.required'    => 'กรุณาเลือกวันที่เริ่มต้นจัดกิจกรรม',
                'activityEndDate.required'    => 'กรุณาเลือกวันที่จัดกิจกรรมวันสุดท้าย',
                'activity_Target.required'    => 'กรุณากรอกจำนวนเป้าหมายผู้เข้าร่วมโครงการ',
                'activity_Budget.required'    => 'กรุณากรอกงบประมาณที่ใช้ดำเนินโครงการ',
                'semester.required'    => 'กรุณากรอกปีการศึกษา',
                'activityFile.required'    => 'กรุณาแนบไฟล์อกสารประกอบโครงการ'

            ]
        );

        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $filename = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $filename);
            DB::table('activities')->where('activityId', $request->activityId)->update([
                'activityFile' => $filename
            ]);
        }

        DB::table('activities')->where('activityId', $request->activityId)->update([
            'activityName' => $request->activityName,
            'id_type' =>  $request->id_type,
            'activityPlace' => $request->activityPlace,
            'activityStartDate' => $request->activityStartDate,
            'activityEndDate' => $request->activityEndDate,
            'activity_Target' =>  $request->activity_Target,
            'activity_Budget' => $request->activity_Budget,
            'semester' =>   $request->semester,
            'activityScore' =>  $request->activityScore,
            'userActivityResponsibleActivity' => auth()->user()->id_users,
            'id_status' =>  21,

        ]);

        if ($request->dormResponsibility1 != null) {
            $data2 = new activity_responsible_dorm;
            $data2->activityName = $request->activityName;
            $data2->dormName = $request->dormResponsibility1;
            $data2->save();
        }

        if ($request->dormResponsibility2 != null) {
            $data2 = new activity_responsible_dorm;
            $data2->activityName = $request->activityName;
            $data2->dormName = $request->dormResponsibility1;
            $data2->save();
        }

        Alert::success('สร้างกิจกรรมสำเร็จ');
        return back();
    }


    public function submitCreateEditActivity_Head_Information_Unit(Request $request)
    {
        $this->validate(
            $request,
            [
                'activityName' => 'required|unique:activities',
                'activityScore' => 'required',
                'activityPlace' => 'required',
                'dormResponsibility1' => 'required|min:1',
                'activityStartDate' => 'required',
                'activityEndDate' => 'required',
                'activity_Target' => 'required',
                'activity_Budget' => 'required',
                'semester' => 'required',
                'activityFile' => 'required',
            ],
            [
                'activityName.required'    => 'กรุณากรอกชื่อกิจกรรม',
                'activityName.unique'    => 'มีชื่อกิจกรรมนี้แล้ว กรุณากรอกใหม่อีกครั้ง',
                'activityScore.required'    => 'กรุณากรอกคะแนนกิจกรรม',
                'activityPlace.required'    => 'กรุณากรอกชื่อสถานที่จัดกิจกรรม',
                'dormResponsibility1.required'    => 'กรุณาเลือกหน่วยงานที่รับผิดชอบโครงการ',
                'activityStartDate.required'    => 'กรุณาเลือกวันที่เริ่มต้นจัดกิจกรรม',
                'activityEndDate.required'    => 'กรุณาเลือกวันที่จัดกิจกรรมวันสุดท้าย',
                'activity_Target.required'    => 'กรุณากรอกจำนวนเป้าหมายผู้เข้าร่วมโครงการ',
                'activity_Budget.required'    => 'กรุณากรอกงบประมาณที่ใช้ดำเนินโครงการ',
                'semester.required'    => 'กรุณากรอกปีการศึกษา',
                'activityFile.required'    => 'กรุณาแนบไฟล์อกสารประกอบโครงการ'

            ]
        );

        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $filename = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $filename);
            DB::table('activities')->where('activityId', $request->activityId)->update([
                'activityFile' => $filename
            ]);
        }

        DB::table('activities')->where('activityId', $request->activityId)->update([
            'activityName' => $request->activityName,
            'id_type' =>  $request->id_type,
            'activityPlace' => $request->activityPlace,
            'activityStartDate' => $request->activityStartDate,
            'activityEndDate' => $request->activityEndDate,
            'activity_Target' =>  $request->activity_Target,
            'activity_Budget' => $request->activity_Budget,
            'semester' =>   $request->semester,
            'activityScore' =>  $request->activityScore,
            'userActivityResponsibleActivity' => auth()->user()->id_users,
            'id_status' =>  51,

        ]);

        if ($request->dormResponsibility1 != null) {
            $data2 = new activity_responsible_dorm;
            $data2->activityName = $request->activityName;
            $data2->dormName = $request->dormResponsibility1;
            $data2->save();
        }

        if ($request->dormResponsibility2 != null) {
            $data2 = new activity_responsible_dorm;
            $data2->activityName = $request->activityName;
            $data2->dormName = $request->dormResponsibility1;
            $data2->save();
        }

        Alert::success('สร้างกิจกรรมสำเร็จ');
        return back();
    }



    public function submitEditActivity_Head_Information_Unit(Request $request)
    {
        $this->validate(
            $request,
            [
                'activityName' => 'required|unique:activities',
                'activityScore' => 'required',
                'activityPlace' => 'required',
                'dormResponsibility1' => 'required|min:1',
                'activityStartDate' => 'required',
                'activityEndDate' => 'required',
                'activity_Target' => 'required',
                'activity_Budget' => 'required',
                'semester' => 'required',
                'activityFile' => 'required',
            ],
            [
                'activityName.required'    => 'กรุณากรอกชื่อกิจกรรม',
                'activityName.unique'    => 'มีชื่อกิจกรรมนี้แล้ว กรุณากรอกใหม่อีกครั้ง',
                'activityScore.required'    => 'กรุณากรอกคะแนนกิจกรรม',
                'activityPlace.required'    => 'กรุณากรอกชื่อสถานที่จัดกิจกรรม',
                'dormResponsibility1.required'    => 'กรุณาเลือกหน่วยงานที่รับผิดชอบโครงการ',
                'activityStartDate.required'    => 'กรุณาเลือกวันที่เริ่มต้นจัดกิจกรรม',
                'activityEndDate.required'    => 'กรุณาเลือกวันที่จัดกิจกรรมวันสุดท้าย',
                'activity_Target.required'    => 'กรุณากรอกจำนวนเป้าหมายผู้เข้าร่วมโครงการ',
                'activity_Budget.required'    => 'กรุณากรอกงบประมาณที่ใช้ดำเนินโครงการ',
                'semester.required'    => 'กรุณากรอกปีการศึกษา',
                'activityFile.required'    => 'กรุณาแนบไฟล์อกสารประกอบโครงการ'

            ]
        );

        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $filename = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $filename);
            DB::table('activities')->where('activityId', $request->activityId)->update([
                'activityFile' => $filename
            ]);
        }

        DB::table('activities')->where('activityId', $request->activityId)->update([
            'activityName' => $request->activityName,
            'id_type' =>  $request->id_type,
            'activityPlace' => $request->activityPlace,
            'activityStartDate' => $request->activityStartDate,
            'activityEndDate' => $request->activityEndDate,
            'activity_Target' =>  $request->activity_Target,
            'activity_Budget' => $request->activity_Budget,
            'semester' =>   $request->semester,
            'activityScore' =>  $request->activityScore,
            'userActivityResponsibleActivity' => auth()->user()->id_users,
            'id_status' =>  51,

        ]);

        if ($request->dormResponsibility1 != null) {
            $data2 = new activity_responsible_dorm;
            $data2->activityName = $request->activityName;
            $data2->dormName = $request->dormResponsibility1;
            $data2->save();
        }

        if ($request->dormResponsibility2 != null) {
            $data2 = new activity_responsible_dorm;
            $data2->activityName = $request->activityName;
            $data2->dormName = $request->dormResponsibility1;
            $data2->save();
        }

        Alert::success('สร้างกิจกรรมสำเร็จ');
        return back();
    }





    public function submitSaveEditActivityOutline_Dormitory_Director(Request $request)
    {
        $this->validate(
            $request,
            [
                'activityName' => 'required|unique:activities',
            ],
            [
                'activityName.required'    => 'กรุณากรอกชื่อกิจกรรม',
                'activityName.unique'    => 'มีชื่อกิจกรรมนี้แล้ว กรุณากรอกใหม่อีกครั้ง',
            ]
        );

        if ($request->file('activityFile')) {
            $activityFile = $request->file('activityFile');
            $filename = time() . '.' . $activityFile->getClientOriginalExtension();
            $request->activityFile->move('storage/', $filename);
            DB::table('activities')->where('activityId', $request->activityId)->update([
                'activityFile' => $filename
            ]);
        }

        DB::table('activities')->where('activityId', $request->activityId)->update([
            'activityName' => $request->activityName,
            'id_type' =>  $request->id_type,
            'activityPlace' => $request->activityPlace,
            'activityStartDate' => $request->activityStartDate,
            'activityEndDate' => $request->activityEndDate,
            'activity_Target' =>  $request->activity_Target,
            'activity_Budget' => $request->activity_Budget,
            'semester' =>   $request->semester,
            'activityScore' =>  $request->activityScore,
        ]);

        Alert::success('บันทึกร่างโครงการสำเร็จ');
        return back();
    }





    public function activityDetailStudent($activityName)
    {
        $Activity = DB::table('activities')->where('activityName', $activityName)->first();
        return view('auth.Activity.activityDetailStudent', compact('Activity'));
    }

    public function activityDetailDormitory_Counselor($activityName)
    {
        $Activity = DB::table('activities')->where('activityName', $activityName)->first();
        return view('auth.Activity.activityDetailDormitory_Counselor', compact('Activity'));
    }
    public function activityDetailHead_Dormitory_Service($activityName)
    {
        $Activity = DB::table('activities')->where('activityName', $activityName)->first();
        return view('auth.Activity.activityDetailHead_Dormitory_Service', compact('Activity'));
    }
    public function activityDetailDirector_Dormitory_Service_Division($activityName)
    {
        $Activity = DB::table('activities')->where('activityName', $activityName)->first();
        return view('auth.Activity.activityDetailDirector_Dormitory_Service_Division', compact('Activity'));
    }
    public function activityDetailHead_Information_Unit($activityName)
    {
        $Activity = DB::table('activities')->where('activityName', $activityName)->first();
        return view('auth.Activity.activityDetailHead_Information_Unit', compact('Activity'));
    }




    //--------------------combined function-------------------------------

    public function checkName($activityName)
    {

        $user_has_activity = users_has_activities::all();
        $Activity = DB::table('activities')->where('activityName', $activityName)->first();
        return view('auth.checkName.checkName', compact('Activity'))->with('data', $user_has_activity);
    }


    public function submitCheckName(Request $request, $activityName)
    {
        
        $this->validate(
            $request,
            [
                'id_users' => 'required|exists:users|unique:users_has_activities,id_users,null,null,activityName,'.$activityName,

            ],
            [
                'id_users.required'    => 'กรุณากรอกรหัสนักศึกษาที่เช้าร่วมกิจกรรม',
                'id_users.exists'    => 'ไม่มีข้อมูลนักศึกษาในฐานระบบ กรุณากรอกรหัสนักศึกษาให้ถูกต้อง',
                'id_users.unique'    => 'รหัสนักศึกษานี้ได้เช็กชื่อไปแล้ว',


            ]
        );
        $Activity = DB::table('activities')->where('activityName', $activityName)->first();

        $data = new users_has_activities;
        $data->id_users = $request->id_users;
        $data->activityName = $activityName;
        $data->activityScore = $Activity->activityScore;
        $data->save();
        $checkUser = DB::table('user_score')->where('id_users', $request->id_users)->count();
        if ($checkUser == 0) {
            $data2 = new user_score;
            $data2->id_users = $request->id_users;
            $data2->semester = $Activity->semester;
            $data2->save();
        }

        $count_user_has_activities = DB::table('users_has_activities')->where('id_users', $request->id_users)->count();
        $sum_user_has_activities = DB::table('users_has_activities')->where('id_users', $request->id_users)->sum('activityScore');

        DB::table('user_score')->where('id_users', $request->id_users)->update([
            'count_of_activities' => $count_user_has_activities,
            'sum_score' =>  $sum_user_has_activities
        ]);
        Alert::success('เช็กชื่อสำเร็จ');
        return back();
    }

    public function calenderActivity(Request $request)
    {

        if ($request->ajax()) {

            $data = Activity::whereDate('activityStartDate', '>=', $request->activityStartDate)
                ->whereDate('activityEndDate',   '<=', $request->activityEndDate)
                ->get(['activityID', 'activityName', 'activityStartDate', 'activityEndDate']);

            return response()->json($data);
        }

        return view('Home.Home');
    }

    public function download($activityFile)
    {
        return response()->download('storage/' . $activityFile);
    }

    //----------------------------------------------------------------------------------
}
