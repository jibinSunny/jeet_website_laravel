<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Setting;
use App\Models\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherTimeTableController extends Controller
{
           ###################################    Show TimeTable   ################################################
           public function teacherTimeTable(Request $request)
           {   
             $setting = Setting::first();
             $academic_year=AcademicYear::where('name',$setting->academic_year)->pluck('id');    
            $user_info = TimeTable::where('subject',Auth::user()->subjects)->where('teacher',Auth::user()->id)->where('year',$academic_year[0])->with('subjectname','classname','Teachername','roomname')->get();
                  $user_info = $user_info->groupBy('day');
                   $data = $user_info->toArray(); 
            return view('teacher.timetable.index',
            [
           'data' => $data, 
           'active' => 'timetable_list']);
     
         }
}
