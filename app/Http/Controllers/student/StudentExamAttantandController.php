<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\ExamEvaluation;
use App\Models\ExamSchedule;
use App\Models\Grade;
use App\Models\OnlineExam;
use App\Models\QuestionBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentExamAttantandController extends Controller
{
    public function studentExamAttend (Request $request)
    {    
      
      $data=OnlineExam::where('student',Auth::user()->id)->pluck('exam')->toArray();
      $data =  array_unique($data);
      $question= ExamSchedule::whereIn('id', $data)->get();
       return view('student.exam_attend.index',[
        'question' =>$question,
        'active' => 'attend_list']);
   }
   public function examResult (Request $request)
   {    
     
    $data = ExamEvaluation::pluck('exam')->toArray();
    $data =  array_unique($data);
    $exam = ExamSchedule::whereIn('id', $data)->where('class', Auth::user()->class)->get();
    return view('student.exam_result.index', [
        'exam' => $exam,
        'active' => 'exam-result_list'
    ]);

  }
  public function examResultview(Request $request)
  {
      $gradelist = Grade::orderBy('created_at', 'DESC')->get();
      $data = ExamEvaluation::where('exam', $request->exam_id)
          ->where('student', Auth::user()->id)
          ->get();

      $sum = 0;
      foreach ($data as $value) {
          if ($value->questions) {
              $sum += QuestionBank::where('id', $value->questions->id)->first()->mark;
          }
      }
      $grade = ($data[0]->total_mark / $sum) * 100;
      foreach ($gradelist as $value) {
          if ($grade >= $value->gradefrom && $grade <= $value->gradeupto) {
              $grade = $value->grade;
          }
      }

      return view('student.exam_result.view', [
          'data' => $data,
          'grade' => $grade,
          'sum' => $sum,
          'active' => 'exam-result_list'
      ]);
  }
}
