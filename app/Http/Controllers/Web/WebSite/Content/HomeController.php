<?php

namespace App\Http\Controllers\Web\WebSite\Content;

use App\Http\Controllers\WebController;
use App\WebContentDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\WebContent;

class HomeController extends WebController
{
    public function get_home()
    {
        $title = 'Home';
        $edit_website = true;
        $web_content = WebContent::where('user_id', Auth::user()->id)->first();
        return view('website.home.index', [
            'title' => $title,
            'edit_website' => $edit_website,
            'data' => $web_content ?? ''
        ]);
    }

    public function post_home_content(Request $request)
    {
        $content = WebContentDetails::where(['user_id' => Auth::user()->id, 'page_slug' => $request->page_type])->get();
        foreach ($content as $key => $page) {
            if ($page->input_type != 'file') {
                $page->value = $request['field_' . $page->id];
                $page->save();
            } else {
                if ($request->hasFile('field_' . $page->id)) {
                    $page->value = $request->file('field_' . $page->id)->store('uploads/website/home');
                    $page->save();
                }
            }
        }
        response()->json(['status' => 200, 'message' => __('front.success_home_updated')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

}
