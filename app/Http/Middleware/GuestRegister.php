<?php

namespace App\Http\Middleware;

use App\DeviceToken;
use App\WebContent;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\Thread;

class GuestRegister
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */


    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            $device_id = $request->ip();
            $isDeviceExist = DeviceToken::where('device_id', $device_id)->whereNull('user_id');
            $guestId = 0;
            if ($isDeviceExist->count() == 0) {
                $browserToken = token_generator();
                $device = DeviceToken::create([
                    'token' => $browserToken,
                    'device_id' => $device_id,
                ]);
                $guestId = $device->id;
            } else {
                $browserToken = $isDeviceExist->first()->token;
                $guestId = $isDeviceExist->first()->id;
            }
            $request->merge(compact('browserToken', 'guestId'));
        }
        return $next($request);
    }
}
