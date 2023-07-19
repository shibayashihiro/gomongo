<?php

namespace App\Http\Controllers\Web\WebSite\Content;

use App\Http\Controllers\WebController;
use App\WebWorkingHours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\WebContent;

class OpeningHourController extends WebController
{
    public function get_openingHour(Request $request)
    {
        $title = 'Opening Hours';
        $user = $request->user();
        $edit_website = true;
        return view('website.opening_hours', [
            'title' => $title,
            'edit_website' => $edit_website,
            'working_hours' => $user->working_hours()->get(),
            'data' => $user ?? ''
        ]);
    }

    public function post_openingHour(Request $request)
    {
        $user = $request->user();
        $time_rules = ['required', 'date_format:H:i:s'];
        $request->validate([
            'days' => ['required', 'array', 'min:7', "max:7"],
            'days.sunday.start_time' => $time_rules,
            'days.sunday.end_time' => $time_rules,
            'days.monday.start_time' => $time_rules,
            'days.monday.end_time' => $time_rules,
            'days.tuesday.start_time' => $time_rules,
            'days.tuesday.end_time' => $time_rules,
            'days.wednesday.start_time' => $time_rules,
            'days.wednesday.end_time' => $time_rules,
            'days.thursday.start_time' => $time_rules,
            'days.thursday.end_time' => $time_rules,
            'days.friday.start_time' => $time_rules,
            'days.friday.end_time' => $time_rules,
            'days.saturday.start_time' => $time_rules,
            'days.saturday.end_time' => $time_rules,
        ]);
        $web_content_id = $user->web_content->id;
        foreach ($request->days as $key => $day) {
            WebWorkingHours::updateOrCreate(['user_id' => $user->id, 'website_id' => $web_content_id, 'day' => $key], [
                'start_time' => $day['start_time'],
                'end_time' => $day['end_time'],
                'is_working' => ($day['is_working'] ?? "" == "on") ? 1 : 0,
            ]);
        }

        response()->json(['status' => 200, 'message' => __('front.success_opening_hours_created')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

}
