<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SportController extends Controller
{
    ###################################    Show Items   ################################################
    public function showSport (Request $request)
    {
        $assignmentlist = Sport::orderBy('created_at', 'DESC')->get();
        $data = [
            'sportlist' => $assignmentlist,
            'active'       => 'sportlist',
        ];
        return view('admin.setting.content_setting.sports.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addSport(Request $request)
    {

        $data = [
            'active'       => 'sportlist',

        ];
        return view('admin.setting.content_setting.sports.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveSport(Request $request)
    {


        $inputs = $request->only(['name']);
        $inputs['created_user'] = Auth::user()->id;
        $inputs['created_usertype'] = Auth::user()->usertype;
        if ($request->academicyear_id) {
            Sport::where('id', $request->academicyear_id)->update($inputs);
            return redirect('admin/setting/content_setting/sports/index')->withSuccess('Extracurricular Update successfully');
        } else {
            Sport::create($inputs);
            return redirect('admin/setting/content_setting/sports/index')->withSuccess('Extracurricular created successfully');
        }
        return redirect('admin/setting/content_setting/sports/index')->withError('Oops Something went wrong!!');
    }
    ###################################    Edit Items   ################################################
    public function editSport($editAcademicYear_id)
    {
        // return $editAcademicYear_id;
        $vendor = Sport::where('id', $editAcademicYear_id)->first();
        $data = [
            'active'       => 'sportlist',
            'sportlist' => $vendor,
        ];
        return view('admin.setting.content_setting.sports.edit', $data);
    }
    ###################################    Delete Items   ################################################
    public function deleteSport(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = Sport::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
