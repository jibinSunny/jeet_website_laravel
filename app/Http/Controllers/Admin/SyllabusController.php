<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\ClassModel;
use App\Models\Syllabus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SyllabusController extends Controller
{
      ###################################    Show Items   ################################################
      public function showSyllabus (Request $request)
      {

          $subject_list = Syllabus::with('Classname')->with('academicyearname')->orderBy('created_at', 'DESC')->get();
        //    return $subject_list;
          $data = [
              'syllabus_list' => $subject_list,
              'active'       => 'syllabus_list',
          ];
          return view('admin.syllabus.index', $data);
      }
      ###################################    Add Items   ################################################
      public function addSyllabus(Request $request)
      {
           $classes = ClassModel::orderBy('created_at', 'DESC')->get();
           $academic_year = AcademicYear::orderBy('created_at', 'DESC')->get();
          $data = [
              'active'       => 'syllabus_list',
              'classes'       => $classes,
              'academic_year' => $academic_year,
          ];
          return view('admin.syllabus.add', $data);
      }
      ###################################    Save And Update Items   ################################################

      public function saveSyllabus(Request $request)
      {

          if ($request->academicyear_id) {
              $inputs = $request->only(['name','class','description','author','academic_year']);
              if ($request->hasFile('file')) {
                $mytime = Carbon::now()->timestamp;
                $filename = $mytime . $request->file->getClientOriginalName();
                $request->file->move('storage/syllabus-file', $filename);
                $inputs['file'] = $filename;
            }

              if (Syllabus::where('id', $request->academicyear_id)->update($inputs)) {
                  return redirect('admin/syllabus/index')->withSuccess('Syllabus Update successfully');
              }
              return redirect('admin/syllabus/index')->withError('Oops Something went wrong!!');
          } else {

              $user = new Syllabus();
              $user->name = $request->name;
              $user->class = $request->class;
              $user->description = $request->description;
              $user->academic_year = $request->academic_year;
              if ($request->hasFile('file')) {
                $mytime = Carbon::now()->timestamp;
                $filename = $mytime . $request->file->getClientOriginalName();
                $request->file->move('storage/syllabus-file', $filename);
                $user->file = $filename;
            }
              $user->created_user = Auth::user()->id;
              $user->created_usertype = Auth::user()->usertype;
              if ($user->save()) {
                  return redirect('admin/syllabus/index')->withSuccess('Syllabus created successfully');
              }
              return redirect('admin/syllabus/add')->withError('Oops Something went wrong!!');
          }
      }
      ###################################    Edit Items   ################################################
      public function editSyllabus ($editAcademicYear_id)
      {

          $vendor = Syllabus::where('id', $editAcademicYear_id)->first();
          $academic_year = AcademicYear::orderBy('created_at', 'DESC')->get();
          $classes = ClassModel::orderBy('created_at', 'DESC')->get();
          $data = [
              'syllabus_list' => $vendor,
              'active'       => 'syllabus_list',
              'classes'       =>  $classes,
              'academic_year' => $academic_year,
          ];
        //   return  $vendor;
          return view('admin.syllabus.edit', $data);
      }


      ###################################    Delete Items   ################################################
      public function deleteSyllabus(Request $request)
      {
          if ($request->categoryId) {
              $newscategory = Syllabus::where('id', $request->categoryId)->first();
              $newscategory->delete();
              return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
          } else {
              return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
          }
      }
}
