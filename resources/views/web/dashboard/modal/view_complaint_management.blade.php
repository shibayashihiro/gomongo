<div class="pro-details">
    <div class="pro-dt-row">
        <p><b>Subject:</b> {{$complaintManagement->subject}}</p>
    </div>
    <div class="pro-dt-row">
        <p><b>Description:</b> {{$complaintManagement->description}}</p>
    </div>
    <div class="pro-dt-row">
        <p><b>Assign Staff:</b> {{$complaintManagement->assign_staff}}</p>
    </div>
    <div class="pro-dt-row">
        <p><b>Customer Name:</b> {{$complaintManagement->customer_name}}</p>
    </div>
    <div class="pro-dt-row">
        <p><b>Customer Contact Number:</b> {{$complaintManagement->customer_contact_number}}</p>
    </div>
    <div class="pro-dt-row">
        <p><b>Additional Note:</b> {{$complaintManagement->additional_note}}</p>
    </div>
    <div class="pro-dt-row">
        <p><b>Due Date:</b> {{get_date_format($complaintManagement->due_date, 'd/m/Y')}}</p>
    </div>
</div>

