<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Expense;
use App\Exports\ExpenseExport;
use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class ExpenseController extends WebController
{
    public function index()
    {
        $title = 'My expense';
        return view('web.dashboard.my_expense', [
            'title' => $title,
            'total_expense' => place_currency((Expense::where('user_id', Auth::user()->id)->sum('amount') + Expense::where('user_id', Auth::user()->id)->sum('vat_amount'))),
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
            'recordsFiltered' => 0,
            'filter_total' => [],
        );
        $main = Expense::where('user_id', Auth::user()->id);
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
                $query->where('description', 'like', "%$search%");
            });
        }
        $start_date = $end_date = '';
        if (isset($request->date_range)) {
            $string = explode('-', $request->date_range);
            $date1 = explode('/', $string[0]);
            $date2 = explode('/', $string[1]);
            $start_date = $date1[2] . '-' . $date1[0] . '-' . $date1[1] . ' 00:00:00';
            $end_date = $date2[2] . '-' . $date2[0] . '-' . $date2[1] . ' 00:00:00';
            if (empty($search)) {
                $main->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date);
            }
        } else {
            $start_date = date('Y-m-01') . ' 00:00:00';
            $end_date = date('Y-m-t') . ' 00:00:00';
            if (empty($search)) {
                $main->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date);
            }
        }
        $return_data['recordsFiltered'] = $main->count();
        $return_data['filter_total']['my_total_expense'] = place_currency(my_total_expense(Auth::user()->id, $start_date, $end_date));
        $return_data['filter_total']['my_month_comparison'] = place_currency(my_month_comparison(Auth::user()->id, $start_date, $end_date));
        $return_data['filter_total']['total_card_spend'] = place_currency(my_total_expense(Auth::user()->id, $start_date, $end_date, 'card'));
        $return_data['filter_total']['total_cash_spend'] = place_currency(my_total_expense(Auth::user()->id, $start_date, $end_date, 'cash'));
        $return_data['filter_total']['total_vat'] = place_currency(Expense::where('user_id', Auth::user()->id)->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)->sum('total_vat'));
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
                $return_data['data'][] = array(
                    'created_at' => date('d/m/Y', strtotime($value->created_at)),
                    'amount' => place_currency($value->amount + $value->vat_amount),
                    'description' => $value->description,
                    'payment_type' => $value->payment_type,
                    'total_vat' => place_currency($value->total_vat),
                    'action' => $this->generate_actions_buttons_for_web($param, true, false, true),
                );
            }
        }
        return $return_data;
    }

    public function create(Request $request)
    {
        $this->directValidation([
            'description' => ['required'],
            'amount' => ['required'],
            'payment_type' => ['required', 'in:card,cash,other'],
            'vat_flag' => ['required'],
        ]);
        if ($request->vat_flag == "0") {
            $vat_amount = $request->amount * 20 / 100;
        }
        if (empty($request->id)) {
            $expense = new Expense();
        } else {
            $expense = Expense::find($request->id);
        }
        $expense->user_id = Auth::user()->id;
        $expense->description = $request->description;
        $expense->amount = $request->amount;
        $expense->vat_amount = $vat_amount ?? '0';
        $expense->total_vat = ($request->vat_flag == 1) ? ($request->total_vat ?? '0') : 0;
        $expense->vat_flag = $request->vat_flag;
        $expense->payment_type = $request->payment_type;
        $expense->other_description = $request->note;
        $expense->save();
        if ($expense) {
            response()->json(['status' => 200, 'message' => __('front.success_expense_created')], 200)->header('Content-Type', 'application/json')->send();
            die();
        } else {
            response()->json(['status' => 412, 'message' => __('Something went wrong please try again')], 412)->header('Content-Type', 'application/json')->send();
            die();
        }
    }

    public function get_edit_form(Request $request)
    {
        $expense = Expense::find($request->id);
        $title = (!empty($request->id)) ? __('Edit expense') : __('Add expense');
        return view('web.dashboard.modal.add_edit_expense', compact('expense', 'title'));
    }

    public function delete_stock(Request $request)
    {
        Expense::destroy($request->id);
        response()->json(['status' => 200, 'message' => __('Expense deleted successfully')], 200)->header('Content-Type', 'application/json')->send();
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

        $last_month_expense = my_total_expense(Auth::user()->id, $from_month_start->format('Y-m-d'), $from_month_end->format('Y-m-d'));
        $current_month_expense = my_total_expense(Auth::user()->id, $to_month_start->format('Y-m-d'), $to_month_end->format('Y-m-d'));

        $comparision = comparision_percentage($last_month_expense, $current_month_expense);
        $from_total_expense = my_total_expense(Auth::user()->id, $from_month_start->format('Y-m-d'), $from_month_end->format('Y-m-d'));
        $to_total_expense = my_total_expense(Auth::user()->id, $to_month_start->format('Y-m-d'), $to_month_end->format('Y-m-d'));

        $html = '<table class="table table-striped table-bordered" >
                                <tr>
                                    <td ></td>
                                    <td>' . $request->from_month . '</td>
                                    <td>' . $request->to_month . '</td>
                                </tr>
                                <tr>
                                    <td>Total Expense</td>
                                    <td>' . $from_total_expense . '</td>
                                    <td>' . $to_total_expense . '</td>
                                </tr>
                                <tr>
                                    <td>Comparision</td>
                                    <td colspan="2" class="text-center">' . $comparision . '</td>
                                </tr>
                            </table>';
        response()->json(['status' => 200, 'message' => __('Success'), 'data' => $html], 200)->header('Content-Type', 'application/json')->send();
        die();

    }

    public function export(Request $request)
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
        return Excel::download(new ExpenseExport($data), 'expense-' . time() . '.xlsx');
    }
}
