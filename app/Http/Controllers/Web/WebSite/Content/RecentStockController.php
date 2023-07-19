<?php

namespace App\Http\Controllers\Web\WebSite\Content;

use App\Http\Controllers\WebController;
use App\WebRecentStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\WebContent;

class RecentStockController extends WebController
{
    public function get_recentStock()
    {
        $title = 'Recent Stock';
        $edit_website = true;
        $web_content = WebContent::where('user_id', Auth::user()->id)->first();
        return view('website.stocks.index', [
            'title' => $title,
            'edit_website' => $edit_website,
            'data' => $web_content ?? ''
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
        $main = WebRecentStock::where('user_id', Auth::user()->id);
        $return_data['recordsTotal'] = $main->count();
        if (!empty($search)) {
            $main->where(function ($query) use ($search) {
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
                    'title' => $value->title ?? '',
                    'image' => get_fancy_box_html(checkFileExist($value->image)),
                    'action' => $this->generate_actions_buttons_for_web($param, true, false, true),
                );
            }
        }
        return $return_data;
    }

    public function get_edit_form(Request $request)
    {
        $stock = WebRecentStock::find($request->id);
        $title = (!empty($request->id)) ? __('Edit Recent Stock') : __('Add Recent Stock');
        return view('website.stocks.add_edit_stock', compact('stock', 'title'));
    }

    public function create(Request $request)
    {
        $this->directValidation([
            'title' => ['required'],
        ]);
        $web_content = WebContent::where('user_id', Auth::user()->id)->first();
        if (empty($request->id)) {
            $stock = new WebRecentStock();
        } else {
            $stock = WebRecentStock::find($request->id);
        }
        $stock->user_id = Auth::user()->id;
        $stock->website_id = $web_content->id;
        $stock->title = $request->title ?? '';
        if ($request->hasFile('image')) {
            if ($stock->image){
                un_link_file($stock->image);
            }
            $stock->image = $request->file('image')->store('uploads/website/stocks');
        }
        $stock->save();
        if ($stock) {
            response()->json(['status' => 200, 'message' => __('front.success_stock_created')], 200)->header('Content-Type', 'application/json')->send();
            die();
        } else {
            response()->json(['status' => 412, 'message' => __('Something went wrong please try again')], 412)->header('Content-Type', 'application/json')->send();
            die();
        }
    }

    public function delete(Request $request)
    {
        $stock = WebRecentStock::find($request->id);
        if ($stock->image) {
            un_link_file($stock->image);
        }
        $stock->delete();
        response()->json(['status' => 200, 'message' => __('Stock deleted successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

}
