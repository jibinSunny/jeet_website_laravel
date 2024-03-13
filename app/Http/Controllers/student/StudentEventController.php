<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class StudentEventController extends Controller
{
    ###################################    Show Items   ################################################
    public function studentEvent(Request $request)
    {
        // return Carbon::today()->format('Y-m-d');
        $eventlist = Event::whereDate('ex_date','>=',Carbon::today())->get(); 
        if(!$eventlist){
            return  $eventlist;
        }
        else
        {
            foreach($eventlist as $row)
            {
        if($row->type == 1){
            $row->where('class',Auth::user()->class);
            if($row->division != null){
                $row->Where('division',Auth::user()->division);
            }
        }
        $row->get();
        }    
    }
        $data = [
            'event_list' => $eventlist,
            'active'       => 'event_list',
        ];
        return view('student.event.index', $data);
    }
        ###################################    View Items   ################################################
        public function studentEventView ( $code)
        {
            $eventlist = Event::where('id', $code)->first();
            $data = [
                'event' => $eventlist,
                'active'       => 'event_list',
            ];
            return view('student.event.view', $data);
        }
}
