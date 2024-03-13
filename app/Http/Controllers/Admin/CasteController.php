<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Caste;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasteController extends Controller
{
     ###################################    Show Items   ################################################
     public function showCaste(Request $request)
     {
         $assignmentlist = Caste::orderBy('created_at', 'DESC')->with('Religionsname')->get();
         $data = [
             'castelist' => $assignmentlist,
             'active'       => 'castelist',
         ];
         return view('admin.setting.content_setting.castes.index', $data);
     }
     ###################################    Add Items   ################################################
     public function addCaste(Request $request)
     {
        $religionlist = Religion::orderBy('created_at', 'DESC')->get();
         $data = [
             'active'       => 'castelist',
             'religionlist' =>  $religionlist,
 
         ];
         return view('admin.setting.content_setting.castes.add', $data);
     }
     ###################################    Save And Update Items   ################################################
 
     public function saveCaste(Request $request)
     {
 
    
             $inputs = $request->only(['name','religion']);
             $inputs['created_user'] = Auth::user()->id;
             $inputs['created_usertype'] =Auth::user()->usertype;
             if ($request->academicyear_id) {
                Caste::where('id', $request->academicyear_id)->update($inputs);
                     return redirect('admin/setting/content_setting/castes/index')->withSuccess('Castes Update successfully');
             }
             else{
                Caste::create($inputs);
                 return redirect('admin/setting/content_setting/castes/index')->withSuccess('Castes created successfully');
 
             }
             return redirect('admin/setting/content_setting/castes/index')->withError('Oops Something went wrong!!');
        
         
     }
     ###################################    Edit Items   ################################################
     public function editCaste($editAcademicYear_id)
     {
         // return $editAcademicYear_id;
         $vendor = Caste::where('id', $editAcademicYear_id)->first();
         $religionlist = Religion::orderBy('created_at', 'DESC')->get();
         $data = [
             'active'       => 'castelist',
             'castelist' => $vendor,
             'religionlist' =>  $religionlist,
         ];
         return view('admin.setting.content_setting.castes.edit', $data);
     }
     ###################################    Delete Items   ################################################
     public function deleteCaste(Request $request)
     {
         if ($request->categoryId) {
 
             $newscategory = Caste::where('id', $request->categoryId)->first();
             $newscategory->delete();
             return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
         } else {
             return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
         }
     }
}
