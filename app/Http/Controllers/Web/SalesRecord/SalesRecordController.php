<?php

namespace App\Http\Controllers\Web\SalesRecord;

use App\Http\Controllers\WebController;
use App\VehicleStock;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\SaleRecord;

class SalesRecordController extends WebController
{
    public function index()
    {
        $title = __('Sales Record');
        $last_month_start = new Carbon('first day of last month');
        $last_month_end = new Carbon('last day of last month');
        $current_month_start = new Carbon('first day of this month');
        $current_month_end = new Carbon('last day of this month');

        $last_month_sales = SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'complete', 'type' => 'sales'])->whereDate('created_at', '>=', $last_month_start->format('Y-m-d'))->whereDate('created_at', '<=', $last_month_end->format('Y-m-d'))->count();
        $current_month_sales = SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'complete', 'type' => 'sales'])->whereDate('created_at', '>=', $current_month_start->format('Y-m-d'))->whereDate('created_at', '<=', $current_month_end->format('Y-m-d'))->count();
        return view('web.dashboard.sales_record', [
            'title' => $title,
            'comparision' => comparision_percentage($last_month_sales, $current_month_sales),
            'total_cost_price' => place_currency(SaleRecord::where('user_id', Auth::user()->id)->sum('cost_price')),
            'total_sales_price' => place_currency(SaleRecord::where('user_id', Auth::user()->id)->sum('sales_price')),
            'car_sold' => SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'complete', 'type' => 'sales'])->count(),
            'cancel_deal' => SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'cancel', 'type' => 'sales'])->count(),
            'deposit' => SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'complete', 'type' => 'deposit'])->count(),
            'total_card_payment' => place_currency(SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'complete', 'type' => 'sales'])->sum('total_case_payment')),
            'total_cash_payment' => place_currency(SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'complete', 'type' => 'sales'])->sum('total_card_payment')),
        ]);
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
        $main = SaleRecord::where('user_id', Auth::user()->id);
        $start_date = $end_date = '';
        if (empty($search)) {
            if (isset($request->date_range)) {
                $string = explode('-', $request->date_range);
                $date1 = explode('/', $string[0]);
                $date2 = explode('/', $string[1]);
                $start_date = $date1[2] . '-' . $date1[0] . '-' . $date1[1] . ' 00:00:00';
                $end_date = $date2[2] . '-' . $date2[0] . '-' . $date2[1] . ' 00:00:00';
                $main->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date);
            } else {
                $start_date = date('Y-m-01') . ' 00:00:00';
                $end_date = date('Y-m-t') . ' 00:00:00';
                $main->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date);
            }
        }
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
                $query->where('registration_number', 'like', "%$search%");
                $query->orWhere('type', 'like', "%$search%");
                $query->orWhere('cost_price', 'like', "%$search%");
                $query->orWhere('sales_price', 'like', "%$search%");
                $query->orWhere('payment_type', 'like', "%$search%");
            });
        }
        $return_data['recordsFiltered'] = $main->count();
        $return_data['total_cost_price'] = place_currency(SaleRecord::where('user_id', Auth::user()->id)->where('created_at', '>=', $start_date)->where('status','complete')->where('created_at', '<=', $end_date)->sum('cost_price'));
        $return_data['total_sales_price'] = place_currency(SaleRecord::where('user_id', Auth::user()->id)->where('created_at', '>=', $start_date)->where('status','complete')->where('created_at', '<=', $end_date)->sum('sales_price'));
        $return_data['car_sold'] = SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'complete', 'type' => 'sales'])->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)->count();
        $return_data['cancel_deal'] = SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'cancel', 'type' => 'sales'])->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)->count();
        $return_data['deposit'] = SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'complete', 'type' => 'deposit'])->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)->count();
        $return_data['total_card_payment'] = place_currency(SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'complete', 'type' => 'sales'])->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)->sum('total_card_payment'));
        $return_data['total_cash_payment'] = place_currency(SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'complete', 'type' => 'sales'])->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)->sum('total_case_payment'));
        $all_data = $main->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();
        if (!empty($all_data)) {
            foreach ($all_data as $key => $value) {
                $param = [
                    'id' => $value->id,
                    'edit_onclick' => 'get_edit_form(\'' . $value->id . '\')',
                    'delete_onclick' => 'delete_record(\'' . $value->id . '\')',
                    'view_onclick' => 'get_view(\'' . $value->id . '\')',
                ];
                $isDelete = false;
                if ($value->status != 'cancel')
                    $isDelete = true;
                $extra = (!empty($value->invoice_url)) ? ['title' => 'Download', 'onclick' => 'window.open(\'' . $value->invoice_url . '\', \'_blank\')', 'icon' => 'fa fa-download'] : [];
                $profit = ($value->sales_price - $value->cost_price);
                $return_data['data'][] = array(
                    'id' => ($key + 1),
                    'created_at' => get_date_format($value->created_at, 'd/m/Y'),
                    'date' => get_date_format($value->date, 'd/m/Y'),
                    'registration_number' => $value->registration_number,
                    'type' => ucfirst($value->type),
                    'cost_price' => (!empty($value->cost_price)) ? place_currency($value->cost_price) : '<span class="kt-badge kt-badge--danger kt-badge--inline">' . place_currency($value->cost_price) . '</span>',
                    'sales_price' => place_currency($value->sales_price),
                    'profit' => ($profit > 0) ? '<span class="kt-badge kt-badge--success kt-badge--inline">' . place_currency($profit) . '</span>' : '<span class="kt-badge kt-badge--danger kt-badge--inline">' . place_currency($profit) . '</span>',
                    'payment_type' => $value->payment_type,
                    'status' => ucfirst($value->status),
                    'action' => $this->generate_actions_buttons_for_web($param, true, true, $isDelete, $extra),
                );
            }
        }
        return $return_data;
    }

    public function update_sales(Request $request)
    {
        $this->directValidation([
            'cost_price' => ['required'],
            'sale_price' => ['required'],
            'id' => ['required', 'exists:sale_records'],
        ]);
        $saleRecord = SaleRecord::find($request->id);
        $saleRecord->cost_price = $request->cost_price;
        $saleRecord->sales_price = $request->sale_price;
        $saleRecord->registration_number = $request->registration_number;
        $saleRecord->save();
        if ($saleRecord) {
            response()->json(['status' => 200, 'message' => __('Save sale record successfully')], 200)->header('Content-Type', 'application/json')->send();
            die();
        } else {
            response()->json(['status' => 412, 'message' => __('Something went wrong please try again')], 412)->header('Content-Type', 'application/json')->send();
            die();
        }
    }

    public function get_edit_form(Request $request)
    {
        $salesRecord = SaleRecord::find($request->id);
        $title = __('Edit Sales Record');
        return view('web.dashboard.modal.edit_sales_record', compact('salesRecord', 'title'));
    }


    public function get_view_form(Request $request)
    {
        $salesRecord = SaleRecord::find($request->id);
        return view('web.dashboard.modal.view_sales_record', compact('salesRecord'));
    }

    public function delete_sales_record(Request $request)
    {
        $salesRecord = SaleRecord::find($request->id);
        $salesRecord->status = 'cancel';
        $salesRecord->reason_of_cancel = $request->reason_of_cancel;
        $salesRecord->save();
        $vehicle_stock = VehicleStock::where('registration_number', $salesRecord->registration_number)->first();
        if (!is_null($vehicle_stock))
            $vehicle_stock->update(['deleted_status' => 'no']);
        response()->json(['status' => 200, 'message' => __('Sales record deleted successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

    public function get_comparision_data(Request $request)
    {
        $this->directValidation([
            'from_month' => ['required'],
            'to_month' => ['required'],
        ]);
        $from_month_start = new Carbon('first day of ' . $request->from_month);
        $from_month_end = new Carbon('last day of ' . $request->from_month);
        $to_month_start = new Carbon('first day of ' . $request->to_month);
        $to_month_end = new Carbon('last day of ' . $request->to_month);

        $last_month_sales = SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'complete', 'type' => 'sales'])->whereDate('created_at', '>=', $from_month_start->format('Y-m-d'))->whereDate('created_at', '<=', $from_month_end->format('Y-m-d'))->count();
        $current_month_sales = SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'complete', 'type' => 'sales'])->whereDate('created_at', '>=', $to_month_start->format('Y-m-d'))->whereDate('created_at', '<=', $to_month_end->format('Y-m-d'))->count();

        $comparision = comparision_percentage($last_month_sales, $current_month_sales);
        $from_car_sold = SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'complete', 'type' => 'sales'])->whereDate('created_at', '>=', $from_month_start->format('Y-m-d'))->whereDate('created_at', '<=', $from_month_end->format('Y-m-d'))->count();
        $from_cancel_deal = SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'cancel', 'type' => 'sales'])->whereDate('created_at', '>=', $from_month_start->format('Y-m-d'))->whereDate('created_at', '<=', $from_month_end->format('Y-m-d'))->count();
        $to_car_sold = SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'complete', 'type' => 'sales'])->whereDate('created_at', '>=', $to_month_start->format('Y-m-d'))->whereDate('created_at', '<=', $to_month_end->format('Y-m-d'))->count();
        $to_cancel_deal = SaleRecord::where(['user_id' => Auth::user()->id, 'status' => 'cancel', 'type' => 'sales'])->whereDate('created_at', '>=', $to_month_start->format('Y-m-d'))->whereDate('created_at', '<=', $to_month_end->format('Y-m-d'))->count();
        $from_total_cost_price = place_currency(SaleRecord::where('user_id', Auth::user()->id)->whereDate('created_at', '>=', $from_month_start->format('Y-m-d'))->whereDate('created_at', '<=', $from_month_end->format('Y-m-d'))->sum('cost_price'));
        $from_total_sales_price = place_currency(SaleRecord::where('user_id', Auth::user()->id)->whereDate('created_at', '>=', $from_month_start->format('Y-m-d'))->whereDate('created_at', '<=', $from_month_end->format('Y-m-d'))->sum('sales_price'));
        $to_total_cost_price = place_currency(SaleRecord::where('user_id', Auth::user()->id)->whereDate('created_at', '>=', $to_month_start->format('Y-m-d'))->whereDate('created_at', '<=', $to_month_end->format('Y-m-d'))->sum('cost_price'));
        $to_total_sales_price = place_currency(SaleRecord::where('user_id', Auth::user()->id)->whereDate('created_at', '>=', $to_month_start->format('Y-m-d'))->whereDate('created_at', '<=', $to_month_end->format('Y-m-d'))->sum('sales_price'));
        $html = '<table class="table table-striped table-bordered" >
                                <tr>
                                    <td ></td>
                                    <td>' . $request->from_month . '</td>
                                    <td>' . $request->to_month . '</td>
                                </tr>
                                <tr>
                                    <td>Total Car Sold</td>
                                    <td>' . $from_car_sold . '</td>
                                    <td>' . $to_car_sold . '</td>
                                </tr>
                                <tr>
                                    <td>Total Cancel Deals</td>
                                    <td>' . $from_cancel_deal . '</td>
                                    <td>' . $to_cancel_deal . '</td>
                                </tr>
                                <tr>
                                    <td>Total Cost</td>
                                    <td>' . $from_total_cost_price . '</td>
                                    <td>' . $to_total_cost_price . '</td>
                                </tr>
                                <tr>
                                    <td>Total sales</td>
                                    <td>' . $from_total_sales_price . '</td>
                                    <td>' . $to_total_sales_price . '</td>
                                </tr>
                                <tr>
                                    <td>Comparision</td>
                                    <td colspan="2" class="text-center">' . $comparision . '</td>
                                </tr>
                            </table>';
        response()->json(['status' => 200, 'message' => __('Success'), 'data' => $html], 200)->header('Content-Type', 'application/json')->send();
        die();

    }

}
