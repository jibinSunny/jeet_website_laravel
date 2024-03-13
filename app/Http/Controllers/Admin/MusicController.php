<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MusicController extends Controller
{
    ###################################    Show Items   ################################################
    public function showMusic(Request $request)
    {
        $assignmentlist = Music::orderBy('created_at', 'DESC')->get();
        $data = [
            'musiclist' => $assignmentlist,
            'active'       => 'musiclist',
        ];
        return view('admin.setting.content_setting.musics.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addMusic(Request $request)
    {

        $data = [
            'active'       => 'musiclist',

        ];
        return view('admin.setting.content_setting.musics.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveMusic(Request $request)
    {


        $inputs = $request->only(['name']);
        $inputs['created_user'] = Auth::user()->id;
        $inputs['created_usertype'] = Auth::user()->usertype;
        if ($request->academicyear_id) {
            Music::where('id', $request->academicyear_id)->update($inputs);
            return redirect('admin/setting/content_setting/music/index')->withSuccess('Music Update successfully');
        } else {
            Music::create($inputs);
            return redirect('admin/setting/content_setting/music/index')->withSuccess('Music created successfully');
        }
        return redirect('admin/setting/content_setting/music/index')->withError('Oops Something went wrong!!');
    }
    ###################################    Edit Items   ################################################
    public function editMusic($editAcademicYear_id)
    {
        // return $editAcademicYear_id;
        $vendor = Music::where('id', $editAcademicYear_id)->first();
        $data = [
            'active'       => 'musiclist',
            'musiclist' => $vendor,
        ];
        return view('admin.setting.content_setting.musics.edit', $data);
    }
    ###################################    Delete Items   ################################################
    public function deleteMusic(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = Music::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
