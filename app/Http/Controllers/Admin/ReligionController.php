<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReligionController extends Controller
{
    
        ###################################    Show Items   ################################################
        public function showReligion(Request $request)
        {
            $assignmentlist = Religion::orderBy('created_at', 'DESC')->get();
            $data = [
                'religionlist' => $assignmentlist,
                'active'       => 'religionlist',
            ];
            return view('admin.setting.content_setting.religions.index', $data);
        }
        ###################################    Add Items   ################################################
        public function addReligion(Request $request)
        {

            $data = [
                'active'       => 'religionlist',
    
            ];
            return view('admin.setting.content_setting.religions.add', $data);
        }
        ###################################    Save And Update Items   ################################################
    
        public function saveReligion(Request $request)
        {
    
       
                $inputs = $request->only(['name']);
                $inputs['created_user'] = Auth::user()->id;
                $inputs['created_usertype'] =Auth::user()->usertype;
                if ($request->academicyear_id) {
                    Religion::where('id', $request->academicyear_id)->update($inputs);
                        return redirect('admin/setting/content_setting/religion/index')->withSuccess('Religion Update successfully');
                }
                else{
                    Religion::create($inputs);
                    return redirect('admin/setting/content_setting/religion/index')->withSuccess('Religion created successfully');
    
                }
                return redirect('admin/setting/content_setting/religion/index')->withError('Oops Something went wrong!!');
           
            
        }
        ###################################    Edit Items   ################################################
        public function editReligion($editAcademicYear_id)
        {
            // return $editAcademicYear_id;
            $vendor = Religion::where('id', $editAcademicYear_id)->first();
            $data = [
                'active'       => 'religionlist',
                'religionlist' => $vendor,
            ];
            return view('admin.setting.content_setting.religions.edit', $data);
        }
        ###################################    Delete Items   ################################################
        public function deleteReligion(Request $request)
        {
            if ($request->categoryId) {
    
                $newscategory = Religion::where('id', $request->categoryId)->first();
                $newscategory->delete();
                return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
            } else {
                return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
            }
        }
}
