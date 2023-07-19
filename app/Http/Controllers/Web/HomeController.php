<?php

namespace App\Http\Controllers\Web;

use App\AutoTraderStock;
use App\Http\Controllers\WebController;
use App\Http\Requests\ImportAutoTradersData;
use App\Jobs\DealerData;
use App\Mail\General\UserActivationMail;
use App\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\User;

class HomeController extends WebController
{
    public function index()
    {
        $title = 'Home';
        $plan = SubscriptionPlan::where('status', 'active')->get();
        return view('web.index', [
            'title' => $title,
            'plan' => $plan
        ]);
    }

    public function indexNew()
    {
        $title = 'Home';
        $plan = SubscriptionPlan::where('status', 'active')->get();
        return view('web.index_new', [
            'title' => $title,
            'plan' => $plan
        ]);
    }

    public function get_login()
    {
        $title = 'Login';
        return view('web.dashboard.login', [
            'title' => $title,
        ]);
    }

    public function login_post(Request $request)
    {
        $remember = ($request->remember) ? true : false;
        $request->validate(['email' => 'required', 'password' => 'required']);
        $creds = ['email' => $request->email, 'password' => $request->password];
        if (Auth::attempt($creds, $remember)) {
            if (Auth::user()->status == 'active') {
                return redirect()->route(getDashboardRouteName());
            } else {
                Auth::logout();
                flash_session('error', 'Please activate your account first');
            }
        } else {
            flash_session('error', 'Please Enter Valid Email or password');
        }
        return redirect()->back();
    }

    public function get_signup()
    {
        $title = 'Sign Up';
        return view('web.dashboard.signup', [
            'title' => $title,
        ]);
    }

    public function terms_condition()
    {
        $title = 'Terms condition';
        return view('web.terms_condition', [
            'title' => $title,
        ]);
    }

    public function register(Request $request)
    {
        $this->directValidation([
            'cmp_name' => ['required'],
            'address' => ['required'],
            'postcode' => ['required'],
            'mobile' => ['required', Rule::unique('users')->where('country_code', $request->country_code)->whereNull('deleted_at')],
            'email' => ['required', Rule::unique('users')->whereNull('deleted_at')],
            'dealer_id' => ['required'],
            'password' => ['required'],
        ]);
        $profile_image = null;
        if ($request->hasFile('cmp_logo')) {
            $profile_image = $request->file('cmp_logo')->store('uploads/user');
        }
        $user = User::create([
            'password' => $request->password,
            'email' => $request->email,
            'dealer_id' => $request->dealer_id,
            'company_name' => $request->cmp_name,
            'name' => $request->cmp_name,
            'username' => $request->cmp_name,
            'country_code' => $request->country_code,
            'mobile' => $request->mobile,
            'address' => $request->address,
            'postcode' => $request->postcode,
            'cmp_reg_number' => $request->cmp_reg_number,
            'fca_reg_number' => $request->fcm_reg_number,
            'vat_number' => $request->vat_number,
            'ico_number' => $request->ico_number,
            'profile_image' => $profile_image,
            'status' => 'inactive',
        ]);
        if ($user) {
            // $importRequest = new ImportAutoTradersData($user);
            // if ($user->dealer_id) {
            //     $dealer_id = $user->dealer_id;
            //     $postcode = str_replace(' ', '', $user->postcode);

            //     $importRequest->importDataFromCurl($dealer_id, $postcode);
            //     // AutoTraderStock::orderBy('id')->chunk(5, function ($auto) {
            //     //     dispatch(new DealerData($auto));
            //     // });
            // }
            try {
                $emailData = [
                    'id' => $user->id,
                    'user_name' => $user->company_name
                ];
                Mail::to($user->email)->send(new UserActivationMail($emailData));
            } catch (\Exception $e) {
                /* pre($e->getMessage());*/
            }
            echo json_encode(['status' => 200, 'message' => __('Register successfully. please check your email for activate account.')]);
            die();
        } else {
            echo json_encode(['status' => 412, 'message' => __('Something went wrong please try again')]);
            die();
        }
    }
}
