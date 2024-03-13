<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    ###################################    Show Items   ################################################
    public function showClasses (Request $request)
    {

        $class_list = ClassModel::orderBy('name', 'ASC')->get();
        $data = [
            'class_list' => $class_list,
            'active'       => 'class_list',
        ];
        // return  $academicyear;
        return view('admin.classes.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addClasses(Request $request)
    {
        $data = [
            'active'       => 'class_list',
        ];
        return view('admin.classes.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveClasses(Request $request)
    {

        if ($request->academicyear_id) {
            $inputs = $request->only(['name', 'name_numeric', 'teacher','note']);

            if (ClassModel::where('id', $request->academicyear_id)->update($inputs)) {
                return redirect('admin/classes/index')->withSuccess('Classes Update successfully');
            }
            return redirect('admin/classes/index')->withError('Oops Something went wrong!!');
        } else {
            $user = new ClassModel();
            $user->name = $request->name;
            $user->name_numeric = $request->name_numeric;
            $user->note = $request->note;
            $user->created_user = Auth::user()->id;
            $user->created_usertype = Auth::user()->usertype;
            if ($user->save()) {
                return redirect('admin/classes/index')->withSuccess('Classes created successfully');
            }
            return redirect('admin/classes/add')->withError('Oops Something went wrong!!');
        }
    }
    ###################################    Edit Items   ################################################
    public function editClasses($editAcademicYear_id)
    {
        $vendor = ClassModel::where('id', $editAcademicYear_id)->first();
        $data = [
            'class_list' => $vendor,
            'active'       => 'class_list',
        ];
        return view('admin.classes.edit', $data);
    }


    ###################################    Delete Items   ################################################
    public function deleteClasses(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = ClassModel::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
