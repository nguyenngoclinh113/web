<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use Calendar;

class EventController extends Controller
{
    //
    public function calendar()
   {
   		$events = Event::get();
        $event_list = [];
        foreach($events as $key=>$event) {
            $event_list[] = Calendar::event (
                $event->name,
                true,
                new \DateTime($event->start_date),
                new \DateTime($event->end_date.'+1 day'),
                null,
                         [
                             'color' => '#ff0000',
                             
                         ]
            );
        }
        $calendar_details = Calendar::addEvents($event_list);
        return view('admin.page.calendar',compact('calendar_details'));
   }

   public function addEvent(Request $request)
   {
   		$this->validate($request,
    		[
    			'name'=>'required',
    			'start_date'=>'required',
    			'end_date'=>'required'
    		],
    		[
    			'name.required'=>'* Please type name event',
    			'start_date.required'=>'* Please choose start date',
    			'end_date.required'=>'* Please choose end date'
    		]);
   		$data = $request->all();
   		$event = Event::create($data);
   		return redirect()->back()->with('messege','Add event success!');
   }
   

}
