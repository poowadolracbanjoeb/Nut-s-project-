<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function Student()
    {
        return view('Home.Student');
    }
    public function Dormitory_Director()
    {
        return view('Home.Dormitory_Director');
    }
    public function Dormitory_Chairman()
    {
        return view('Home.Dormitory_Chairman');
    }
    public function Dormitory_Counselor()
    {
        return view('Home.Dormitory_Counselor');
    }
    public function Head_Dormitory_Service()
    {
        return view('Home.Head_Dormitory_Service');
    }
    public function Head_Information_Unit()
    {
        return view('Home.Head_Information_Unit');
    }
    public function Director_Dormitory_Service_Division()
    {
        return view('Home.Director_Dormitory_Service_Division');
    }
}
