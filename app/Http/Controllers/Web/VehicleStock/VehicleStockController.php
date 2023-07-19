<?php

namespace App\Http\Controllers\Web\VehicleStock;

use App\Expense;
use App\Http\Controllers\WebController;
use App\SaleInvoice;
use App\SaleRecord;
use App\VehicleStock;
use App\VehicleStockAdditionalPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class VehicleStockController extends WebController
{
    public function index()
    {
        $title = __('Stock List');
        return view('web.dashboard.vehicle_stock', [
            'title' => $title,
            'total_stock' => place_currency((VehicleStock::where(['user_id' => Auth::user()->id, 'deleted_status' => 'no'])->sum('price') + VehicleStock::get_additional_total_price_by_user(Auth::user()->id))),
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
        $main = VehicleStock::where(['user_id' => Auth::user()->id, 'deleted_status' => 'no']);
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
                $query->where('registration_number', 'like', "%$search%");
                $query->orWhere('price', 'like', "%$search%");
            });
        }
        $return_data['recordsFiltered'] = $main->count();
        $return_data['filter_total']['total_purchase_price'] = place_currency(VehicleStock::where(['user_id' => Auth::user()->id, 'deleted_status' => 'no'])->sum('price'));
        $return_data['filter_total']['total_additional_cost'] = place_currency(VehicleStock::get_additional_total_price_by_user(Auth::user()->id));
        $return_data['filter_total']['total_invested'] = place_currency((VehicleStock::where(['user_id' => Auth::user()->id, 'deleted_status' => 'no'])->sum('price') + VehicleStock::get_additional_total_price_by_user(Auth::user()->id)));
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
                $add_cost_html = '<a href="javascript:;" onclick="get_additional_price_form(\'' . $value->id . '\')" title="Add Additional Price" class="btn btn-primary btn-sm">Add Cost</a>';
                $return_data['data'][] = array(
                    'id' => ($key + 1),
                    'registration_number' => $value->registration_number,
                    'price' => place_currency($value->price),
                    'additional_price' => place_currency($value->additional_price->sum('price')),
                    'total_cost' => place_currency(($value->price + $value->additional_price->sum('price'))),
                    'action' => $this->generate_actions_buttons_for_web($param, true, true, true) . $add_cost_html,
                );
            }
        }
        return $return_data;
    }

    public function create(Request $request)
    {
        $this->directValidation([
            'registration_number' => ['required', Rule::unique('vehicle_stocks')->ignore($request->id)],
            'price' => ['required'],
        ]);
        if (empty($request->id))
            $vehicleStock = new VehicleStock();
        else
            $vehicleStock = VehicleStock::find($request->id);
        $vehicleStock->user_id = Auth::user()->id;
        $vehicleStock->registration_number = $request->registration_number;
        $vehicleStock->price = $request->price;
        $vehicleStock->save();
        if ($vehicleStock) {
            if (!empty($request->additional_price)) {
                $vehicleStockAdditionalPrice = new VehicleStockAdditionalPrice();
                $vehicleStockAdditionalPrice->vehicle_stock_id = $vehicleStock->id;
                $vehicleStockAdditionalPrice->description = $request->additional_description;
                $vehicleStockAdditionalPrice->price = $request->additional_price;
                $vehicleStockAdditionalPrice->save();
            }
            $sale_record = SaleRecord::where('registration_number', $request->registration_number)->first();
            if ($sale_record) {
                $additional_price = $vehicleStock->additional_price->sum('price');
                $cost_price = $vehicleStock->price + $additional_price;

                $sale_record->cost_price = $cost_price;
                $sale_record->save();
                $vehicleStock->update(['deleted_status' => 'yes']);
            }

            response()->json(['status' => 200, 'message' => __('Save stock successfully')], 200)->header('Content-Type', 'application/json')->send();
            die();
        } else {
            response()->json(['status' => 412, 'message' => __('Something went wrong please try again')], 412)->header('Content-Type', 'application/json')->send();
            die();
        }
    }

    public function save_additional_stock_price(Request $request)
    {
        $this->directValidation([
            'extra_additional_price' => ['required']
        ]);
        $vehicleStockAdditionalPrice = new VehicleStockAdditionalPrice();
        $vehicleStockAdditionalPrice->vehicle_stock_id = $request->id;
        $vehicleStockAdditionalPrice->description = $request->extra_additional_description;
        $vehicleStockAdditionalPrice->price = $request->extra_additional_price;
        $vehicleStockAdditionalPrice->save();
        response()->json(['status' => 200, 'message' => __('Save additional stock price successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

    public function get_edit_form(Request $request)
    {
        $vehicleStock = VehicleStock::find($request->id);
        $title = (!empty($request->id)) ? __('Edit Stock') : __('Add Stock');
        return view('web.dashboard.modal.add_edit_stock', compact('vehicleStock', 'title'));
    }

    public function get_additional_price_form(Request $request)
    {
        $title = __('Add Additional Stock Price');
        $stock_id = $request->id;
        return view('web.dashboard.modal.add_additional_stock_price', compact('stock_id', 'title'));
    }

    public function get_view_form(Request $request)
    {
        $vehicleStock = VehicleStock::find($request->id);
        return view('web.dashboard.modal.view_stock', compact('vehicleStock'));
    }

    public function delete_stock(Request $request)
    {
        VehicleStock::destroy($request->id);
        response()->json(['status' => 200, 'message' => __('Stock deleted successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

    public function delete_additional_price(Request $request)
    {
        VehicleStockAdditionalPrice::destroy($request->id);
        response()->json(['status' => 200, 'message' => __('Stock additional price deleted successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

}
