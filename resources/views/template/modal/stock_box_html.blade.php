@switch($web_content->template)
    @case('t1')
    @foreach($web_content->stock as $stock)
        <div class="col-lg-4 col-md-4 col-sm-12 stock-item-{{$stock->id}}">
            @if(is_login_for_edit() == 1)
                <div class="stock-action-div">
                    <a href="javascript:;" class="stock-action-remove"
                       onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;" class="stock-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="work-blog">
                <img src="{{checkFileExist($stock->image)}}" alt="">
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-lg-4 col-md-4 col-sm-12 stock-action-add-more">
            <div class="wd-md-our-work-blog-img-t1">
                <a href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i
                        class="fa fa-plus"></i> </a>
            </div>
        </div>
    @endif
    @break
    @case('t2')
    @foreach($web_content->stock as $stock)
        <div class="col-md-3 col-6 stock-item-{{$stock->id}}">
            <div class="stock-action-div">
                <a href="javascript:;" class="stock-action-remove"
                   onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                        class="fa fa-trash"></i></a>
                <a herf="javascript:;" class="stock-action-edit"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                        class="fa fa-edit"></i></a>
            </div>
            <div class="wd-md-our-work-blog-img">
                <img src="{{checkFileExist($stock->image)}}" alt="" class="img-fluid">
                <h3>{{$stock->title}}</h3>
            </div>
        </div>
    @endforeach
    <div class="col-md-3 col-6">
        <div class="wd-md-our-work-blog-img">
            <a href="javascript:;"
               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i
                    class="fa fa-plus"></i> </a>
        </div>
    </div>
    @break
    @case('t3')
    @foreach($web_content->stock as $key => $stock)
        @if($key == 0)
            <div class="col-lg-6 col-md-6 col-sm-12 stock-item-{{$stock->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="stock-action-div">
                        <a href="javascript:;" class="stock-action-remove"
                           onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="stock-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="work-blog">
                    <img src="{{checkFileExist($stock->image)}}" alt="">
                    <div class="car-details">
                        <a href="#">{{$stock->title}}</a>
                        <span>{{date('d-m-y',strtotime($stock->created_at))}}</span>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <div class="col-lg-6 col-md-6 col-sm-12 img-right-blog">
        @foreach($web_content->stock as $key => $stock)
            @if($key != 0)
                <div class="work-blog stock-item-{{$stock->id}}">
                    @if(is_login_for_edit() == 1)
                        <div class="stock-action-div">
                            <a href="javascript:;" class="stock-action-remove"
                               onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a herf="javascript:;" class="stock-action-edit"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                    @endif
                    <img src="{{checkFileExist($stock->image)}}" alt="">
                    <div class="car-details">
                        <a href="#">{{$stock->title}}</a>
                        <span>{{date('d-m-y',strtotime($stock->created_at))}}</span>
                    </div>
                </div>
            @endif
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="wd-md-our-work-blog-img-t3">
                <a href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i
                        class="fa fa-plus"></i> </a>
            </div>
        @endif
    </div>
    @break
    @case('t4')
    <div class="owl-carousel owl-theme owl-car">
        @foreach($web_content->stock as $key => $stock)
            <div class="item stock-item-{{$stock->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="stock-action-div">
                        <a href="javascript:;" class="stock-action-remove"
                           onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="stock-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <img src="{{checkFileExist($stock->image)}}">
                <h6>{{date('d-m-Y',strtotime($stock->created_at))}}</h6>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="col-md-3 col-6 stock-action-add-more">
                <div class="wd-md-our-work-blog-img-t4">
                    <a href="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i
                            class="fa fa-plus"></i> </a>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t5')
    <div id="pane-A" class="card tab-pane fade show active" role="tabpanel"
         aria-labelledby="tab-A">
        <div class="col-lg-6 col-md-6 col-sm-12">
            @foreach($web_content->stock as $key => $stock)
                @if($key == 0)
                    <div class="work-blog stock-item-{{$stock->id}}">
                        @if(is_login_for_edit() == 1)
                            <div class="stock-action-div">
                                <a href="javascript:;" class="stock-action-remove"
                                   onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                        class="fa fa-trash"></i></a>
                                <a herf="javascript:;" class="stock-action-edit"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                        class="fa fa-edit"></i></a>
                            </div>
                        @endif
                        <img src="{{checkFileExist($stock->image)}}" alt="">
                    </div>
                @endif
            @endforeach
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 img-right-blog">
            @foreach($web_content->stock as $key => $stock)
                @if($key != 0)
                    <div class="work-blog stock-item-{{$stock->id}}">
                        @if(is_login_for_edit() == 1)
                            <div class="stock-action-div">
                                <a href="javascript:;" class="stock-action-remove"
                                   onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                        class="fa fa-trash"></i></a>
                                <a herf="javascript:;" class="stock-action-edit"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                        class="fa fa-edit"></i></a>
                            </div>
                        @endif
                        <img src="{{checkFileExist($stock->image)}}" alt="">
                    </div>
                @endif
            @endforeach
            @if(is_login_for_edit() == 1)
                <div class="work-blog">
                    <div class="wd-md-our-work-blog-img-t5">
                        <a href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i
                                class="fa fa-plus"></i> </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
        <div class="col-lg-6 col-md-6 col-sm-12">
            @foreach($web_content->stock as $key => $stock)
                @if($key == 0)
                    <div class="work-blog stock-item-{{$stock->id}}">
                        @if(is_login_for_edit() == 1)
                            <div class="stock-action-div">
                                <a href="javascript:;" class="stock-action-remove"
                                   onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                        class="fa fa-trash"></i></a>
                                <a herf="javascript:;" class="stock-action-edit"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                        class="fa fa-edit"></i></a>
                            </div>
                        @endif
                        <img src="{{checkFileExist($stock->image)}}" alt="">
                    </div>
                @endif
            @endforeach
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 img-right-blog">
            @foreach($web_content->stock as $key => $stock)
                @if($key != 0)
                    <div class="work-blog stock-item-{{$stock->id}}">
                        @if(is_login_for_edit() == 1)
                            <div class="stock-action-div">
                                <a href="javascript:;" class="stock-action-remove"
                                   onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                        class="fa fa-trash"></i></a>
                                <a herf="javascript:;" class="stock-action-edit"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                        class="fa fa-edit"></i></a>
                            </div>
                        @endif
                        <img src="{{checkFileExist($stock->image)}}" alt="">
                    </div>
                @endif
            @endforeach
            @if(is_login_for_edit() == 1)
                <div class="work-blog">
                    <div class="wd-md-our-work-blog-img-t5">
                        <a href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i
                                class="fa fa-plus"></i> </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @break
    @case('t6')
    <div class="col-md-4">
        @foreach($web_content->stock as $key => $stock)
            @if($loop->index <= 2)
                <div class="wd-md-stock-img stock-item-{{$stock->id}}">
                    @if(is_login_for_edit() == 1)
                        <div class="stock-action-div">
                            <a href="javascript:;" class="stock-action-remove"
                               onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a herf="javascript:;" class="stock-action-edit"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                    @endif
                    <img src="{{checkFileExist($stock->image)}}" class="img-fluid">
                    <div class="wd-md-stock-inner">
                        <h3>{{$stock->title}}</h3>
                        <p>{{$stock->title}}</p>
                        <a href="javascript:;" class="wd-readmore">Read More
                            <svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.5184 4.62521L8.31339 0.60215C8.25806 0.533271 8.18966 0.476006 8.11212 0.433647C8.03459 0.391289 7.94945 0.364671 7.86159 0.355325C7.77373 0.345978 7.6849 0.354087 7.60019 0.379186C7.51547 0.404284 7.43656 0.445877 7.36797 0.501573C7.29909 0.556906 7.24183 0.625306 7.19947 0.702841C7.15711 0.780377 7.13049 0.865519 7.12115 0.953375C7.1118 1.04123 7.11991 1.13007 7.14501 1.21478C7.17011 1.29949 7.2117 1.37841 7.2674 1.44699L10.1305 5.04763L7.12659 8.64828C7.07013 8.71603 7.02759 8.79426 7.00141 8.87848C6.97523 8.96269 6.96593 9.05125 6.97402 9.13907C6.98212 9.22689 7.00746 9.31225 7.0486 9.39026C7.08974 9.46828 7.14586 9.53741 7.21376 9.5937C7.33531 9.69125 7.48704 9.74341 7.64288 9.74121C7.74139 9.74137 7.83872 9.71982 7.92795 9.6781C8.01719 9.63638 8.09613 9.57551 8.15918 9.49982L11.5117 5.47676C11.6113 5.35756 11.6664 5.2075 11.6676 5.05219C11.6688 4.89688 11.6161 4.74596 11.5184 4.62521Z"
                                    fill="white"/>
                                <path
                                    d="M2.26701 0.602831C2.15497 0.459677 1.99066 0.366892 1.81022 0.344887C1.62977 0.322881 1.44798 0.373459 1.30482 0.485492C1.16167 0.597525 1.06888 0.761837 1.04688 0.942281C1.02487 1.12273 1.07545 1.30452 1.18748 1.44767L4.08409 5.04832L1.0802 8.64225C1.02374 8.71001 0.981207 8.78823 0.955027 8.87245C0.928848 8.95667 0.91954 9.04523 0.927637 9.13305C0.935734 9.22087 0.961076 9.30623 1.00221 9.38424C1.04335 9.46225 1.09947 9.53138 1.16737 9.58767C1.288 9.68763 1.43983 9.7422 1.5965 9.74189C1.695 9.74205 1.79233 9.7205 1.88157 9.67878C1.9708 9.63706 2.04975 9.57619 2.11279 9.50051L5.46534 5.47744C5.56396 5.35747 5.61787 5.20697 5.61787 5.05167C5.61787 4.89636 5.56396 4.74587 5.46534 4.62589L2.26701 0.602831Z"
                                    fill="white"/>
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="col-md-4">
        @foreach($web_content->stock as $key => $stock)
            @if($loop->index == 3 || $loop->index == 4)
                <div class="wd-md-stock-img stock-item-{{$stock->id}}">
                    @if(is_login_for_edit() == 1)
                        <div class="stock-action-div">
                            <a href="javascript:;" class="stock-action-remove"
                               onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a herf="javascript:;" class="stock-action-edit"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                    @endif
                    <img src="{{checkFileExist($stock->image)}}" class="img-fluid">
                    <div class="wd-md-stock-inner">
                        <h3>{{$stock->title}}</h3>
                        <p>{{$stock->title}}</p>
                        <a href="javascript:;" class="wd-readmore">Read More
                            <svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.5184 4.62521L8.31339 0.60215C8.25806 0.533271 8.18966 0.476006 8.11212 0.433647C8.03459 0.391289 7.94945 0.364671 7.86159 0.355325C7.77373 0.345978 7.6849 0.354087 7.60019 0.379186C7.51547 0.404284 7.43656 0.445877 7.36797 0.501573C7.29909 0.556906 7.24183 0.625306 7.19947 0.702841C7.15711 0.780377 7.13049 0.865519 7.12115 0.953375C7.1118 1.04123 7.11991 1.13007 7.14501 1.21478C7.17011 1.29949 7.2117 1.37841 7.2674 1.44699L10.1305 5.04763L7.12659 8.64828C7.07013 8.71603 7.02759 8.79426 7.00141 8.87848C6.97523 8.96269 6.96593 9.05125 6.97402 9.13907C6.98212 9.22689 7.00746 9.31225 7.0486 9.39026C7.08974 9.46828 7.14586 9.53741 7.21376 9.5937C7.33531 9.69125 7.48704 9.74341 7.64288 9.74121C7.74139 9.74137 7.83872 9.71982 7.92795 9.6781C8.01719 9.63638 8.09613 9.57551 8.15918 9.49982L11.5117 5.47676C11.6113 5.35756 11.6664 5.2075 11.6676 5.05219C11.6688 4.89688 11.6161 4.74596 11.5184 4.62521Z"
                                    fill="white"/>
                                <path
                                    d="M2.26701 0.602831C2.15497 0.459677 1.99066 0.366892 1.81022 0.344887C1.62977 0.322881 1.44798 0.373459 1.30482 0.485492C1.16167 0.597525 1.06888 0.761837 1.04688 0.942281C1.02487 1.12273 1.07545 1.30452 1.18748 1.44767L4.08409 5.04832L1.0802 8.64225C1.02374 8.71001 0.981207 8.78823 0.955027 8.87245C0.928848 8.95667 0.91954 9.04523 0.927637 9.13305C0.935734 9.22087 0.961076 9.30623 1.00221 9.38424C1.04335 9.46225 1.09947 9.53138 1.16737 9.58767C1.288 9.68763 1.43983 9.7422 1.5965 9.74189C1.695 9.74205 1.79233 9.7205 1.88157 9.67878C1.9708 9.63706 2.04975 9.57619 2.11279 9.50051L5.46534 5.47744C5.56396 5.35747 5.61787 5.20697 5.61787 5.05167C5.61787 4.89636 5.56396 4.74587 5.46534 4.62589L2.26701 0.602831Z"
                                    fill="white"/>
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="col-md-4">
        @foreach($web_content->stock as $key => $stock)
            @if($loop->index >= 5)
                <div class="wd-md-stock-img stock-item-{{$stock->id}}">
                    @if(is_login_for_edit() == 1)
                        <div class="stock-action-div">
                            <a href="javascript:;" class="stock-action-remove"
                               onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a herf="javascript:;" class="stock-action-edit"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                    @endif
                    <img src="{{checkFileExist($stock->image)}}" class="img-fluid">
                    <div class="wd-md-stock-inner">
                        <h3>{{$stock->title}}</h3>
                        <p>{{$stock->title}}</p>
                        <a href="javascript:;" class="wd-readmore">Read More
                            <svg width="12" height="10" viewBox="0 0 12 10" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11.5184 4.62521L8.31339 0.60215C8.25806 0.533271 8.18966 0.476006 8.11212 0.433647C8.03459 0.391289 7.94945 0.364671 7.86159 0.355325C7.77373 0.345978 7.6849 0.354087 7.60019 0.379186C7.51547 0.404284 7.43656 0.445877 7.36797 0.501573C7.29909 0.556906 7.24183 0.625306 7.19947 0.702841C7.15711 0.780377 7.13049 0.865519 7.12115 0.953375C7.1118 1.04123 7.11991 1.13007 7.14501 1.21478C7.17011 1.29949 7.2117 1.37841 7.2674 1.44699L10.1305 5.04763L7.12659 8.64828C7.07013 8.71603 7.02759 8.79426 7.00141 8.87848C6.97523 8.96269 6.96593 9.05125 6.97402 9.13907C6.98212 9.22689 7.00746 9.31225 7.0486 9.39026C7.08974 9.46828 7.14586 9.53741 7.21376 9.5937C7.33531 9.69125 7.48704 9.74341 7.64288 9.74121C7.74139 9.74137 7.83872 9.71982 7.92795 9.6781C8.01719 9.63638 8.09613 9.57551 8.15918 9.49982L11.5117 5.47676C11.6113 5.35756 11.6664 5.2075 11.6676 5.05219C11.6688 4.89688 11.6161 4.74596 11.5184 4.62521Z"
                                    fill="white"/>
                                <path
                                    d="M2.26701 0.602831C2.15497 0.459677 1.99066 0.366892 1.81022 0.344887C1.62977 0.322881 1.44798 0.373459 1.30482 0.485492C1.16167 0.597525 1.06888 0.761837 1.04688 0.942281C1.02487 1.12273 1.07545 1.30452 1.18748 1.44767L4.08409 5.04832L1.0802 8.64225C1.02374 8.71001 0.981207 8.78823 0.955027 8.87245C0.928848 8.95667 0.91954 9.04523 0.927637 9.13305C0.935734 9.22087 0.961076 9.30623 1.00221 9.38424C1.04335 9.46225 1.09947 9.53138 1.16737 9.58767C1.288 9.68763 1.43983 9.7422 1.5965 9.74189C1.695 9.74205 1.79233 9.7205 1.88157 9.67878C1.9708 9.63706 2.04975 9.57619 2.11279 9.50051L5.46534 5.47744C5.56396 5.35747 5.61787 5.20697 5.61787 5.05167C5.61787 4.89636 5.56396 4.74587 5.46534 4.62589L2.26701 0.602831Z"
                                    fill="white"/>
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    @break
    @case('t7')
    @foreach($web_content->stock as $key => $stock)
        <div class="col-md-3 stock-item-{{$stock->id}}">
            @if(is_login_for_edit() == 1)
                <div class="t7-service-box">
                    <div class="stock-action-div">
                        <a href="javascript:;" class="stock-action-remove"
                           onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="stock-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                </div>
            @endif
            <a href="javascript:;" id="parent">
                <img src="{{checkFileExist($stock->image)}}">
                <div id="hover-content">
                    <h5>{{$stock->title}}</h5>
                    <p>test</p>
                </div>
            </a>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-md-3 stock-action-add-more">
            <div class="wd-md-our-work-blog-img-t7">
                <a href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i
                        class="fa fa-plus"></i>
                    <h6>Add Stock</h6>
                </a>
            </div>
        </div>
    @endif
    @break
    @case('t8')
    @foreach($web_content->stock as $key => $stock)
        @if($key == '0')
            <div class="card-row stock-item-{{$stock->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="stock-action-div">
                        <a href="javascript:;" class="stock-action-remove"
                           onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="stock-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="col-lg-6 col-md-12 work-img">
                    <span><img src="{{checkFileExist($stock->image)}}" alt=""></span>
                </div>
                <div class="col-lg-6 col-md-12 work-desc">
                    <h4>{{$stock->title}}</h4>
                    <strong>{{$stock->title}}</strong>
                    <p>{{$stock->title}}</p>
                </div>
            </div>
        @endif
    @endforeach
    @foreach($web_content->stock as $key => $stock)
        @if($key == '1')
            <div class="card-row card-two stock-item-{{$stock->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="stock-action-div">
                        <a href="javascript:;" class="stock-action-remove"
                           onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="stock-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="col-lg-6 col-md-12 work-img">
                    <span><img src="{{checkFileExist($stock->image)}}" alt=""></span>
                </div>
                <div class="col-lg-6 col-md-12 work-desc">
                    <h4>{{$stock->title}}</h4>
                    <strong>{{$stock->title}}</strong>
                    <p>{{$stock->title}}</p>
                </div>
            </div>
        @endif
    @endforeach
    <div class="card-grid-row row">
        @foreach($web_content->stock as $key => $stock)
            @if($key >= '2')
                <div class="col-lg-6 col-md-12 stock-item-{{$stock->id}}">
                    @if(is_login_for_edit() == 1)
                        <div class="stock-action-div">
                            <a href="javascript:;" class="stock-action-remove"
                               onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a herf="javascript:;" class="stock-action-edit"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                    @endif
                    <div class="card-row">
                        <div class="work-img">
                            <span><img src="{{checkFileExist($stock->image)}}" alt=""></span>
                        </div>
                        <div class="work-desc">
                            <h4>{{$stock->title}}</h4>
                            <strong>{{$stock->title}}</strong>
                            <p>{{$stock->title}}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="col-lg-6 col-md-12 stock-action-add-more">
                <div class="wd-md-our-work-blog-img-t8">
                    <a href="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})"><i
                            class="fa fa-plus"></i>
                        <h6>Add Stock</h6>
                    </a>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t9')
    <div class="col-md-3">
        @foreach($web_content->stock as $key => $stock)
            @if($key == '0')
                <div class="wd-md-stock-img stock-item-{{$stock->id}}">
                    @if(is_login_for_edit() == 1)
                        <div class="stock-action-div">
                            <a href="javascript:;" class="stock-action-remove"
                               onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a herf="javascript:;" class="stock-action-edit"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                    @endif
                    <img src="{{checkFileExist($stock->image)}}" alt="" class="img-fluid">
                </div>
            @endif
        @endforeach
        @foreach($web_content->stock as $key => $stock)
            @if($key == '1')
                <div class="wd-md-stock-img rec-sec-img stock-item-{{$stock->id}}">
                    @if(is_login_for_edit() == 1)
                        <div class="stock-action-div">
                            <a href="javascript:;" class="stock-action-remove"
                               onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a herf="javascript:;" class="stock-action-edit"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                    @endif
                    <img src="{{checkFileExist($stock->image)}}" alt="" class="img-fluid">
                </div>
            @endif
        @endforeach
    </div>
    @foreach($web_content->stock as $key => $stock)
        @if($key == '2' || $key == '3')
            <div class="col-md-3 stock-item-{{$stock->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="stock-action-div">
                        <a href="javascript:;" class="stock-action-remove"
                           onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="stock-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="wd-md-stock-center-img">
                    <img src="{{checkFileExist($stock->image)}}" alt="" class="img-fluid">
                </div>
            </div>
        @endif
    @endforeach
    <div class="col-md-3">
        @foreach($web_content->stock as $key => $stock)
            @if($key >= '4')
                <div class="wd-md-stock-img stock-item-{{$stock->id}}">
                    @if(is_login_for_edit() == 1)
                        <div class="stock-action-div">
                            <a href="javascript:;" class="stock-action-remove"
                               onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a herf="javascript:;" class="stock-action-edit"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                    @endif
                    <img src="{{checkFileExist($stock->image)}}" alt="" class="img-fluid">
                </div>
            @endif
        @endforeach
    </div>
    @break
    @case('t10')
    @foreach($web_content->stock as $key => $stock)
        <div class="col-md-4 stock-item-{{$stock->id}}">
            @if(is_login_for_edit() == 1)
                <div class="stock-action-div">
                    <a href="javascript:;" class="stock-action-remove"
                       onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;" class="stock-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="card">
                <img src="{{checkFileExist($stock->image)}}">
                <h5>{{$stock->title}}</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <span>CATEGORY : </span>
                        <span>{{$stock->category}}</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <span>TRANSMISSION : </span>
                        <span>{{$stock->transmission}}</span>
                    </div>
                    <div class="col-md-6">
                        <span>FUEL</span>
                        <span>{{$stock->fuel}}</span>
                    </div>
                    <div class="col-md-6">
                        <span>BHP</span>
                        <span>{{$stock->bhp}}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @break
    @case('t11')
    <div id="stock-slider" class="owl-carousel">
        @foreach($web_content->stock as $stock)
            <div class="stock-item stock-item-{{$stock->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="stock-action-div">
                        <a href="javascript:;" class="stock-action-remove"
                           onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="stock-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <h4>{{$stock->title}}</h4>
                <img src="{{checkFileExist($stock->image)}}" alt="">
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="stock-item stock-action-add-more">
                <div class="wd-md-our-work-blog-img-t11">
                    <a href="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})"><i
                            class="fa fa-plus"></i>
                        <h4>Add Stock</h4>
                    </a>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t12')
    @foreach($web_content->stock as $key => $stock)
        @if($key == 0)
            <div class="col-lg-6 stock-item-{{$stock->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="stock-action-div">
                        <a href="javascript:;" class="stock-action-remove"
                           onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="stock-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="wd-rec-sto-img-main">
                    <img src="{{checkFileExist($stock->image)}}" class="img-fluid wd-main-img">
                    <div class="wd-md-car-description d-flex align-items-end justify-content-between">
                        <div class="car-name">
                            <h6>{{$stock->title}}</h6>
                            <p>{{$stock->category}}</p>
                        </div>
                        <div class="car-price">
                            <p>£41,855.26</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    <div class="col-lg-6">
        <div class="wd-md-rec-sto-img-right">
            <div class="row">
                @foreach($web_content->stock as $key => $stock)
                    @if($key != 0)
                        <div class="col-lg-6">
                            @if(is_login_for_edit() == 1)
                                <div class="stock-action-div">
                                    <a href="javascript:;" class="stock-action-remove"
                                       onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                            class="fa fa-trash"></i></a>
                                    <a herf="javascript:;" class="stock-action-edit"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                            @endif
                            <div class="rec-sto-right-img">
                                <img src="{{checkFileExist($stock->image)}}" class="img-fluid">
                            </div>
                        </div>
                    @endif
                @endforeach
                @if(is_login_for_edit() == 1)
                    <div class="col-lg-6">
                        <a href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','Image'=>'file'])}})">
                            <div class="wd-add-stock">
                                <i class="fas fa-plus"></i>
                                <p>Add Stock</p>
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @break
    @case('t13')
    <div class="owl-stock owl-carousel owl-theme">
        @foreach($web_content->stock as $stock)
            <div class="item stock-item-{{$stock->id}}">
                <div class="wd-sl-stocks">
                    @if(is_login_for_edit() == 1)
                        <div class="stock-action-div">
                            <a href="javascript:;" class="stock-action-remove"
                               onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a herf="javascript:;" class="stock-action-edit"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                    @endif
                    <img src="{{checkFileExist($stock->image)}}"/>
                    <div class="wd-sl-stock_content">
                        <div class="wd-sl-stock_top">
                            <img src="{{checkFileExist($stock->image)}}"/>
                            <div class="wd-sl-stock_topright">
                                <span>{{$stock->title}}</span>
                            </div>
                        </div>
                        <div class="wd-sl-stock_middle">
                            <div class="wd-sl-stockmiddle_inner">
                                <small>Category</small>
                                <span>{{$stock->category}}</span>
                            </div>
                            <div class="wd-sl-stockmiddle_inner">
                                <small>BHP</small>
                                <span>{{$stock->bhp}}</span>
                            </div>
                            <div class="wd-sl-stockmiddle_inner">
                                <small>Fuel</small>
                                <span>{{$stock->fuel}}</span>
                            </div>
                            <div class="wd-sl-stockmiddle_inner">
                                <small>Transmission</small>
                                <span>{{$stock->transmission}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endforeach
    <!-- ADD STOCKS -->
        <div class="item stock-action-add-more">
            <div class="wd-sl-stocks">
                <a href="javascript:;" class="wd-sl-add_stocks"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})">
                    <img src="{{asset('assets/web/template/t13')}}/images/home/plus.png">
                </a>
            </div>
        </div>
    </div>
    @break
    @case('t14')
    @foreach($web_content->stock as $stock)
        <div class="col-md-4 stock-item-{{$stock->id}}">
            @if(is_login_for_edit() == 1)
                <div class="stock-action-prt text-center">
                    <a href="javascript:;" class="stock-action-remove"
                       onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a href="javascript:;" class="stock-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="wd-sl-stocks">
                <img src="{{checkFileExist($stock->image)}}">
                <div class="wd-sl-stock_content">
                    <div class="wd-sl-stock_top">
                        <img src="{{checkFileExist($stock->image)}}">
                        <div class="wd-sl-stock_topright">
                            <span>{{$stock->title}}</span>
                            {{--<small>Hatchback 2.5 RS 500 3DR</small>--}}
                        </div>
                    </div>
                    <div class="wd-sl-stock_middle">
                        <div class="wd-sl-stockmiddle_inner">
                            <small>FUEL</small>
                            <span>{{$stock->fuel}}</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>BHP</small>
                            <span>{{$stock->bhp}}</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>Category</small>
                            <span>{{$stock->category}}</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>Transmission</small>
                            <span>{{$stock->transmission}}</span>
                        </div>
                        {{--<div class="wd-sl-stockmiddle_inner">
                            <small>YEAR</small>
                            <span>2019</span>
                        </div>--}}
                    </div>
                    {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum </p>--}}
                    {{--<h4>£41,855.26</h4>--}}
                </div>
            </div>
        </div>
    @endforeach
    @break
    @case('t15')
    @foreach($web_content->stock as $key => $stock)
        <div class="feature-slide active d-flex align-items-center justify-content-center stock-item-{{$stock->id}}">
            <div class="wd-slide-left block-wrap w50 center-content mob-auto">
                <div class="content-centered overview-text">
                    <img src="{{checkFileExist($stock->image)}}">
                    <h2 class="car-name">{{$stock->title}}</h2>
                    <span class="car-price">{{$stock->category}} {{$stock->bhp}} RS {{$stock->fuel}} 3DR</span>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and more recently with desktop publishing software like Aldus PageMaker including versions of
                        Lorem Ipsum.</p>
                </div>
            </div>
            <div class="wd-slide-right block-wrap w50 new-feature-image-wrap mob-auto">
                <div class="feature-slide-image">
                    <div class="wd-car-slide-box">
                        @if(is_login_for_edit() == 1)
                            <div class="stock-action-prt text-center">
                                <a href="javascript:;" class="stock-action-remove"
                                   onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                        class="fa fa-trash"></i></a>
                                <a herf="javascript:;" class="stock-action-edit"
                                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                        class="fa fa-edit"></i></a>
                            </div>
                        @endif
                        <h2 class="home_our_recent_stock_title">{{get_web_content_detail($web_content->id, $web_content->template, 'home', 'our_recent_stock', 'title')}}</h2>
                        <img src="{{checkFileExist($stock->image)}}">
                        <div class="wd-car-inner-des">
                            <div class="wd-car-slide-detail d-flex align-items-center justify-content-between">
                                <div class="wd-car-name-blog">
                                    <h6>{{$stock->title}}</h6>
                                    <span>{{$stock->category}} {{$stock->bhp}} RS {{$stock->fuel}} 3DR</span>
                                </div>
                                <p>£41,855.26</p>
                            </div>
                            <div class="wd-car-view-detail d-flex align-items-center justify-content-between">
                                <a href="javascript:;" class="wd-view-btn">View Details</a>
                                <div class="controls new-feature-controls">
                                    <span class="control button-prev"><i class="fas fa-angle-left"></i></span>
                                    <span class="control button-next"><i class="fas fa-chevron-right"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    >>>>>>> origin/pratik
                </div>
            </div>
        </div>
    @endforeach
    <div class="feature-slide">
        @if(is_login_for_edit() == 1)
            <a href="javascript:;" class="wd-sl-add_stocks"
               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})">
                <div class="wd-add-recent-stock">
                    <i class="fas fa-plus"></i>
                    <h6>Add Stock</h6>
                </div>
            </a>
        @endif
        <div class="wd-car-view-detail d-flex align-items-center justify-content-center">
            <div class="controls new-feature-controls">
                <span class="control button-prev"><i class="fas fa-angle-left"></i></span>
                <span class="control button-next"><i class="fas fa-chevron-right"></i></span>
            </div>
        </div>
    </div>
    @break
    @case('t16')
    @foreach($web_content->stock as $stock)
        <div class="col-md-4 stock-item-{{$stock->id}}">
            @if(is_login_for_edit() == 1)
                <div class="services-action-prt text-center">
                    <a href="javascript:;"
                       onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="wd-kr-stocks">
                <div class="wd-kr-toyota-img">
                    <img src="{{checkFileExist($stock->image)}}">
                </div>
                <div class="wd-kr-stock_content">
                    <div class="wd-kr-stock_top">
                        <div class="wd-kr-stock_topright text-center">
                            <span>{{$stock->title}}</span>
                            {{--<small>Hatchback 2.5 RS 500 3DR</small>--}}
                        </div>
                    </div>
                    <div class="wd-kr-stock_middle">
                        <div class="wd-kr-stockmiddle_inner">
                            <small>FUEL</small>
                            <span>{{$stock->fuel}}</span>
                        </div>
                        <div class="wd-kr-stockmiddle_inner">
                            <small>BHP</small>
                            <span>{{$stock->bhp}}</span>
                        </div>
                        <div class="wd-kr-stockmiddle_inner">
                            <small>Category</small>
                            <span>{{$stock->category}}</span>
                        </div>
                        <div class="wd-kr-stockmiddle_inner">
                            <small>Transmission</small>
                            <span>{{$stock->transmission}}</span>
                        </div>
                        {{--<div class="wd-kr-stockmiddle_inner">
                            <small>YEAR</small>
                            <span>2019</span>
                        </div>--}}
                    </div>
                    {{--<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                        Lorem
                        Ipsum </p>--}}
                    {{--<h4>£41,855.26</h4>--}}
                </div>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-md-4 mrgt_30">
            <div class="wd-kr-stock-add">
                <a href="javascript:;" class="mrg-t"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})"><i
                        class="fa fa-plus"></i> </a>
            </div>
        </div>
    @endif
    @break
    @case('t17')
    <div class="row">
        @foreach($web_content->stock as $stock)
            <div class="col-md-4 stock-item-{{$stock->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="services-action-prt text-center">
                        <a href="javascript:;" class="stock-action-remove"
                           onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="stock-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="wd-kr-stocks">
                    <div class="wd-kr-stock-car-img">
                        <img src="{{checkFileExist($stock->image)}}"/>
                    </div>
                    <div class="wd-kr-stock_content">
                        <div class="wd-kr-stock_top">
                            <div class="wd-kr-stock_topright text-center">
                                <span>{{$stock->title}}</span>
                                <small>{{$stock->category}} 2.5 RS 500 3DR</small>
                            </div>
                        </div>
                        <div class="wd-kr-stock_middle">
                            <div class="wd-kr-stockmiddle_inner">
                                <small>FUEL</small>
                                <span>{{$stock->fuel}}</span>
                            </div>
                            <div class="wd-kr-stockmiddle_inner">
                                <small>BHP</small>
                                <span>{{$stock->bhp}}</span>
                            </div>
                            <div class="wd-kr-stockmiddle_inner">
                                <small>TORQUE</small>
                                <span>380N·m</span>
                            </div>
                            <div class="wd-kr-stockmiddle_inner">
                                <small>CC</small>
                                <span>1984CC</span>
                            </div>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum </p>
                        <h4>£41,855.26</h4>
                    </div>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="stock-item stock-action-add-more">
                <div class="wd-md-our-work-blog-img-t11">
                    <a href="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})"><i
                            class="fa fa-plus"></i>
                        <h4>Add Stock</h4>
                    </a>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t18')
    @foreach($web_content->stock as $stock)
        <div class="col-lg-4 col-md-6">
            @if(is_login_for_edit() == 1)
                <div class="wd-stock-action action-div d-flex align-items-center">
                    <a href="javascript:;" class="wd-edit"
                       onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;" class="wd-delete"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="wd-sl-stocks">
                <div class="wd-md-stock-img">
                    {{--<img src="{{checkFileExist($stock->image)}}" class="stock-car-img">--}}
                    <img src="{{checkFileExist($stock->image)}}" class="stock-car-img">
                </div>
                <div class="wd-sl-stock_content">
                    <div class="wd-sl-stock_top">
                        <div class="wd-sl-stock_topright">
                            <span>{{$stock->title}}</span>
                            <small>{{$stock->category}} 2.5 RS 500 3DR</small>
                        </div>
                    </div>
                    <div class="wd-sl-stock_middle">
                        <div class="wd-sl-stockmiddle_inner">
                            <small>FUEL</small>
                            <span>{{$stock->fuel}}</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>BHP</small>
                            <span>{{$stock->bhp}}</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>TORQUE</small>
                            <span>380N·m</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>CO2</small>
                            <span>153</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>YEAR</small>
                            <span>2019</span>
                        </div>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum </p>
                    <h4>£41,855.26</h4>
                </div>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-lg-4 col-md-6">
            <a href="javascript:;"
               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})">
                <div class="wd-add-stock">
                    <i class="fas fa-plus"></i>
                    <p>Add Stock</p>
                </div>
            </a>
        </div>
    @endif
    @break
    @case('t19')
    <div class="owl-stock owl-carousel owl-theme">
    @foreach($web_content->stock as $key => $stock)
        <div class="item stock-item-{{$stock->id}}">
            @if(is_login_for_edit() == 1)
                <div class="stock-action-prt text-center">
                    <a href="javascript:;" onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')">
                        <i class="fa fa-trash"></i>
                    </a>
                    <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})">
                        <i class="fa fa-edit"></i>
                    </a>
                </div>
            @endif
            <div class="wd-sl-stocks">
                <img src="{{checkFileExist($stock->image)}}">
                <div class="wd-sl-stock_content">
                    <div class="wd-sl-stock_top">
                        <img src="{{checkFileExist($stock->image)}}">
                        <div class="wd-sl-stock_topright">
                            <span>{{$stock->title}}</span>
                            <small>{{$stock->category}} 2.5 RS 500 3DR</small>
                        </div>
                    </div>
                    <div class="wd-sl-stock_middle">
                        <div class="wd-sl-stockmiddle_inner">
                            <small>FUEL</small>
                            <span>{{$stock->fuel}}</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>BHP</small>
                            <span>{{$stock->bhp}}</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>TORQUE</small>
                            <span>380N·m</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>CO2</small>
                            <span>153</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>YEAR</small>
                            <span>2019</span>
                        </div>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum </p>
                    <h4>£41,855.26</h4>
                </div>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="item">
            <div class="wd-sl-stocks">
                <a href="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})">
                    <img src="{{asset('assets/web/template/t19/images/home/plus.png')}}">
                </a>
            </div>
        </div>
    @endif
    </div>
    @break
    @case('t20')
    @foreach($web_content->stock as $key => $stock)
        <div class="col-lg-4 col-md-6 stock-item-{{$stock->id}}">
            @if(is_login_for_edit() == 1)
                <div class="wd-stock-action action-div d-flex align-items-center">
                    <a href="javascript:;" class="wd-edit" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="javascript:;" class="wd-delete" onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            @endif
            <div class="wd-sl-stocks">
                <div class="wd-car-logo-blog">
                    {{--<img src="{{checkFileExist($stock->image)}}" class="wd-logo-img">--}}
                    <img src="{{checkFileExist($stock->image)}}" class="wd-car-img">
                </div>
                <div class="wd-sl-stock_content">
                    <div class="wd-sl-stock_topright">
                        <span>{{$stock->title}}</span>
                        <small>{{$stock->category}} 2.5 RS 500 3DR</small>
                    </div>
                    <div class="wd-sl-stock_middle">
                        <div class="wd-sl-stockmiddle_inner">
                            <small>INSURANCE:</small>
                            <span>Group 34</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>FUEL</small>
                            <span>{{$stock->fuel}}</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>CO2</small>
                            <span>153</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>TORQUE</small>
                            <span>380N·m</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>YEAR</small>
                            <span>2019</span>
                        </div>
                        <div class="wd-sl-stockmiddle_inner">
                            <small>BHP</small>
                            <span>{{$stock->bhp}}</span>
                        </div>
                    </div>
                    <div class="wd-price-blgo d-flex align-items-center justify-content-between">
                        <h4>$25,000</h4>
                        <span>
                                    <svg width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.00434 10.0233L6.93664 9.58707C7.805 9.58707 8.50899 8.87769 8.50899 7.99941C8.50899 7.1226 7.805 6.41175 6.93664 6.41175L2.00434 5.97555C0.897443 5.97555 -3.98572e-07 6.88173 -3.49717e-07 7.99941C-3.00862e-07 9.11709 0.897443 10.0233 2.00434 10.0233ZM23.3521 9.66649C23.4204 9.59149 23.4728 9.53398 23.4996 9.50688C23.8269 9.07802 24 8.5537 24 7.98972C24 7.48449 23.8458 6.97925 23.5375 6.57096C23.3396 6.2875 22.8829 5.8322 22.8829 5.8322C21.2655 4.06242 17.2423 1.39967 15.2016 0.543418C15.2016 0.525793 13.9885 0.0190919 13.411 -5.86215e-07L13.3339 -5.82845e-07C12.4481 -5.44125e-07 11.6205 0.505231 11.1972 1.32183C11.0224 1.65947 10.8583 2.48677 10.7805 2.87896C10.7554 3.00539 10.7393 3.0866 10.7347 3.09161C10.5616 4.25776 10.4467 6.04663 10.4467 8.00881C10.4467 10.0709 10.5616 11.9361 10.7725 13.0832C10.7725 13.1023 10.9849 14.1524 11.1202 14.5019C11.3325 15.0072 11.7165 15.436 12.198 15.7077C12.5834 15.9016 12.9878 16 13.411 16C13.8547 15.9794 14.6823 15.6886 15.0096 15.552C17.1652 14.6958 21.2859 11.8979 22.864 10.1869C23.0404 10.0088 23.2242 9.80697 23.3521 9.66649Z" fill="#6A52FE"/>
                                    </svg>
                                </span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-lg-4 col-md-6">
            <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})">
                <div class="wd-md-add-stock">
                    <i class="fas fa-plus"></i>
                    <p>Add Stock</p>
                </div>
            </a>
        </div>
    @endif
    @break
    @case('t21')
    <div class="owl-stock owl-carousel owl-theme">
        @foreach($web_content->stock as $key => $stock)
            <div class="item stock-item-{{$stock->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="stock-action-prt text-right">
                        <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}},{{$stock->id}})">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="javascript:;" onclick="remove_items({{$stock->id}},'our_recent_stock_item','stock-item-{{$stock->id}}')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                @endif
                <div class="wd-sl-homestock">
                    <div class="wd-sl-stockh_top">
                        {{--<img src="./assets/images/home/st_logo1.png" class="carstock_logo">--}}
                        <img src="{{checkFileExist($stock->image)}}" class="carstock_img">
                    </div>
                    <div class="wd-sl-stockh_grid">
                        <h6>{{$stock->title}}</h6>
                        <ul>
                            <li>
                                <small>Fuel</small>
                                <span>{{$stock->fuel}}</span>
                            </li>
                            <li>
                                <small>BHP</small>
                                <span>{{$stock->bhp}}</span>
                            </li>
                            <li>
                                <small>Year</small>
                                <span>2021</span>
                            </li>
                            <li>
                                <small>CO2</small>
                                <span>152</span>
                            </li>
                        </ul>
                    </div>
                    <div class="wd-sl-stockh_detail text-center mt-3">
                        <a href="javascript:;">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="item">
                <div class="wd-sl-homestock">
                    <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','our_recent_stock_item',{{json_encode(['Title'=>'text','category'=>'text','transmission'=>'text','fuel'=>'text','bhp'=>'text','Image'=>'file'])}})" class="wd-sl-add_stocks">
                        <img src="{{asset('assets/web/template/t21/images')}}/home/plus.png">
                    </a>
                </div>
            </div>
        @endif
    </div>
    @break
@endswitch
