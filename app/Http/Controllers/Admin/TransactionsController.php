<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\WebController;
use App\UserSubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TransactionsController extends WebController
{
    public function index()
    {
        return view('admin.transaction.index', [
            'title' => 'Transactions Plans',
            'breadcrumb' => breadcrumb([
                'Transactions' => route('admin.transaction.index'),
            ]),
        ]);
    }

    public function listing()
    {
        $datatable_filter = datatable_filters();
        $offset = $datatable_filter['offset'];
        $search = $datatable_filter['search'];
        $return_data = array(
            'data' => [],
            'recordsTotal' => 0,
            'recordsFiltered' => 0
        );
        $main = UserSubscriptionPlan::query();
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
                $query->where('start_date', 'like', "%$search%")
                    ->orWhere('end_date', 'like', "%$search%")
                    ->orWhere('payment_status', 'like', "%$search%")
                    ->orWhere('transaction_id', 'like', "%$search%")
                    ->orWhereHas('plan', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    })->orWhereHas('user', function ($q) use ($search) {
                        $q->where('name', 'like', "%$search%");
                    });
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
                    'id' => $offset + $key + 1,
                    'user' => $value->user->name,
                    'plan' => $value->plan->name,
                    'start_date' => get_date_format($value->start_date),
                    'end_date' => get_date_format($value->end_date),
                    'transaction_id' => $value->transaction_id,
                    'payment_status' => ucfirst($value->payment_status),
                    'created_at' => get_date_format($value->created_at, 'd-m-Y h:i A'),
                );
            }
        }
        return $return_data;
    }
    
}
