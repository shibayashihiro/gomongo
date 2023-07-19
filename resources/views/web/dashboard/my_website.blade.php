@extends('layouts.web.dashboard.app')

@section('header_css')
    <style>
        .disabled_template {
            pointer-events: none;
            opacity: 0.4;
        }
    </style>
@endsection

@section('content')
    <div class="wd-md-rightbar">
        <div class="wd-md-topbar">
            <h2>{{$title}}</h2>
        </div>
        <div class="wd-sl-myweb">
            <div class="row">
                <div class="col-md-3">
                    <form id="frmWebContent" name="frmWebContent" method="post" action="javascript:;"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="image" id="image_val"/>
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" placeholder="Website Name"
                                   value="{{$data->name ?? ''}}">
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-3 control-label" for="name">Logo: </label>
                            <div class="col-md-4">
                                <label class="cabinet center-block">
                                    <figure class="website-box-logo">
                                        <img src="{{$data->logo??''}}" class="gambar img-responsive img-thumbnail"
                                             id="website_logo-output"/>
                                        <div class="overlay">
                                            <i class="fa fa-camera"></i>
                                            <span>Upload</span>
                                        </div>
                                    </figure>
                                    <input type="file" class="item-img file center-block" name="website_logo_input"
                                           id="website_logo_input"/>
                                </label>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                             <label for="logo">Logo</label>
                             <input class="form-control" type="file" name="logo" id="logo" placeholder="Upload your logo">
                             @if(isset($data->logo))
                                 <div class="img-responsive">
                                     <img src="{{$data->logo}}">
                                 </div>
                             @endif
                         </div>--}}
                        <div class="form-group">
                            <label for="favicon">Favicon</label>
                            <input class="form-control" type="file" name="favicon" id="favicon"
                                   placeholder="Upload your favicon">
                            @if(isset($data->favicon))
                                <div class="img-responsive">
                                    <img src="{{$data->favicon}}">
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="color">Primary Color</label>
                            <input type="color" name="color" id="color" value="{{$data->color??null}}"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="secondary_color">Secondary Color</label>
                            <input type="color" name="secondary_color" id="secondary_color"
                                   value="{{$data->secondary_color??null}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="restore_default_theme_color"> <input type="checkbox"
                                                                             name="restore_default_theme_color"
                                                                             id="restore_default_theme_color"
                                                                             value="1">
                                Restore Default Theme Color</label>
                        </div>
                        {{--<div class="form-group">
                            <textarea class="form-control" type="text" name="address"
                                      placeholder="Address">{{$data->address ?? ''}}</textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="email" placeholder="Email Address"
                                   value="{{$data->email ?? ''}}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="mobile_number" placeholder="Mobile Number"
                                   value="{{$data->mobile_number ?? ''}}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="vat_number" placeholder="VAT Number"
                                   value="{{$data->vat_number ?? ''}}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="company_registration_number"
                                   placeholder="Company Registration Number"
                                   value="{{$data->company_registration_number ?? ''}}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="fca_number" placeholder="FCA Number"
                                   value="{{$data->fca_number ?? ''}}">
                        </div>--}}
                        <div class="form-group text-center">
                            <input type="hidden" value="{{$data->template ?? ''}}" name="template" id="template_name">
                            <button type="submit" id="btnSubmitFrm" class="default-btn">Save</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <div class="wd-sl-alltemplt">
                        <div class="wd-ds-title d-flex align-items-center justify-content-between pb-3">
                            <h3>Website Themes</h3> {{--<a href="{{route('front.website.setting')}}">EDIT</a>--}}
                        </div>
                        <div class="row">
                            <div
                                class="col-md-4 main_t1 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t1')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t1.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't1')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t1');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't1') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't1') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t2 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t2')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t2.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't2')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t2');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't2') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't2') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t3 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t3')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t3.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't3')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t3');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't3') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't3') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t4 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t4')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t4.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't4')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t4');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't4') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't4') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t5 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t5')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t5.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't5')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t5');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't5') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't5') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t6 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t6')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t6.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't6')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t6');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't6') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't6') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t7 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t7')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t7.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't7')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t7');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't7') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't7') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t8 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t8')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t8.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't8')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t8');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't8') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't8') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t9 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t9')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t9.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't9')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t9');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't9') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't9') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t10 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t10')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t10.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't10')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t10');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't10') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't10') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t11 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t11')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t11.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't11')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t11');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't11') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't11') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t12 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t12')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t12.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't12')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t12');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't12') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't12') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t13 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t13')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t13.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't13')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t13');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't13') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't13') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t14 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t14')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t14.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't14')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t14');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't14') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't14') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t15 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t15')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t15.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't15')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t15');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't15') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't15') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t16 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t16')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t16.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't16')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t16');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't16') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't16') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t17 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t17')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t17.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't17')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t17');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't17') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't17') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t18 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t18')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t18.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't18')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t18');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't18') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't18') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t19 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t19')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t19.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't19')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t19');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't19') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't19') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t20 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t20')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t20.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't20')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t20');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't20') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't20') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                            <div
                                class="col-md-4 main_t21 main_templete {{is_subscription_permission_exist(\Illuminate\Support\Facades\Auth::user()->plan_id,'t21')==0?'disabled_template':''}}">
                                <img src="{{asset('assets/web/dashboard/images/t21.png')}}">
                                <div class="wd-sl-anchors">
                                    @if(isset($data->template) && $data->template == 't21')
                                        <a href="{{route('front.template.home',$data->domain_name)}}">Preview</a>
                                    @else
                                        <a href="javascript:;"></a>
                                    @endif
                                    <a href="javascript:;" onclick="templeteApply('t21');" class="btn_apply"
                                       @if(isset($data->template))@if($data->template == 't21') style="display:none"
                                       @else style="display:block" @endif @endif>Apply</a>
                                    <a href="javascript:;" class="btn_applied gry"
                                       @if(isset($data->template)) @if($data->template != 't21') style="display:none"
                                       @else style="display:block" @endif @else style="display:none" @endif>Applied</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Image Upload
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </h5>

                </div>
                <div class="modal-body">
                    <label><b>Note : </b>
                        <small style="text-align: center;">Zoom the image in or out using the scrollbar at the bottom.
                            If
                            the mouse has a wheel, the wheel will also zoom. You can also adjust the image to the left,
                            to
                            the right, up or down.</small>
                    </label>
                    <div id="upload-demo" class="center-block"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">Cancel
                    </button>
                    <button type="button" id="cropImageBtn"
                            class="btn btn-primary">Crop
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_script')
    <link rel="stylesheet" href="{{asset('assets/web/css/croppie.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css">
    <script src="{{asset('assets/web/js/Croppie.js')}}"></script>
    <script>
        let color = "{{$data->color??''}}";
        let secondary_color = "{{$data->secondary_color??''}}";
        $("#color").change(function () {
            color = this.value;
        });
        $("#secondary_color").change(function () {
            secondary_color = this.value;
        });

        function templeteApply(key) {
            $('#template_name').val(key);
            $('.main_templete .btn_apply').show();
            $('.main_templete .btn_applied').hide();
            $('.main_' + key + ' .btn_apply').hide();
            $('.main_' + key + ' .btn_applied').show();
        }

        let frmWebContent = $("#frmWebContent").validate({
            rules: {
                name: {required: true},
                //logo: {required: true},
                /*address: {required: true},*/
                /*email: {required: true, email: true},
                mobile_number: {required: true},*/
                /*vat_number: {required: true},
                company_registration_number: {required: true},
                fca_number: {required: true},*/
            },
            messages: {
                name: {required: 'Please enter website name'},
                //logo: {required: 'Please select logo'},
                /*address: {required: 'Please enter address'},*/
                /*email: {required: 'Please enter email', email: "please enter valid email"},*/
                /*mobile_number: {required: 'Please enter mobile number'},*/
                /* vat_number: {required: 'Please enter vat number'},
                 company_registration_number: {required: 'Please enter company registration number'},
                 fca_number: {required: 'Please enter fca number'},*/
            },
            submitHandler: function (form) {
                return false;
            }
        });

        $("#btnSubmitFrm").click(function () {
            if ($("#frmWebContent").valid()) {
                let data = new FormData($('#frmWebContent')[0]);
                data.append('color', color);
                data.append('secondary_color', secondary_color);
                $("#btnSubmitFrm").attr('disabled', true);
                $.ajax({
                    type: 'post',
                    data: data,
                    dataType: "json",
                    url: "{{route('front.post_web_content')}}",
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: addOverlay,
                    success: function (r) {
                        removeOverlay();
                        if (r.status == 200) {
                            toastr['success'](r.message, "success");
                            setTimeout(function () {
                                window.location.href = "{{route('front.my_website')}}";
                            }, 1000);
                        } else {
                            toastr['error'](r.message, "error");
                            $("#btnSubmitFrm").attr('disabled', false);
                        }
                    }, error: function (request, status, error) {
                        removeOverlay();
                        let r = JSON.parse(request.responseText);
                        toastr['error'](r.message, "error");
                        $("#btnSubmitFrm").attr('disabled', false);
                    }
                });
            }
        });
        $(function () {

            let $vImageCrop, vRawImg, file_check_v;
            file_check_v = false;

            function readFile(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        $('.upload-demo').addClass('ready');
                        $('#cropImagePop').modal('show');
                        vRawImg = e.target.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                } else {
                    alert("Sorry - you're browser doesn't support the FileReader API");
                }
            }

            $vImageCrop = $('#upload-demo').croppie({
                viewport: {
                    width: 146,
                    height: 35,
                    type: 'square'
                },
                enforceBoundary: true,
                enableExif: true,
                showZoomer: true,
            });
            $('#cropImagePop').on('shown.bs.modal', function () {
                $vImageCrop.croppie('bind', {
                    url: vRawImg,
                }).then(function () {
                    console.log('jQuery bind complete');
                });
            });

            $('#cropImageBtn').on('click', function (ev) {
                $vImageCrop.croppie('result', {
                    type: 'base64',
                    format: 'png',
                    size: {width: 146, height: 35}
                }).then(function (resp) {
                    $('#image_val').val(resp);
                    $('#website_logo-output').attr('src', resp);
                    $('#cropImagePop').modal('hide');
                });
            });
            $('#website_logo_input').change(function () {
                let file_this = document.getElementById('website_logo_input').files[0];
                if (file_this !== null) {
                    if (file_this.size < 1000000) {
                        file_check_v = false;
                        let value = this.value;
                        let allow = ['.png', '.jpeg', '.jpg'];
                        allow.forEach(function (a) {
                            let value_check = value.toLocaleLowerCase();
                            if (value_check.indexOf(a) > 0) {
                                file_check_v = true;
                            }
                        });
                        if (file_check_v) {
                            readFile(this);
                        } else {
                            $('#website_logo_input').val('');
                            alert("Please Enter Valid Image Format");
                        }
                    } else {
                        $('#website_logo_input').val('');
                        alert("Image size should be less than 1 MB !");
                    }
                }
            });

        });
    </script>
@endsection
