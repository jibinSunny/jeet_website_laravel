<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructionController extends Controller
{
     ###################################    index Items   ################################################
         public function Instruction (Request $request){
            $allinstruction=Instruction::get();
            $data = [
                'allinstruction' => $allinstruction,
                'active'       => 'instruction_list',
            ];
            return view('admin.question.instruction.index',$data);
        }
        ###################################    add Items   ################################################
        public function addInstruction (Request $request){
        $data = [
            'active'       => 'instruction_list',
        ];
        return view('admin.question.instruction.add',$data);
        }
        ###################################    Save And Update Items   ################################################

        public function saveInstruction (Request $request){
            // dd($request->all());
            $inputs = $request->only(['content','title']);
            $inputs['created_user'] = Auth::user()->id;
            $inputs['created_usertype'] =Auth::user()->usertype;

            if ($request->academicyear_id) {
                Instruction::where('id', $request->academicyear_id)->update($inputs);
                return redirect('admin/instruction')->withSuccess('Exam Update successfully');
                
            }
            else{
                Instruction::create($inputs);
                return redirect('admin/instruction')->withSuccess('Exam created successfully');

            }
            return redirect('admin/instruction')->withError('Oops Something went wrong!!');

        }
        ###################################    Edit Items   ################################################
            public function editInstruction($editAcademicYear_id){
                $vendor = Instruction::where('id',$editAcademicYear_id)->first();
                $data = [
                    'active'       => 'instruction_list',
                    'instruction_list' => $vendor,
                ];
                return view('admin.question.instruction.edit',$data);
            }
        ###################################    Delete Items   ################################################
            public function deleteInstruction(Request $request){
                if($request->categoryId){

                    $newscategory =Instruction::where('id',$request->categoryId)->first();
                        $newscategory->delete();
                        return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
                }else{
                    return response()->json(['status'=>0,'message'=>'Something went wrong. please try again.']);
                }
            }
}
