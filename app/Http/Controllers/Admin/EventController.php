<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Division;
use App\Models\Event as ModelsEvent;
use Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    ###################################    Show Items   ################################################
    public function showEvent(Request $request)
    {

        $event_list = ModelsEvent::orderBy('created_at', 'DESC')->get();
        $data = [
            'event_list' => $event_list,
            'active'       => 'eventlist',
        ];
        return view('admin.event.index', $data);
    }

    public function addEvent(Request $request)
    {
        $class = ClassModel::orderBy('created_at', 'DESC')->get();
        $data = [
            'classes' => $class,
            'active'       => 'eventlist',
        ];
        return view('admin.event.add', $data);
    }

    public function saveEvent(Request $request)
    {


        $inputs = $request->only(['title', 'date', 'time', 'type', 'class', 'division', 'description']);
        $inputs['date'] = date('Y-m-d', strtotime($request->date));
        $inputs['ex_date'] = date('Y-m-d', strtotime("+1 day", strtotime($request->date)));
        $inputs['created_user'] = Auth::user()->id;
        $inputs['created_usertype'] = Auth::user()->usertype;
        if ($request->academicyear_id) {
            ModelsEvent::where('id', $request->academicyear_id)->update($inputs);
            return redirect('admin/event/index')->withSuccess('Department Update successfully');
        } else {
            ModelsEvent::create($inputs);
            return redirect('admin/event/index')->withSuccess('Department created successfully');
        }
        return redirect('admin/event/index')->withError('Oops Something went wrong!!');
    }
     ###################################    Edit Items   ################################################
     public function editEvent ($editAcademicYear_id)
     {

         $vendor = ModelsEvent::where('id', $editAcademicYear_id)->first();
         $classes = ClassModel::orderBy('created_at', 'DESC')->get();
         $division = Division::where('class', $vendor->class)->orderBy('created_at', 'DESC')->get();
         $data = [
             'event_list' => $vendor,
             'division'       => $division,
             'active'       => 'eventlist',
             'classes'       =>  $classes,
         ];
         return view('admin.event.edit', $data);
     }
          ###################################    view Items   ################################################
          public function viewEvent ($code)
          {
            // return $code;
            $eventlist = ModelsEvent::where('id',$code)->first();
            $data = [
                'event' => $eventlist,
                'active'       => 'eventlist',
            ];
            return view('admin.event.view', $data);
          }
    ###################################    Delete Items   ################################################
    public function deleteEvent(Request $request)
    {
        if ($request->categoryId) {

            $newscategory = ModelsEvent::where('id', $request->categoryId)->first();
            $newscategory->delete();
            return response()->json(['message'  => 'Deleted Successfully', 'status'    => '1']);
        } else {
            return response()->json(['status' => 0, 'message' => 'Something went wrong. please try again.']);
        }
    }
}
