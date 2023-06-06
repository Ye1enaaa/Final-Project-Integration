<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Str;
use Carbon\Carbon;
class EventController extends Controller
{
    //EVENT INDEX FUNCTION @ VIEWSCONTROLLER
    public function returnCreateEventView(){
        return view('event-admin.createevent');
    }
    //return events by date
    public function fetchEventTodayWeb(){
        $serverTime = config('app.timezone');
        $today = Carbon::today();
        $eventToday = Event::whereDate('eventDate', $today)->get();

        return view('event-admin.todays-event', compact('eventToday'));
    }

    public function fetchUpcomingEventsWeb(){
        $today = Carbon::today()->toDateString();

        $upcomingEvents = Event::whereDate('eventDate','>',$today)
            ->orderBy('eventDate')
            ->get();
        return view('event-admin.upcoming-events', compact('upcomingEvents'));
    }

    public function fetchEndedEventsWeb(){
        $today = Carbon::today()->toDateString();

        $endedEvents = Event::whereDate('eventDate','<',$today)
            ->orderBy('eventDate')
            ->get();
        return view('event-admin.ended-events', compact('endedEvents'));
    }
    //POST EVENT
    public function addEvent(Request $request){
        $validateFields = $request->validate([
            'eventName' => 'required|string',
            'eventTime' => 'required|string',
            'eventDate' => 'required',
            'eventPlace' => 'required|string',
            'eventDesc' => 'required',
            'eventPicture' => 'nullable|image|mimes:jpeg,png,jpg'
        ]);

        $imagePath = null;
        if($request->hasFile('eventPicture')){
            $imagePath = $request->file('eventPicture')->store('events', 'public');
        }

        $event = Event::create([
            'event_id' => Str::uuid(),
            'eventName' => $validateFields['eventName'],
            'eventTime' => $validateFields['eventTime'],
            'eventDate' => $validateFields['eventDate'],
            'eventPlace' => $validateFields['eventPlace'],
            'eventDesc' => $validateFields['eventDesc'],
            'eventPicture' => $imagePath
        ]);
        return redirect('/admin');
    }
    //DELETE EVENT

    public function destroy($id){
        $event = Event::findOrFail($id);
        if(!$event){
            return response()->json([
                'error' => 'Event not Found'
            ]);
        }

        $event->delete();

        return response()->json([
            'Success' => 'Deleted Successfully'
        ]);

        //return view('');
    }


    //UPDATE EVENT
    public function update(Request $request){

    }
    //----------------------------------FOR MOBILE---------------------------------------\\

    //Student 
    public function index(){
        $events = Event::all();

        return response([
            'events' => $events
        ]);
    }

    public function fetchEventToday(){
        $serverTime = config('app.timezone');
        $today = Carbon::today();
        $eventToday = Event::whereDate('eventDate', $today)->get();

        return response()->json([
            'events' => $eventToday,
            'timezone' => $today
        ]);
    }

    public function fetchUpcomingEvents(){
        $today = Carbon::today()->toDateString();

        $upcomingEvents = Event::whereDate('eventDate','>',$today)
            ->orderBy('eventDate')
            ->get();
        return response()->json([
            'events' => $upcomingEvents,
            'time' => $today 
        ]);
    }

    public function fetchEndedEvents(){
        $today = Carbon::today()->toDateString();

        $upcomingEvents = Event::whereDate('eventDate','<',$today)
            ->orderBy('eventDate')
            ->get();
        return response()->json([
            'events' => $upcomingEvents,
            'time' => $today 
        ]);
    }
}
