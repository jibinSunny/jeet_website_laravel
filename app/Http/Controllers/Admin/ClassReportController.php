<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\Setting;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherClass;
use Illuminate\Http\Request;

class ClassReportController extends Controller
{
    ################################### class Report index   ################################################
        public function classReport (Request $request)
        {

            $classes = ClassModel::orderBy('created_at', 'DESC')->get();
            $query1 = ClassModel::query();
            if (isset($request->class)) {
                $query1->where('id',$request->class);
            }
            return view('admin.report.general_report.classes.index', ['all_report_class' => $query1->with('divisions')->orderBy('created_at', 'DESC')->get(),
            'classes' => $classes, 
            'active' => 'class_report_list', 
            'class_id' => $request->class,]);
        }


    ################################### class Report show   ################################################
    public function classReportView (Request $request)
    {

        $data['class'] = ClassModel::with('divisions')->where('id',$request->code)->first();
        $data['student_count']=count(Student::where('class',$request->code)->get());
        $data['subject_count']=count(Subject::where('class',$request->code)->get());
        $teacher_id=Division::where('class',$request->code)->pluck('teacher');
        $data['class_teacher']=Teacher::whereIn('id',$teacher_id)->get();
        $subject=Subject::where('class',$request->code)->get();
        foreach($subject as $subject1)
        {
            $subject1->teacher_name=Teacher::where('subjects',$subject1->id)->select('first_name','last_name')->get();
        }
        $data['class_subject_teacher']=$subject;
        $data['active'] ="class_report_list";
        return view('admin.report.general_report.classes.view',$data);

    }
}
