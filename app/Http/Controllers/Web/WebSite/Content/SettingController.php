<?php

namespace App\Http\Controllers\Web\WebSite\Content;

use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\WebContent;

class SettingController extends WebController
{
    public function get_setting()
    {
        $title = 'Setting';
        $edit_website = true;
        $web_content = WebContent::where('user_id', Auth::user()->id)->first();
        return view('website.setting', [
            'title' => $title,
            'edit_website' => $edit_website,
            'data' => $web_content ?? ''
        ]);
    }

    public function post_setting(Request $request)
    {
        $this->directValidation([
            'footer_text' => ['required'],
            'copyright' => ['required']
        ]);
        $web_content = WebContent::where('user_id', Auth::user()->id)->first();
        if ($web_content) {
            $web_content->footer_text = $request->footer_text ?? '';
            $web_content->copyright = $request->copyright ?? '';
            $web_content->facebook_link = $request->facebook_link ?? '';
            $web_content->instagram_link = $request->instagram_link ?? '';
            $web_content->twitter_link = $request->twitter_link ?? '';
            $web_content->linkedin_link = $request->linkedin_link ?? '';
            if ($request->hasFile('logo')) {
                $web_content->header_logo = $request->file('logo')->store('uploads/website');
            }
            if ($request->hasFile('favicon')) {
                $web_content->favicon = $request->file('favicon')->store('uploads/website');
            }
            if ($request->hasFile('footer_logo')) {
                $web_content->footer_logo = $request->file('footer_logo')->store('uploads/website');
            }
            $web_content->save();

            response()->json(['status' => 200, 'message' => __('My website details updated successfully')], 200)->header('Content-Type', 'application/json')->send();
            die();
        } else {
            response()->json(['status' => 412, 'message' => __('Something went wrong please try again')], 412)->header('Content-Type', 'application/json')->send();
            die();
        }
    }

}
