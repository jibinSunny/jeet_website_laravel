<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\ExamQuestion;
use App\Models\ExamSchedule;
use App\Models\OnlineExam;
use App\Models\QuestionBank;
use App\Models\QuestionOption;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class StudentExamController extends Controller
{
    ###################################    Show Items   ################################################

    public function studentExam (Request $request)
     {    
        $items = new ExamSchedule();
        if (isset($request->edate)) {
            $items = $items->where('edate',$request->get('edate'));
        }
      
        $examschedulelist = $items->where('class',Auth::user()->class)->where('division',Auth::user()->division)->with('instructions','classes','divisions','subjects','rooms')->orderBy('created_at', 'DESC')->get();
        foreach($examschedulelist as $row)
        {
        $row->attant=  OnlineExam::where('student',Auth::user()->id)->where('exam',$row->id)->get();
        }
        // return $examschedulelist[0]->attant;
        return view('student.exam.index', [
         'examschedulelist' =>$examschedulelist,
        'date' =>$request->get('edate'),
        'active' => 'exam_list',]);
    }
    public function onlineExam (Request $request)
    {   $totalmark = 0;
        $student=Auth::user();
        $exam=ExamSchedule::where('id',$request->exam_id)->first();
        $teacher_name=Teacher::where('subjects',$exam->subjects->id)->get();
        $exam_qustion=ExamQuestion::where('exam',$request->exam_id)->get();
        $total_qustion=ExamQuestion::where('exam',$request->exam_id)->count();

        $question_id = ExamQuestion::where('exam',$request->exam_id)->pluck('question')->toArray();
        $question_id =  array_unique($question_id);
        $question= QuestionBank::whereIn('id', $question_id)->get();
        for ($i = 0; $i < count($question); $i++) {
            $question[$i]->option = QuestionOption::where('question',$question[$i]->id)->get();
        }
        
        foreach($exam_qustion as $total_mark)
        {
            $query = QuestionBank::where('id', $total_mark->question)->select('mark')->first();
            $totalmark += $query->mark;
        }
        $startTime = Carbon::parse($exam->examfrom);
        $endTime = Carbon::parse($exam->examto);
    
        $totalDuration =  $startTime->diff($endTime)->format('%H:%I:%S');
        $data =[
            'student'=> $student,
            'teacher_name'=> $teacher_name,
            'exam'=> $exam,
            'exam_qustion'=> $exam_qustion,
            'total_qustion'=> $total_qustion,
            'totalmark'=> $totalmark,
            'totalDuration'=> $totalDuration,
            'question'=> $question,

        ];
        return view('student/exam//online-exam', $data);
    }   
    public function onlineExamSave (Request $request)
    {
        // dd(count($request->answer));
        for ($j = 0; $j < count($request->question); $j++) {
            $studentattendance = new OnlineExam();
            $studentattendance->answer = $request->answer[$j];
            $studentattendance->question =$request->question[$j];
            $studentattendance->exam = $request->exam_id;
            $studentattendance->student = Auth::user()->id;
            $studentattendance->save();
        }
        return redirect('student/exam')->withSuccess('Extracurricular Update successfully');
    }

    public function onlineExamSaveTimeout (Request $request)
    {
        for ($j = 0; $j < count($request->question); $j++) {
            $studentattendance = new OnlineExam();
            $studentattendance->answer = $request->answer[$j];
            $studentattendance->question =$request->question[$j];
            $studentattendance->exam = $request->exam_id;
            $studentattendance->student = Auth::user()->id;
            $studentattendance->save();
        }
        return response()->json(['status'=>1]);
    }

}
