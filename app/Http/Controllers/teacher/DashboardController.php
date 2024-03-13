<?php

namespace App\Http\Controllers\teacher;

use App\Models\ClassModel;
use App\Models\ParentModel;
use App\Models\Student;
use App\Models\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        return view('teacher/dashboard/index', $data);
    }
    //  teacher Profile;
    public function teacherProfile (Request $request)
    {
        $admin = Auth::user();
        $data = ['admin' => $admin, 'active' => 'admin'];
        return view('teacher/profile', $data);
    }
    // teacher update Profile 
    public function teacherupdateProfile(Request $request)
    {
        $admin = Teacher::find($request->id);
        if ($request->file('profile_image')) {

            $path = public_path('user-files/teacher/profile/' . $admin->code);
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $file          = $request->file('profile_image');
            $profile_file_name     = $file->getClientOriginalName();
            $file->move($path, $profile_file_name);
            $admin->profile_image = $profile_file_name;
        }
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->active = $request->active;
        $admin->email = $request->email;
        if ($admin->update()) {
            return redirect('/teacher/dashboard')->withSuccess('successfully');
        }
        return redirect('/teacher/dashboard')->withError('Oops Something went wrong!!');
    }

    // teacher Profile password;
    public function teacherPassword(Request $request)
    {
        $admin = Auth::user();
        $data = ['admin' => $admin, 'active' => 'admin'];
        return view('teacher/change_password', $data);
    }
    // update teacher Password
    public function updateteacherPassword(Request $request)
    {

        $inputs['password'] = Hash::make($request->password);
        if (Teacher::where('id', $request->id)->update($inputs)) {
            return redirect('/teacher/dashboard')->withSuccess('successfully');
        }
        return redirect('/teacher/dashboard')->withError('Oops Something went wrong!!');
    }
}
