<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DivisionController extends Controller
{
     ###################################    Show Items   ################################################
     public function showDivision (Request $request)
     {

         $division_list = Division::with('Classname')->orderBy('created_at', 'DESC')->get();
        //  return $division_list;
         $data = [
             'division_list' => $division_list,
             'active'       => 'division_list',
         ];
         return view('admin.division.index', $data);
     }
     ###################################    Add Items   ################################################
     public function addDivision(Request $request)
     {
        $teacher = Teacher::get();
         $classes = ClassModel::orderBy('created_at', 'DESC')->get();
         $data = [
             'active'       => 'division_list',
             'classes'       => $classes,
             'teacher'       => $teacher,
         ];
         return view('admin.division.add', $data);
     }
     ###################################    Save And Update Items   ################################################

     public function saveDivision(Request $request)
     {

         if ($request->academicyear_id) {
             $inputs = $request->only(['name','class','capacity','category','teacher','note']);

             if (Division::where('id', $request->academicyear_id)->update($inputs)) {
                 return redirect('admin/division/index')->withSuccess('Division Update successfully');
             }
             return redirect('admin/division/index')->withError('Oops Something went wrong!!');
         } else {
             $user = new Division();

             $user->name = $request->name;
             $user->class = $request->class;
             $user->teacher = $request->teacher;
             $user->capacity = $request->capacity;
             $user->category = $request->category;
             $user->created_user = Auth::user()->id;
             $user->created_usertype = Auth::user()->usertype;
             $user->note = $request->note;
             if ($user->save()) {
                 return redirect('admin/division/index')->withSuccess('Division created successfully');
             }
             return redirect('admin/division/add')->withError('Oops Something went wrong!!');
         }
     }
     ###################################    Edit Items   ################################################
     public function editDivision ($editAcademicYear_id)
     {

         $vendor = Division::where('id', $editAcademicYear_id)->first();
         $classes = ClassModel::orderBy('created_at', 'DESC')->get();
         $teacher = Teacher::get();
         $data = [
             'division_list' => $vendor,
             'teacher'       => $teacher,
             'active'       => 'division_list',
             'classes'       =>  $classes,
         ];
         // return  $vendor;
         return view('admin.division.edit', $data);
     }


     ###################################    Delete Items   ################################################
     public function deleteDivision(Request $request)
     {
         if ($request->categoryId) {

             $newscategory = Division::where('id', $request->categoryId)->first();
             $newscategory->delete();
             return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
         } else {
             return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
         }
     }
}
