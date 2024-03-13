<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    ###################################    Show Items   ################################################
    public function showRoom(Request $request)
    {
        $assignmentlist = Room::orderBy('created_at', 'DESC')->get();
        $data = [
            'roomlist' => $assignmentlist,
            'active'       => 'roomlist',
        ];
        return view('admin.setting.content_setting.rooms.index', $data);
    }
    ###################################    Add Items   ################################################
    public function addRoom(Request $request)
    {

        $data = [
            'active'       => 'roomlist',

        ];
        return view('admin.setting.content_setting.rooms.add', $data);
    }
    ###################################    Save And Update Items   ################################################

    public function saveRoom(Request $request)
    {


        $inputs = $request->only(['name']);
        $inputs['created_user'] = Auth::user()->id;
        $inputs['created_usertype'] = Auth::user()->usertype;
        if ($request->academicyear_id) {
            Room::where('id', $request->academicyear_id)->update($inputs);
            return redirect('admin/setting/content_setting/rooms/index')->withSuccess('Rooms Update successfully');
        } else {
            Room::create($inputs);
            return redirect('admin/setting/content_setting/rooms/index')->withSuccess('Rooms created successfully');
        }
        return redirect('admin/setting/content_setting/rooms/index')->withError('Oops Something went wrong!!');
    }
    ###################################    Edit Items   ################################################
    public function editRoom($editAcademicYear_id)
    {
        // return $editAcademicYear_id;
        $vendor = Room::where('id', $editAcademicYear_id)->first();
        $data = [
            'active'       => 'roomlist',
            'roomlist' => $vendor,
        ];
    //  return $vendor;
        return view('admin.setting.content_setting.rooms.edit', $data);
    }
    ###################################    Delete Items   ################################################
    public function deleteRoom(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = Room::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
