<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\ExamEvaluation;
use App\Models\ExamSchedule;
use App\Models\Grade;
use App\Models\OnlineExam;
use App\Models\QuestionBank;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherStudentExamController extends Controller
{
    public function teacher_studentExam(Request $request)
    {

        $items = new ExamSchedule();
        if (isset($request->edate)) {
            $items = $items->where('edate', $request->get('edate'));
        }
        $examschedulelist = $items->where('class', Auth::user()->classes)->where('subject', Auth::user()->subjects)->orderBy('created_at', 'DESC')->get();
        return view('teacher.exam.index', [
            'examschedulelist' => $examschedulelist,
            'date' => $request->get('edate'),
            'active' => 'teacher_exam_list',
        ]);
    }

    public function teacher_studentAttendExam(Request $request)
    {

        $examschedulelist = ExamSchedule::where('class', Auth::user()->classes)->where('subject', Auth::user()->subjects)->pluck('id')->toArray();
        $data = OnlineExam::whereIn('exam', $examschedulelist)->pluck('exam')->toArray();
        $data =  array_unique($data);
        $exam = ExamSchedule::whereIn('id', $data)->get();
        return view('teacher.exam.attend', [
            'exam' => $exam,
            'active' => 'teacher_exam_attend_list'
        ]);
    }
    public function teacherviewExam(Request $request)
    {

        $data = OnlineExam::where('exam', $request->exam_id)->pluck('student')->toArray();
        $data =  array_unique($data);
        $student = Student::whereIn('id', $data)->get();
        return view('teacher.exam.view', [
            'student' => $student,
            'exam' => $request->exam_id
        ]);
    }
    public function examValuation(Request $request)
    {

        $data = ExamEvaluation::where('exam', $request->exam_id)
            ->where('student', $request->student_id)
            ->get();
         
        if ($data!="[]") {
            $sum = 0;
            foreach ($data as $value) {
                if ($value->questions) {
                    $sum += QuestionBank::where('id', $value->questions->id)->first()->mark;
                }
            }

        } else {
            $data = OnlineExam::where('exam', $request->exam_id)
                ->where('student', $request->student_id)
                ->get();
            $sum = 0;
            foreach ($data as $value) {
                if ($value->questions) {
                    $sum += QuestionBank::where('id', $value->questions->id)->first()->mark;
                }
            }
        }

        return view('teacher.exam.valuation', [
            'data' => $data,
            'sum' => $sum,
            'active' => 'teacher_exam_attend_list'
        ]);
    }
    public function saveEvaluation(Request $request)
    {
        $data = ExamEvaluation::where('exam', $request->exam)
            ->where('student', $request->student)
            ->get();
            foreach ($data as $data1) {
                $data1->delete();
            }


        for ($j = 0; $j < count($request->question); $j++) {
            $studentattendance = new ExamEvaluation();
            $studentattendance->mark = $request->mark[$j];
            $studentattendance->question = $request->question[$j];
            $studentattendance->answer = $request->answer[$j];
            $studentattendance->exam = $request->exam;
            $studentattendance->student = $request->student;
            $studentattendance->total_mark = $request->total_mark;
            $studentattendance->save();
        }

        return redirect('teacher/exam/attend')->withSuccess(' Update successfully');
    }
    public function studentExamResult(Request $request)
    {  
        $data = ExamEvaluation::pluck('exam')->toArray();
        $data =  array_unique($data);
        $exam = ExamSchedule::whereIn('id', $data)->where('class', Auth::user()->classes)->where('subject', Auth::user()->subjects)->get();
        return view('teacher.exam.result', [
            'exam' => $exam,
            'active' => 'exam-result_list'
        ]);
    }
    public function studentExamResultlist(Request $request)
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
        return view('teacher.exam.result_student_list', [
            'data' => $data,
            'active' => 'exam-result_list',
            'exam' => $request->exam_id
        ]);
    }
    public function studentresultView(Request $request)
    {
        $gradelist = Grade::orderBy('created_at', 'DESC')->get();
        $data = ExamEvaluation::where('exam', $request->exam_id)
            ->where('student', $request->student_id)
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

        return view('teacher.exam.studentresult', [
            'data' => $data,
            'grade' => $grade,
            'sum' => $sum,
            'active' => 'exam-result_list'
        ]);
    }
}
