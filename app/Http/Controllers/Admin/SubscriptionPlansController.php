<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\WebController;
use App\SubscriptionPlan;
use App\SubscriptionPlanDetails;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubscriptionPlansController extends WebController
{
    public function index()
    {
        return view('admin.subscription.index', [
            'title' => 'Subscription Plans',
            'breadcrumb' => breadcrumb([
                'Subscription Plans' => route('admin.subscription.index'),
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
        $main = SubscriptionPlan::query();
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('price', 'like', "%$search%")
                    ->orWhere('discount_price', 'like', "%$search%")
                    ->orWhere('validity', 'like', "%$search%");
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
                        'status' => route('admin.subscription.status_update', $value->id),
                        'edit' => route('admin.subscription.edit', $value->id)
                    ],
                    'checked' => ($value->status == 'active') ? 'checked' : ''
                ];
                $return_data['data'][] = array(
                    'id' => $offset + $key + 1,
                    'name' => $value->name,
                    'validity' => ucfirst($value->validity),
                    'price' => place_currency($value->price),
                    'discount_price' => place_currency($value->discount_price),
                    'status' => $this->generate_switch($param),
                    'action' => $this->generate_actions_buttons($param),
                );
            }
        }
        return $return_data;
    }

    public function status_update($id = 0)
    {
        $data = ['status' => 0, 'message' => 'User Not Found'];
        $find = SubscriptionPlan::find($id);
        if ($find) {
            $find->update(['status' => ($find->status == "inactive") ? "active" : "inactive"]);
            $data['status'] = 1;
            $data['message'] = 'Subscription plan status updated';
        }
        return $data;
    }

    public function edit($id)
    {
        $data = SubscriptionPlan::find($id);
        if ($data) {
            $title = "Edit Subscription Plan";
            return view('admin.subscription.edit', [
                'title' => $title,
                'data' => $data,
                'breadcrumb' => breadcrumb([
                    'Subscription Plan' => route('admin.subscription.index'),
                    'Edit Subscription Plan' => route('admin.subscription.edit', $data->id)
                ]),
            ]);
        }
        error_session('Subscription plan not found');
        return redirect()->route('admin.subscription.index');
    }

    public function update(Request $request, $id)
    {
        $data = SubscriptionPlan::find($id);
        if ($data) {
            $inputs = $request->validate([
                'name' => ['required'],
                'price' => ['required'],
                'validity' => ['required']
            ]);
            $data->name = $request->name;
            $data->price = $request->price;
            $data->discount_price = $request->discount_price;
            $data->validity = $request->validity . ' ' . $request->validity_time;
            if ($data->save()) {
                $description = '';
                SubscriptionPlanDetails::where(['plan_id' => $data->id])->delete();
                if (!empty($request->plan_content)) {
                    foreach ($request->plan_content as $key => $value) {
                        if ($value == 'Template') {
                            if (!empty($request->template_slug)) {
                                foreach ($request->template_slug as $tskey => $tsval) {
                                    $subscriptionDetail = new SubscriptionPlanDetails();
                                    $subscriptionDetail->plan_id = $data->id;
                                    $subscriptionDetail->slug = $tsval;
                                    $subscriptionDetail->description = $value;
                                    $subscriptionDetail->save();
                                }
                                $description .= '<p><svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10.3638 3.99999L7.36713e-05 7.02274L1.72736 4L7.36713e-05 0.977249L10.3638 3.99999Z" fill="#042833"/>
</svg>
' . (count($request->template_slug)) . ' template</p>';
                            }
                        } else {
                            $subscriptionDetail = new SubscriptionPlanDetails();
                            $subscriptionDetail->plan_id = $data->id;
                            $subscriptionDetail->slug = preg_replace('/\s+/', '_', $value);
                            $subscriptionDetail->description = $value;
                            $subscriptionDetail->save();
                            $description .= '<p><svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M10.3638 3.99999L7.36713e-05 7.02274L1.72736 4L7.36713e-05 0.977249L10.3638 3.99999Z" fill="#042833"/>
</svg>
' . $value . '</p>';
                        }
                    }
                }
                $data->description = $description;
                $data->save();
            }
            success_session('Subscription plan updated successfully');
        } else {
            error_session('Subscription plan not found');
        }
        return redirect()->route('admin.subscription.index');
    }


}
