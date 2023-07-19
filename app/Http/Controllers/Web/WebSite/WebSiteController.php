<?php

namespace App\Http\Controllers\Web\WebSite;

use App\Http\Controllers\WebController;
use App\TemplateContent;
use App\WebContentDetails;
use App\WebRecentStock;
use App\WebService;
use App\WebTestimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\WebContent;
use Intervention\Image\Facades\Image;

class WebSiteController extends WebController
{
    public function myWebsite()
    {
        $title = 'My Website';
        $web_content = WebContent::where('user_id', Auth::user()->id)->first();
        return view('web.dashboard.my_website', [
            'title' => $title,
            'data' => $web_content ?? ''
        ]);
    }

    public function postWebContent(Request $request)
    {
        $this->directValidation([
            'name' => ['required'],
            /*'address' => ['required'],*/
            /*'email' => ['required'],
            'mobile_number' => ['required'],*/
            /*'vat_number' => ['required'],
            'company_registration_number' => ['required'],
            'fca_number' => ['required'],*/
        ]);
        if (is_subscription_permission_exist(Auth::user()->plan_id, $request->template) == 0) {
            response()->json(['status' => 412, 'message' => __('You are not able to apply this template')], 412)->header('Content-Type', 'application/json')->send();
            die();
        }
        $web_content = WebContent::where('user_id', Auth::user()->id)->first();
        $current_template = $web_content->template ?? '0';
        $template_content = TemplateContent::get();

        $slug = createSlug($request->name);
        if ($web_content) {
            $web_content->template = $request->template;
            $web_content->name = $request->name;
            $web_content->address = $request->address ?? '';
            $web_content->email = $request->email ?? '';
            $web_content->mobile_number = $request->mobile_number ?? '';
            $web_content->vat_number = $request->vat_number ?? '';
            $web_content->company_registration_number = $request->company_registration_number ?? '';
            $web_content->fca_number = $request->fca_number ?? '';
            $web_content->color = !empty($request->restore_default_theme_color) ? null : ($request->color ?? null);
            $web_content->secondary_color = !empty($request->restore_default_theme_color) ? null : ($request->secondary_color ?? null);
            if (!empty($request->image)) {
                
                $web_content->logo = upload_base_64_img($request->image, 'uploads/website');
                
                $image = Image::make($request->image);
                
                // Remove the background
                $image->removeBackground();
                $image->save('public/uploads/website/logo.png');
            }
            if ($request->hasFile('favicon')) {
                $web_content->favicon = $request->file('favicon')->store('uploads/website');
            }
            $web_content->save();
        } else {
            $web_content = new WebContent;
            $web_content->user_id = Auth::user()->id;
            $web_content->template = $request->template;
            $web_content->name = $request->name;
            $web_content->domain_name = $slug;
            $web_content->address = $request->address ?? '';
            $web_content->email = $request->email ?? '';
            $web_content->mobile_number = $request->mobile_number ?? '';
            $web_content->vat_number = $request->vat_number ?? '';
            $web_content->company_registration_number = $request->company_registration_number ?? '';
            $web_content->fca_number = $request->fca_number ?? '';
            $web_content->color = $request->color ?? '';
            $web_content->secondary_color = $request->secondary_color ?? '';
            if (!empty($request->image)) {
                $web_content->logo = upload_base_64_img($request->image, 'uploads/website');
            }
            $web_content->save();
        }
        if ($template_content && $current_template != $request->template) {
            WebContentDetails::where(['user_id' => Auth::user()->id, 'website_id' => $web_content->id])->delete();
            $templateSeeder = new \TemplateSeeder(['user_id' => Auth::id(), 'website_id' => $web_content->id, 'template_slug' => $web_content->template]);
            $templateSeeder->run();
            foreach ($template_content as $content) {
                WebContentDetails::create([
                    'user_id' => Auth::user()->id,
                    'website_id' => $web_content->id,
                    'templete_slug' => $web_content->template,
                    'page_slug' => $content->page_slug,
                    'section_slug' => $content->section_slug,
                    'key' => $content->key,
                    'value' => $content->value,
                    'input_type' => $content->input_type,
                    'is_required' => $content->is_required,
                ]);
            }
        }

        if ($web_content) {
            $webContent = WebContentDetails::where(['website_id' => $web_content->id, 'templete_slug' => $web_content->template, 'page_slug' => 'common', 'section_slug' => 'header', 'key' => 'logo'])->first();
            if ($webContent) {
                $webContent->value = $web_content->logo;
                $webContent->save();
            }

            response()->json(['status' => 200, 'message' => __('My website details updated successfully')], 200)->header('Content-Type', 'application/json')->send();
            die();
        } else {
            response()->json(['status' => 412, 'message' => __('Something went wrong please try again')], 412)->header('Content-Type', 'application/json')->send();
            die();
        }
    }

    public function editWebsite()
    {
        $title = 'Edit Website';
        $edit_website = true;
        $web_content = WebContent::where('user_id', Auth::user()->id)->first();
        return view('website.index', [
            'title' => $title,
            'edit_website' => $edit_website,
            'data' => $web_content ?? ''
        ]);
    }

    public function getMyDynamicModal(Request $request)
    {
        $siteContent = $request->all();
        return view('template.modal.dynamic_form', compact('siteContent'));
    }

    public function getMyTimingModal(Request $request)
    {
        $user = $request->user();
        $working_hours = $user->working_hours()->get();
        $data = $user ?? '';
        return view('template.modal.timing_form', compact('working_hours', 'data'));
    }

    public function getServiceHTML(Request $request)
    {
        $web_content = WebContent::find($request->website_id);
        return view('template.modal.service_box_html', compact('web_content'));
    }

    public function getTestimonialHTML(Request $request)
    {
        $web_content = WebContent::find($request->website_id);
        return view('template.modal.testimonial_box_html', compact('web_content'));
    }

    public function getStockHTML(Request $request)
    {
        $web_content = WebContent::find($request->website_id);
        return view('template.modal.stock_box_html', compact('web_content'));
    }

    public function getTimingsHTML(Request $request)
    {
        $web_content = WebContent::where('user_id', Auth::user()->id)->first();
        return view('template.modal.timing_box', compact('web_content'));
    }

    public function saveMyDynamicFrom(Request $request)
    {
        $ignore_parameter = ['_token', 'website_id', 'template_slug', 'page_slug', 'section_slug', 'input_type', 'is_item', 'extra_id', 'restore_default_img'];
        $response = [];
        if ($request->is_item == 0) {
            $i = 0;
            foreach ($request->all() as $key => $value) {
                if (!in_array($key, $ignore_parameter)) {
                    $webContent = WebContentDetails::where(['website_id' => $request->website_id, 'templete_slug' => $request->template_slug, 'page_slug' => $request->page_slug, 'section_slug' => $request->section_slug, 'key' => $key])->first();
                    if (empty($webContent))
                        $webContent = new WebContentDetails();
                    if ($request->input_type[$i] == 'file') {
                        if ($request->hasFile($key)) {
                            $value = $request->file($key)->store('uploads/website/' . $request->page_slug);
                        }
                    }
                    $webContent->user_id = Auth::user()->id;
                    $webContent->website_id = $request->website_id;
                    $webContent->templete_slug = $request->template_slug;
                    $webContent->page_slug = $request->page_slug;
                    $webContent->section_slug = $request->section_slug;
                    $webContent->key = $key;
                    $webContent->value = $value;
                    $webContent->input_type = isset($request->input_type[$i]) ? $request->input_type[$i] : 'text';
                    $webContent->save();
                    $response[$i]['class_of_content'] = $request->page_slug . '_' . $request->section_slug . '_' . $key;
                    $response[$i]['value_of_content'] = ($request->input_type[$i] == 'file') ? checkFileExist($value) : $value;
                    $response[$i]['type_of_content'] = $request->input_type[$i];
                    $i++;
                }
            }
            if (!empty($request->restore_default_img)) {
                foreach ($request->restore_default_img as $key => $value) {
                    $webContent = WebContentDetails::find($value);
                    //dd($webContent->key);
                    $web_content_details = WebContentDetails::getRestoreDefaultImageByTemplate(['template_slug' => $request->template_slug, 'page_slug' => $request->page_slug, 'section_slug' => $request->section_slug, 'key' => $webContent->key]);
                    //dd($web_content_details);
                    //WebContentDetails::destroy($value);
                    $webContent->value = $web_content_details ?? '';
                    $webContent->save();
                    $response[] = [
                        'class_of_content' => $webContent->page_slug . '_' . $webContent->section_slug . '_' . $webContent->key,
                        'value_of_content' => $web_content_details ?? '',
                        'type_of_content' => 'file',
                    ];
                }
            }
        } else {
            if ($request->section_slug == 'our_services_item') {
                $service = new WebService();
                if (!empty($request->extra_id))
                    $service = WebService::find($request->extra_id);
                $service->user_id = Auth::user()->id;
                $service->website_id = $request->website_id;
                $service->title = $request->service_title;
                $service->description = $request->service_description;
                if ($request->hasFile('service_image')) {
                    if ($service->image) {
                        un_link_file($service->service_image);
                    }
                    $service->image = $request->file('service_image')->store('uploads/website/service');
                }
                if (!empty($request->restore_default_img)) {
                    $web_default_image = WebContentDetails::getRestoreDefaultImageByService(['template_slug' => $request->template_slug]);
                    $service->image = $web_default_image ?? '';
                }
                $service->save();
            } else if ($request->section_slug == 'testimonials_item') {
                $testimonial = new WebTestimonial();
                if (!empty($request->extra_id))
                    $testimonial = WebTestimonial::find($request->extra_id);
                $testimonial->user_id = Auth::user()->id ?? -1;
                if($testimonial->user_id == -1){
                    $website_detail_data = WebContent::find($request->website_id);
                    $testimonial->user_id = $website_detail_data->user_id;
                }
                $testimonial->website_id = $request->website_id;
                $testimonial->title = $request->title ?? '';
                $testimonial->description = $request->description;
                $testimonial->label = $request->label ?? '';
                $testimonial->author_name = $request->author_name ?? '';
                if ($request->hasFile('author_image')) {
                    if ($testimonial->author_image) {
                        un_link_file($testimonial->author_image);
                    }
                    $testimonial->author_image = $request->file('author_image')->store('uploads/website/testimonial');
                }
                if (!empty($request->restore_default_img)) {
                    $web_default_image = WebContentDetails::getRestoreDefaultImageByTestimonial(['template_slug' => $request->template_slug]);
                    $testimonial->author_image = $web_default_image ?? '';
                }
                $testimonial->save();
            } else if ($request->section_slug == 'our_recent_stock_item') {
                $stock = new WebRecentStock();
                if (!empty($request->extra_id))
                    $stock = WebRecentStock::find($request->extra_id);
                $stock->user_id = Auth::user()->id;
                $stock->website_id = $request->website_id;
                $stock->title = $request->title ?? '';
                $stock->category = $request->category ?? null;
                $stock->transmission = $request->transmission ?? null;
                $stock->fuel = $request->fuel ?? null;
                $stock->bhp = $request->bhp ?? null;
                if ($request->hasFile('image')) {
                    if ($stock->image) {
                        un_link_file($stock->image);
                    }
                    $stock->image = $request->file('image')->store('uploads/website/stocks');
                }
                if (!empty($request->restore_default_img)) {
                    $web_default_image = WebContentDetails::getRestoreDefaultImageByStock(['template_slug' => $request->template_slug]);
                    $stock->image = $web_default_image ?? '';
                }
                $stock->save();
            }
        }

        response()->json(['status' => 200, 'message' => __('Save data successfully'), 'data' => $response], 200)->header('Content-Type', 'application/json')->send();
        die();
    }

    public function removeItems(Request $request)
    {
        if ($request->type == 'our_services_item') {
            WebService::destroy($request->id);
        } else if ($request->type == 'testimonials_item') {
            WebTestimonial::destroy($request->id);
        } else if ($request->type == 'our_recent_stock_item') {
            WebRecentStock::destroy($request->id);
        }
        response()->json(['status' => 200, 'message' => __('Delete item successfully')], 200)->header('Content-Type', 'application/json')->send();
        die();
    }
}
