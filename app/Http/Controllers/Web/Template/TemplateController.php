<?php

namespace App\Http\Controllers\Web\Template;


use App\AutoTraderStock;
use App\DealerStocks;
use App\DeviceToken;
use App\Http\Controllers\WebController;
use App\Http\Middleware\GuestRegister;
use App\Http\Requests\ImportAutoTradersData;
use App\Jobs\DealerData;
use App\Mail\FinanceApplication;
use App\Mail\General\ContactEnquiryMail;
use App\Thread;
use App\User;
use App\WebContent;
use App\WebFinanceApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TemplateController extends WebController
{

    public function home($slug)
    {
        $template = $this->webContent->template;
        $title = 'Home';
        
        return view('template.' . $template . '.home', [
            'title' => $title,
            'domain_slug' => $slug,
            'web_content' => $this->webContent ?? '',
            'messages' => $this->messages,
            'toDeviceToken' => $this->toDeviceToken,
            'make' => DealerStocks::where(['user_id' => $this->webContent->user_id])->groupBy('make')->whereNotNull('make')->pluck('make'),
            'body_type' => DealerStocks::where(['user_id' => $this->webContent->user_id])->groupBy('body_type')->whereNotNull('body_type')->pluck('body_type'),
            'engine_size' => DealerStocks::where(['user_id' => $this->webContent->user_id])->groupBy('engine_size')->orderBy('engine_size')->whereNotNull('engine_size')->where('engine_size', '!=', '')->pluck('engine_size'),
            'stocks' => DealerStocks::where(['user_id' => $this->webContent->user_id])->orderBy('price', 'DESC')->limit(10)->get(),
            'max_price' => DealerStocks::where(['user_id' => $this->webContent->user_id])->get()->max('price'),
            'max_mileage' => DealerStocks::where(['user_id' => $this->webContent->user_id])->get()->max('mileage'),
            'dealer' => User::where(['id' => $this->webContent->user_id])->first(),
        ]);
    }

    public function stock_list(Request $request, $slug)
    {
        // $asdf = DealerStocks::where(['user_id' => $this->webContent->user_id])->groupBy('engine_size')->whereNotNull('engine_size')->where('engine_size', '!=', '')->pluck('engine_size');
        // dd($asdf);
        $template = $this->webContent->template;
        $title = 'Stock list';
        $make = $request->make ?? '';
        $modal = $request->modal ?? '';
        $from_price = $request->min_price ?? '';
        $to_price = $request->max_price ?? '';
        // $price = explode(',', $request->min_max_price);
        // if (!empty($price)) {
        //     $from_price = isset($price[0]) ? $price[0] : 0;
        //     $to_price = isset($price[1]) ? $price[1] : '';
        // }
        $body_type = $request->body_type ?? '';
        $mileage = (int)$request->mileage ?? 0;
        $engine_size_min = $request->engine_size_min ?? '';
        $engine_size_max = $request->engine_size_max ?? '';
        $fuel_type = $request->fuel_type ?? '';
        $transmission = $request->transmission ?? '';
        $manufacture_min = $request->manufacture_min ?? '';
        $manufacture_max = $request->manufacture_max ?? '';
        $doors = $request->doors ?? '';
        $filter = $request->query();
        // dd($mileage);
        $stocks = DealerStocks::where(['user_id' => $this->webContent->user_id])->when(!empty($make), function ($q) use ($make) {
            $q->where('make', $make);
        })->when(!empty($modal), function ($q) use ($modal) {
            $q->where('modal', $modal);
        })->when($from_price != '' && $to_price != '', function ($q) use ($from_price, $to_price) {
            $q->where('price', '>=', $from_price);
            $q->where('price', '<=', $to_price);
        })->when(!empty($body_type), function ($q) use ($body_type) {
            $q->where('body_type', $body_type);
        })->when(!empty($mileage), function ($q) use ($mileage) {
            $q->where('mileage', '<=', $mileage);
        })->when($engine_size_min != "" && $engine_size_max != "", function ($q) use ($engine_size_min, $engine_size_max) {
            $q->where('engine_size', '>=', $engine_size_min);
            $q->where('engine_size', '<=', $engine_size_max);
        })->when(!empty($fuel_type), function ($q) use ($fuel_type) {
            $q->where('fuel_type', $fuel_type);
        })->when(!empty($transmission), function ($q) use ($transmission) {
            $q->where('transmission', $transmission);
        })->when($manufacture_min != "" && $manufacture_max != "", function ($q) use ($manufacture_min, $manufacture_max) {
            $q->where('manufacture', '>=', $manufacture_min);
            $q->where('manufacture', '<=', $manufacture_max);
        })->when(!empty($doors), function ($q) use ($doors) {
            $q->where('doors', $doors);
        });

        $order = $request->order;
        $limit = $stocks->count();
        if ($request->limit && !empty($request->limit)) {
            $limit = $request->limit;
        }
        if ($order == 'price') {
            $stocks = $stocks->orderBy('price', 'ASC')->paginate($limit);
        } elseif ($order == '-price') {
            $stocks = $stocks->orderBy('price', 'DESC')->paginate($limit);
        } elseif ($order == 'name') {
            $stocks = $stocks->orderBy('make', 'ASC')->paginate($limit);
        } elseif ($order == '-name') {
            $stocks = $stocks->orderBy('make', 'DESC')->paginate($limit);
        } else {
            $stocks = $stocks->orderBy('price', 'DESC')->paginate($limit);
        }
        //pre($stocks->count());
        // dd($stocks);

        $modal_data = '';
        if ($make && !empty($make)) {
            $modal_data = DealerStocks::where(['user_id' => $this->webContent->user_id])->where('make', $make)->groupBy('modal')->get();
        }
        $engine_size = DealerStocks::where(['user_id' => $this->webContent->user_id])->groupBy('engine_size')->orderBy('engine_size')->whereNotNull('engine_size')->where('engine_size', '!=', '')->pluck('engine_size');
        // dd(count($engine_size));
        $temp = 0;
        for($i = 0; $i < count($engine_size)-1; $i++){
            for($j=$i+1; $j<count($engine_size);$j++){
                if((int)$engine_size[$i]>=(int)$engine_size[$j]){
                    $temp = (int)$engine_size[$i];
                    $engine_size[$i] = (int)$engine_size[$j];
                    $engine_size[$j] = $temp;
                }
            }
        }
        $temp = 0;
        $j = 0;        
        for($i = 0;$i < count($engine_size); $i++){
            $engine_size[$i] = number_format((float)$engine_size[$i]/1000,1)*1000;
            if($temp == $engine_size[$i]){
                continue;
            }else{
                $temp = $engine_size[$i];                
                $engine_size1[$j] = $engine_size[$i];
                $j++;
            }
            
        }
        return view('template.' . $template . '.stock_list', [
            'title' => $title,
            'domain_slug' => $slug,
            'web_content' => $this->webContent ?? '',
            'messages' => $this->messages,
            'toDeviceToken' => $this->toDeviceToken,
            'stocks' => $stocks,
            'make' => DealerStocks::where(['user_id' => $this->webContent->user_id])->groupBy('make')->whereNotNull('make')->pluck('make'),
            'modal' => $modal_data,
            'body_type' => DealerStocks::where(['user_id' => $this->webContent->user_id])->groupBy('body_type')->whereNotNull('body_type')->pluck('body_type'),
            'engine_size' => $engine_size1,
            'fuel_type' => DealerStocks::where(['user_id' => $this->webContent->user_id])->groupBy('fuel_type')->whereNotNull('fuel_type')->pluck('fuel_type'),
            'transmission' => DealerStocks::where(['user_id' => $this->webContent->user_id])->groupBy('transmission')->whereNotNull('transmission')->pluck('transmission'),
            'manufacture' => DealerStocks::where(['user_id' => $this->webContent->user_id])->groupBy('manufacture')->whereNotNull('manufacture')->pluck('manufacture'),
            'doors' => DealerStocks::where(['user_id' => $this->webContent->user_id])->groupBy('doors')->whereNotNull('doors')->pluck('doors'),
            'max_price' => DealerStocks::where(['user_id' => $this->webContent->user_id])->get()->max('price'),
            'max_mileage' => DealerStocks::where(['user_id' => $this->webContent->user_id])->get()->max('mileage'),
            'dealer' => User::where(['id' => $this->webContent->user_id])->first(),
        ]);
    }

    public function stock_details(Request $request, $slug, $id)
    {
        $template = $this->webContent->template;
        $title = 'Stock Details';
        $stock = DealerStocks::where(['user_id' => $this->webContent->user_id, 'id' => $id])->first();
        //pre($stock);
        return view('template.' . $template . '.stock_details', [
            'title' => $title,
            'domain_slug' => $slug,
            'web_content' => $this->webContent ?? '',
            'messages' => $this->messages,
            'toDeviceToken' => $this->toDeviceToken,
            'stock' => $stock,
            // 'specification' => \GuzzleHttp\json_decode($stock->specification),
            'dealer' => User::where(['id' => $this->webContent->user_id])->first(),
        ]);
    }

    public function print_summary(Request $request, $slug, $id)
    {
        $template = $this->webContent->template;
        $title = 'Stock Details';
        $stock = DealerStocks::where(['user_id' => $this->webContent->user_id, 'id' => $id])->first();
        //pre($stock);
        return view('template.' . $template . '.stock_details_summary', [
            'title' => $title,
            'domain_slug' => $slug,
            'web_content' => $this->webContent ?? '',
            'messages' => $this->messages,
            'toDeviceToken' => $this->toDeviceToken,
            'stock' => $stock,
            // 'specification' => \GuzzleHttp\json_decode($stock->specification),
        ]);
    }

    public function enquiry(Request $request, $slug, $id)
    {
        // dd($request->all());
        $user = User::where('id', $this->webContent->user_id)->first();
        // dd($user);

        // Send email to dealer
        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'stock' => DealerStocks::where(['user_id' => $this->webContent->user_id, 'id' => $id])->first(),
        ];

        try {
            Mail::to('devstack777@gmail.com')->send(new ContactEnquiryMail($data));
        } catch (\Exception $e) {
            /* pre($e->getMessage()); */
        }

        // go back to the previous page
        return redirect()->back()->with('success', 'Your enquiry has been sent successfully.');
    }

    public function finance($slug)
    {
        $template = $this->webContent->template;
        $title = 'Finance';
        return view('template.' . $template . '.finance', [
            'title' => $title,
            'domain_slug' => $slug,
            'web_content' => $this->webContent ?? '',
            'messages' => $this->messages,
            'toDeviceToken' => $this->toDeviceToken,
            'dealer' => User::where(['id' => $this->webContent->user_id])->first(),
        ]);
    }

    public function contact_us($slug)
    {
        //$user = Auth::user();
        $template = $this->webContent->template;
        $title = 'Contact Us';
        return view('template.' . $template . '.contact_us', [
            'title' => $title,
            'domain_slug' => $slug,
            'web_content' => $this->webContent ?? '',
            'messages' => $this->messages,
            'toDeviceToken' => $this->toDeviceToken,
            'dealer' => User::where(['id' => $this->webContent->user_id])->first(),
        ]);
    }

    public function financeApplication(Request $request)
    {

        $web_content = WebContent::where('domain_name', $request->domain_slug)->first();
        $this->directValidation([
            'vehicle_registration_number' => ['required'],
            'mileage' => ['required'],
            'vehicle_price' => ['required'],
            'title' => ['required'],
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'telephone' => ['required'],
            'mobile' => ['required'],
            'gender' => ['required'],
            'dob' => ['required'],
            'nationality' => ['required'],
            'marital_status' => ['required'],
            'no_dependant' => ['required'],
            'driving_licence' => ['required'],
        ]);

        $finance = WebFinanceApplication::create([
            'website_id' => $web_content->id,
            'domain_slug' => $web_content->domain_name,
            'template_slug' => $request->template_slug,
            'vehicle_registration_number' => $request->vehicle_registration_number ?? '',
            'mileage' => $request->mileage ?? '',
            'vehicle_price' => $request->vehicle_price ?? '',
            'deposit_amount' => $request->deposit_amount ?? '',
            'part_exchange_value' => $request->part_exchange_value ?? '',
            'settlement_figure' => $request->settlement_figure ?? '',
            'term_of_agreement' => $request->term_of_agreement ?? '',
            'title' => $request->title ?? '',
            'first_name' => $request->first_name ?? '',
            'middle_name' => $request->middle_name ?? '',
            'last_name' => $request->last_name ?? '',
            'email' => $request->email ?? '',
            'telephone' => $request->telephone ?? '',
            'mobile' => $request->mobile ?? '',
            'gender' => $request->gender ?? '',
            'dob' => $request->dob ?? '',
            'nationality' => $request->nationality ?? '',
            'marital_status' => $request->marital_status ?? '',
            'no_dependant' => $request->no_dependant ?? '',
            'driving_licence' => $request->driving_licence ?? '',
            'address' => $request->address ?? '',
            'lat' => $request->latitude ?? '',
            'lng' => $request->longitude ?? '',
            'building_name' => $request->building_name ?? '',
            'building_number' => $request->building_number ?? '',
            'building_floor' => $request->building_floor ?? '',
            'street' => $request->street ?? '',
            'district' => $request->district ?? '',
            'city' => $request->city ?? '',
            'postcode' => $request->postcode ?? '',
            'residency' => $request->residency ?? '',
            'emp_name' => $request->emp_name ?? '',
            'emp_occupation' => $request->emp_occupation ?? '',
            'emp_occupation_basis' => $request->emp_occupation_basis ?? '',
            'emp_occupation_type' => $request->emp_occupation_type ?? '',
            'emp_address' => $request->emp_address ?? '',
            'emp_lat' => $request->emp_latitude ?? '',
            'emp_lng' => $request->emp_longitude ?? '',
            'emp_building_name' => $request->emp_building_name ?? '',
            'emp_building_number' => $request->emp_building_number ?? '',
            'emp_building_floor' => $request->emp_building_floor ?? '',
            'emp_street' => $request->emp_street ?? '',
            'emp_district' => $request->emp_district ?? '',
            'emp_city' => $request->emp_city ?? '',
            'emp_postcode' => $request->emp_postcode ?? '',
            'emp_residency' => $request->emp_residency ?? '',
            'bank_sort_code' => $request->bank_sort_code ?? '',
            'bank_account_number' => $request->bank_account_number ?? '',
            'bank_account_name' => $request->bank_account_name ?? '',
            'gross_annual_income' => $request->gross_annual_income ?? '',
            'replacement_loan' => $request->replacement_loan ?? '',
            'note' => $request->note ?? '',
        ]);

        if ($finance) {
            try {
                Mail::to($web_content->email)->send(new FinanceApplication($request->all()));
            } catch (\Exception $e) {
                /* pre($e->getMessage());*/
            }
            echo json_encode(['status' => 200, 'message' => __('Finance Application successfully')]);
            die();
        } else {
            echo json_encode(['status' => 412, 'message' => __('Something went wrong please try again')]);
            die();
        }
    }

    public function contact_us_post(Request $request)
    {
        $this->directValidation([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required'],
            'message' => ['required'],
        ]);

        $data = $request->input();

        try {
            // Mail::to(ADMIN_EMAIL)->send(new ContactEnquiryMail($data));
            Mail::to('sales@phoenixwaycardealership.co.uk')->send(new ContactEnquiryMail($data));
        } catch (\Exception $e) {
            /* pre($e->getMessage());*/
        }

        echo json_encode(['status' => 200, 'message' => __('Contact enquiry successfully')]);
        die();
    }

    public function get_model(Request $request)
    {
        $modal = DealerStocks::where(['user_id' => $request->user_id]);
        if ($request->make) {
            $modal->where('make', $request->make)->groupBy('modal');
        }
        //$modal->get();
        /*$a= vsprintf(str_replace('?', '%s', str_replace('?', "'?'", $modal->toSql())), $modal->getBindings());
        dd($a);*/
        return $modal->get();
    }
}
