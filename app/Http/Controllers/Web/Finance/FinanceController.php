<?php

namespace App\Http\Controllers\Web\Finance;

use App\CustomerDataBase;
use App\Http\Controllers\WebController;
use App\VehicleStock;
use App\WebFinanceApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\SaleRecord;

class FinanceController extends WebController
{
    public function index()
    {
        $title = __('Finance');
        return view('web.dashboard.finance', [
            'title' => $title,
            'total_no_enquiry' => WebFinanceApplication::where('website_id', Auth::user()->web_content->id)->count(),
            'total_no_approved' => WebFinanceApplication::where('website_id', Auth::user()->web_content->id)->where('status', 'approved')->count(),
            'total_no_declined' => WebFinanceApplication::where('website_id', Auth::user()->web_content->id)->where('status', 'declined')->count(),
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
        $main = WebFinanceApplication::where('website_id', Auth::user()->web_content->id);
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
                $query->where('first_name', 'like', "%$search%");
                $query->where('middle_name', 'like', "%$search%");
                $query->where('last_name', 'like', "%$search%");
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
                $contacted_broker = '';
                if ($value->status == 'received')
                $contacted_broker = '<a href="javascript:;" onclick="get_contacted_broker_form(\'' . $value->id . '\')" title="Contacted Broker"><i class="fas fa-user-secret"></i></a>';

                $completed = '';
                if ($value->status == 'approved')
                $completed = '<a href="javascript:;" onclick="get_completed_form(\'' . $value->id . '\')" title="Completed"><i class="fas fa-check"></i></a>';


                $view_finance = '<a href="'.route('front.finance.show', $value->id).'" title="View"><i class="fas fa-eye"></i></a>';

                $return_data['data'][] = array(
                    'id' => ($key + 1),
                    'name' => $value->first_name.' '.$value->middle_name.' '.$value->last_name,
                    'email' => $value->email,
                    'number' => $value->vehicle_registration_number ?? '',
                    'make_model' => $value->mileage,
                    'status' => ucwords(str_replace('_',' ',ucwords($value->status,'_'))),
                    'action' => $contacted_broker.' '.$completed.' '.$view_finance,
                );
            }
        }
        return $return_data;
    }

    public function get_contacted_broker_form(Request $request)
    {
        $title = __('Contacted Broker');
        $finance_id = $request->id;
        $finance_data = WebFinanceApplication::find($request->id);
        $finance_data->status = 'contacted_broker';
        $finance_data->save();
        response()->json(['status' => 200, 'message' => __('Contacted Broker status updated successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

    public function get_completed_form(Request $request)
    {
        $title = __('Completed');
        $completed_id = $request->id;
        $finance_data = WebFinanceApplication::find($request->id);
        $finance_data->status = 'completed';
        $finance_data->save();
        response()->json(['status' => 200, 'message' => __('Completed status updated successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

    public function show(Request $request, $id)
    {
        $data = WebFinanceApplication::find($id);
        return view('web.dashboard.modal.view_finance', compact('data'));
    }
}
