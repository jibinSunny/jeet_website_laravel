<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Diary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDiaryController extends Controller
{
        ###################################    Show Items   ################################################
        public function showDiary (Request $request)
        {
            $assignmentlist = Diary::where('student',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
            $data = [
                'diarylist' => $assignmentlist,
                'active'       => 'mydiary',
            ];
            return view('student.diary.index', $data);
        }
        ###################################    Add Items   ################################################
        public function addDiary(Request $request)
        {
    
            $data = [
                'active'       => 'mydiary',
    
            ];
            return view('student.diary.add', $data);
        }
        ###################################    Save And Update Items   ################################################
    
        public function saveDiary(Request $request)
        {
             
            $inputs = $request->only(['note','student','date']);
            $inputs['date'] = date('Y-m-d', strtotime($request->date));
            $inputs['student']=Auth::user()->id;
            if ($request->academicyear_id) {
                Diary::where('id', $request->academicyear_id)->update($inputs);
                return redirect('student/diary/index')->withSuccess('Art Update successfully');
            } else {
                Diary::create($inputs);
                return redirect('student/diary/index')->withSuccess('Art created successfully');
            }
            return redirect('student/diary/index')->withError('Oops Something went wrong!!');
        }
        ###################################    Edit Items   ################################################
        public function editDiary($categoryId)
        {  
            $vendor = Diary::where('id', $categoryId)->first();
            $data = [
                'active'       => 'mydiary',
                'mydiary' => $vendor,
            ];
            return view('student.diary.edit', $data);
        }
        ###################################    Delete Items   ################################################
        public function deleteDiary(Request $request)
        {
            if ($request->categoryId) {
    
                $newscategory = Diary::where('id', $request->categoryId)->first();
                $newscategory->delete();
                return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
            } else {
                return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
            }
        }

        ###################################    calader   ################################################
        public function calader(Request $request)
        {
            $assignmentlist = Diary::where('student',Auth::user()->id)->orderBy('created_at', 'DESC')->get();
            $data = [
                'active'       => 'calander',
                'diarylist' => $assignmentlist,
    
            ];
            return view('student.calander.index', $data);
        }
}
