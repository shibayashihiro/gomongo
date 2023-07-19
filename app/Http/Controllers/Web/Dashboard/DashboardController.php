<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\CalenderEvent;
use App\ComplaintManagement;
use App\DealerInfo;
use App\Expense;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WebController;
use App\SaleRecord;
use App\ToDo;
use App\User;
use App\UserReminder;
use App\VehicleStock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DashboardController extends WebController
{

    public function index()
    {
        $title = 'Dashboard';
        $user = User::find(Auth::id());
        $today = Carbon::now()->format('Y-m-d');
        $start_date = (isset(\request()->start_date)) ? \request()->start_date : Carbon::parse($today)->firstOfMonth()->toDateString();
        $end_date = (isset(\request()->end_date)) ? \request()->end_date : Carbon::parse($today)->endOfMonth()->toDateString();
        //dd($end_date);
        //Counts
        $counts = [
            'sales_records' => SaleRecord::when(!empty($start_date) && !empty($end_date), function ($q) use ($start_date, $end_date) {
                $q->whereDate('date', '>=', $start_date)
                    ->whereDate('date', '<=', $end_date);
            })->where(['status' => 'complete', 'user_id' => Auth::id()])->count(),
            'expense_record' => Expense::when(!empty($start_date) && !empty($end_date), function ($q) use ($start_date, $end_date) {
                $q->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date);
            })->where(['user_id' => Auth::id()])->sum('amount'),
            'stock_list' => VehicleStock::when(!empty($start_date) && !empty($end_date), function ($q) use ($start_date, $end_date) {
                $q->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date);
            })->where(['user_id' => Auth::id()])->where(['deleted_status' => 'no'])->count(),
            'complaints' => ComplaintManagement::when(!empty($start_date) && !empty($end_date), function ($q) use ($start_date, $end_date) {
                $q->whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date);
            })->where(['user_id' => Auth::id()])->where('status', 'open')->count(),
            'todos' => ToDo::when(!empty($today), function ($q) use ($today) {
                $q->whereDate('date', '>=', $today)
                    ->whereDate('date', '<=', $today);
            })->where(['user_id' => Auth::id()])->count(),
            'no_cost_vehicle' => SaleRecord::when(!empty($start_date) && !empty($end_date), function ($q) use ($start_date, $end_date) {
                $q->whereDate('date', '>=', $start_date)
                    ->whereDate('date', '<=', $end_date);
            })->where(['user_id' => Auth::id()])->where('cost_price', '=', '0')->count()
        ];

        //Graph data
        $chartData['expenses'] = [];
        $chartData['sales'] = [];
        for ($i = 1; $i <= 12; $i++) {
            $first_day_this_month = date('Y-' . $i . '-01');
            $last_day_this_month = date('Y-m-t', strtotime($first_day_this_month));
            //expense
            $expenses = Expense::when(!empty($first_day_this_month) && !empty($last_day_this_month), function ($q) use ($first_day_this_month, $last_day_this_month) {
                $q->whereDate('created_at', '>=', $first_day_this_month)
                    ->whereDate('created_at', '<=', $last_day_this_month);
            })->where(['user_id' => Auth::id()])->sum('amount');
            $chartData['expenses'][] = $expenses;

            //Sales
            $salesRecord = SaleRecord::where(['status' => 'complete'])->when(!empty($first_day_this_month) && !empty($last_day_this_month), function ($q) use ($first_day_this_month, $last_day_this_month) {
                $q->whereDate('date', '>=', $first_day_this_month)
                    ->whereDate('date', '<=', $last_day_this_month);
            })->where(['user_id' => Auth::id()])->sum('sales_price');
            $chartData['sales'][] = $salesRecord;
        }
        $events = CalenderEvent::where('user_id', Auth::user()->id)->get();
        $event_today = CalenderEvent::where('user_id', Auth::user()->id)->whereDate('start', $today)->get();
        $todo_today = ToDo::where('user_id', Auth::user()->id)->whereDate('date', $today)->get();
        $reminder_count = UserReminder::where('user_id', Auth::user()->id)->whereDate('date', $today)->count();
        $reminder_flag = false;
        if ($reminder_count == '0') {
            $reminder_flag = true;
        }
        return view('web.dashboard.index', [
            'title' => $title,
            'user' => $user,
            'chartData' => $chartData,
            'counts' => $counts,
            'task' => ToDo::where(['user_id' => $user->id, 'status' => 'pending'])->orderByRaw('IF(time IS NOT NULL,CONCAT(date," ",time), date)ASC')->get(),
            'events' => $events,
            'event_today' => $event_today,
            'todo_today' => $todo_today,
            'reminder_flag' => $reminder_flag,
            'date_range' => Carbon::parse($start_date)->format('m/d/Y') . ' - ' . Carbon::parse($end_date)->format('m/d/Y')
        ]);
    }

    public function reminderClose()
    {
        $today = Carbon::now()->format('Y-m-d');
        $reminder = UserReminder::updateOrCreate(
            ['user_id' => Auth::user()->id],
            ['user_id' => Auth::user()->id, 'date' => $today]
        );
        if ($reminder->save()) {
            echo json_encode(['status' => 200]);
            die();
        } else {
            echo json_encode(['status' => 412]);
            die();
        }
    }

    public function myProfile()
    {
        $title = 'My Profile';
        $user = Auth::user()->fresh();
        return view('web.dashboard.my_profile', [
            'title' => $title,
            'user' => $user
        ]);
    }

    public function editProfile()
    {
        $title = 'Edit Profile';
        $user = Auth::user()->fresh();
        return view('web.dashboard.edit_profile', [
            'title' => $title,
            'user' => $user
        ]);
    }

    public function dealerDetails()
    {
        $title = 'Dealer Details';
        $user = User::find(Auth::id());
        return view('web.dashboard.dealer_details', [
            'title' => $title,
            'user' => $user
        ]);
    }

    public function saveProfile(Request $request)
    {
        $user = Auth::user();
        $this->directValidation([
            'cmp_name' => ['required'],
            'address' => ['required'],
            'postcode' => ['required'],
            'mobile' => ['required', Rule::unique('users')->where('country_code', $request->country_code)->ignore($user->id)->whereNull('deleted_at')],
            'email' => ['required', Rule::unique('users')->ignore($user->id)->whereNull('deleted_at')]
        ]);

        $user->email = $request->email;
        $user->company_name = $request->cmp_name;
        $user->name = $request->cmp_name;
        $user->username = $request->cmp_name;
        $user->country_code = $request->country_code;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->postcode = $request->postcode;
        $user->cmp_reg_number = $request->cmp_reg_number;
        $user->fca_reg_number = $request->fca_reg_number;
        $user->vat_number = $request->vat_number;
        $user->ico_number = $request->ico_number;
        if ($request->hasFile('profile_image')) {
            $user->profile_image = $request->file('profile_image')->store('uploads/user');
        }
        if ($user->save()) {
            echo json_encode(['status' => 200, 'message' => __('Profile update successfully')]);
            die();
        } else {
            echo json_encode(['status' => 412, 'message' => __('Something went wrong please try again')]);
            die();
        }
    }

    public function saveDealerDetails(Request $request)
    {
        $user = Auth::user();
        $dealerInfo = DealerInfo::where('user_id', Auth::id())->first();
        if (is_null($dealerInfo))
            $dealerInfo = new DealerInfo();
        $dealerId = isset($dealerInfo->id) ? $dealerInfo->id : 0;
        $this->directValidation([
            'name' => ['required'],
            /*'code' => ['required', Rule::unique('dealer_infos')->ignore($dealerId)],*/
            'trading_name' => ['required'],
            'address' => ['required'],
            'postcode' => ['required'],
            'telephone' => ['required'],
            'email' => ['required'],
            'legal_name' => ['required'],
            'city' => ['required']
        ]);
        $dealerInfo->user_id = Auth::id();
        $dealerInfo->name = $request->name;
        $dealerInfo->code = genUniqueStr('MNG', 9, 'dealer_infos', 'code');
        $dealerInfo->email = $request->email;
        $dealerInfo->trading_name = $request->trading_name;
        $dealerInfo->address = $request->address;
        $dealerInfo->postcode = $request->postcode;
        $dealerInfo->telephone = $request->telephone;
        $dealerInfo->legal_name = $request->legal_name;
        $dealerInfo->city = $request->city;
        $dealerInfo->fax = $request->fax;
        $dealerInfo->website = $request->website;
        $dealerInfo->dealer_type = $request->dealer_type;
        if ($dealerInfo->save()) {
            echo json_encode(['status' => 200, 'message' => __('Dealer saved successfully')]);
            die();
        } else {
            echo json_encode(['status' => 412, 'message' => __('Something went wrong please try again')]);
            die();
        }
    }

    public function settings()
    {
        $title = 'Settings';
        return view('web.dashboard.settings', [
            'title' => $title,
        ]);
    }

    //Change Password
    public function changePassword(Request $request)
    {
        $user = $request->user();
        $this->directValidation([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('Old Password didn\'t match');
                }
            }],
            'new_password' => ['required'],
            'confirm_password' => ['required', 'same:new_password']
        ]);
        $user->password = $request->new_password;
        if ($user->save()) {
            echo json_encode(['status' => 200, 'message' => __('Change password successfully')]);
            die();
        } else {
            echo json_encode(['status' => 412, 'message' => __('Something went wrong please try again')]);
            die();
        }
    }

    //Notification On/Off
    public function notificationChange(Request $request)
    {
        $user = $request->user();
        $user->notification = (int)$request->notification;
        if ($user->save()) {
            echo json_encode(['status' => 200, 'message' => __('Notification change successfully')]);
            die();
        } else {
            echo json_encode(['status' => 412, 'message' => __('Something went wrong please try again')]);
            die();
        }
    }
}
