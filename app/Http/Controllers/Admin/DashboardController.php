<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\ClassModel;
use App\Models\ParentModel;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Debugbar;
use File;
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
            'active'       => 'admin',

        ];
        return view('admin/dashboard/index', $data);
    }
    //  adminProfile;
    public function adminProfile(Request $request)
    {
        $admin = Auth::user();
        $data = ['admin' => $admin, 'active' => 'admin'];
        return view('admin/admin_profile', $data);
    }
    //  adminupdateProfile
    public function adminupdateProfile(Request $request)
    {
        $admin = Admin::find($request->id);
        $inputs = $request->only(['name', 'phone', 'active', 'email']);
        if ($request->file('photo')) {
            // File::Delete(public_path('user-files/admin/admin-profiles/' . $admin->photo));
            $image    = $request->file('photo');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('user-files/admin/admin-profiles/'), $new_name);
            $inputs['photo'] = $new_name;
        }

        if (Admin::where('id', $request->id)->update($inputs)) {
            return redirect('/admin/dashboard')->withSuccess('successfully');
        }
        return redirect('/admin/dashboard')->withError('Oops Something went wrong!!');
    }

    //  adminProfile password;
    public function adminPassword(Request $request)
    {
        $admin = Auth::user();
        $data = ['admin' => $admin, 'active' => 'admin'];
        return view('admin/change_password', $data);
    }
    // updateAdminPassword
    public function updateAdminPassword(Request $request){

                $inputs['password'] = Hash::make($request->password);
                if(Admin::where('id',$request->id)->update($inputs))
                {
                    return redirect('/admin/dashboard')->withSuccess('successfully');
                }
                return redirect('/admin/dashboard')->withError('Oops Something went wrong!!');
    }
}
