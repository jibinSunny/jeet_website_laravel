<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Extracurricular;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExtracurricularController extends Controller
{
    ###################################    Show Items   ################################################
    public function showExtracurricular(Request $request)
    {
        $assignmentlist = Extracurricular::orderBy('created_at', 'DESC')->get();
        $data = [
            'extracurricularlist' => $assignmentlist,
            'active'       => 'extracurricularlist',
        ];
        return view('admin.setting.content_setting.extracurriculars.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addExtracurricular(Request $request)
    {

        $data = [
            'active'       => 'extracurricularlist',

        ];
        return view('admin.setting.content_setting.extracurriculars.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveExtracurricular(Request $request)
    {


        $inputs = $request->only(['name']);
        $inputs['created_user'] = Auth::user()->id;
        $inputs['created_usertype'] = Auth::user()->usertype;;
        if ($request->academicyear_id) {
            Extracurricular::where('id', $request->academicyear_id)->update($inputs);
            return redirect('admin/setting/content_setting/extracurricular/index')->withSuccess('Extracurricular Update successfully');
        } else {
            Extracurricular::create($inputs);
            return redirect('admin/setting/content_setting/extracurricular/index')->withSuccess('Extracurricular created successfully');
        }
        return redirect('admin/setting/content_setting/extracurricular/index')->withError('Oops Something went wrong!!');
    }
    ###################################    Edit Items   ################################################
    public function editExtracurricular($editAcademicYear_id)
    {
        // return $editAcademicYear_id;
        $vendor = Extracurricular::where('id', $editAcademicYear_id)->first();
        $data = [
            'active'       => 'extracurricularlist',
            'extracurricularlist' => $vendor,
        ];
        return view('admin.setting.content_setting.extracurriculars.edit', $data);
    }
    ###################################    Delete Items   ################################################
    public function deleteExtracurricular(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = Extracurricular::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
