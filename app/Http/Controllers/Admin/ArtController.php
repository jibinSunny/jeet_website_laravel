<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Art;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtController extends Controller
{
    ###################################    Show Items   ################################################
    public function showArt(Request $request)
    {
        $assignmentlist = Art::orderBy('created_at', 'DESC')->get();
        $data = [
            'artlist' => $assignmentlist,
            'active'       => 'artlist',
        ];
        return view('admin.setting.content_setting.arts.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addArt(Request $request)
    {

        $data = [
            'active'       => 'artlist',

        ];
        return view('admin.setting.content_setting.arts.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveArt(Request $request)
    {


        $inputs = $request->only(['name']);
        $inputs['created_user'] = Auth::user()->id;
        $inputs['created_usertype'] = Auth::user()->usertype;;
        if ($request->academicyear_id) {
            Art::where('id', $request->academicyear_id)->update($inputs);
            return redirect('admin/setting/content_setting/art/index')->withSuccess('Art Update successfully');
        } else {
            Art::create($inputs);
            return redirect('admin/setting/content_setting/art/index')->withSuccess('Art created successfully');
        }
        return redirect('admin/setting/content_setting/art/index')->withError('Oops Something went wrong!!');
    }
    ###################################    Edit Items   ################################################
    public function editArt($editAcademicYear_id)
    {
        // return $editAcademicYear_id;
        $vendor = Art::where('id', $editAcademicYear_id)->first();
        $data = [
            'active'       => 'artlist',
            'artlist' => $vendor,
        ];
        return view('admin.setting.content_setting.arts.edit', $data);
    }
    ###################################    Delete Items   ################################################
    public function deleteArt(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = Art::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
