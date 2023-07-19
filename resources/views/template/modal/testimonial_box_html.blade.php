@switch($web_content->template)
    @case('t1')
    <div class="owl-carousel">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item item1 testimonial-item-{{$testimonial->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="testimonial-action-div">
                        <a href="javascript:;" class="testimonial-action-remove"
                           onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="testimonial-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="slide-box green">
                    <h5>{{$testimonial->label}}</h5>
                    <h3>{{$testimonial->author_name}}</h3>
                    <p>{{$testimonial->description}}</p>
                    <div class="readmore"><a href="#">Read more <img
                                src="{{asset('assets/web/template/t1/images/right-arrow.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="item item1">
                <div class="testimonial-action-add-btn-t1">
                    <a herf="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})">
                        <div class="wd-md-ser-img-o">
                            <i class="fa fa-plus"></i>
                        </div>
                    </a>
                    <div class="slide-box green">
                        <h3>Add Testimonial</h3>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t2')
    <div class="owl-carousel">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item item1 testimonial-item-{{$testimonial->id}}">
                <div class="testimonial-action-div">
                    <a href="javascript:;" class="testimonial-action-remove"
                       onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;" class="testimonial-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
                <div class="slide-box">
                    <h3>{{$testimonial->label}}</h3>
                    <p>{{$testimonial->description}}</p>
                    <a class="moreless-button" href="javascript:;">Read More</a>
                </div>
                <div class="client-area d-flex align-items-center">
                    <img src="{{checkFileExist($testimonial->author_image)}}" alt="">
                    <h3>{{$testimonial->author_name}}</h3>
                </div>
            </div>
        @endforeach
        <div class="item item1">
            <div class="testimonial-action-add-btn">
                <a herf="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})">
                    <div class="wd-md-ser-img-o">
                        <i class="fa fa-plus"></i>
                    </div>
                </a>
                <div class="client-area d-flex align-items-center">
                    <h3>Add Testimonial</h3>
                </div>
            </div>
        </div>
    </div>
    @break
    @case('t3')
    <div class="owl-carousel">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item item1 testimonial-item-{{$testimonial->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="testimonial-action-div">
                        <a href="javascript:;" class="testimonial-action-remove"
                           onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="testimonial-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="slide-box">
                    <span><img src="{{checkFileExist($testimonial->author_image)}}" alt=""></span>
                    <h3>{{$testimonial->author_name}}</h3>
                    <p>{{$testimonial->description}}</p>
                    <div class="readmore"><a href="#">Read more <img
                                src="{{asset('assets/web/template/t3/images/right-arrow.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="item item1">
                <div class="testimonial-action-add-btn-t3">
                    <a herf="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})">
                        <div class="wd-md-ser-img-o">
                            <i class="fa fa-plus"></i>
                        </div>
                    </a>
                    <div class="client-area d-flex align-items-center">
                        <h3>Add Testimonial</h3>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t4')
    <div class="owl-carousel owl-theme owl-test">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item testimonial-item-{{$testimonial->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="testimonial-action-div">
                        <a href="javascript:;" class="testimonial-action-remove"
                           onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="testimonial-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="card">
                    <h6>{{$testimonial->author_name}}</h6>
                    <svg width="39" height="34" viewBox="0 0 39 34" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.42917 33.4063C6.55149 33.4063 4.24934 32.3786 2.52274 30.3231C0.878347 28.1854 0.0561523 25.431 0.0561523 22.06C0.0561523 17.4557 1.28944 13.3036 3.75603 9.60376C6.30483 5.82167 10.1691 2.65622 15.349 0.107422L16.7056 2.08069C14.239 3.56064 11.978 5.65723 9.92249 8.37047C7.94922 11.0015 6.96259 13.6736 6.96259 16.3869C6.96259 17.1268 7.16814 17.7435 7.57923 18.2368C7.99033 18.6479 8.60698 18.8535 9.42917 18.8535C11.4847 18.8535 13.2113 19.5934 14.609 21.0734C16.0889 22.4711 16.8289 24.1977 16.8289 26.2532C16.8289 28.3087 16.0889 30.0353 14.609 31.433C13.2113 32.7486 11.4847 33.4063 9.42917 33.4063ZM30.7651 33.4063C27.8874 33.4063 25.5853 32.3786 23.8587 30.3231C22.2143 28.1854 21.3921 25.431 21.3921 22.06C21.3921 17.4557 22.6254 13.3036 25.092 9.60376C27.6408 5.82167 31.5051 2.65622 36.6849 0.107422L38.0415 2.08069C35.575 3.56064 33.3139 5.65723 31.2584 8.37047C29.2852 11.0015 28.2985 13.6736 28.2985 16.3869C28.2985 17.1268 28.5041 17.7435 28.9152 18.2368C29.3263 18.6479 29.9429 18.8535 30.7651 18.8535C32.8206 18.8535 34.5472 19.5934 35.9449 21.0734C37.4249 22.4711 38.1649 24.1977 38.1649 26.2532C38.1649 28.3087 37.4249 30.0353 35.9449 31.433C34.5472 32.7486 32.8206 33.4063 30.7651 33.4063Z"
                            fill="black"/>
                    </svg>
                    <p>{{$testimonial->description}}</p>
                </div>
                <img src="{{checkFileExist($testimonial->author_image)}}" class="test-img">
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="item">
                <div class="testimonial-action-add-btn-t4">
                    <a herf="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})">
                        <div class="wd-md-ser-img-o">
                            <i class="fa fa-plus"></i>
                        </div>
                    </a>
                    <div class="card">
                        <h3>Add Testimonial</h3>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t5')
    <div class="owl-carousel">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item item1 testimonial-item-{{$testimonial->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="testimonial-action-div">
                        <a href="javascript:;" class="testimonial-action-remove"
                           onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="testimonial-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="slide-box">
                    <span><img src="{{checkFileExist($testimonial->author_image)}}" alt=""></span>
                    <h3>{{$testimonial->author_name}}</h3>
                    <p>{{$testimonial->description}}</p>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="item item1">
                <div class="testimonial-action-add-btn-t5">
                    <a herf="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})">
                        <div class="wd-md-ser-img-o">
                            <i class="fa fa-plus"></i>
                        </div>
                    </a>
                    <div class="slide-box">
                        <span>Add Testimonial</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t6')
    <div class="owl-carousel owl-theme owl-test">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item testimonial-item-{{$testimonial->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="testimonial-action-div">
                        <a href="javascript:;" class="testimonial-action-remove"
                           onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="testimonial-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="card">
                    <img src="{{checkFileExist($testimonial->author_image)}}" class="test-img">
                    <div class="wd-md-test-inner">
                        <h6>{{$testimonial->author_name}}</h6>
                        <p><span class="fir">"</span>{{$testimonial->description}}<span class="sec">"</span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="item item1">
                <div class="testimonial-action-add-btn-t6">
                    <a herf="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})">
                        <div class="wd-md-ser-img-o">
                            <i class="fa fa-plus"></i>
                        </div>
                    </a>
                    <div class="slide-box">
                        <span>Add Testimonial</span>
                    </div>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t7')
    <div class="col-md-8">
        <div class="sec-eight-text-area">
            <div class="container-quote">
                @foreach($web_content->testimonial as $testimonial)
                    <div
                        class="quote quote-text-{{$loop->index + 1}} @if($loop->index == '0') show @else hide-top @endif">
                        <div class="wd-dr-services">
                            <div class="sec-title">
                                <h1>What Our Client Say</h1>
                                <svg width="96" height="76" viewBox="0 0 96 76" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.25"
                                          d="M34.6688 75.0602H0.0810547V50.3195C0.0810547 40.3083 0.942671 32.4307 2.6659 26.6866C4.4712 20.8604 7.75354 15.6497 12.513 11.0544C17.2724 6.45912 23.3447 2.84854 30.73 0.222656L37.4998 14.5009C30.6069 16.7985 25.6423 19.9988 22.6062 24.1017C19.6521 28.2047 18.0929 33.6616 17.9288 40.4725H34.6688V75.0602ZM92.3971 75.0602H57.8094V50.3195C57.8094 40.2263 58.671 32.3076 60.3942 26.5635C62.1995 20.8194 65.4819 15.6497 70.2413 11.0544C75.0827 6.45912 81.1551 2.84854 88.4583 0.222656L95.2281 14.5009C88.3352 16.7985 83.3707 19.9988 80.3345 24.1017C77.3804 28.2047 75.8213 33.6616 75.6571 40.4725H92.3971V75.0602Z"
                                          fill="white"/>
                                </svg>
                                <p>{{$testimonial->description}}</p>
                            </div>
                            <div class="wd-sl-testuserdetail">
                                <img src="{{checkFileExist($testimonial->author_image)}}" class="mr-3">
                                <div class="wd-sl-testuserright">
                                    <h5>{{$testimonial->author_name}}</h5>
                                    <h6>{{$testimonial->label}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="md-sg-wl">
            <div class="container-pe-quote left">
                @foreach($web_content->testimonial as $testimonial)
                    @if($loop->index <= '3')
                        <div
                            class="pp-quote li-quote-{{$loop->index + 1}} @if($loop->index == '0') active @endif testimonial-item-{{$testimonial->id}}">
                            @if(is_login_for_edit() == 1)
                                <div class="testimonial-action-div">
                                    <a href="javascript:;" class="testimonial-action-remove"
                                       onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                            class="fa fa-trash"></i></a>
                                    <a herf="javascript:;" class="testimonial-action-edit"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                            @endif
                            <img src="{{checkFileExist($testimonial->author_image)}}" alt="">
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="container-pe-quote right">
                @foreach($web_content->testimonial as $testimonial)
                    @if($loop->index >= '4')
                        <div
                            class="pp-quote li-quote-{{$loop->index + 1}} testimonial-item-{{$testimonial->id}}">
                            @if(is_login_for_edit() == 1)
                                <div class="testimonial-action-div">
                                    <a href="javascript:;" class="testimonial-action-remove"
                                       onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                            class="fa fa-trash"></i></a>
                                    <a herf="javascript:;" class="testimonial-action-edit"
                                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                            class="fa fa-edit"></i></a>
                                </div>
                            @endif
                            <img src="{{checkFileExist($testimonial->author_image)}}" alt="">
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>
    @break
    @case('t8')
    <div class="owl-carousel">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item item1 testimonial-item-{{$testimonial->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="testimonial-action-div">
                        <a href="javascript:;" class="testimonial-action-remove"
                           onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="testimonial-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="slide-box">
                    <img src="{{asset('assets/web/template/t8/images/testimonial-vector.png')}}" alt="">
                    <p>{{$testimonial->description}}</p>
                    <span><img src="{{checkFileExist($testimonial->author_image)}}" alt=""></span>
                    <h3>{{$testimonial->author_name}}</h3>
                    <a href="#">Read more <img src="{{asset('assets/web/template/t8/images/r-more.png')}}"
                                               alt=""></a>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="pp-quote testimonial-action-add-btn-t8">
                <a herf="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})"><i
                        class="fa fa-plus"></i>
                    <h6>Add Testimonial</h6>
                </a>
            </div>
        @endif
    </div>
    @break
    @case('t9')
    <div class="owl-carousel owl-theme owl-test">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item testimonial-item-{{$testimonial->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="testimonial-action-div">
                        <a href="javascript:;" class="testimonial-action-remove"
                           onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="testimonial-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="card card-odd">
                    <p>{{$testimonial->description}}</p>
                </div>
                <div class="wd-md-client-blog d-flex align-items-center">
                    <img src="{{checkFileExist($testimonial->author_image)}}" class="test-img">
                    <div class="wd-md-client-detail">
                        <h3>{{$testimonial->author_name}}</h3>
                        <p>{{$testimonial->label}}</p>
                    </div>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="item testimonial-action-add-btn-t9">
                <div class="card card-odd">
                    <a herf="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})"><i
                            class="fa fa-plus"></i>
                        <h6>Add Testimonial</h6>
                    </a>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t10')
    <div class="owl-carousel owl-theme owl-test">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item testimonial-item-{{$testimonial->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="testimonial-action-div">
                        <a href="javascript:;" class="testimonial-action-remove"
                           onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="testimonial-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="card">
                    <div class="wd-sl-testcardinner">
                        <p>{{$testimonial->description}}</p>
                        <div class="wd-sl-reviews">
                            <img src="{{checkFileExist($testimonial->author_image)}}">
                            <div class="wd-sl-nmrv">
                                <h6>{{$testimonial->author_name}}</h6>
                                <i>{{$testimonial->label}}</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="item testimonial-action-add-btn-t10">
                <div class="card">
                    <a herf="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})"><i
                            class="fa fa-plus"></i>
                        <h6>Add Testimonial</h6>
                    </a>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t11')
    <div class="owl-carousel">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item item1 testimonial-item-{{$testimonial->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="testimonial-action-div">
                        <a href="javascript:;" class="testimonial-action-remove"
                           onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="testimonial-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="slide-box">
                    <span><img src="{{checkFileExist($testimonial->author_image)}}" alt=""></span>
                    <h3>{{$testimonial->author_name}}</h3>
                    <p>{{$testimonial->description}}</p>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="item testimonial-action-add-btn-t11">
                <div class="slide-box">
                    <a herf="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})"><i
                            class="fa fa-plus"></i>
                        <h6>Add Testimonial</h6>
                    </a>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t12')
    <div class="owl-carousel owl-theme">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item testimonial-item-{{$testimonial->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="testimonial-action-div">
                        <a href="javascript:;" class="testimonial-action-remove"
                           onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a herf="javascript:;" class="testimonial-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text'])}},{{$testimonial->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="wd-md-testimo-descripation">
                    <h6>{{$testimonial->author_name}}</h6>
                    <p>{{$testimonial->description}}</p>
                </div>
                <div class="wd-md-testi-btn d-flex align-items-center justify-content-between">
                    <a href="javascript:;" class="wd-great-btn">{{$testimonial->label}}</a>
                    <a href="javascript:;" class="wd-read-more">Read More
                        <span>
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M1 8.00014C1 7.86753 1.05268 7.74036 1.14645 7.64659C1.24021 7.55282 1.36739 7.50014 1.5 7.50014H13.293L10.146 4.35414C10.0521 4.26026 9.99937 4.13292 9.99937 4.00014C9.99937 3.86737 10.0521 3.74003 10.146 3.64614C10.2399 3.55226 10.3672 3.49951 10.5 3.49951C10.6328 3.49951 10.7601 3.55226 10.854 3.64614L14.854 7.64614C14.9006 7.69259 14.9375 7.74776 14.9627 7.80851C14.9879 7.86926 15.0009 7.93438 15.0009 8.00014C15.0009 8.06591 14.9879 8.13103 14.9627 8.19178C14.9375 8.25252 14.9006 8.3077 14.854 8.35414L10.854 12.3541C10.7601 12.448 10.6328 12.5008 10.5 12.5008C10.3672 12.5008 10.2399 12.448 10.146 12.3541C10.0521 12.2603 9.99937 12.1329 9.99937 12.0001C9.99937 11.8674 10.0521 11.74 10.146 11.6461L13.293 8.50014H1.5C1.36739 8.50014 1.24021 8.44746 1.14645 8.3537C1.05268 8.25993 1 8.13275 1 8.00014Z"
                                                      fill="black" stroke="black" stroke-width="0.5"/>
                                                </svg>
                                            </span>
                    </a>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="item">
                <div class="wd-add-testimonial">
                    <a href="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text'])}})">
                        <i class="fas fa-plus"></i>
                        <p>Add Testimonial</p>
                    </a>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t13')
    @foreach($web_content->testimonial as $testimonial)
        <div class="col-md-4 testimonial-item-{{$testimonial->id}}">
            @if(is_login_for_edit() == 1)
                <div class="testimonial-action-div">
                    <a href="javascript:;" class="testimonial-action-remove"
                       onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a herf="javascript:;" class="testimonial-action-edit"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="wd-sl-testcard">
                <h5>{{$testimonial->title}}</h5>
                <p>{{$testimonial->description}}</p>
                <div class="wd-sl-review_test">
                    <img src="{{checkFileExist($testimonial->author_image)}}"
                         class="wd-sl-userimg">
                    <img src="{{asset('assets/web/template/t13/images/home/qut.png')}}" class="qut-img">
                </div>
                <h4>{{$testimonial->author_name}}</h4>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-md-4 testimonial-item-{{$testimonial->id}}">
            <div class="wd-sl-testcard">
                <a herf="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})"><i
                        class="fa fa-plus"></i>
                    <h6>Add Testimonial</h6>
                </a>
            </div>
        </div>
    @endif
    @break
    @case('t15')
    @foreach($web_content->testimonial as $testimonial)
        <div class="col-lg-4">
            <div class="testi-action-prt text-right">
                @if(is_login_for_edit() == 1)
                    <div class="testimonial-action-div">
                        <a href="javascript:;" class="testimonial-action-remove"
                           onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a href="javascript:;" class="testimonial-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Description'=>'textarea','Label'=>'text','Author Name'=>'text', 'Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
            </div>
            <div class="wd-md-testi-box">
                <h6>{{$testimonial->label}}</h6>
                <p>{{$testimonial->description}}</p>
                <hr>
                <div class="wd-testimonial-img d-flex align-items-center">
                    <img src="{{checkFileExist($testimonial->author_image)}}" class="img-fluid">
                    <p>{{$testimonial->author_name}}</p>
                </div>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="col-lg-4">
            <a href="javascript:;"
               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Author Image'=>'file','Description'=>'textarea','Label'=>'text','Author Name'=>'text'])}})">
                <div class="wd-add-recent-stock">
                    <i class="fas fa-plus"></i>
                    <p>Add Testimonial</p>
                </div>
            </a>
        </div>
    @endif
    @break
    @case('t14')
    <div class="owl-review owl-carousel owl-theme">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item testimonial-item-{{$testimonial->id}}">
                @if(is_login_for_edit() == 1)
                    <div class="testi-action-prt text-right">
                        <a href="javascript:;"
                           onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a href="javascript:;"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="wd-sl-review_main">
                    <img src="{{checkFileExist($testimonial->author_image)}}">
                    <div class="wd-sl-review_content">
                        <h6>{{$testimonial->title}}</h6>
                        <p>{{$testimonial->description}}</p>
                        <span>- {{$testimonial->author_name}}</span>
                    </div>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="item">
                <div class="wd-sl-review_main add-review d-block">
                    <a href="javascript:;" class="d-block"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})"><img
                            src="{{asset('assets/web/template/t14')}}/images/plus.png"></a>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t17')
    <div class="owl-carousel loop">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item testimonial-item-{{$testimonial->id}}">
                <div class="wd-kr-testi_box">
                    <div class="text-left">
                        <a href="javascript:;" class="wd-kr-cmmn-btn">{{$testimonial->label}}</a>
                    </div>
                    @if(is_login_for_edit() == 1)
                        <div class="testi-action-prt text-right">
                            <a href="javascript:;" class="testimonial-action-remove"
                               onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a href="javascript:;" class="testimonial-action-edit"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Description'=>'textarea','Label'=>'text','Author Name'=>'text'])}},{{$testimonial->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                    @endif
                    <h3>{{$testimonial->author_name}}</h3>
                    <p>{{$testimonial->description}}</p>
                    <a href="javascript:;" class="wd-kr-read-btn">Read more
                        <svg width="18" height="19" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_509_610)">
                                <path
                                    d="M1.29155 13.7363C1.3701 13.7491 1.4496 13.7549 1.52914 13.7539L15.0732 13.7539L14.7778 13.8913C14.4892 14.0279 14.2265 14.2139 14.0017 14.4407L10.2037 18.2388C9.70344 18.7163 9.61939 19.4845 10.0045 20.0589C10.4527 20.671 11.3122 20.8039 11.9243 20.3557C11.9737 20.3194 12.0208 20.2799 12.0649 20.2374L18.9331 13.3693C19.4698 12.8332 19.4703 11.9634 18.9341 11.4267C18.9338 11.4263 18.9334 11.426 18.9331 11.4256L12.0649 4.55747C11.5277 4.0218 10.658 4.023 10.1223 4.56018C10.0802 4.60246 10.0408 4.64744 10.0045 4.69483C9.61939 5.26923 9.70344 6.03738 10.2037 6.51489L13.9949 10.3198C14.1964 10.5216 14.4281 10.6908 14.6817 10.8212L15.0938 11.0067L1.60474 11.0067C0.903027 10.9806 0.287382 11.4708 0.155558 12.1605C0.0341206 12.9094 0.542707 13.6148 1.29155 13.7363Z"
                                    fill="url(#paint0_linear_509_610)"/>
                            </g>
                            <defs>
                                <linearGradient id="paint0_linear_509_610" x1="9.73679" y1="20.6211" x2="9.73679"
                                                y2="4.15651" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#6952FE"/>
                                    <stop offset="1" stop-color="#505AEB" stop-opacity="0.5"/>
                                </linearGradient>
                                <clipPath id="clip0_509_610">
                                    <rect width="19.1983" height="19.1983" fill="white"
                                          transform="translate(19.3359 20.1602) rotate(-180)"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="item testimonial-action-add-btn-t11">
                <div class="slide-box">
                    <a herf="javascript:;"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Description'=>'textarea','Label'=>'text','Author Name'=>'text'])}})"><i
                            class="fa fa-plus"></i>
                        <h6>Add Testimonial</h6>
                    </a>
                </div>
            </div>
        @endif
    </div>
    @break
    @case('t16')
    <div class="owl-carousel">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item testimonial-item-{{$testimonial->id}}">
                <div class="wd-kr-testi_content">
                    @if(is_login_for_edit() == 1)
                        <div class="testi-action-prt text-right">
                            <a href="javascript:;"
                               onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a herf="javascript:;"
                               onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Title'=>'text','Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                    @endif
                    <svg width="51" height="39" viewBox="0 0 51 39" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M23.7505 3.78338L20.3937 0.998047C7.75622 8.16035 1.83242 16.3174 0.252737 25.4692C-0.932023 33.0295 2.02988 38.998 9.53337 38.998C14.8648 38.998 19.9988 35.4169 21.1835 29.4483C22.1708 22.485 18.2216 18.3069 13.2851 17.3122C15.2597 10.5478 23.553 3.78338 23.7505 3.78338ZM40.7321 16.9143C42.9041 10.3488 50.8025 3.78338 51 3.78338L47.6432 0.998047C35.0057 8.16035 29.0819 16.3174 27.5022 25.4692C26.3175 33.0295 29.2794 38.998 36.7829 38.998C42.1143 38.998 47.2483 35.4169 48.2356 29.4483C49.4203 22.485 45.6686 17.9091 40.7321 16.9143Z"
                            fill="url(#paint0_radial_508_10222)"/>
                        <defs>
                            <radialGradient id="paint0_radial_508_10222" cx="0" cy="0" r="1"
                                            gradientUnits="userSpaceOnUse"
                                            gradientTransform="translate(14.5714 7.51233) rotate(60.9542) scale(36.0153 43.268)">
                                <stop stop-color="#38E7B0"/>
                                <stop offset="1" stop-color="#30B78D"/>
                            </radialGradient>
                        </defs>
                    </svg>
                    <div class="testi_main">
                        <p>{{$testimonial->description}}</p>
                    </div>
                    <div class="testi_name ">
                        <div class="testi_name">
                            <img src="{{checkFileExist($testimonial->author_image)}}">
                            <p>{{$testimonial->author_name}}</p>
                            <span>{{$testimonial->title}}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @break
    @case('t18')
    <div class="owl-carousel owl-theme">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item">
                @if(is_login_for_edit() == 1)
                    <div class="wd-testi-action action-div d-flex align-items-center">
                        <a href="javascript:;" class="testimonial-action-remove"
                           onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a href="javascript:;" class="testimonial-action-edit"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Author Name'=>'text','Description'=>'textarea'])}},{{$testimonial->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <div class="wd-md-testi-blog">
                    <p>{{$testimonial->description}}</p>
                    <h6>
                                        <span>
                                            <svg width="71" height="7" viewBox="0 0 71 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="0.382812" y="2.54297" width="67.2759" height="1.17422" fill="white"/>
                                            <ellipse cx="67.0502" cy="3.13085" rx="3.058" ry="2.93554" fill="white"/>
                                            </svg>
                                        </span>{{$testimonial->author_name}}
                    </h6>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="item">
                <a herf="javascript:;"
                   onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Author Name'=>'text', 'Description'=>'textarea'])}})">
                    <div class="wd-add-review">
                        <i class="fas fa-plus"></i>
                        <p>Add Reviews</p>
                    </div>
                </a>
            </div>
        @endif
    </div>
    @break
    @case('t19')
    <div class="owl-review owl-carousel owl-theme">
    @foreach($web_content->testimonial as $testimonial)
        <div class="item testimonial-item-{{$testimonial->id}}">
            <div class="wd-sl-reviewmain">
                @if(is_login_for_edit() == 1)
                    <div class="testi-action-prt text-right">
                        <a href="javascript:;" class="wd-edit"
                           onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                class="fa fa-trash"></i></a>
                        <a href="javascript:;" class="wd-delete"
                           onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                class="fa fa-edit"></i></a>
                    </div>
                @endif
                <p>{{$testimonial->description}}</p>
                <div class="wd-sl-usernm_main">
                    <img src="{{checkFileExist($testimonial->author_image)}}">
                    <div class="wd-sl-userinfo">
                        <h6>{{$testimonial->author_name}}</h6>
                        <span>{{$testimonial->lable}}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    @break
    @case('t20')
    <div class="owl-carousel owl-theme ">
    @foreach($web_content->testimonial as $testimonial)
        <div class="item testimonial-item-{{$testimonial->id}}">
            @if(is_login_for_edit() == 1)
                <div class="wd-testi-action action-div d-flex align-items-center">
                    <a href="javascript:;" class="wd-edit"
                       onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                            class="fa fa-trash"></i></a>
                    <a href="javascript:;" class="wd-delete"
                       onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                            class="fa fa-edit"></i></a>
                </div>
            @endif
            <div class="wd-md-testi-box">
                <h6>{{$testimonial->lable}}</h6>
                <p>{{$testimonial->description}}</p>
            </div>
            <div class="wd-testimonial-img d-flex align-items-center">
                <img src="{{checkFileExist($testimonial->author_image)}}" class="img-fluid">
                <p>{{$testimonial->author_name}}</p>
                <span>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="12" cy="12" r="12" fill="#6A52FE"/>
                            <path d="M12.2473 17C14.1965 16.8641 16.9985 16.5552 17 12.7667V8H12.6504V13.1H14.0947C14.1862 14.4618 13.0562 14.8134 11.8275 15.0833L12.2473 17ZM6.41985 17C8.36909 16.8641 11.171 16.5552 11.1725 12.7667V8H6.82289V13.1H8.26718C8.35868 14.4618 7.22874 14.8134 6 15.0833L6.41985 17Z" fill="white"/>
                            </svg>
                        </span>
            </div>
        </div>
    @endforeach
    @if(is_login_for_edit() == 1)
        <div class="item">
            <div class="wd-md-testi-box">
                <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})">
                    <div class="wd-add-review-stock">
                        <i class="fas fa-plus"></i>
                        <p>Add Reviews</p>
                    </div>
                </a>
            </div>
        </div>

    @endif
    </div>
    @break
    @case('t21')
    <div class="owl-test owl-carousel owl-theme">
        @foreach($web_content->testimonial as $testimonial)
            <div class="item">
                <div class="wd-sl-testcard">
                    @if(is_login_for_edit() == 1)
                        <div class="testi-action-prt text-right">
                            <a href="javascript:;" onclick="remove_items({{$testimonial->id}},'testimonials_item','testimonial-item-{{$testimonial->id}}')"><i
                                    class="fa fa-trash"></i></a>
                            <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}},{{$testimonial->id}})"><i
                                    class="fa fa-edit"></i></a>
                        </div>
                    @endif
                    <img src="{{checkFileExist($testimonial->author_image)}}" class="wd-sl-user">
                    <h5>{{$testimonial->author_name}}</h5>
                    <p>{{$testimonial->description}}</p>
                </div>
            </div>
        @endforeach
        @if(is_login_for_edit() == 1)
            <div class="item">
                <div class="wd-sl-testcard">
                    <a href="javascript:;" onclick="getDynamicModal('{{$web_content->id}}','{{$web_content->template}}','home','testimonials_item',{{json_encode(['Description'=>'textarea','Label'=>'text','Author Name'=>'text','Author Image'=>'file'])}})" class="wd-sl-addcard">
                        <img src="{{asset('assets/web/template/t21/images')}}/home/plus.png">
                    </a>
                </div>
            </div>
        @endif
    </div>
    @break
@endswitch
