<?php

namespace App\Http\Controllers\Web\Event;

use App\CalenderEvent;
use App\Http\Controllers\WebController;
use App\ToDo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class EventController extends WebController
{
    public function index()
    {
        $title = __('Calendar');
        $events = CalenderEvent::where('user_id', Auth::user()->id)->get();
        return view('web.dashboard.full_calendar', [
            'title' => $title,
            'events' => $events,
        ]);
    }

    public function get_edit_form(Request $request)
    {
        $event = CalenderEvent::find($request->id);
        $title = (!empty($request->id)) ? __('Edit Event') : __('Add Event');
        return view('web.dashboard.modal.add_edit_event', compact('event', 'title'));
    }

    public function get_day_event(Request $request)
    {
        $events = CalenderEvent::where('user_id', Auth::user()->id)->whereDate('start', '=', $request->start_date)->get();
        $title = (!empty($request->start_date)) ? $request->start_date : __('No Event');
        return view('web.dashboard.modal.get_day_event', compact('events', 'title'));
    }

    public function delete_event(Request $request)
    {
        CalenderEvent::where('id', $request->id)->delete();
        response()->json(['status' => 200, 'message' => __('Event deleted successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

    public function create(Request $request)
    {
        $this->directValidation([
            'title' => ['required'],
            'description' => ['required'],
            'date' => ['required'],
            'time' => ['required'],
        ]);
        if (empty($request->id))
            $event = new CalenderEvent();
        else
            $event = CalenderEvent::find($request->id);
        $event->user_id = Auth::user()->id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start = $request->date;
        $event->time = $request->time;
        $event->save();
        if ($event) {
            response()->json(['status' => 200, 'message' => __('Save event successfully')], 200)->header('Content-Type', 'application/json')->send();
            die();
        } else {
            response()->json(['status' => 412, 'message' => __('Something went wrong please try again')], 412)->header('Content-Type', 'application/json')->send();
            die();
        }
    }
}
