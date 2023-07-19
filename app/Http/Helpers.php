<?php

use App\DeviceToken;
use App\Expense;
use App\PushLog;
use App\User;
use App\WebContent;
use App\WebContentDetails;
use App\WebRecentStock;
use App\WebService;
use App\WebTestimonial;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

if (!function_exists('send_response')) {

    function send_response($Status, $Message = "", $ResponseData = NULL, $extraData = NULL, $null_remove = null)
    {
        $data = [];
        $valid_status = [412, 200, 401];
        if (is_array($ResponseData)) {
            $data["status"] = $Status;
            $data["message"] = $Message;
            $data["data"] = $ResponseData;
        } else if (!empty($ResponseData)) {
            $data["status"] = $Status;
            $data["message"] = $Message;
            $data["data"] = $ResponseData;
        } else {
            $data["status"] = $Status;
            $data["message"] = $Message;
            $data["data"] = new stdClass();
        }
        if (!empty($extraData) && is_array($extraData)) {
            foreach ($extraData as $key => $val) {
                $data[$key] = $val;
            }
        }
//        if ($null_remove) {
//            null_remover($data['data']);
//        }
        $header_status = in_array($data['status'], $valid_status) ? $data['status'] : 412;
        response()->json($data, $header_status)->header('Content-Type', 'application/json')->send();
        die(0);
    }
}


//function null_remover($response, $ignore = [])
//{
//    array_walk_recursive($response, function (&$item) {
//        if (is_null($item)) {
//            $item = strval($item);
//        }
//    });
//    return $response;
//}

function token_generator()
{
    return genUniqueStr('', 100, 'device_tokens', 'token', true);
}

function get_header_auth_token()
{
    $full_token = request()->header('Authorization');
    return (substr($full_token, 0, 7) === 'Bearer ') ? substr($full_token, 7) : null;
}

if (!function_exists('un_link_file')) {
    function un_link_file($image_name = "")
    {
        $pass = true;
        if (!empty($image_name)) {
            try {
                $default_url = URL::to('/');
                $get_default_images = config('constants.default');
                $file_name = str_replace($default_url, '', $image_name);
                $default_image_list = is_array($get_default_images) ? str_replace($default_url, '', array_values($get_default_images)) : [];
                if (!in_array($file_name, $default_image_list)) {
                    Storage::disk(get_constants('upload_type'))->delete($file_name);
                }
            } catch (Exception $exception) {
                $pass = $exception;
            }
        } else {
            $pass = 'Empty Field Name';
        }
        return $pass;
    }
}


function get_asset($val = "", $file_exits_check = true, $no_image_available = null)
{
    $no_image_available = ($no_image_available ?? asset(get_constants('default.no_image_available')));
    if ($val) {
        if ($file_exits_check) {
            return (file_exists($file_exits_check)) ? asset($val) : $no_image_available;
        } else {
            return asset($val);
        }
    } else {
        return $no_image_available;
    }
}

function print_title($title)
{
    return ucfirst($title);
}

function get_constants($name)
{
    return config('constants.' . $name);
}

function calculate_percentage($amount = 0, $discount = 0)
{
    return ($amount && $discount) ? (($amount * $discount) / 100) : 0;
}

function flash_session($name = "", $value = "")
{
    session()->flash($name, $value);
}

function success_session($value = "")
{
    session()->flash('success', ucfirst($value));
}

function error_session($value = "")
{
    session()->flash('error', ucfirst($value));
}

function getDashboardRouteName()
{
    $name = 'front.home';
    $user_data = Auth::user();
    if ($user_data) {
        if (in_array($user_data->type, ["admin", "local_admin"])) {
            $name = 'admin.dashboard';
        }
    }
    return $name;
}

function admin_modules()
{
    return [
        [
            'route' => route('admin.dashboard'),
            'name' => __('Dashboard'),
            'icon' => 'kt-menu__link-icon fa fa-home',
            'child' => [],
            'all_routes' => [
                'admin.dashboard',
            ]
        ],
        [
            'route' => route('admin.user.index'),
            'name' => __('User'),
            'icon' => 'kt-menu__link-icon fas fa-users',
            'all_routes' => [
                'admin.user.index',
                'admin.new-user.index',
                'admin.user.show',
                'admin.user.add',
            ],
            'child' => [
                [
                    'route' => route('admin.user.index'),
                    'name' => 'Users',
                    'icon' => '',
                    'all_routes' => [
                        'admin.user.index',
                        'admin.user.view',
                    ],
                ],
                [
                    'route' => route('admin.new-user.index'),
                    'name' => 'New Users',
                    'icon' => '',
                    'all_routes' => [
                        'admin.new-user.index',
                        'admin.new-user.view',
                    ],
                ]
            ],
        ],
        [
            'route' => route('admin.subscription.index'),
            'name' => __('Subscription Plans'),
            'icon' => 'kt-menu__link-icon fas fa-gift',
            'child' => [],
            'all_routes' => [
                'admin.subscription.index'
            ]
        ],
        [
            'route' => route('admin.transaction.index'),
            'name' => __('Transaction'),
            'icon' => 'kt-menu__link-icon fas fa-list',
            'child' => [],
            'all_routes' => [
                'admin.transaction.index'
            ]
        ],
        [
            'route' => 'javascript:;',
            'name' => __('Finance'),
            'icon' => 'kt-menu__link-icon fa fa-history',
            'all_routes' => [
                'admin.pending_finance.index',
                'admin.pending_finance.view',
                'admin.accepted_finance.index',
            ],
            'child' => [
                [
                    'route' => route('admin.pending_finance.index'),
                    'name' => 'Pending Finance',
                    'icon' => '',
                    'all_routes' => [
                        'admin.pending_finance.index',
                        'admin.pending_finance.view',
                    ],
                ],
                [
                    'route' => route('admin.accepted_finance.index'),
                    'name' => 'Accepted Finance',
                    'icon' => '',
                    'all_routes' => [
                        'admin.accepted_finance.index',
                    ],
                ]
            ],
        ],
        [
            'route' => route('admin.content.index'),
            'name' => 'Content',
            'icon' => 'kt-menu__link-icon fas fa-text-height',
            'child' => [],
            'all_routes' => [
                'admin.content.index',
                'admin.content.create',
                'admin.content.edit',
            ],
        ],
        [
            'route' => 'javascript:;',
            'name' => __('General Settings'),
            'icon' => 'kt-menu__link-icon fa fa-home',
            'all_routes' => [
                'admin.get_update_password',
                'admin.get_site_settings',
            ],
            'child' => [
                [
                    'route' => route('admin.get_update_password'),
                    'name' => 'Change Password',
                    'icon' => '',
                    'all_routes' => [
                        'admin.get_update_password',
                    ],
                ],
                [
                    'route' => route('admin.get_site_settings'),
                    'name' => 'Site Settings',
                    'icon' => '',
                    'all_routes' => [
                        'admin.get_site_settings',
                    ],
                ]
            ],
        ],
        [
            'route' => route('front.logout'),
            'name' => __('logout'),
            'icon' => 'kt-menu__link-icon fas fa-sign-out-alt',
            'child' => [],
            'all_routes' => [],
        ],
    ];
}


function get_error_html($error)
{
    $content = "";
    if ($error->any() !== null && $error->any()) {
        foreach ($error->all() as $value) {
            $content .= '<div class="alert alert-danger alert-dismissible mb-1" role="alert">';
            $content .= '<div class="alert-text">' . $value . '</div>';
            $content .= '<div class="alert-close"><i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i></div></div>';
        }
    }
    return $content;
}


function breadcrumb($aBradcrumb = array())
{
    $i = 0;
    $content = '';
    $is_login = Auth::user();
    if ($is_login) {
        if ($is_login->type == "admin") {
            $aBradcrumb = array_merge(['Home' => route('admin.dashboard')], $aBradcrumb);
        } elseif ($is_login->type == "vendor") {
            $aBradcrumb = array_merge(['Home' => route('vendor.dashboard')], $aBradcrumb);
        }
    }
    if (is_array($aBradcrumb) && count($aBradcrumb) > 0) {
        $total_bread_crumbs = count($aBradcrumb);
        foreach ($aBradcrumb as $key => $link) {
            $i += 1;
            $link = (!empty($link)) ? $link : 'javascript:void(0)';
            $content .= "<a href='" . $link . "' class='kt-subheader__breadcrumbs-link'>" . ucfirst($key) . "</a>";
            if ($total_bread_crumbs != $i) {
                $content .= "<span class='kt-subheader__breadcrumbs-separator'></span>";
            }
        }
    }
    return $content;
}

function success_error_view_generator()
{
    $content = "";
    if (session()->has('error')) {
        $content = '<div class="alert alert-danger alert-dismissible" role="alert">
                                        <div class="alert-text">' . session('error') . '</div>
                                        <div class="alert-close"><i class="flaticon2-cross kt-icon-sm"
                                                                    data-dismiss="alert"></i></div></div>';
    } elseif (session()->has('success')) {
        $content = '<div class="alert alert-success alert-dismissible" role="alert">
                                        <div class="alert-text">' . session('success') . '</div>
                                        <div class="alert-close"><i class="flaticon2-cross kt-icon-sm"
                                                                    data-dismiss="alert"></i></div></div>';
    }
    return $content;
}

function datatable_filters()
{
    $post = request()->all();
    return array(
        'offset' => isset($post['start']) ? intval($post['start']) : 0,
        'limit' => isset($post['length']) ? intval($post['length']) : 25,
        'sort' => isset($post['columns'][(isset($post["order"][0]['column'])) ? $post["order"][0]['column'] : 0]['data']) ? $post['columns'][(isset($post["order"][0]['column'])) ? $post["order"][0]['column'] : 0]['data'] : 'created_at',
        'order' => isset($post["order"][0]['dir']) ? $post["order"][0]['dir'] : 'DESC',
        'search' => isset($post["search"]['value']) ? $post["search"]['value'] : '',
        'sEcho' => isset($post['sEcho']) ? $post['sEcho'] : 1,
    );
}

function send_push($user_id = 0, $data = [], $notification_entry = false)
{
//    $sample_data = [
//        'push_type' => 0,
//        'push_message' => 0,
//        'from_user_id' => 0,
//        'push_title' => 0,
//////        'push_from' => 0,
//        'object_id' => 0,
//        'extra' => [
//            'jack' => 1
//        ],
//    ];


    $pem_secret = '';
    $bundle_id = 'com.zb.project.Bambaron';
    $pem_file = base_path('storage/app/uploads/user.pem');
    $main_name = defined('site_name') ? site_name : env('APP_NAME');
    $push_data = [
        'user_id' => $user_id,
        'from_user_id' => $data['from_user_id'] ?? null,
        'sound' => 'defualt',
        'push_type' => $data['push_type'] ?? 0,
        'push_title' => $data['push_title'] ?? $main_name,
        'push_message' => $data['push_message'] ?? "",
        'object_id' => $data['object_id'] ?? null,
    ];
    if ($push_data['user_id'] !== $push_data['from_user_id']) {
//        $to_user_data = User::find($user_id);
//        if ($to_user_data) {
        $get_user_tokens = DeviceToken::get_user_tokens($user_id);
        $fire_base_header = ["Authorization: key=" . config('constants.firebase_server_key'), "Content-Type: application/json"];
        if (count($get_user_tokens)) {
            foreach ($get_user_tokens as $value) {
                $curl_extra = [];
                $push_status = "Sent";
                $value->update(['badge' => $value->badge + 1]);
                try {
                    $device_token = $value['push_token'];
                    $device_type = strtolower($value['type']);
                    if ($device_token) {
                        if ($device_type == "ios") {
                            $headers = ["apns-topic: $bundle_id"];
                            $url = "https://api.development.push.apple.com/3/device/$device_token";
                            $payload_data = [
                                'aps' => [
                                    'badge' => $value->badge,
                                    'alert' => $push_data['push_message'],
                                    'sound' => 'default',
                                    'push_type' => $push_data['push_type']
                                ],
                                'payload' => [
                                    'to' => $value['push_token'],
                                    'notification' => ['title' => $push_data['push_title'], 'body' => $push_data['push_message'], "sound" => "default", "badge" => $value->badge],
                                    'data' => $push_data,
                                    'priority' => 'high'
                                ]
                            ];
                            $curl_extra = [
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
                                CURLOPT_SSLCERT => $pem_file,
                                CURLOPT_SSLCERTPASSWD => $pem_secret,
                            ];
                        } else {
                            $headers = $fire_base_header;
                            $url = "https://fcm.googleapis.com/fcm/send";
                            $payload_data = [
                                'to' => $value['push_token'],
                                'data' => $push_data,
                                'priority' => 'high'
                            ];
                        }
                        $ch = curl_init($url);
                        curl_setopt_array($ch, array_merge([
                            CURLOPT_URL => $url,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_POSTFIELDS => json_encode($payload_data),
                            CURLOPT_POST => 1,
                            CURLOPT_HTTPHEADER => $headers,
                        ], $curl_extra));
                        $result = curl_exec($ch);
//                            $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        if (curl_errno($ch)) {
                            $push_status = 'Curl Error:' . curl_error($ch);
                        }
                        curl_close($ch);
                        if (config('constants.push_log')) {
                            PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], $push_status, json_encode($push_data), $result);
                        }
                    } else {
                        PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], "Token Is empty");
                    }
                } catch (Exception $e) {
                    if (config('constants.push_log')) {
                        PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], $e->getMessage());
                    }
                }
            }
        } else {
            if (config('constants.push_log')) {
                PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], "Users Is not A Login With app");
            }
        }
//            if ($notification_entry) {
//                Notification::create([
//                    'push_type' => $push_data['push_type'],
//                    'user_id' => $push_data['user_id'],
//                    'from_user_id' => $push_data['from_user_id'],
//                    'push_title' => $push_data['push_title'],
//                    'push_message' => $push_data['push_message'],
//                    'object_id' => $push_data['object_id'],
//                    'extra' => (isset($data['extra']) && !empty($data['extra'])) ? json_encode($data['extra']) : json_encode([]),
//                    'country_id' => $push_data['country_id'],
//                ]);
//            }

//        }
    } else {
        if (config('constants.push_log')) {
            PushLog::add_log($user_id, $push_data['from_user_id'], $push_data['push_type'], "User Cant Sent Push To Own Profile.");
        }
    }
}

function number_to_dec($number = "", $show_number = 2, $separated = '.', $thousand_separator = "")
{
    return number_format($number, $show_number, $separated, $thousand_separator);
}

function genUniqueStr($prefix = '', $length = 10, $table, $field, $isAlphaNum = false)
{
    $arr = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
    if ($isAlphaNum) {
        $arr = array_merge($arr, array(
            'a', 'b', 'c', 'd', 'e', 'f',
            'g', 'h', 'i', 'j', 'k', 'l',
            'm', 'n', 'o', 'p', 'r', 's',
            't', 'u', 'v', 'x', 'y', 'z',
            'A', 'B', 'C', 'D', 'E', 'F',
            'G', 'H', 'I', 'J', 'K', 'L',
            'M', 'N', 'O', 'P', 'R', 'S',
            'T', 'U', 'V', 'X', 'Y', 'Z'));
    }
    $token = $prefix;
    $maxLen = max(($length - strlen($prefix)), 0);
    for ($i = 0; $i < $maxLen; $i++) {
        $index = rand(0, count($arr) - 1);
        $token .= $arr[$index];
    }
    if (isTokenExist($token, $table, $field)) {
        return genUniqueStr($prefix, $length, $table, $field, $isAlphaNum);
    } else {
        return $token;
    }
}

function isTokenExist($token, $table, $field)
{
    if ($token != '') {
        $isExist = DB::table($table)->where($field, $token)->count();
        if ($isExist > 0) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}

function get_fancy_box_html($path = "", $class = "img_75")
{
    return '<a data-fancybox="gallery" href="' . $path . '"><img class="' . $class . '" src="' . $path . '" alt="image"></a>';
}

function general_date($date)
{
    return date('Y-m-d', strtotime($date));
}

function current_route_is_same($name = "")
{
    return $name == request()->route()->getName();
}

function is_selected_blade($id = 0, $id2 = "")
{
    return ($id == $id2) ? "selected" : "";
}

function clean_number($number)
{
    return preg_replace('/[^0-9]/', '', $number);
}

function print_query($builder)
{
    $addSlashes = str_replace('?', "'?'", $builder->toSql());
    return vsprintf(str_replace('?', '%s', $addSlashes), $builder->getBindings());
}

function user_status($status = "", $is_delete_at = false)
{
    if ($is_delete_at) {
        $status = "<span class='badge badge-danger'>Deleted</span>";
    } elseif ($status == "inactive") {
        $status = "<span class='badge badge-warning'>" . ucfirst($status) . "</span>";
    } else {
        $status = "<span class='badge badge-success'>" . ucfirst($status) . "</span>";
    }
    return $status;
}


function is_active_module($names = [])
{
    $current_route = request()->route()->getName();
    return in_array($current_route, $names) ? "kt-menu__item--active kt-menu__item--open" : "";
}

function echo_extra_for_site_setting($extra = "")
{
    $string = "";
    $extra = json_decode($extra);
    if (!empty($extra) && (is_array($extra) || is_object($extra))) {
        foreach ($extra as $key => $item) {
            $string .= $key . '="' . $item . '" ';
        }
    }
    return $string;
}

function upload_file($file_name = "", $path = null)
{
    $file = "";
    $request = \request();
    if ($request->hasFile($file_name) && $path) {
        $path = config('constants.upload_paths.' . $path);
        $file = $request->file($file_name)->store($path, config('constants.upload_type'));
    } else {
        echo 'Provide Valid Const from web controller';
        die();
    }
    return $file;
}

function upload_base_64_img($base64 = "", $path = "uploads/product/")
{
    $file = null;
    if (preg_match('/^data:image\/(\w+);base64,/', $base64)) {
        $data = substr($base64, strpos($base64, ',') + 1);
        $up_file = rtrim($path, '/') . '/' . md5(uniqid()) . '.png';
        $img = Storage::disk('local')->put($up_file, base64_decode($data));
        if ($img) {
            $file = $up_file;
        }
    }
    return $file;
}

function pre($data = '', $exit = TRUE)
{
    echo '<pre>';
    print_r($data);
    echo '<pre>';
    if ($exit)
        exit;
}

function flash_error_session($value)
{
    session()->flash('flash_error', ucfirst($value));
}

function flash_success_session($value)
{
    session()->flash('flash_success', ucfirst($value));
}

function my_total_expense($user_id, $start_date = '', $end_date = '', $type = '')
{
    $expense = Expense::where('user_id', $user_id);
    if ($start_date && $end_date) {
        $expense = $expense->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date);
    }
    if (!empty($type))
        $expense->where('payment_type', $type);
    $expense = $expense->get();
    $total = 0;
    foreach ($expense as $item) {
        $total += $item->amount + $item->vat_amount;
    }
    return $total ?? 0;
}

function my_month_comparison($user_id, $start_date = '', $end_date = '')
{
    $start_date = date('Y-m-01') . ' 00:00:00';
    $end_date = date('Y-m-t') . ' 00:00:00';
    $expense = Expense::where('user_id', $user_id);
    if ($start_date && $end_date) {
        $expense = $expense->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date);
    }
    $expense = $expense->get();
    $total = 0;
    foreach ($expense as $item) {
        $total += $item->amount + $item->vat_amount;
    }
    return $total ?? 0;
}

function place_currency($amt, $currency = '£', $before = TRUE)
{
    $amt = number_format(round($amt, 2), 2);
    $formated_curr = $currency . ' ' . $amt;
    if ($before == FALSE)
        $formated_curr = $amt . ' ' . $currency;
    return $formated_curr;
}

function isActiveRoute($route, $output = "active")
{
    if (Route::currentRouteName() == $route)
        return $output;
}

function get_date_format($date = '', $format = 'd-m-Y')
{
    return (!empty($date)) ? \Carbon\Carbon::parse($date)->format($format) : 'N/A';
}

function get_date_format_new($date = '')
{
    $today = Carbon::now()->format('d-m-Y');
    $date = \Carbon\Carbon::parse($date)->format('d-m-Y');

    if (strtotime($today) == strtotime($date)) {
        return '<span class="kt-badge kt-badge--success kt-badge--inline">' . $date . '</span>';
    }
    if (strtotime($today) > strtotime($date)) {
        return '<span class="kt-badge kt-badge--danger kt-badge--inline">' . $date . '</span>';
    }
    if (strtotime($today) < strtotime($date)) {
        return '<span class="kt-badge kt-badge--warning kt-badge--inline">' . $date . '</span>';
    }
}

if (!function_exists('checkFileExist')) {

    /**
     * return path of image
     *
     * @param string $path
     * @return string
     *
     * @throws \RuntimeException
     */
    function checkFileExist($path = '')
    {
        $url = asset($path);
        if (!empty($path))
            $url = asset($path);
        else
            $url = asset('uploads/no_image.png');

        return $url;
    }

}

function createSlug($value)
{

    if (WebContent::whereDomainName($slug = Str::slug($value))->exists()) {

        $slug = incrementSlug($slug);
    }

    return $slug;
}

function incrementSlug($slug)
{

    $original = $slug;

    $count = 2;

    while (WebContent::whereDomainName($slug)->exists()) {

        $slug = "{$original}-" . $count++;
    }

    return $slug;

}

function get_days()
{
    return ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
}

function is_checked_blade($id = 0, $id2 = "", $sel = "selected")
{
    return ($id == $id2) ? $sel : "";
}


function get_website_content_web($template, $website_id, $page)
{
    $content = WebContentDetails::where(['templete_slug' => $template, 'website_id' => $website_id, 'user_id' => Auth::user()->id, 'page_slug' => $page])->get();

    $section = [];
    $html = '';
    foreach ($content as $key => $value) {

        if (!in_array($value->section_slug, $section)) {

            if ($key != 0) {
                $html .= '</div>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>';
            }
            $section[] = $value->section_slug;
            $html .= '<div class="card">
                                        <div class="card-header" id="headingOne' . $value->section_slug . '">
                                            <div class="card-title collapsed" data-toggle="collapse"
                                                 data-target="#collapseOne' . $value->section_slug . '" aria-expanded="true"
                                                 aria-controls="collapseOne' . $value->section_slug . '">Section ' . (str_replace('_', ' ', ucwords($value->section_slug))) . '
                                            </div>
                                        </div>
                                        <div id="collapseOne' . $value->section_slug . '" class="collapse" aria-labelledby="headingOne' . $value->section_slug . '"
                                             data-parent="#accordion-' . $page . '">
                                            <div class="card-body">
                                                <div class="row">
                                                <div class="col-xl-12">
                                                        <div class="kt-section kt-section--first">
                                                            <div class="kt-section__body">';
        }

        $html .= '<div class="form-group row">
                        <label class="col-3 col-form-label">' . str_replace('_', ' ', ucwords($value->key)) . ($value->is_required == 1 ? '<span class="text-danger">*</span>' : '') . '
                            </label>
                        <div class="col-9">';
        switch ($value->input_type) {
            case 'text':
                $html .= '<input class="form-control" type="text"
                                   id="field_' . $value->id . '"
                                   name="field_' . $value->id . '"
                                   value="' . $value->value . '"
                                   placeholder="' . $value->key . '">';
                break;
            case 'textarea':
                $html .= '<textarea class="form-control"
                                   id="field_' . $value->id . '"
                                   name="field_' . $value->id . '"
                                   placeholder="' . $value->key . '">' . $value->value . '</textarea>';
                break;
            case 'file':
                $extension = pathinfo(checkFileExist($value->value), PATHINFO_EXTENSION);
                $imageExtension = ['tif', 'gif', 'bmp', 'jpeg', 'jpg', 'png'];
                $html .= '<input type="file"
                                   id="field_' . $value->id . '"
                                   name="field_' . $value->id . '"
                                   ></br>';
                if (in_array($extension, $imageExtension)) {
                    $html .= '<img class="web_img_edit" src="' . checkFileExist($value->value) . '" width="50"/>';
                }
                break;
        }
        $html .= '</div></div>';
        if ($content->count() == 1 || $content->count() == ($key + 1)) {
            $html .= '</div>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>';
        }
    }
    return $html;
}

function is_subscription_permission_exist($plan_id, $slug)
{
    return \App\SubscriptionPlanDetails::where(['plan_id' => $plan_id, 'slug' => preg_replace('/\s+/', '_', $slug)])->count();
}

function get_web_content_detail($website_id, $template, $page_slug, $section_slug, $key, $extra_id = 0)
{
    if (empty($extra_id)) {
        if (!empty($section_slug) && !empty($key)) {
            $content = WebContentDetails::where(['website_id' => $website_id, 'templete_slug' => $template, 'page_slug' => $page_slug, 'section_slug' => $section_slug, 'key' => $key])->first();
            return $content->value ?? '';
        } else {
            return WebContentDetails::where(['website_id' => $website_id, 'templete_slug' => $template, 'page_slug' => $page_slug])->get();
        }
    } else {
        if ($section_slug == 'our_services_item') {
            $webService = WebService::find($extra_id);
            switch ($key) {
                case 'service_title':
                    return $webService->title;
                    break;
                case 'service_description':
                    return $webService->description;
                    break;
                case 'service_image':
                    return $webService->image;
                    break;
            }
        } else if ($section_slug == 'testimonials_item') {
            $testimonial = WebTestimonial::find($extra_id);
            switch ($key) {
                case 'title':
                    return $testimonial->title;
                    break;
                case 'description':
                    return $testimonial->description;
                    break;
                case 'label':
                    return $testimonial->label;
                    break;
                case 'author_name':
                    return $testimonial->author_name;
                    break;
                case 'author_image':
                    return $testimonial->author_image;
                    break;
            }
        } else if ($section_slug == 'our_recent_stock_item') {
            $stock = WebRecentStock::find($extra_id);
            switch ($key) {
                case 'title':
                    return $stock->title;
                    break;
                case 'image':
                    return $stock->image;
                    break;
                case 'category':
                    return $stock->category;
                    break;
                case 'transmission':
                    return $stock->transmission;
                    break;
                case 'fuel':
                    return $stock->fuel;
                    break;
                case 'bhp':
                    return $stock->bhp;
                    break;
            }
        }
    }
}

function get_web_content_detail_id($website_id, $template, $page_slug, $section_slug, $key)
{
    $content = WebContentDetails::where(['website_id' => $website_id, 'templete_slug' => $template, 'page_slug' => $page_slug, 'section_slug' => $section_slug, 'key' => $key])->first();
    return $content->id ?? '';
}


function save_file($path, $file_content)
{
    return Storage::put($path, $file_content);
}

function is_login_for_edit()
{
    return Auth::check() ?? 0;
}

function comparision_percentage($y = 0, $x = 0)
{
    try {
        $val = number_format(((($x - $y) / (($x + $y) / 2)) * 100), 2);
        if ($val > 0)
            $val = '<i class="fa fa-arrow-up" style="color: green"></i>' . abs($val);
        else if ($val < 0)
            $val = '<i class="fa fa-arrow-down" style="color: red"></i>' . abs($val);
        else
            $val = $val;
        return $val . '%';
    } catch (Exception $e) {
        return '0%';
    }
}

function str_limit($text, $limit = 100)
{
    return \Str::limit($text, $limit, ' ...');
}

function to_do_date_check($priority)
{
    switch ($priority) {
        case 'low':
            return 'box-to-do-success';
            break;
        case 'medium':
            return 'box-to-do-warning';
            break;
        case 'high':
            return 'box-to-do-danger';
            break;
    }
}
