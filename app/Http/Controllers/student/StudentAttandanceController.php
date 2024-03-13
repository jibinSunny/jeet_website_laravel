<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Setting;
use App\Models\StudentAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentAttandanceController extends Controller
{      
    public function __construct()
    {
        $this->monthArray = array(
            "1" => "jan",
            "2" => "feb",
            "3" => "mar",
            "4" => "apr",
            "5" => "may",
            "6" => "jun",
            "7" => "jul",
            "8" => "aug",
            "9" => "sep",
            "10" => "oct",
            "11" => "nov",
            "12" => "dec"
          );

    }
    public function studentAttandance(Request $request)
    {   
        $setting = Setting::first();
        $academic_year=AcademicYear::where('name',$setting->academic_year)->pluck('id');
        $year = date("Y");
       $attandance=StudentAttendance::where('year',$year)->where('student',Auth::user()->id)->where('academic_year', $academic_year[0])->orderBy('month', 'asc')->get();
        $data = [
            'student'=>Auth::user(),
            'monthArray' => $this->monthArray,
            'attandance' => $attandance,
            'year' => $year,
            'active'       => 'attandance_list',
        ];
    return view('student.attandance.index',$data);
    }
}
