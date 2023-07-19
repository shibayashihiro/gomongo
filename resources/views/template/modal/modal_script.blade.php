<script>
    $('#make').on('change', function (e) {
        var sValue = this.value;
        fetchModel(sValue);
    });

    function fetchModel(make) {
        $.ajax({
            method: 'post',
            url: "{{route('front.template.get_model')}}",
            data: {
                _token: "{{csrf_token()}}",
                make: make,
                user_id: {{$web_content->user_id}}
            },
            dataType: 'Json',
            success: function (data) {
                $('#model_list').html('');
                $('#model_list').append(new Option('Modal Any', ''));
                data.forEach(function (value) {
                    $('#model_list').append(new Option(value.modal, value.modal));
                });
            }
        });
    }
</script>
