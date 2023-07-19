@switch($web_content->template)
    @case('t1')
    @foreach($web_content->services as $service)
        <div class="col-md col-6 mb-5 services-img item-{{$service->id}}">
            @if(is_login_for_edit() == 1)
                <div class="services-action-div">
                    <a href="javascript:;" class="service-action-remove"
                       onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;" class="service-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <span><img src="{{checkFileExist($service->image)}}" alt=""></span>
            <h5>{{$service->title}}</h5>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-md col-6 mb-5 services-img service-add-btn-t1">
            <a herf="javascript:;"
               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}})">
                <div class="wd-md-ser-img-o">
                    <i class="fa fa-plus"></i>
                </div>
            </a>
            <h5>Add Services</h5>
        </div>
    @endif
    @break
    @case('t2')
    @foreach($web_content->services as $service)
        <div class="col-md col services-img item-{{$service->id}}">
            <div class="services-action-div">
                <a href="javascript:;" class="service-action-remove"
                   onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                        class="fa fa-trash"></i></a>
                <a herf="javascript:;" class="service-action-edit"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                        class="fa fa-edit"></i></a>
            </div>
            <a herf="javascript:;">
                <div class="wd-md-ser-img-o">
                    <img src="{{checkFileExist($service->image)}}" alt="">
                </div>
            </a>
            <h5>{{$service->title}}</h5>
        </div>
    @endforeach
    <div class="col-md col services-img">
        <a herf="javascript:;"
           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}})">
            <div class="wd-md-ser-img-o">
                <i class="fa fa-plus"></i>
            </div>
        </a>
        <h5>Add Services</h5>
    </div>
    @break
    @case('t3')
    @foreach($web_content->services as $service)
        <div class="services-box item-{{$service->id}}">
            @if(is_login_for_edit() == 1)
                <div class="services-action-div">
                    <a href="javascript:;" class="service-action-remove"
                       onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;" class="service-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <span><img src="{{checkFileExist($service->image)}}" alt=""></span>
            <h5><a href="#">{{$service->title}}</a></h5>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="services-box service-add-btn-t3">
            <a herf="javascript:;"
               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}})">
                <div class="wd-md-ser-img-o">
                    <i class="fa fa-plus"></i>
                </div>
            </a>
            <h5>Add Services</h5>
        </div>
    @endif
    @break
    @case('t4')
    @foreach($web_content->services as $service)
        <div class="col item-{{$service->id}}">
            @if(is_login_for_edit() == 1)
                <div class="services-action-div">
                    <a href="javascript:;" class="service-action-remove"
                       onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;" class="service-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="card">
                <span>{{$loop->index + 1}}</span>
                <img src="{{checkFileExist($service->image)}}">
                <h5>{{$service->title}}</h5>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col">
            <div class="service-add-btn-t4">
                <a herf="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}})">
                    <div class="wd-md-ser-img-o">
                        <i class="fa fa-plus"></i>
                    </div>
                </a>
                <h5>Add Services</h5>
            </div>
        </div>
    @endif
    @break
    @case('t5')
    @foreach($web_content->services as $service)
        <div class="services-box item-{{$service->id}}">
            @if(is_login_for_edit() == 1)
                <div class="services-action-div">
                    <a href="javascript:;" class="service-action-remove"
                       onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;" class="service-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <span><img src="{{checkFileExist($service->image)}}" alt=""></span>
            <h5><a href="#">{{$service->title}}</a></h5>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="services-box service-add-btn-t5">
            <a herf="javascript:;"
               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}})">
                <div class="wd-md-ser-img-o">
                    <i class="fa fa-plus"></i>
                </div>
            </a>
            <h5>Add Services</h5>
        </div>
    @endif
    @break
    @case('t6')
    @foreach($web_content->services as $service)
        <div class="col-md-4 item-{{$service->id}}">
            @if(is_login_for_edit() == 1)
                <div class="services-action-div">
                    <a href="javascript:;" class="service-action-remove"
                       onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;" class="service-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <img src="{{checkFileExist($service->image)}}" class="img-fluid service-img" alt="">
            <div class="card">
                <span>{{$loop->index + 1}}</span>
                <h5>{{$service->title}}</h5>
                <p>{{$service->description}}</p>
                <a href="javascript:;">Read More
                    <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.601 4.9006L7.39591 0.877541C7.34058 0.808661 7.27218 0.751397 7.19464 0.709038C7.11711 0.666679 7.03197 0.640062 6.94411 0.630715C6.85625 0.621369 6.76742 0.629478 6.68271 0.654576C6.59799 0.679675 6.51908 0.721267 6.45049 0.776964C6.38161 0.832296 6.32435 0.900696 6.28199 0.978232C6.23963 1.05577 6.21301 1.14091 6.20367 1.22877C6.19432 1.31662 6.20243 1.40546 6.22753 1.49017C6.25263 1.57488 6.29422 1.6538 6.34992 1.72238L9.21299 5.32303L6.20911 8.92367C6.15265 8.99142 6.11011 9.06965 6.08393 9.15387C6.05775 9.23808 6.04845 9.32664 6.05654 9.41446C6.06464 9.50228 6.08998 9.58764 6.13112 9.66566C6.17226 9.74367 6.22838 9.8128 6.29627 9.86909C6.41783 9.96664 6.56956 10.0188 6.7254 10.0166C6.82391 10.0168 6.92124 9.99521 7.01047 9.95349C7.09971 9.91177 7.17865 9.8509 7.24169 9.77521L10.5942 5.75215C10.6938 5.63295 10.7489 5.48289 10.7501 5.32758C10.7514 5.17227 10.6986 5.02135 10.601 4.9006Z"
                            fill="#FF5D02"/>
                        <path
                            d="M1.34953 0.878221C1.23749 0.735068 1.07318 0.642283 0.892736 0.620277C0.712292 0.598272 0.530497 0.648849 0.387343 0.760882C0.24419 0.872916 0.151404 1.03723 0.129399 1.21767C0.107393 1.39812 0.157971 1.57991 0.270004 1.72306L3.16661 5.32371L0.162722 8.91764C0.106264 8.9854 0.0637266 9.06362 0.0375469 9.14784C0.0113671 9.23206 0.00205907 9.32062 0.0101561 9.40844C0.0182531 9.49626 0.0435959 9.58162 0.084733 9.65963C0.12587 9.73764 0.181994 9.80677 0.249889 9.86306C0.370521 9.96302 0.522349 10.0176 0.679015 10.0173C0.77752 10.0174 0.874851 9.99589 0.964085 9.95417C1.05332 9.91245 1.13226 9.85159 1.19531 9.7759L4.54786 5.75283C4.64648 5.63286 4.70039 5.48237 4.70039 5.32706C4.70039 5.17175 4.64648 5.02126 4.54786 4.90128L1.34953 0.878221Z"
                            fill="#FF5D02"/>
                    </svg>
                </a>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-md col services-img service-add-btn-t6">
            <a herf="javascript:;"
               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}})">
                <div class="wd-md-ser-img-o">
                    <i class="fa fa-plus"></i>
                </div>
            </a>
            <h5>Add Services</h5>
        </div>
    @endif
    @break
    @case('t7')
    @foreach($web_content->services as $service)
        <div class="col-md-4 item-{{$service->id}}">
            @if(is_login_for_edit() == 1)
                <div class="services-action-div">
                    <a href="javascript:;" class="service-action-remove"
                       onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;" class="service-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="card-body">
                <img src="{{checkFileExist($service->image)}}">
                <h6>{{$service->title}}</h6>
                <p>{{$service->description}}</p>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-md-4 service-add-btn-t1">
            <div class="card-body">
                <a href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}})"><i
                        class="fa fa-plus"></i> </a>
            </div>
        </div>
    @endif
    @break
    @case('t8')
    @foreach($web_content->services as $service)
        <div class="col-lg-4 col-md-6 col-sm-12 item-{{$service->id}}">
            @if(is_login_for_edit() == 1)
                <div class="services-action-div">
                    <a href="javascript:;" class="service-action-remove"
                       onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;" class="service-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="services-box">
                <span><img src="{{checkFileExist($service->image)}}" alt="" class="wd-sl-imgservice"></span>
                <div class="srv-desc-box">
                    <h5><a href="#">{{$service->title}}</a></h5>
                    <p>{{$service->description}}</p>
                    <a href="#">Read more <img
                            src="{{asset('assets/web/template/t8/images/r-more.png')}}" alt=""></a>
                </div>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-lg-4 col-md-6 col-sm-12 service-add-btn-t8">
            <div class="services-box">
                <a href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}})"><i
                        class="fa fa-plus"></i>
                    <h6>Add Services</h6>
                </a>
            </div>
        </div>
    @endif
    @break
    @case('t9')
    @foreach($web_content->services as $service)
        <div class="col-md-4 col-sm-6 item-{{$service->id}}">
            @if(is_login_for_edit() == 1)
                <div class="services-action-div">
                    <a href="javascript:;" class="service-action-remove"
                       onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;" class="service-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="wd-md-serv-inner d-flex">
                <div class="wd-md-serv-img">
                    <img src="{{checkFileExist($service->image)}}" alt="" style="width: 100px">
                </div>
                <div class="wd-md-serv-blog">
                    <h3>{{$service->title}}</h3>
                    <p>{{$service->description}}</p>
                </div>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-md-4 col-sm-6 service-add-btn-t9">
            <div class="wd-md-serv-inner d-flex">
                <a href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}})"><i
                        class="fa fa-plus"></i>
                    <h6>Add Services</h6>
                </a>
            </div>
        </div>
    @endif
    @break
    @case('t10')
    @foreach($web_content->services as $service)
        <div class="col-md-4 item-{{$service->id}}">
            @if(is_login_for_edit() == 1)
                <div class="services-action-div">
                    <a href="javascript:;" class="service-action-remove"
                       onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;" class="service-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="wd-sl-servercard">
                <img src="{{checkFileExist($service->image)}}" width="100">
                <div class="service-content">
                    <h6>{{$service->title}}</h6>
                    <p>{{$service->description}}</p>
                </div>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-md-4 service-add-btn-t10">
            <div class="wd-sl-servercard">
                <div class="service-content">
                    <a href="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}})"><i
                            class="fa fa-plus"></i>
                        <h6>Add Services</h6>
                    </a>
                </div>
            </div>
        </div>
    @endif
    @break
    @case('t11')
    <div class="row services-blog services_div">
        <div class="serv-row">
            @foreach($web_content->services as $service)
                @if($loop->index == '0' || $loop->index == '1')
                    <div class="services-box item-{{$service->id}}">
                        @if(is_login_for_edit() == 1)
                            <div class="services-action-div">
                                <a href="javascript:;" class="service-action-remove"
                                   onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                                        class="fa fa-trash"></i></a>
                                <a herf="javascript:;" class="service-action-edit"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                                        class="fa fa-edit"></i></a>
                            </div>
                        @endif
                        <span><img src="{{checkFileExist($service->image)}}" alt=""></span>
                        <h5><a href="#">{{$service->title}}</a></h5>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="serv-row middile-box">
            @foreach($web_content->services as $service)
                @if($loop->index == '2')
                    <div class="services-box item-{{$service->id}}">
                        @if(is_login_for_edit() == 1)
                            <div class="services-action-div">
                                <a href="javascript:;" class="service-action-remove"
                                   onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                                        class="fa fa-trash"></i></a>
                                <a herf="javascript:;" class="service-action-edit"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                                        class="fa fa-edit"></i></a>
                            </div>
                        @endif
                        <span><img src="{{checkFileExist($service->image)}}" alt=""></span>
                        <h5><a href="#">{{$service->title}}</a></h5>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="serv-row">
            @foreach($web_content->services as $service)
                @if($loop->index >= '3')
                    <div class="services-box item-{{$service->id}}">
                        @if(is_login_for_edit() == 1)
                            <div class="services-action-div">
                                <a href="javascript:;" class="service-action-remove"
                                   onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                                        class="fa fa-trash"></i></a>
                                <a herf="javascript:;" class="service-action-edit"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                                        class="fa fa-edit"></i></a>
                            </div>
                        @endif
                        <span><img src="{{checkFileExist($service->image)}}" alt=""></span>
                        <h5><a href="#">{{$service->title}}</a></h5>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
    @break
    @case('t12')
    <div class="wd-md-services-blog services_div">
        @foreach($web_content->services as $service)
            <div class="wd-services-detail text-center item-{{$service->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="services-action-div">
                        <a href="javascript:;" class="service-action-remove"
                           onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a href="javascript:;" class="service-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}},{{$service->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="wd-services-img">
                    <img src="{{checkFileExist($service->image)}}" class="img-fluid">
                </div>
                <p>{{$service->title}}</p>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <a href="javascript:;"
               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}})">
                <div class="wd-add-services">
                    <i class="fas fa-plus"></i>
                    <p>Add Services</p>
                </div>
            </a>
        @endif
    </div>
    @break
    @case('t13')
    <ul>
        @php
            $isClassAdded = true;
        @endphp
        @foreach($web_content->services as $key=> $service)
            @php
                $class = '';
                if($isClassAdded == true){
                    $isClassAdded = false;
                }else{
                    $isClassAdded = true;
                    $class = 'odd';
                }
            @endphp
            <li class="{{$class}}">
                @if(is_login_for_edit() == 1)
                    <div class="services-action-div">
                        <a href="javascript:;" class="service-action-remove"
                           onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="service-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}},{{$service->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <a href="javascript:;" class="wd-sl-sdeatils">
                    <div class="wd-sl-sdeatils_inner">
                        <img src="{{checkFileExist($service->image)}}">
                    </div>
                </a>
                <span>{{$service->title}}</span>
            </li>
        @endforeach
        @if(is_login_for_edit() == 1)
            @php
                $class = '';
                if($isClassAdded == true){
                    $isClassAdded = false;
                }else{
                    $isClassAdded = true;
                    $class = 'odd';
                }
            @endphp
            <li class="{{$class}}">
                <a href="javascript:;" class="wd-sl-sdeatils"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}})">
                    <div class="wd-sl-sdeatils_inner">
                        <i class="fa fa-plus"></i>
                    </div>
                </a>
                <span>Add Services</span>
            </li>
        @endif
    </ul>
    @break
    @case('t15')
    @php
        $isClassAdded = true;
    @endphp
    @foreach($web_content->services as $key=> $service)
        @php
            $class = '';
            if($isClassAdded == true){
                $isClassAdded = false;
            }else{
                $isClassAdded = true;
                $class = 'odd';
            }
        @endphp
        <div class="wd-services-detail text-center item-{{$service->id}}">
            @if(is_login_for_edit() == 1)
                <div class="services-action-div">
                    <a href="javascript:;" class="service-action-remove"
                       onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a href="javascript:;" class="service-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}},{{$service->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="wd-services-img">
                <img src="{{checkFileExist($service->image)}}" class="img-fluid">
                <p>{{$service->title}}</p>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        @php
            $class = '';
            if($isClassAdded == true){
                $isClassAdded = false;
            }else{
                $isClassAdded = true;
                $class = 'odd';
            }
        @endphp
        <a href="javascript:;"
           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}})">
            <div class="wd-add-services">
                <i class="fas fa-plus"></i>
                <p>Add Services</p>
            </div>
        </a>
    @endif
    @break
    @case('t14')
    <div class="owl-carousel owl-theme owl-service">
        @php
            $isClassAdded = true;
        @endphp
        @foreach($web_content->services as $key=> $service)
            @php
                $class = 'even';
                if($isClassAdded == true){
                    $isClassAdded = false;
                }else{
                    $isClassAdded = true;
                    $class = 'odd';
                }
            @endphp
            <div class="item item-{{$service->id}}" id="{{$class}}">
                <div class="services-action-prt text-center">
                    <a href="javascript:;" class="service-action-remove"
                       onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a href="javascript:;" class="service-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}},{{$service->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
                <div class="wd-sl-services_card">
                    <img src="{{checkFileExist($service->image)}}" class="wd-sl-serviceimg">
                    <h6>{{$service->title}}</h6>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            @php
                $class = 'even';
                if($isClassAdded == true){
                    $isClassAdded = false;
                }else{
                    $isClassAdded = true;
                    $class = 'odd';
                }
            @endphp
        <!-- add services -->
            <div class="item" id="{{$class}}">
                <a href="javascript:;" class="wd-sl-services_card"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}})">
                    <img src="{{asset('assets/web/template/t14')}}/images/plus.png"
                         class="wd-sl-serviceimg mb-0">
                </a>
            </div>
        @endif
    </div>
    @break
    @case('t17')
    <div class="row mrgt_40">
        @foreach($web_content->services as $key=> $service)
            @if($loop->index == '0' || $loop->index == '1' || $loop->index == '2')
                <div class="col-md-4 item-{{$service->id}}">
                    @if(is_login_for_edit() == 1)
                        <div class="services-action-div">
                            <a href="javascript:;" class="service-action-remove"
                               onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a herf="javascript:;" class="service-action-edit"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                    @endif
                    <div class="wd-kr-services-box">
                        <div class="wd-kr-service-icn">
                            <img src="{{checkFileExist($service->image)}}" width="50">
                        </div>
                        <div class="wd-kr-service-txt">
                            <h3>{{$service->title}}</h3>
                            <p>{{$service->description}}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-10 mrgt_40 mrg_auto my-auto">
            <div class="row">
                @foreach($web_content->services as $key=> $service)
                    @if($loop->index > '2')
                        <div class="col-md-6 item-{{$service->id}}">
                            @if(is_login_for_edit() == 1)
                                <div class="services-action-div">
                                    <a href="javascript:;" class="service-action-remove"
                                       onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                                            class="fa fa-trash"></i></a>
                                    <a herf="javascript:;" class="service-action-edit"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Description'=>'textarea','Service Image'=>'file'])}},{{$service->id}})"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                            @endif
                            <div class="wd-kr-services-box">
                                <div class="wd-kr-service-icn">
                                    <img src="{{checkFileExist($service->image)}}" width="50">
                                </div>
                                <div class="wd-kr-service-txt">
                                    <h3>{{$service->title}}</h3>
                                    <p>{{$service->description}}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @if(is_login_for_edit() == 1)
                <a href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}})">
                    <div class="wd-add-services">
                        <i class="fas fa-plus"></i>
                        <p>Add Services</p>
                    </div>
                </a>
                @endif
            </div>
        </div>
    </div>
    @break
    @case('t16')
    @foreach($web_content->services as $key=> $service)
        <div class="wd-services-detail text-center item-{{$service->id}}">
            @if(is_login_for_edit() == 1)
                <div class="services-action-prt">
                    <a href="javascript:;" onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i class="fa fa-trash"></i></a>
                    <a herf="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}},{{$service->id}})"><i class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="wd-services-img">
                <img src="{{checkFileExist($service->image)}}"
                     class="img-fluid">
            </div>
            <p>{{$service->title}}</p>
        </div>
    @endforeach
    <!-- add-services -->
    @if(is_login_for_edit() == 1)
        <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}})">
            <div class="wd-add-services">
                <i class="fas fa-plus"></i>
                <p>Add Services</p>
            </div>
        </a>
    @endif
    @break
    @case('t18')
    @foreach($web_content->services as $key=> $service)
        <div class="wd-services-detail text-center item-{{$service->id}}">
            @if(is_login_for_edit() == 1)
                <div class="wd-services-action action-div d-flex align-items-center">
                    <a href="javascript:;" class="wd-edit"
                       onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a href="javascript:;" class="wd-delete"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}},{{$service->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="wd-services-img">
                <img src="{{checkFileExist($service->image)}}" class="img-fluid">
            </div>
            <p>{{$service->title}}</p>
        </div>
    @endforeach
    <!-- add-services -->
    @if(is_login_for_edit() == 1)
        <a href="javascript:;"
           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text', 'Service Image'=>'file'])}})">
            <div class="wd-add-services">
                <i class="fas fa-plus"></i>
                <p>Add Services</p>
            </div>
        </a>
    @endif
    @break
    @case('t19')
    @foreach($web_content->services as $service)
        <div class="col-md-4 item-{{$service->id}}">
            @if(is_login_for_edit() == 1)
                <div class="services-action-prt">
                    <a href="javascript:;" onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')">
                        <i class="fa fa-trash"></i>
                    </a>
                    <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}},{{$service->id}})">
                        <i class="fa fa-edit"></i>
                    </a>
                </div>
            @endif
            <div class="wd-sl-services_card">
                <img src="{{checkFileExist($service->image)}}" class="wd-sl-serviceimg">
                <h6>{{$service->title}}</h6>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-md-4">
            <a href="javascript:;" class="wd-sl-services_card" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}})">
                <i class="fas fa-plus"></i>
                <p>Add Services</p>
            </a>
        </div>
    @endif
    @break
    @case('t21')
    @foreach($web_content->services as $key => $service)
        @if($key == 0)
            <div class="col-md-4">
                <div class="wd-sl-cardservices">
                    @if(is_login_for_edit() == 1)
                        <div class="services-action-prt">
                            <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}},{{$service->id}})">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="javascript:;" onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    @endif
                    <img src="{{checkFileExist($service->image)}}">
                    <h6>{{$service->title}}</h6>
                </div>
            </div>
        @endif
    @endforeach
    <div class="col-md-4">
        <div class="wd-sl-content_center">
            <div class="wd-edit-services">
                @if(is_login_for_edit() == 1)
                    <a class="wd-edit-btn"
                       href="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services',{{json_encode(['Title'=>'text','Sub Title'=>'text'])}})"><img
                            src="{{asset('assets/web/images/edit-btn.png')}}"></a>
                @endif
            </div>
            <div class="wd-sl-titles">
                <h2 class="home_our_services_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'title')}}</h2>
                <p class="home_our_services_sub_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_services', 'sub_title')}}</p>
            </div>
        </div>
    </div>
    @foreach($web_content->services as $key => $service)
        @if($key != 0)
            <div class="col-md-4">
                <div class="wd-sl-cardservices">
                    @if(is_login_for_edit() == 1)
                        <div class="services-action-prt">
                            <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}},{{$service->id}})">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="javascript:;" onclick="remove_items({{$service->id}},'our_services_item','item-{{$service->id}}')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    @endif
                    <img src="{{checkFileExist($service->image)}}">
                    <h6>{{$service->title}}</h6>
                </div>
            </div>
        @endif
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-md-4">
            <div class="wd-sl-cardservices">
                <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_services_item',{{json_encode(['Service Title'=>'text','Service Image'=>'file'])}})">
                    <img src="{{asset('assets/web/template/t21/images')}}/home/plus.png">
                </a>
            </div>
        </div>
    @endif
    @break
@endswitch
