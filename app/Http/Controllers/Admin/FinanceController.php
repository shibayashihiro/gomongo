<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\WebController;
use App\UserSubscriptionPlan;
use App\WebFinanceApplication;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FinanceController extends WebController
{
    public function index_pending_finance()
    {
        return view('admin.finance.pending_finance_index', [
            'title' => 'Pending Finance',
            'breadcrumb' => breadcrumb([
                'Pending Finance' => route('admin.pending_finance.index'),
            ]),
        ]);
    }

    public function listing_pending_finance()
    {
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = array(
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        );
        $main = WebFinanceApplication::where('status', 'contacted_broker');
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
                $query->where('vehicle_registration_number', 'like', "%$search%")
                    ->orWhere('mileage', 'like', "%$search%")
                    ->orWhere('first_name', 'like', "%$search%")
                    ->orWhere('middle_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%");
            });
        }
        $return_data['recordsFiltered'] = $main->count();
        $all_data = $main->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();
        if (!empty($all_data)) {
            foreach ($all_data as $key => $value) {
                $param = [
                    'id' => $value->id,
                    'url' => [
                        'view' => route('admin.pending_finance.view', $value->id),
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'name' => $value->first_name.' '.$value->middle_name.' '.$value->last_name,
                    'email' => $value->email,
                    'number' => $value->vehicle_registration_number ?? '',
                    'make_model' => $value->mileage,
                    'status' => ucwords(str_replace('_',' ',ucwords($value->status,'_'))),
                    'action' => $this->generate_actions_buttons($param),
                );
            }
        }
        return $return_data;
    }

    public function view_pending_finance($id)
    {
        $data = WebFinanceApplication::where(['status' => 'contacted_broker', 'id' => $id])->first();
        if ($data) {
            return view('admin.finance.view_finance_index', [
                'title' => 'View finance',
                'data' => $data,
                'breadcrumb' => breadcrumb([
                    'finance' => route('admin.pending_finance.index'),
                    'view' => route('admin.pending_finance.view', $id)
                ]),
            ]);
        }
        error_session('finance not found');
        return redirect()->route('admin.pending_finance.index');
    }

    public function view_accept_finance($id)
    {
        $data = WebFinanceApplication::where(['id' => $id])->first();
        if ($data) {
            return view('admin.finance.view_finance_index', [
                'title' => 'View finance',
                'data' => $data,
                'breadcrumb' => breadcrumb([
                    'finance' => route('admin.accepted_finance.index'),
                    'view' => route('admin.accepted_finance.view', $id)
                ]),
            ]);
        }
        error_session('finance not found');
        return redirect()->route('admin.accepted_finance.index');
    }

    public function status_change_pending_finance(Request $request)
    {
        $data = WebFinanceApplication::where(['status' => 'contacted_broker', 'id' => $request->finance_id])->first();
        if ($data) {
            $data->status = $request->status;
            $data->save();

            success_session('finance status updated successfully');
            return redirect()->route('admin.pending_finance.index');
        }
        error_session('finance not found');
        return redirect()->route('admin.pending_finance.index');
    }

    public function index_accepted_finance()
    {
        return view('admin.finance.accepted_finance_index', [
            'title' => 'Accepted Finance',
            'breadcrumb' => breadcrumb([
                'Accepted Finance' => route('admin.accepted_finance.index'),
            ]),
        ]);
    }

    public function listing_accepted_finance()
    {
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = array(
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        );
        $main = WebFinanceApplication::whereIn('status', ['completed', 'declined', 'approved']);
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
                $query->where('vehicle_registration_number', 'like', "%$search%")
                    ->orWhere('mileage', 'like', "%$search%")
                    ->orWhere('first_name', 'like', "%$search%")
                    ->orWhere('middle_name', 'like', "%$search%")
                    ->orWhere('last_name', 'like', "%$search%");
            });
        }
        $return_data['recordsFiltered'] = $main->count();
        $all_data = $main->orderBy($datatable_filter['sort'], $datatable_filter['order'])
            ->offset($offset)
            ->limit($datatable_filter['limit'])
            ->get();
        if (!empty($all_data)) {
            foreach ($all_data as $key => $value) {
                $param = [
                    'id' => $value->id,
                    'url' => [
                        'view' => route('admin.accepted_finance.view', $value->id),
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'name' => $value->first_name.' '.$value->middle_name.' '.$value->last_name,
                    'email' => $value->email,
                    'number' => $value->vehicle_registration_number ?? '',
                    'make_model' => $value->mileage,
                    'status' => ucwords(str_replace('_',' ',ucwords($value->status,'_'))),
                    'action' => $this->generate_actions_buttons($param),
                );
            }
        }
        return $return_data;
    }
}
