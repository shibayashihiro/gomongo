<?php

namespace App\Http\Controllers\Web\WebSite\Content;

use App\Http\Controllers\WebController;
use App\WebService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\WebContent;

class ServicesController extends WebController
{
    public function get_services()
    {
        $title = 'Services';
        $edit_website = true;
        return view('website.services.index', [
            'title' => $title,
            'edit_website' => $edit_website,
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
        $main = WebService::where('user_id', Auth::user()->id);
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
                $query->where('description', 'like', "%$search%");
                $query->where('title', 'like', "%$search%");
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
                ];
                $return_data['data'][] = array(
                    'id' => ($key + 1),
                    'title' => $value->title,
                    'description' => $value->description,
                    'image' => get_fancy_box_html(checkFileExist($value->image)),
                    'action' => $this->generate_actions_buttons_for_web($param, true, false, true),
                );
            }
        }
        return $return_data;
    }

    public function get_edit_form(Request $request)
    {
        $service = WebService::find($request->id);
        $title = (!empty($request->id)) ? __('Edit Service') : __('Add Service');
        return view('website.services.add_edit_service', compact('service', 'title'));
    }

    public function create(Request $request)
    {
        $this->directValidation([
            'title' => ['required'],
            'description' => ['required'],
        ]);
        $web_content = WebContent::where('user_id', Auth::user()->id)->first();
        if (empty($request->id)) {
            $service = new WebService();
        } else {
            $service = WebService::find($request->id);
        }
        $service->user_id = Auth::user()->id;
        $service->website_id = $web_content->id;
        $service->title = $request->title;
        $service->description = $request->description;
        if ($request->hasFile('image')) {
            if ($service->image){
                un_link_file($service->image);
            }
            $service->image = $request->file('image')->store('uploads/website/service');
        }
        $service->save();
        if ($service) {
            response()->json(['status' => 200, 'message' => __('front.success_service_created')], 200)->header('Content-Type', 'application/json')->send();
            die();
        } else {
            response()->json(['status' => 412, 'message' => __('Something went wrong please try again')], 412)->header('Content-Type', 'application/json')->send();
            die();
        }
    }

    public function delete(Request $request)
    {
        $service = WebService::find($request->id);
        if ($service->image) {
            un_link_file($service->image);
        }
        $service->delete();
        response()->json(['status' => 200, 'message' => __('Service deleted successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }
}
