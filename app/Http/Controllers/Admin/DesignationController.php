<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{
    ###################################    Show Items   ################################################
    public function showDesignation(Request $request)
    {
        $assignmentlist = Designation::orderBy('created_at', 'DESC')->get();
        $data = [
            'designationlist' => $assignmentlist,
            'active'       => 'designationlist',
        ];
        return view('admin.setting.administration.designations.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addDesignation(Request $request)
    {

        $data = [
            'active'       => 'designationlist',

        ];
        return view('admin.setting.administration.designations.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveDesignation(Request $request)
    {


        $inputs = $request->only(['name']);
        $inputs['created_user'] = Auth::user()->id;
        $inputs['created_usertype'] = Auth::user()->usertype;;
        if ($request->academicyear_id) {
            Designation::where('id', $request->academicyear_id)->update($inputs);
            return redirect('admin/setting/administration/designations/index')->withSuccess('Department Update successfully');
        } else {
            Designation::create($inputs);
            return redirect('admin/setting/administration/designations/index')->withSuccess('Department created successfully');
        }
        return redirect('admin/setting/administration/designations/index')->withError('Oops Something went wrong!!');
    }
    ###################################    Edit Items   ################################################
    public function editDesignation($editAcademicYear_id)
    {
        // return $editAcademicYear_id;
        $vendor = Designation::where('id', $editAcademicYear_id)->first();
        $data = [
            'active'       => 'designationlist',
            'designationlist' => $vendor,
        ];
        return view('admin.setting.administration.designations.edit', $data);
    }
    ###################################    Delete Items   ################################################
    public function deleteDesignation(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = Designation::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
