<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Exam;
use App\Models\ExamQuestion;
use App\Models\ExamSchedule;
use App\Models\QuestionBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamQuestionController extends Controller
{
        ###################################    Show Items   ################################################
        public function ExamQuestion(Request $request){
            // $question_id = ExamQuestion::pluck('exam')->toArray();
            // $week =  array_unique($question_id);
            $exam = ExamSchedule::orderBy('created_at','DESC')->get();
            $data = [
                'exam' => $exam,
                'active'       => 'exam_question_list',
            ];
            return view('admin.exam_question.index',$data);
        }
         ###################################    Show Question list   ################################################
         public function listExamQuestion($exam_id){
            $exam = ExamSchedule::where('id',$exam_id)->orderBy('created_at','DESC')->first();
            $question_id = ExamQuestion::where('exam',$exam_id)->pluck('question')->toArray();
            $question_id =  array_unique($question_id);
            $add_question_list= QuestionBank::whereIn('id', $question_id)->with('classes','subjects','levels','types')->get();
            $totalMark= QuestionBank::whereIn('id', $question_id)->sum('mark');
            
            $question_id = ExamQuestion::where('exam',$exam_id)->pluck('question')->toArray();
            $question_id =  array_unique($question_id);
            $question= QuestionBank::whereNotIn('id', $question_id)->where('class',$exam->class)->where('subject',$exam->subject)->get();
            $data = [
                'exam' => $exam,
                'question' => $question,
                'add_question_list' => $add_question_list,
                'totalMark' =>  $totalMark,
                'active'       => 'exam_question_list',
            ];
            return view('admin.exam_question.add_question',$data);
        }



        ##################################     Question add   ################################################
            public function ExamQuestionadd(Request $request){
            $inputs['exam']=$request->exam_id;
            
            $inputs['question']=$request->question_id;
            $inputs['created_user'] = Auth::user()->id;
            $inputs['created_usertype'] =Auth::user()->usertype;
            ExamQuestion::create($inputs);
            
            $question_id = ExamQuestion::where('exam',$request->exam_id)->pluck('question')->toArray();
            $question_id =  array_unique($question_id);
            $question= QuestionBank::whereIn('id', $question_id)->with('classes','subjects','levels','types')->get();
            $add_question = QuestionBank::whereNotIn('id', $question_id)->with('classes','subjects','levels','types')->get();

            $totalMark= QuestionBank::whereIn('id', $question_id)->sum('mark');
            $data = [
                'question' =>  $question,
                'add_question'       =>$add_question,
                'totalMark' =>  $totalMark,
            ];

            return response()->json($data);
  
          }
        ###################################     Question remove   ################################################
        public function ExamQuestionRemove(Request $request){

            $questionoption = ExamQuestion::where('exam',$request->exam_id)->where('question',$request->question_id)->get();
            foreach ($questionoption as  $option) {
                $option->delete();
            }
            $question_id = ExamQuestion::where('exam',$request->exam_id)->pluck('question')->toArray();
            $question_id =  array_unique($question_id);
            $question= QuestionBank::whereIn('id', $question_id)->with('classes','subjects','levels','types')->get();
            $totalMark= QuestionBank::whereIn('id', $question_id)->sum('mark');

            $requestion= QuestionBank::whereNotIn('id', $question_id)->with('classes','subjects','levels','types')->get();

            $data = [
                'question' =>  $question,
                'requestion' =>  $requestion,
                'totalMark' =>  $totalMark,

            ];
            return response()->json($data);

        }
}
