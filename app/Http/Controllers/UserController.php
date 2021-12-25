<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function changePasswordStudent()
    {
        return view('auth.ManagerUser.changePasswordStudent'); 
    }
    public function changePasswordDormitory_Director()
    {
        return view('auth.ManagerUser.changePasswordDormitory_Director'); 
    }
    public function changePasswordDormitory_Chairman()
    {
        return view('auth.ManagerUser.changePasswordDormitory_Chairman'); 
    }
    public function changePasswordDormitory_Counselor()
    {
        return view('auth.ManagerUser.changePasswordDormitory_Counselor'); 
    }
    public function changePasswordHead_Dormitory_Service()
    {
        return view('auth.ManagerUser.changePasswordHead_Dormitory_Service'); 
    }
    public function changePasswordDirector_Dormitory_Service_Division()
    {
        return view('auth.ManagerUser.changePasswordDirector_Dormitory_Service_Division'); 
    }
    public function changePasswordHead_Information_Unit()
    {
        return view('auth.ManagerUser.changePasswordHead_Information_Unit'); 
    }
    
    
    
    
    
    

    public function showDataUserStudent()
    {
        return view('auth.ManagerUser.showDataUserStudent');
    }
    public function showDataUserDormitory_Director()
    {
        return view('auth.ManagerUser.showDataUserDormitory_Director');
    }
    public function showDataUserDormitory_Chairman()
    {
        return view('auth.ManagerUser.showDataUserDormitory_Chairman');
    }
    public function showDataUserDormitory_Counselor()
    {
        return view('auth.ManagerUser.showDataUserDormitory_Counselor');
    }
    public function showDataUserHead_Dormitory_Service()
    {
        return view('auth.ManagerUser.showDataUserHead_Dormitory_Service');
    }
    public function showDataUserDirector_Dormitory_Service_Division()
    {
        return view('auth.ManagerUser.showDataUserDirector_Dormitory_Service_Division');
    }
    public function showDataUserHead_Information_Unit()
    {
        return view('auth.ManagerUser.showDataUserHead_Information_Unit');
    }
    
    
    
    
    
    
    

    public function showDataActivityStudent()
    {
        $Activity = User::all();
        return view('auth.ManagerUser.showDataActivityStudent');
    }
    public function showDataActivityAllStudent()
    {
        $Activity = User::all();
        return view('auth.ManagerUser.showDataActivityAllStudent');
    }




    public function showDataActivityDormitory_Director()
    {
        $Activity = User::all();
        return view('auth.ManagerUser.showDataActivityDormitory_Director',compact('Activity'));
    }
    public function showDataActivityDormitory_Chairman()
    {
        $Activity = User::all();
        return view('auth.ManagerUser.showDataActivityDormitory_Chairman',compact('Activity'));
    }
    public function showDataActivityAllDormitory_Counselor()
    {
        $Activity = User::all();
        return view('auth.ManagerUser.showDataActivityAllDormitory_Counselor',compact('Activity'));
    }
    public function showDataActivityAllHead_Dormitory_Service()
    {
        $Activity = User::all();
        return view('auth.ManagerUser.showDataActivityAllHead_Dormitory_Service',compact('Activity'));
    }
    public function showDataActivityAllDirector_Dormitory_Service_Division()
    {
        $Activity = User::all();
        return view('auth.ManagerUser.showDataActivityAllDirector_Dormitory_Service_Division',compact('Activity'));
    }
    
    
    

    

    


    public function showDataStudentAllDormitory_Director()
    {
        $Members = User::all();
        return view('auth.ManagerUser.showDataStudentAllDormitory_Director')->with('data',$Members);
    }
    public function showDataStudentAllDormitory_Chairman()
    {
        $Members = User::all();
        return view('auth.ManagerUser.showDataStudentAllDormitory_Chairman')->with('data',$Members);
    }
    public function showDataStudentAllDormitory_Counselor()
    {
        $Members = User::all();
        return view('auth.ManagerUser.showDataStudentAllDormitory_Counselor')->with('data',$Members);
    }
    public function showDataStudentAllHead_Dormitory_Service()
    {
        $Members = User::all();
        return view('auth.ManagerUser.showDataStudentAllHead_Dormitory_Service')->with('data',$Members);
    }
    public function showDataStudentAllDirector_Dormitory_Service_Division()
    {
        $Members = User::all();
        return view('auth.ManagerUser.showDataStudentAllDirector_Dormitory_Service_Division')->with('data',$Members);
    }





    
    public function manageUserAllHead_Information_Unit(Request $request)
    {
        $search =  $request->input('q');
        if($search!=""){
            $Members = User::where(function ($query) use ($search){
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            })
            ->paginate(10);
            $Members->appends(['q' => $search]);
        }
        else{
            $Members = User::paginate(10);
        }
        return view('auth.ManagerUser.manageUserAllHead_Information_Unit')->with('data',$Members);
    }


    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
     * @return \Illuminate\Support\Collection
     */

    public function import()
    {
        Excel::import(new UsersImport, request()->file('file'));

        return back();
    }


    public function changePassword(Request $request)
    {
        // $request->validate([
        //     'current_password' => ['required', new MatchOldPassword],
        //     'new_password' => ['required'],
        //     'new_confirm_password' => ['same:new_password'],
        // ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        dd('Password change successfully.');
    }
    
    
    
    

    
    
}
