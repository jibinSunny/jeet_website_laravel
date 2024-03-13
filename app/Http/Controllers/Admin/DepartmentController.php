<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    ###################################    Show Items   ################################################
    public function showDepartments(Request $request)
    {
        $assignmentlist = Department::orderBy('created_at', 'DESC')->get();
        $data = [
            'departmentlist' => $assignmentlist,
            'active'       => 'departmentlist',
        ];
        return view('admin.department.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addDepartments(Request $request)
    {

        $data = [
            'active'       => 'departmentlist',

        ];
        return view('admin.department.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveDepartments(Request $request)
    {


        $inputs = $request->only(['name']);
        $inputs['created_user'] = Auth::user()->id;
        $inputs['created_usertype'] = Auth::user()->usertype;
        if ($request->academicyear_id) {
            Department::where('id', $request->academicyear_id)->update($inputs);
            return redirect('admin/departments/index')->withSuccess('Department Update successfully');
        } else {
            Department::create($inputs);
            return redirect('admin/departments/index')->withSuccess('Department created successfully');
        }
        return redirect('admin/departments/index')->withError('Oops Something went wrong!!');
    }
    ###################################    Edit Items   ################################################
    public function editDepartments($editAcademicYear_id)
    {
        // return $editAcademicYear_id;
        $vendor = Department::where('id', $editAcademicYear_id)->first();
        $data = [
            'active'       => 'departmentlist',
            'departmentlist' => $vendor,
        ];
        return view('admin.department.edit', $data);
    }
    ###################################    Delete Items   ################################################
    public function deleteDepartments(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = Department::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
