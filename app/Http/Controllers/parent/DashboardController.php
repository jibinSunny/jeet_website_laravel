<?php

namespace App\Http\Controllers\parent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ParentModel;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller
{
  public function showDashboard(Request $request)
  {
    $count_teacher = Teacher::count();
    $count_student = Student::count();
    $count_class = ClassModel::count();
    $count_parents = ParentModel::count();
    $user = Auth::user();
    $data = [
      'count_teacher' => $count_teacher,
      'count_student' => $count_student,
      'count_class' => $count_class,
      'count_parents' => $count_parents,
      'user' => $user,

    ];
    return view('parent/dashboard/index', $data);
  }
  //  parent Profile;
  public function parentProfile(Request $request)
  {
    $admin = Auth::user();
    $data = ['admin' => $admin, 'active' => 'admin'];
    return view('parent/profile', $data);
  }
  // parent update Profile 
  public function parentupdateProfile(Request $request)
  {  
    $admin = ParentModel::find($request->id);
    if ($request->file('profile_image')) {

      $path = public_path('user-files/parent/profile/' . $admin->code);
      if (!File::isDirectory($path)) {
        File::makeDirectory($path, 0777, true, true);
      }
      $file          = $request->file('profile_image');
      $profile_file_name     = $file->getClientOriginalName();
      $file->move($path, $profile_file_name);
      $admin->photo	 = $profile_file_name;
    }
    $admin->first_name = $request->first_name;
    $admin->last_name = $request->last_name;
    $admin->active = $request->active;
    $admin->email = $request->email;
    if ($admin->update()) {
      return redirect('/parent/dashboard')->withSuccess('successfully');
    }
    return redirect('/parent/dashboard')->withError('Oops Something went wrong!!');
  }

  // parent Profile password;
  public function parentPassword(Request $request)
  {
    $admin = Auth::user();
    $data = ['admin' => $admin, 'active' => 'admin'];
    return view('parent/change_password', $data);
  }
  // parent student Password
  public function updateparentPassword(Request $request)
  {

    $inputs['password'] = Hash::make($request->password);
    if (ParentModel::where('id', $request->id)->update($inputs)) {
      return redirect('/parent/dashboard')->withSuccess('successfully');
    }
    return redirect('/parent/dashboard')->withError('Oops Something went wrong!!');
  }
}
