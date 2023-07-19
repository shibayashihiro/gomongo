<?php

namespace App\Http\Controllers\Web\Subscription;

use App\Http\Controllers\Controller;
use App\SubscriptionPlan;
use App\UserSubscriptionPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;

class SubscribePlanController extends Controller
{
    public function index()
    {
        $title = __('Subscription');
        $plan = SubscriptionPlan::where('status', 'active')->get();
        return view('web.dashboard.plans', [
            'title' => $title,
            'plan' => $plan
        ]);
    }

    public function createPaymentIntent(Request $request)
    {

        //stripe Account : shabir.nawabi@hotmail.co.uk
        //Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');
        //Stripe::setApiKey('sk_test_51LdYReIWc2J4BeGZYLncHIV9aCIaxr0EnumSFFVadxLNPdbaKOBnUpDOuYDGW6dgGf7xAGxkDW3iGSWUE01nNYfL00A6X8dTS6');
        Stripe::setApiKey('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');
        try {
            $plan = SubscriptionPlan::find($request->{0});
            // Create a PaymentIntent with amount and currency
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => ((double)$plan->price*100),
                'currency' => 'GBP',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];
            $userSubscription = new UserSubscriptionPlan();
            $userSubscription->plan_id = $plan->id;
            $userSubscription->user_id = Auth::user()->id;
            $userSubscription->start_date = Carbon::today()->format('Y-m-d H:i:s');
            $userSubscription->end_date = Carbon::today()->addMonth(1)->format('Y-m-d H:i:s');
            $userSubscription->payment_intent_secret_key = $paymentIntent->client_secret;
            $userSubscription->save();
            echo json_encode($output);
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function subscriptionPayment(Request $request)
    {
        $plan = UserSubscriptionPlan::where(['payment_intent_secret_key' => $request->payment_intent_client_secret])->first();
        if (!is_null($plan)) {
            $plan->payment_status = ($request->redirect_status == 'succeeded') ? 'success' : 'failed';
            $plan->transaction_id = $request->payment_intent;
            $plan->save();

            $user = Auth::user();
            $user->till_date_at = Carbon::parse($user->till_date_at)->addMonth(1)->format('Y-m-d H:i:s');
            $user->plan_id = $plan->plan_id;
            $user->save();
            return redirect(route('front.home'))->with('flash_success', __('Your plan is activated'));
        }
        return redirect(route('front.home'))->with('flash_error', __('Something went wrong'));
    }
}
