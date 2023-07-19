<?php

namespace App\Http\Controllers\Web\CustomerDataBase;

use App\CustomerDataBase;
use App\Exports\CustomerDataBaseExport;
use App\Http\Controllers\WebController;
use App\VehicleStock;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\SaleRecord;
use Excel;

class CustomerDataBaseController extends WebController
{
    public function index()
    {
        $title = __('Customer Data Base');
        return view('web.dashboard.customer_data_base');
    }

    public function listing(Request $request)
    {
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = array(
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        );
        $main = CustomerDataBase::where('user_id', Auth::user()->id);
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%");
                $query->orWhere('address', 'like', "%$search%");
                $query->orWhere('post_code', 'like', "%$search%");
                $query->orWhere('mobile', 'like', "%$search%");
                $query->orWhere('email', 'like', "%$search%");
            });
        }
        $return_data['recordsFiltered'] = $main->count();
        $all_data = $main->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();
        if (!empty($all_data)) {
            foreach ($all_data as $key => $value) {
                $return_data['data'][] = array(
                    'id' => ($key + 1),
                    'name' => $value->name,
                    'address' => $value->address,
                    'post_code' => $value->post_code,
                    'mobile' => $value->mobile,
                    'email' => $value->email,
                );
            }
        }
        return $return_data;
    }

    public function export()
    {
        $data = [];
        if (!empty($request->from_export_month) && !empty($request->to_export_month)) {
            $from_month_start = new Carbon('first day of ' . $request->from_export_month);
            $to_month_end = new Carbon('last day of ' . $request->to_export_month);
            $data = [
                'from_date' => $from_month_start->format('Y-m-d'),
                'to_date' => $to_month_end->format('Y-m-d'),
            ];
        }
        return Excel::download(new CustomerDataBaseExport($data), 'customer_database-' . time() . '.xlsx');
    }
}
