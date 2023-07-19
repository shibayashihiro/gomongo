<?php

namespace App\Http\Controllers\Web\Chat;

use App\Http\Controllers\WebController;
use App\TemplateContent;
use App\Thread;
use App\WebContentDetails;
use App\WebRecentStock;
use App\WebService;
use App\WebTestimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\WebContent;
use App\DeviceToken;

class ChatController extends WebController
{
    public function index(Request $request)
    {
        $device_id = $request->ip();
        $isDeviceExist = DeviceToken::where('user_id', Auth::id());
        $deviceAIId = 0;
        if ($isDeviceExist->count() == 0) {
            $browserToken = token_generator();
            $device = DeviceToken::create([
                'user_id' => Auth::id(),
                'token' => $browserToken,
                'device_id' => $device_id,
            ]);
            $deviceAIId = $device->id;
        } else {
            $browserToken = $isDeviceExist->first()->token;
            $deviceAIId = $isDeviceExist->first()->id;
        }
        $title = 'Support Chat';
        return view('web.dashboard.chat', [
            'title' => $title,
            'data' => Thread::where(['user_id' => $deviceAIId])->get(),
            'browserToken'=>$browserToken
        ]);
    }
}
