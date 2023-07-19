<?php

namespace App\Http\Controllers\Web\ToDO;

use App\Http\Controllers\WebController;
use App\ToDo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ToDOController extends WebController
{
    public function index()
    {
        $title = __('To Do');
        $to_do = ToDo::where('user_id', Auth::user()->id)->get();
        return view('web.dashboard.to_do', [
            'title' => $title,
            'to_do' => $to_do,
        ]);
    }

    public function get_list()
    {
        $to_do = ToDo::where('user_id', Auth::user()->id)->where('status', 'pending')->orderByRaw('-date DESC')->get();
        return view('web.dashboard.modal.list_to_do', compact('to_do'));
    }

    public function get_edit_form(Request $request)
    {
        $todo = ToDo::find($request->id);
        $title = (!empty($request->id)) ? __('Edit To DO') : __('Add To DO');
        return view('web.dashboard.modal.add_edit_to_do', compact('todo', 'title'));
    }

    public function create(Request $request)
    {
        $this->directValidation([
            'title' => ['required'],
            'description' => ['required'],
            /*'date' => ['required'],
            'time' => ['required'],*/
        ]);
        if (empty($request->id))
            $todo = new ToDo();
        else
            $todo = ToDo::find($request->id);
        $todo->user_id = Auth::user()->id;
        $todo->title = $request->title;
        $todo->description = $request->description;
        $todo->priority = $request->priority ?? null;
        $todo->assign_staff = $request->assign_staff ?? null;
        $todo->date = $request->date ?? null;
        $todo->time = $request->time ?? null;
        $todo->save();
        if ($todo) {
            response()->json(['status' => 200, 'message' => __('Save to do successfully')], 200)->header('Content-Type', 'application/json')->send();
            die();
        } else {
            response()->json(['status' => 412, 'message' => __('Something went wrong please try again')], 412)->header('Content-Type', 'application/json')->send();
            die();
        }
    }

    public function delete_to_do(Request $request)
    {
        ToDo::where('id', $request->id)->delete();
        response()->json(['status' => 200, 'message' => __('To do deleted successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

    public function mark_as_complete(Request $request)
    {
        ToDo::where('id', $request->id)->update(['status' => 'complete']);
        response()->json(['status' => 200, 'message' => __('To do completed successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }
}
