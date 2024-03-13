<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\QuestionAnswer;
use App\Models\QuestionBank;
use App\Models\QuestionLevel;
use App\Models\QuestionOption;
use App\Models\QuestionType;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionBankController extends Controller
{
    ###################################    index Items   ################################################
    public function QuestionBank  (Request $request){
        $allquestion= QuestionBank::with('classes','subjects','levels','types')->get();
        for ($i = 0; $i < count($allquestion); $i++) {
            $allquestion[$i]->option = QuestionOption::where('question',$allquestion[$i]->id)->get();
        }
    // return  $allquestion;
        $data = [
            'allquestion' => $allquestion,
            'active'       => 'question_bank_list',
        ];
        return view('admin.question.question_bank.index',$data);
    }
    ###################################    add Items   ################################################
    public function addQuestionBank (Request $request){
     $allclass= ClassModel::get();   
     $alllevel=QuestionLevel::get(); 
     $allltype=QuestionType::get(); 
    $data = [
        'active'       => 'question_bank_list',
        'alllevel' => $alllevel,
        'allltype' => $allltype,
        'allclass' => $allclass,
    ];
    return view('admin.question.question_bank.add',$data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveQuestionBank (Request $request){
        if ($request->type == "2") {
            $request->validate([
            'answer'  =>  'required',
            'option'  =>  'required',
        ]);
        }
        if ($request->academicyear_id) {
            $inputs = $request->only([ 'answer','question','explanation','totalOption','level','type','mark','hints','subject','class']);
           
            if($request->file('upload')){
                $path = public_path('questions/upload');
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('upload');
                $visa_file_name     = $file->getClientOriginalName();
                $file->move($path, $visa_file_name);
                $inputs['upload'] =$visa_file_name;
            }
            $inputs['answer'] = $request->answer1;
            QuestionBank::where('id', $request->academicyear_id)->update($inputs);
            $questionoption = QuestionOption::where('question', $request->academicyear_id)->get();
            foreach ($questionoption as $key => $option) {
                $option->delete();
            }
            if ($request->type == "2") {
                for ($j = 0; $j < count($request->option); $j++) {
                    $question_option = new QuestionOption();
                    $question_option->question = $request->academicyear_id;
                    $question_option->type = $request->type;
                    $question_option->name = $request->option[$j];
                    for ($i = 0; $i < count($request->answer); $i++) 
                     {
                        if ($request->answer[$i] == $j) 
                        {
                            $question_option->answer =1;
                        }
                      }
                    $question_option->save();
                }
                }
            return redirect('admin/question_bank')->withSuccess('Exam Update successfully');
            
        }
        else{
            // dd($request->all());
            $inputs = $request->only(['question','explanation','totalOption','level','type','mark','hints','subject','class']);
            $inputs['created_user'] = Auth::user()->id;
            $inputs['created_usertype'] =Auth::user()->usertype;
            $inputs['answer'] = $request->answer1;
            if($request->file('upload')){
                $path = public_path('questions/upload');
                if(!File::isDirectory($path)){
                    File::makeDirectory($path, 0777, true, true);
                }
                $file          = $request->file('upload');
                $visa_file_name     = $file->getClientOriginalName();
                $file->move($path, $visa_file_name);
                $inputs['upload'] =$visa_file_name;
            }
           
            $questionbank=QuestionBank::create($inputs);
           
            if ($request->type == "2") {
                for ($j = 0; $j < count($request->option); $j++) {
                    $question_option = new QuestionOption();
                    $question_option->question = $questionbank->id;
                    $question_option->type = $request->type;
                    $question_option->name = $request->option[$j];
                    for ($i = 0; $i < count($request->answer); $i++) 
                     {
                        if ($request->answer[$i] == $j) 
                        {
                            $question_option->answer =1;
                        }
                      }
                    $question_option->save();
                }
            }

            return redirect('admin/question_bank')->withSuccess('Exam created successfully');

        }
        return redirect('admin/question_bank')->withError('Oops Something went wrong!!');

    }
    ###################################    Edit Items   ################################################
        public function editQuestionBank($editAcademicYear_id){
            $vendor = QuestionBank::where('id',$editAcademicYear_id)->first();
            $options = QuestionOption::where('question',$vendor->id)->get();
            $allclass= ClassModel::get();   
            $alllevel=QuestionLevel::get(); 
            $allltype=QuestionType::get(); 
            $allltype=QuestionType::get();
            $allsubject=Subject::where('class',$vendor->class)->get();
            $data = [
                'active'       => 'question_bank_list',
                'question' => $vendor,
                'alllevel' => $alllevel,
                'allltype' => $allltype,
                'allclass' => $allclass,
                'allsubject' => $allsubject,
                'options' => $options,
            ];
            // return $options;
            return view('admin.question.question_bank.edit',$data);
        }
    ###################################    Delete Items   ################################################
        public function deleteInstruction(Request $request){
            if($request->categoryId){

                $newscategory =QuestionBank::where('id',$request->categoryId)->first();
                    $newscategory->delete();
                    return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
            }else{
                return response()->json(['status'=>0,'message'=>'Something went wrong. please try again.']);
            }
        }
        public function deleteQuestionBank(Request $request){
            if($request->categoryId){
    
            $newscategory =QuestionBank::where('id',$request->categoryId)->first();
                $newscategory->delete();
                $questionoption = QuestionOption::where('question', $request->categoryId)->get();
                foreach ($questionoption as $key => $option) {
                    $option->delete();
                }
               
                return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
         }else{
            return response()->json(['status'=>0,'message'=>'Something went wrong. please try again.']);
        }
    }
}
