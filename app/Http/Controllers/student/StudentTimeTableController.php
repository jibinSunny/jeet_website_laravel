<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Setting;
use App\Models\Student;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentTimeTableController extends Controller
{
      ###################################    Show TimeTable   ################################################
      public function studentTimeTable(Request $request)
      {   
        $setting = Setting::first();
        $academic_year=AcademicYear::where('name',$setting->academic_year)->pluck('id');    
       $user_info = TimeTable::where('class',Auth::user()->class)->where('year',$academic_year[0])->with('subjectname','Teachername','roomname')->where('division',Auth::user()->division)->get();
             $user_info = $user_info->groupBy('day');
              $data = $user_info->toArray();
       return view('student.timetable.index',
       [
      'data' => $data, 
      'active' => 'time_table_list']);

    }
      
}
