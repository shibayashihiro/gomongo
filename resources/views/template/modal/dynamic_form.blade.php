<form id="frmDynamicForm" name="frmDynamicForm" action="javascript:;">
    @csrf
    @foreach ($siteContent['parameters'] as $key => $value)
        <div class="form-group">
            @if ($siteContent['template_slug'] == 't12' && $key == 'Image')
                <label for="{{ strtolower(preg_replace('/\s+/', '_', $key)) }}"> Video </label>
            @else
                <label for="{{ strtolower(preg_replace('/\s+/', '_', $key)) }}">{{ $key }}</label>
            @endif
            @switch($value)
                @case('text')
                    <input type="text" class="form-control" id="{{ strtolower(preg_replace('/\s+/', '_', $key)) }}"
                        name="{{ strtolower(preg_replace('/\s+/', '_', $key)) }}"
                        value="{{ get_web_content_detail($siteContent['website_id'], $siteContent['template_slug'], $siteContent['page_slug'], $siteContent['section_slug'], strtolower(preg_replace('/\s+/', '_', $key)), $siteContent['extra_id']) }}"
                        required />
                @break

                @case('textarea')
                    <textarea class="form-control" id="{{ strtolower(preg_replace('/\s+/', '_', $key)) }}"
                        name="{{ strtolower(preg_replace('/\s+/', '_', $key)) }}" required>{{ get_web_content_detail($siteContent['website_id'], $siteContent['template_slug'], $siteContent['page_slug'], $siteContent['section_slug'], strtolower(preg_replace('/\s+/', '_', $key)), $siteContent['extra_id']) }}</textarea>
                @break

                @case('file')
                    <img class="wd-sl-imgbrs"
                        src="{{ checkFileExist(get_web_content_detail($siteContent['website_id'], $siteContent['template_slug'], $siteContent['page_slug'], $siteContent['section_slug'], strtolower(preg_replace('/\s+/', '_', $key)), $siteContent['extra_id'])) }}">
                    <input type="file" id="{{ strtolower(preg_replace('/\s+/', '_', $key)) }}"
                        name="{{ strtolower(preg_replace('/\s+/', '_', $key)) }}" />
                    @php
                        $element_id = empty($siteContent['extra_id']) ? get_web_content_detail_id($siteContent['website_id'], $siteContent['template_slug'], $siteContent['page_slug'], $siteContent['section_slug'], strtolower(preg_replace('/\s+/', '_', $key))) : $siteContent['extra_id'];
                    @endphp
                    @if (!empty($element_id))
                        <label><input type="checkbox"
                                name="{{ empty($siteContent['extra_id']) ? 'restore_default_img[]' : 'restore_default_img' }}"
                                value="{{ $element_id }}">
                            &nbsp;
                            Restore default image
                        </label>
                    @endif
                @break
            @endswitch
            <input type="hidden" name="input_type[]" value="{{ $value }}" />
        </div>
    @endforeach
    <input type="hidden" name="is_item" id="is_item"
        value="{{ in_array($siteContent['section_slug'], ['our_services_item', 'testimonials_item', 'our_recent_stock_item']) ? 1 : 0 }}">
    <input type="hidden" name="website_id" id="website_id" value="{{ $siteContent['website_id'] }}">
    <input type="hidden" name="template_slug" value="{{ $siteContent['template_slug'] }}">
    <input type="hidden" name="page_slug" value="{{ $siteContent['page_slug'] }}">
    <input type="hidden" name="section_slug" id="section_slug" value="{{ $siteContent['section_slug'] }}">
    <input type="hidden" name="extra_id" value="{{ $siteContent['extra_id'] }}">
    <button type="button" class="btn btn-primary" id="btnSaveDynamicFrom">save</button>
</form>
<script>
    $("#frmDynamicForm").validate();
    $("#btnSaveDynamicFrom").click(function() {
        let is_item = $("#is_item").val();
        let section_slug = $("#section_slug").val();
        let website_id = $("#website_id").val();
        if ($("#frmDynamicForm").valid()) {
            var data = new FormData($('#frmDynamicForm')[0]);
            $("#btnSaveDynamicFrom").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{ route('front.save_dynamic_form') }}",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: addOverlay,
                success: function(r) {
                    console.log(r.data);
                    removeOverlay();
                    $("#btnSaveDynamicFrom").attr('disabled', false);
                    if (r.status == 200) {
                        toastr['success'](r.message, "success");
                        if (is_item == 0) {
                            let content_data = r.data;
                            for (let i = 0; i < content_data.length; i++) {
                                if (content_data[i]['type_of_content'] != "file") {
                                    $('.' + content_data[i]['class_of_content']).html(content_data[
                                        i]['value_of_content']);
                                } else {
                                    if ($('.' + content_data[i]['class_of_content']).prop(
                                            'nodeName') == "IMG")
                                        $('.' + content_data[i]['class_of_content']).attr('src',
                                            content_data[i]['value_of_content']);
                                    else
                                        $('.' + content_data[i]['class_of_content']).css(
                                            'background-image', 'url(' + content_data[i][
                                                'value_of_content'
                                            ] + ')');
                                }
                            }
                        } else {
                            if (section_slug == 'our_services_item') {
                                get_services(website_id);
                            } else if (section_slug == 'testimonials_item') {
                                get_testimonial(website_id);
                            } else if (section_slug == 'our_recent_stock_item') {
                                get_stock(website_id);
                            }
                        }
                        $("#edit-content-modal").modal('hide');

                    } else {
                        toastr['error'](r.message, "error");
                    }
                    location.reload(true);
                }
            });
        }
    });
</script>
