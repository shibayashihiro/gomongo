<div class="row">
    <div class="col-md-12">
        <div class="to-do-header-title">
            <div class="wd-sl-todo_left">
                <span class="day-todo">Day</span>
                <span class="title-todo">Title/Description</span>
            </div>
            <div class="wd-sl-todo_right">
                <span class="staff-todo">Assign Staff</span>
                <span class="date-todo">Due Date</span>
                <span class="action-todo">Action</span>
            </div>
        </div>
    </div>
</div>

    <div class="row">
        @foreach($to_do as $item)
        <div class="col-md-12">
            <div class="sub-to-do-list-bg  {{to_do_date_check($item->priority)}}">

                <div class="sub-to-do-caln-box d-flex align-items-center">
                    <div class="sub-to-do-cald-date">
                        <span>{{(!is_null($item->date))?date('d', strtotime($item->date)):'N/A'}}</span>
                    </div>
                    <div class="sub-to-do-cald-text">
                        <h6>{{str_limit($item->title, 50)}}</h6>
                        <p>{{str_limit($item->description, 50)}}</p>
                    </div>
                </div>
                <div class="sub-to-do-cald-icon">
                    <span>{{$item->assign_staff}}</span>
                    <span>{{!is_null($item->date)?date('d-m-Y', strtotime($item->date)):'N/A'}}</span>
                    <label class="mb-0"> <input type="checkbox" onclick="mark_as_complete({{$item->id}})"> Mark as complete</label>
                    <a href="javascript:;" onclick="get_edit_form({{$item->id}})" class="edit-icon">
                        <i class="far fa-edit"></i>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>