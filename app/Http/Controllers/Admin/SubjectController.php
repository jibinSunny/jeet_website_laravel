<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
     ###################################    Show Items   ################################################
     public function showSubject (Request $request)
     {

         $subject_list = Subject::with('Classname')->orderBy('created_at', 'DESC')->get();
    //   return $subject_list;
         $data = [
             'subject_list' => $subject_list,
             'active'       => 'subject_list',
         ];
         return view('admin.subject.index', $data);
     }
     ###################################    Add Items   ################################################
     public function addSubject(Request $request)
     {
          $classes = ClassModel::orderBy('created_at', 'DESC')->get();
         $data = [
             'active'       => 'subject_list',
             'classes'       => $classes,
         ];
         return view('admin.subject.add', $data);
     }
     ###################################    Save And Update Items   ################################################

     public function saveSubject(Request $request)
     {

         if ($request->academicyear_id) {
            //  dd($request->all());
             $inputs = $request->only(['name','class','subject_code','author','pass_mark','total_mark','note']);

             if (Subject::where('id', $request->academicyear_id)->update($inputs)) {
                 return redirect('admin/subject/index')->withSuccess('Subject Update successfully');
             }
             return redirect('admin/subject/index')->withError('Oops Something went wrong!!');
         } else {
            $request->validate([
                'subject_code' => 'required|unique:subjects,subject_code',
            ]);
             $user = new Subject();
             $user->name = $request->name;
             $user->class = $request->class;
             $user->subject_code = $request->subject_code;
             $user->author = $request->author;
             $user->pass_mark = $request->pass_mark;
             $user->total_mark = $request->total_mark;
             $user->created_user = Auth::user()->id;
             $user->created_usertype = Auth::user()->usertype;
             $user->note = $request->note;
             if ($user->save()) {
                 return redirect('admin/subject/index')->withSuccess('Subject created successfully');
             }
             return redirect('admin/subject/add')->withError('Oops Something went wrong!!');
         }
     }
     ###################################    Edit Items   ################################################
     public function editSubject ($editAcademicYear_id)
     {

         $vendor = Subject::where('id', $editAcademicYear_id)->first();
         $classes = ClassModel::orderBy('created_at', 'DESC')->get();
         $data = [
             'subject_list' => $vendor,
             'active'       => 'subject_list',
             'classes'       =>  $classes,
         ];
         // return  $vendor;
         return view('admin.subject.edit', $data);
     }


     ###################################    Delete Items   ################################################
     public function deleteSubject(Request $request)
     {
         if ($request->categoryId) {

             $newscategory = Subject::where('id', $request->categoryId)->first();
             $newscategory->delete();
             return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
         } else {
             return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
         }
     }
}
