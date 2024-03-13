<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\Exam;
use App\Models\ExamCategory;
use App\Models\ExamEvaluation;
use App\Models\ExamSchedule;
use App\Models\Grade;
use App\Models\Instruction;
use App\Models\QuestionBank;
use App\Models\Room;
use App\Models\Setting;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamScheduleController extends Controller
{
    ###################################    index Items   ################################################
    public function examSchedule (Request $request){

        $allclass=ClassModel::get();
        $academicyear = ExamSchedule::orderBy('created_at','DESC')->get();
        $data = [
            'examschedulelist' => $academicyear,
            'allclass' => $allclass,
            'active'       => 'examschedulelist',
        ];
        return view('admin.examschedule.index',$data);
    }
    ###################################    Add Items   ################################################
    public function addexamSchedule(Request $request){
      
        $allclass=ClassModel::get();
        $allroom=Room::get();
        $allexam=Exam::get();
        $examcategory=ExamCategory::get();
        $instruction=Instruction::get();
        $data = [
            'active'       => 'examschedulelist',
            'examcategory' => $examcategory,
            'allclass' => $allclass,
            'allroom' => $allroom,
            'allexam' => $allexam,
            'instruction' => $instruction,
        ];
        return view('admin.examschedule.add',$data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveexamSchedule (Request $request){
        // dd($request->all());
        $inputs = $request->only(['name','category','instruction_id','class','division','subject','edate','examfrom','examto','room']);
        $setting = Setting::first();
        $academic_year=AcademicYear::where('name',$setting->academic_year)->select('id')->first();
        $inputs['academic_year'] =  $academic_year['id'];
        $inputs['created_user'] = Auth::user()->id;
        $inputs['created_usertype'] =Auth::user()->usertype;

        if ($request->academicyear_id) {
            ExamSchedule::where('id', $request->academicyear_id)->update($inputs);
                return redirect('admin/examschedule')->withSuccess('Exam Update successfully');
          
        }
        else{
            ExamSchedule::create($inputs);
            return redirect('admin/examschedule')->withSuccess('Exam created successfully');

        }
        return redirect('admin/examschedule')->withError('Oops Something went wrong!!');

    }
    ###################################    Edit Items   ################################################
    public function editexamSchedule ($editAcademicYear_id){
        $examcategory=ExamCategory::get();
        $vendor = ExamSchedule::where('id',$editAcademicYear_id)->first();
        $allclass=ClassModel::get();
        $allroom=Room::get();
        $allsubject=Subject::where('class',$vendor->class)->get();
        $alldivision=Division::where('class',$vendor->class)->get();
        $instruction=Instruction::get();
        $data = [
            'active'       => 'examschedulelist',
            'examcategory' => $examcategory,
            'allclass' => $allclass,
            'allroom' => $allroom,
            'examschedule' => $vendor,
            'allsubject' => $allsubject,
            'alldivision' => $alldivision,
            'instruction' => $instruction,
        ];
        return view('admin.examschedule.edit',$data);
    }
    ###################################    Delete Items   ################################################
    public function deleteexamSchedule(Request $request){
        if ($request->categoryId) {
            $newscategory =ExamSchedule::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status'=>0,'message'=>'Something went wrong. please try again.']);
        }
    }

    ###################################   filert exam shedule   ################################################
      public function examSchedulefilter(Request $request)
      {
        $examschedulelist = ExamSchedule::where('class', $request->get('categoryId'))->with('exams','classes','divisions','subjects','rooms')->orderBy('created_at','DESC')->get();
        $division=Division::where('class',$request->get('categoryId'))->get();
        $data = [
            'examschedulelist' => $examschedulelist,
            'division' => $division,
        ];
        return response()->json($data);
      }
    ###################################    exam attend   ################################################
    public function studentExamresult(Request $request)
    {
        $classes = ClassModel::orderBy('created_at', 'DESC')->get();
        $data = ExamEvaluation::pluck('exam')->toArray();
        $data =  array_unique($data);
        $items = new ExamSchedule;
        if (isset($request->class)) {
            $items = $items->where('class',$request->get('class'));
        }
        if (isset($request->division)) {
            $items = $items->where('division',$request->get('division'));
        }

        $all_division = Division::where('class',$request->class)->get();
        $exam = $items->whereIn('id', $data)->get();
        return view('admin.exam_result.index', [
            'exam' => $exam,
            'classes' => $classes,
            'class_id' => $request->class,
            'division_id' => $request->division, 
            'all_division' => $all_division,
            'active' => 'exam_result'
        ]);
    }
    public function examResultlist(Request $request)
    {
   
        $gradelist = Grade::orderBy('created_at', 'DESC')->get();
        $data = ExamEvaluation::where('exam', $request->exam_id)->get();
        $sum = 0;
        foreach ($data as $value) {
            if ($value->questions) {
                $sum += QuestionBank::where('id', $value->questions->id)->first()->mark;
            }
        }
        $data = ExamEvaluation::where('exam', $request->exam_id)
            ->selectRaw('max(total_mark) as totalmark,student')
            ->groupBy('student')
            ->get();

        foreach ($data as $data1) {
            $grade = ($data1->totalmark / $sum) * 100;

            foreach ($gradelist as $value) {
                if ($grade >= $value->gradefrom && $grade <= $value->gradeupto) {
                    $data1->grade = $value->grade;
                }
            }
        }
        return view('admin.exam_result.student_list', [
    
            'data' => $data,
            'active' => 'exam_result_list',
            'exam' => $request->exam_id
        ]);
    }
}
