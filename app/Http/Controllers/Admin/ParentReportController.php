<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\ParentModel;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Parent_;

class ParentReportController extends Controller
{
          ################################### parent Report index   ################################################
          public function parentReport(Request $request)
          {
           
            //  dd($request->all());

            // $items = ParentModel::with('students')->get();
            // return $items[1];
                  $classes = ClassModel::orderBy('created_at', 'DESC')->get();
                  $items = new ParentModel();
                  if (isset($request->division)) {
                      $items1=Student::where('division',$request->division)->pluck('parent');
                      $items = $items->whereIn('id', $items1);
                  }
                  $all_division = Division::where('class',$request->class)->get();
                  return view('admin.report.general_report.parent.index', ['all_report_parent' => $items->with('students')->orderBy('created_at', 'DESC')->get(),
                  'classes' => $classes, 
                  'active' => 'parent_report_list', 
                  'class_id' => $request->class,
                  'division_id' => $request->division, 
                  'all_division' => $all_division,]);
          }
    
        ################################### parent Report view   ################################################
          public function viewparentReport(Request $request)
          {
    
            $data['teacher'] = ParentModel::where('code',$request->code)->first();
            $data['active'] ="parent_report_list";
            return view('admin.report.general_report.parent.view',$data);
          }
}
