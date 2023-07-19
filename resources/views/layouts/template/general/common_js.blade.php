<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/3.0.5/daterangepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    const chat_btn = $("#chat-bot .icon");
    const chat_box = $("#chat-bot .messenger");

    chat_btn.click(() => {
        // chat_btn.toggleClass("expanded");
        // setTimeout(() => {
        //     chat_box.toggleClass("expanded");
        // }, 100);
        window.open(
            "https://api.whatsapp.com/send/?phone={{ $dealer->country_code }}{{ $dealer->mobile }}&text=Hi. I have some query about a car I saw here: {{ Request::url() }}",
            "_blank");
        // console.log("{{ $dealer->mobile }}");
    });
    //let conn = new WebSocket('ws:/localhost:8080');
    let conn = new WebSocket('wss://www.gomongo.co.uk/ws/');
    conn.onopen = function(e) {
        console.log("Connection established!");
        conn.send('{"command": "register","userId":"{{ request()->browserToken }}"}');
    };
    $('#msg').on("keypress", function(e) {
        if (e.keyCode === 13) {
            sendMsg();
            return false; // prevent the button click from happening
        }
    });

    function sendMsg() {
        let d = new Date();
        let msg = $('#msg').val();
        conn.send(
            '{"command": "message","from":"{{ request()->browserToken }}","to":"{{ $toDeviceToken }}","message":"' +
            msg + '","from_type":"guest"}');
        $('#msg').val('');
        let appendHtml = msg;
        let html = `<div class="msg msg-right">
                <div class="bubble">
                    <h6 class="name">You</h6>
                    ${msg}
                </div>
            </div>`;
        $('.chatroom').append(html);
        $(".chatroom").animate({
            scrollTop: $('.wd-kr-msg-body').prop("scrollHeight")
        }, 1000);
    }

    conn.onmessage = function(e) {
        let msg = JSON.parse(e.data);
        console.log(msg);
        if (msg.type === 'message') {
            let html = `<div class="msg msg-left">
                <div class="bubble">
                    <h6 class="name">Support</h6>
                    ${msg.message}
                </div>
            </div>`;
            $(".chatroom").append(html);
        }
    };

    function getDynamicModal(website_id, template_slug, page_slug, section_slug, parameters, extra_id = 0) {
        $.ajax({
            type: 'post',
            data: {
                website_id: website_id,
                template_slug: template_slug,
                page_slug: page_slug,
                section_slug: section_slug,
                parameters: parameters,
                extra_id: extra_id,
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: "{{ route('front.get_dynamic_modal') }}",
            beforeSend: addOverlay,
            success: function(r) {
                removeOverlay();
                $(".edit-content-modal-body").html(r);
                $("#edit-content-modal").modal('show');
                //location.reload(true);
            }
        });
    }

    function remove_items(id, type, div_content) {
        if (confirm('Are you sure want to delete?')) {
            $.ajax({
                type: 'post',
                data: {
                    id: id,
                    type: type
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: "{{ route('front.remove_items') }}",
                beforeSend: addOverlay,
                success: function(r) {
                    removeOverlay();
                    $('.' + div_content).remove();
                    location.reload(true);
                }
            });
        }
    }

    function get_services(website_id) {
        $.ajax({
            type: 'post',
            data: {
                website_id: website_id
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: "{{ route('front.get_services_html') }}",
            success: function(r) {
                $('.services_div').html(r);
                @if ($web_content->template == 't14')
                    $('.owl-service').owlCarousel({
                        nav: false,
                        dots: false,
                        loop: false,
                        margin: 0,
                        autoplay: true,
                        responsive: {
                            0: {
                                items: 2
                            },
                            600: {
                                items: 2
                            },
                            1000: {
                                items: 5
                            }
                        }
                    })
                @endif
            }
        });
    }

    function get_testimonial(website_id) {
        $.ajax({
            type: 'post',
            data: {
                website_id: website_id
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: "{{ route('front.get_testimonial_html') }}",
            success: function(r) {
                $('.testimonial_div').html(r);
                @if ($web_content->template == 't12')
                    $('.owl-carousel').owlCarousel({
                        loop: true,
                        margin: 10,
                        nav: true,
                        dots: false,
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 1
                            },
                            1000: {
                                items: 1
                            }
                        }
                    })
                @elseif ($web_content->template == 't14')
                    $('.owl-review').owlCarousel({
                        nav: false,
                        dots: true,
                        loop: true,
                        margin: 50,
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 1
                            },
                            1000: {
                                items: 2
                            }
                        }
                    })
                @elseif ($web_content->template == 't16')
                    $('.owl-carousel').owlCarousel({
                        loop: true,
                        margin: 10,
                        autoplay: 2000, // time for slides changes
                        smartSpeed: 1000, // duration of change of 1 slide
                        pagination: true,
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 1
                            },
                            1000: {
                                items: 1
                            }
                        }
                    })
                @elseif ($web_content->template == 't18')
                    $('.owl-carousel').owlCarousel({
                        loop: true,
                        margin: 10,
                        dots: true,
                        responsiveClass: true,
                        responsive: {
                            0: {
                                items: 1,
                            },
                            600: {
                                items: 1,
                            },
                            1000: {
                                items: 1,
                            }
                        }
                    })
                @elseif ($web_content->template == 't19')
                    $('.owl-review').owlCarousel({
                        nav: false,
                        dots: true,
                        loop: true,
                        margin: 0,
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 1
                            },
                            1000: {
                                items: 1
                            }
                        }
                    })
                @elseif ($web_content->template == 't21')
                    $('.owl-test').owlCarousel({
                        loop: true,
                        center: true,
                        margin: 10,
                        nav: true,
                        dots: false,
                        autoplay: false,
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 1
                            },
                            1000: {
                                items: 1
                            },
                        }
                    })
                @else
                    $(".owl-carousel").owlCarousel({
                        stagePadding: 0,
                        loop: true,
                        margin: 30,
                        nav: true,
                        responsive: {
                            0: {
                                items: 1
                            },
                            767: {
                                items: 2
                            },
                            1000: {
                                items: 3
                            }
                        }
                    });
                @endif
            }
        });
    }

    function get_stock(website_id) {
        $.ajax({
            type: 'post',
            data: {
                website_id: website_id
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: "{{ route('front.get_stock_html') }}",
            success: function(r) {
                $('.stock_div').html(r);
                @if ($web_content->template == 't13')
                    $('.owl-stock').owlCarousel({
                        loop: true,
                        center: true,
                        margin: 30,
                        nav: false,
                        dots: false,
                        autoplay: true,
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 2
                            },
                            1000: {
                                items: 3
                            },
                            1366: {
                                items: 5
                            }
                        }
                    });
                @elseif ($web_content->template == 't19')
                    $('.owl-stock').owlCarousel({
                        nav: true,
                        dots: false,
                        loop: true,
                        margin: 50,
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 1
                            },
                            1000: {
                                items: 3
                            }
                        }
                    })
                @elseif ($web_content->template == 't21')
                    $('.owl-stock').owlCarousel({
                        loop: true,
                        center: true,
                        margin: 10,
                        nav: true,
                        dots: false,
                        autoplay: false,
                        responsive: {
                            0: {
                                items: 1
                            },
                            600: {
                                items: 2
                            },
                            1000: {
                                items: 3
                            },
                        }
                    })
                @endif
                $('.owl-car').owlCarousel({
                    loop: true,
                    margin: 30,
                    nav: false,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 4
                        }
                    }
                })
                $('#stock-slider').owlCarousel({
                    items: 3,
                    loop: true,
                    nav: false,
                    margin: 30,
                    center: true,
                    dots: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    slideSpeed: 300,
                    paginationSpeed: 400,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 3
                        }
                    }
                });
            }
        });
    }

    function getTimingModal(website_id) {
        $.ajax({
            type: 'post',
            data: {
                website_id: website_id,
            },
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: "{{ route('front.get_timing_modal') }}",
            beforeSend: addOverlay,
            success: function(r) {
                removeOverlay();
                $(".edit-content-modal-body").html(r);
                $("#edit-content-modal").modal('show');

            }
        });
    }

    function get_timings() {
        $.ajax({
            type: 'post',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            url: "{{ route('front.get_timings_html') }}",
            success: function(r) {
                $('.timing_box').html(r);
            }
        });
    }
</script>
