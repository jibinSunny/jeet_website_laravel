<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Setting;
use App\Models\TeacherAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
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
    public function teacherAttendanceview(Request $request)
    {   
        $setting = Setting::first();
        $academic_year=AcademicYear::where('name',$setting->academic_year)->pluck('id');
        $year = date("Y");
       $attandance=TeacherAttendance::where('year',$year)->where('teacher',Auth::user()->id)->where('academic_year', $academic_year[0])->orderBy('month', 'asc')->get();
        $data = [
            'student'=>Auth::user(),
            'monthArray' => $this->monthArray,
            'attandance' => $attandance,
            'year' => $year,
            'active'       => 'attandance_list',
        ];
    return view('teacher.attandance.index',$data);
    }
}
