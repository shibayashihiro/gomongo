<?php

namespace App\Http\Middleware;

use App\DealerInfo;
use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class isSubscriptionAvailableOrNot
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
        $dealerInfo = DealerInfo::where('user_id', Auth::id())->first();
        if (empty(Auth::user()->till_date_at) || Carbon::parse(Auth::user()->till_date_at)->format('Y-m-d') < Carbon::today()->format('Y-m-d'))
            return redirect(route('front.subscription.index'));
        elseif (is_null($dealerInfo))
            return redirect(route('front.dealer_details'));
        return $next($request);
    }
}
