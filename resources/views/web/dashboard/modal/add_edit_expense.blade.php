<form action="javascript:;" id="frmExpense" name="frmExpense">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <textarea class="form-control" rows="5" id="comment" name="description"
                      placeholder="Description">{{(isset($expense->description))?$expense->description:''}}</textarea>
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend wd-prepend">
                <span class="input-group-text">£</span>
            </div>
            <input type="number" class="form-control wd-cuv" name="amount" placeholder="Amount"
                   value="{{(isset($expense->amount))?$expense->amount:''}}">
        </div>
        <div class="form-group wd-select">
            <select class="form-control" id="payment_type" name="payment_type">
                <option
                    @if(isset($expense->payment_type)) {{$expense->payment_type == 'card' ? 'selected' : ''}} @endif value="card">
                    Card
                </option>
                <option
                    @if(isset($expense->payment_type)) {{$expense->payment_type == 'cash' ? 'selected' : ''}} @endif value="cash">
                    Cash
                </option>
                <option
                    @if(isset($expense->payment_type)) {{$expense->payment_type == 'other' ? 'selected' : ''}} @endif value="other">
                    Other
                </option>
            </select>
        </div>
        @if(isset($expense->payment_type) &&  $expense->payment_type == 'other')
            <div class="form-group" id="other_note">
                <input class="form-control" type="text" name="note"
                       value="{{(isset($expense->other_description))?$expense->other_description:''}}"
                       placeholder="Other Note">
            </div>
        @else
            <div class="form-group" id="other_note" style="display: none">
                <input class="form-control" type="text" name="note"
                       value="{{(isset($expense->other_description))?$expense->other_description:''}}"
                       placeholder="Other Note">
            </div>
        @endif
        <div class="col-md-12 wd-chekbox">
            <h3 class="wd-part wd-vat">Vat includes?</h3>
            <div class="wd-radio-btn d-flex align-items-center">
                <p>
                    <input type="radio" id="part-ex-yes" name="vat_flag" value="1"
                           @if(isset($expense->vat_flag)) {{$expense->vat_flag == '1' ? 'checked' : ''}} @else checked @endif>
                    <label for="part-ex-yes">Yes</label>
                </p>
                <p>
                    <input type="radio" id="part-ex-no" name="vat_flag"
                           value="0" @if(isset($expense->vat_flag)) {{$expense->vat_flag == '0' ? 'checked' : ''}} @endif>
                    <label for="part-ex-no">No</label>
                </p>
            </div>
        </div>
        <div
            class="form-group input-group total_vat_box" {{isset($expense->vat_flag)?($expense->vat_flag == '1' ? 'style="display:none"' : ''):''}}>
            <div class="input-group-prepend wd-prepend">
                <span class="input-group-text">£</span>
            </div>
            <input type="number" class="form-control wd-cuv" name="total_vat" placeholder="Total VAT"
                   value="{{(isset($expense->total_vat))?$expense->total_vat:''}}">
        </div>
        <div class="form-row action">
            <input type="hidden" name="id" value="{{(isset($expense->id)?$expense->id:0)}}">
            <button class="add-stock-btn" id="btnSave">Save</button>
        </div>
    </div>
</form>
<script>
    $('input[type=radio][name=vat_flag]').change(function () {
        if (this.value == 1) {
            $(".total_vat_box").show();
        } else if (this.value == 0) {
            $(".total_vat_box").hide();
        }
    });
    $("#payment_type").change(function () {
        val = $(this).children("option:selected").val();
        if (val == 'other') {
            $("#other_note").show();
        } else {
            $("#other_note").hide();
        }
    });
    $("#frmExpense").validate({
        rules: {
            description: {required: true},
            amount: {required: true, number: true},
            payment_type: {required: true},
            vat: {required: true},
            total_vat: {required: true},
        },
        messages: {
            description: {required: "{{__('Please enter description')}}"},
            amount: {required: "{{__('Please enter amount')}}", number: "{{__('Please enter valid amount')}}"},
            payment_type: {required: "{{__('Please enter payment type')}}"},
            vat: {required: "{{__('Please enter vat')}}"},
            total_vat: {required: "{{__('Please enter total vat')}}"},
        }
    });
    $("#btnSave").click(function () {
        if ($("#frmExpense").valid()) {
            var data = new FormData($('#frmExpense')[0]);
            $("#btnSave").attr('disabled', true);
            $.ajax({
                type: 'post',
                data: data,
                dataType: "json",
                url: "{{route('front.expense.create')}}",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: addOverlay,
                success: function (r) {
                    removeOverlay();
                    $("#btnSave").attr('disabled', false);
                    if (r.status == 200) {
                        toastr['success'](r.message, "success");
                        dataTable.draw();
                        $("#addExpense").modal('hide');
                    } else {
                        toastr['error'](r.message, "error");
                    }
                }
            });
        }
    });
</script>
