<?php

namespace App\Http\Controllers\Web\WebSite\Content;

use App\Http\Controllers\WebController;
use App\WebTestimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\WebContent;

class TestimonialsController extends WebController
{
    public function get_testimonials()
    {
        $title = 'Testimonials';
        $edit_website = true;
        $web_content = WebContent::where('user_id', Auth::user()->id)->first();
        return view('website.testimonial.index', [
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
        $main = WebTestimonial::where('user_id', Auth::user()->id);
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
                    'title' => $value->title ?? '',
                    'description' => substr($value->description, 0, 50) . '...' ?? '',
                    'label' => $value->label ?? '',
                    'image' => get_fancy_box_html(checkFileExist($value->author_image)),
                    'name' => $value->author_name,
                    'action' => $this->generate_actions_buttons_for_web($param, true, false, true),
                );
            }
        }
        return $return_data;
    }

    public function get_edit_form(Request $request)
    {
        $testimonial = WebTestimonial::find($request->id);
        $title = (!empty($request->id)) ? __('Edit Testimonial') : __('Add Testimonial');
        return view('website.testimonial.add_edit_testimonial', compact('testimonial', 'title'));
    }

    public function create(Request $request)
    {
        $this->directValidation([
            'description' => ['required'],
            'author_name' => ['required'],
        ]);
        $web_content = WebContent::where('user_id', Auth::user()->id)->first();
        if (empty($request->id)) {
            $testimonial = new WebTestimonial();
        } else {
            $testimonial = WebTestimonial::find($request->id);
        }
        $testimonial->user_id = Auth::user()->id;
        $testimonial->website_id = $web_content->id;
        $testimonial->title = $request->title ?? '';
        $testimonial->description = $request->description;
        $testimonial->label = $request->label ?? '';
        $testimonial->author_name = $request->author_name ?? '';
        if ($request->hasFile('author_image')) {
            if ($testimonial->author_image){
                un_link_file($testimonial->author_image);
            }
            $testimonial->author_image = $request->file('author_image')->store('uploads/website/testimonial');
        }
        $testimonial->save();
        if ($testimonial) {
            response()->json(['status' => 200, 'message' => __('front.success_testimonial_created')], 200)->header('Content-Type', 'application/json')->send();
            die();
        } else {
            response()->json(['status' => 412, 'message' => __('Something went wrong please try again')], 412)->header('Content-Type', 'application/json')->send();
            die();
        }
    }

    public function delete(Request $request)
    {
        $testimonial = WebTestimonial::find($request->id);
        if ($testimonial->author_image) {
            un_link_file($testimonial->author_image);
        }
        $testimonial->delete();
        response()->json(['status' => 200, 'message' => __('Testimonial deleted successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

}
