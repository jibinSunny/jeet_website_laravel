<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hostel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HostelController extends Controller
{
 ###################################    Show Items   ################################################
    public function showHostel(Request $request){
        $academicyear = Hostel::orderBy('created_at','DESC')->get();
        $data = [
            'hostel' => $academicyear,
            'active'       => 'hostlist',
        ];
        // return $academicyear;
        return view('admin.hostel.index',$data);
    }
###################################    Add Items   ################################################
    public function addHostel(Request $request){
        $data = [
            'active'       => 'hostlist',
        ];
        return view('admin.hostel.add',$data);
    }

    ###################################    Save And Update Items   ################################################

    public function saveHostel (Request $request){

        if($request->academicyear_id){
            $request->validate([
                'name' => 'required',
                'hostel_type' => 'required',
                'address' => 'required',
            ]);
            $inputs = $request->only(['name','hostel_type','address','note']);


            if(Hostel::where('id',$request->academicyear_id)->update($inputs))
            {
                return redirect('admin/hostel/index')->withSuccess('Hostel Update successfully');
            }
            return redirect('admin/hostel/index')->withError('Oops Something went wrong!!');
        }else{

            $request->validate([
                'name' => 'required',
                'hostel_type' => 'required',
                'address' => 'required',
           
            ]);
            $user = new Hostel();
            $user->name=$request->name;
            $user->hostel_type=$request->hostel_type;
            $user->address=$request->address;
            $user->note=$request->note;
            // $user->created_user=Auth::user()->id;
            if( $user->save())
            {
                return redirect('admin/hostel/index')->withSuccess('Hostel  created successfully');
            }
            return redirect('admin/hostel/add')->withError('Oops Something went wrong!!');

        }
        
    }
    ###################################    Edit Items   ################################################
    public function editHostel ($editAcademicYear_id){
  
        $vendor = Hostel::where('id',$editAcademicYear_id)->first();
        $data = [
            'hostel' => $vendor,
            'active'       => 'hostlist',
        ];
        return view('admin.hostel.edit',$data);
    }
###################################    Delete Items   ################################################    
public function deleteHostel(Request $request){
    if($request->categoryId){
     
        $newscategory =Hostel::where('id',$request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
    }else{
        return response()->json(['status'=>0,'message'=>'Something went wrong. please try again.']);
    }
}
}
