<?php

namespace App\Http\Controllers\Web\ComplaintManagement;

use App\ComplaintManagement;
use App\ComplaintNote;
use App\Http\Controllers\WebController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintManagementController extends WebController
{
    public function index()
    {
        $title = __('Complaint Management');

        return view('web.dashboard.complaint_management', [
            'title' => $title,
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
        $main = ComplaintManagement::where('user_id', Auth::user()->id);
        $start_date = $end_date = '';
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
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
                $query->where('subject', 'like', "%$search%");
                $query->orWhere('assign_staff', 'like', "%$search%");
                $query->orWhere('customer_name', 'like', "%$search%");
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
                    'edit_onclick' => 'get_edit_form(\'' . $value->id . '\')',
                    'delete_onclick' => 'delete_record(\'' . $value->id . '\')',
                    //'view_onclick' => 'get_view(\'' . $value->id . '\')',
                ];
                $isDelete = false;
                if ($value->status != 'cancel')
                    $isDelete = true;
                $extra = [];
                $add_cost_html = '';
                if ($value->status == 'open')
                $add_cost_html = '<a href="javascript:;" onclick="get_mark_as_complaint_form(\'' . $value->id . '\')" title="Mark As Resolved"><i class="fas fa-check"></i></a>';

                $add_note_html = '<a class="mr-2" href="javascript:;" onclick="get_add_notes_form(\'' . $value->id . '\')" title="Add Note"><i class="fa fa-sticky-note"></i></a>';
                $view_html = '<a class="mr-2" href="'.route('front.complaint_management.get_view', $value->id).'" title="View"><i class="fas fa-eye"></i></a>';
                $return_data['data'][] = array(
                    'id' => ($key + 1),
                    'subject' => $value->subject,
                    'assign_staff' => $value->assign_staff,
                    'customer_name' => $value->customer_name,
                    'customer_contact_number' => $value->customer_contact_number,
                    'additional_note' => str_limit($value->additional_note, 20),
                    'due_date' => get_date_format_new($value->due_date),
                    'status' => ucfirst($value->status),
                    'action' => $this->generate_actions_buttons_for_web($param, true, false, $isDelete, $extra). $view_html . $add_note_html . $add_cost_html,
                );
            }
        }
        return $return_data;
    }

    public function create(Request $request)
    {
        $this->directValidation([
            'subject' => ['required'],
            'description' => ['required'],
            'assign_staff' => ['required'],
            'customer_name' => ['required'],
            'customer_contact_number' => ['required'],
            'due_date' => ['required'],
        ]);
        if (empty($request->id))
            $complaint = new ComplaintManagement();
        else
            $complaint = ComplaintManagement::find($request->id);
        $complaint->user_id = Auth::user()->id;
        $complaint->subject = $request->subject;
        $complaint->description = $request->description;
        $complaint->assign_staff = $request->assign_staff;
        $complaint->customer_name = $request->customer_name;
        $complaint->customer_contact_number = $request->customer_contact_number;
        $complaint->due_date = $request->due_date;
        $complaint->save();
        if ($complaint) {
            response()->json(['status' => 200, 'message' => __('Save complaint management successfully')], 200)->header('Content-Type', 'application/json')->send();
            die();
        } else {
            response()->json(['status' => 412, 'message' => __('Something went wrong please try again')], 412)->header('Content-Type', 'application/json')->send();
            die();
        }
    }

    public function get_edit_form(Request $request)
    {
        $complaintManagement = ComplaintManagement::find($request->id);
        $title = (!empty($request->id)) ? __('Edit Complaint') : __('Add Complaint');
        return view('web.dashboard.modal.add_edit_complaint', compact('complaintManagement', 'title'));
    }


    public function get_view_form(Request $request)
    {
        $complaintManagement = ComplaintManagement::find($request->id);
        return view('web.dashboard.modal.view_complaint_management', compact('complaintManagement'));
    }

    public function get_view($id)
    {
        $complaints = ComplaintManagement::find($id);
        return view('web.dashboard.view_complaint', compact('complaints'));
    }

    public function delete_complaint_management(Request $request)
    {
        ComplaintManagement::where('id', $request->id)->delete();
        response()->json(['status' => 200, 'message' => __('Complaint management deleted successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

    public function get_mark_as_complaint_form(Request $request)
    {
        $title = __('Mark As Complaint');
        $complaint_id = $request->id;
        $type = 'mark_as_complaint';
        return view('web.dashboard.modal.add_additional_note_complaint', compact('complaint_id', 'title', 'type'));
    }

    public function get_add_notes_form(Request $request)
    {
        $title = __('Add Note Complaint');
        $complaint_id = $request->id;
        $type = 'add_note';
        return view('web.dashboard.modal.add_additional_note_complaint', compact('complaint_id', 'title', 'type'));
    }

    public function save_additional_note(Request $request)
    {
        if ($request->type == 'add_note') {
            $this->directValidation([
                'additional_note' => ['required']
            ]);
        }
        $complaint = ComplaintManagement::find($request->id);
        $complaint->additional_note = $request->additional_note;
        if ($request->type != 'add_note') {
            $complaint->status = 'resolved';
        }
        $complaint->save();
        if ($request->additional_note) {
            ComplaintNote::create([
                'complaint_id' => $complaint->id,
                'note' => $request->additional_note,
            ]);
        }
        response()->json(['status' => 200, 'message' => __('mark as resolved successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

}
