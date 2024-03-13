<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\Setting;
use App\Models\TimeTable;
use Illuminate\Http\Request;

class TimetableReportController extends Controller
{
        ###################################    Show Items   ################################################
        public function timetableReport (Request $request)
        {
 
                  $classes = ClassModel::orderBy('created_at', 'DESC')->get();
                  $data=[];
                  return view('admin.report.general_report.time_table.index',
                   [
             
                  'classes' => $classes, 
                  'class_id' =>"",
                  'division_id' =>"",
                  'data' =>$data,
                  'active' => 'timetable_report_list']);
        }
        ###################################    Show Items   ################################################
        public function timetableReportView (Request $request)
        {
            $setting = Setting::first();
            $academic_year=AcademicYear::where('name',$setting->academic_year)->pluck('id');    
           $user_info = TimeTable::where('class',$request->class)->where('year',$academic_year[0])->with('subjectname','Teachername','roomname')->where('division',$request->division)->get();
                 $user_info = $user_info->groupBy('day');
                  $data = $user_info->toArray();
          $classes = ClassModel::orderBy('created_at', 'DESC')->get();
          $all_division = Division::where('class',$request->class)->get();
         //return $data;
           return view('admin.report.general_report.time_table.index',
           [
          'data' => $data, 
          'classes' => $classes,  
          'active' => 'timetable_report_list',
          'class_id' => $request->class,
          'division_id' => $request->division, 
          'all_division' => $all_division]);

        }
}
