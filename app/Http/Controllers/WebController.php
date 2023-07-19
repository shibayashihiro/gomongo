<?php

namespace App\Http\Controllers;

use App\WebContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Thread;
use App\DeviceToken;

class WebController extends Controller
{
    public $domain_slug;
    public $toDeviceToken = '';
    public $webContent;
    public $messages = [];

    public function __construct(Request $request)
    {
        $this->domain_slug = $request->segment(1);
        $this->webContent = WebContent::where('domain_name', $request->segment(2))->first();
        if ($this->webContent) {
            $this->messages = [];
            $thread = Thread::where(['guest_id' => \request()->guestId, 'user_id' => $this->webContent->user_id])->first();
            if (!is_null($thread)) {
                $this->messages = $thread->messages->toArray();
            }
            $toDeviceToken = DeviceToken::where('user_id', $this->webContent->user_id)->first();
            if (is_null($toDeviceToken)) {
                $device_id = $request->ip();
                $token = token_generator();
                $device = DeviceToken::create([
                    'user_id' => $this->webContent->user_id,
                    'token' => $token,
                    'device_id' => $device_id
                ]);
                $this->toDeviceToken = $device->token;
            } else {
                $this->toDeviceToken = $toDeviceToken->token;
            }

        }
    }

    function generate_switch($params = array())
    {
        return '<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
                                                            <label>
                                                                <input type="checkbox" data-id="' . $params['id'] . '"  data-url="' . $params['url']['status'] . '" ' . $params['checked'] . ' class="switch-status">
                                                                <span></span>
                                                            </label>
                                                        </span>';
    }

    function generate_custom_switch($id = 0, $url = "", $checked = "false")
    {
        return '<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success"><label>
                                                            <input type="checkbox" data-id="' . $id . '"  data-url="' . $url . '" ' . $checked . ' class="switch-status">
                                                                <span></span></label></span>';
    }


    function generate_actions_buttons($params = array(), $extra = array(), $target = false)
    {
        $operation = '';
        $isEdit = isset($params['url']['edit']);
        $isView = isset($params['url']['view']);
        $isDelete = isset($params['url']['delete']);
        $target = ($target) ? 'target="_blank"' : "";
        if ($isView) {
            $operation .= '<a title="View" ' . $target . ' href="' . $params['url']['view'] . '" data-type="view" data-id="' . $params['id'] . '" class="btn btn-sm btn-clean btn-icon btn-icon-md btnView"><i class="la la-eye"></i></a>';
        }
        if ($isEdit) {
            $operation .= '<a ' . $target . ' title="Edit" href="' . $params['url']['edit'] . '" data-id="' . $params['id'] . '" class="btn btn-sm btn-clean btn-icon btn-icon-md btnEdit"><i class="la la-edit"></i></a>';
        }
        if ($isDelete) {
            $operation .= '<a ' . $target . ' title="Delete" href="' . $params['url']['delete'] . '" data-id="' . $params['id'] . '" class="btn btn-sm btn-clean btn-icon btn-icon-md btnDelete"><i class="la la-trash-o"></i></a>';
        }
        if (!empty($extra)) {
            foreach ($extra as $key => $value) {
                $btn_id = "";
                $onclick = "";
                $data_type = "";
                $title = "";
                if (isset($value['title']) && !empty($value['title'])) {
                    $title = $value['title'];
                }
                if (!empty($value['btn_id'])) {
                    $btn_id = "id='" . $value['btn_id'] . "'";
                }
                if (!empty($value['onclick'])) {
                    $onclick = "onclick='" . $value['onclick'] . "'";
                }
                if (array_key_exists('data_type', $value) && !empty($value['data_type'])) {
                    $data_type = "data-type='" . $value['data_type'] . "'";
                }
                if (empty($value['btn_modal']))
                    $operation .= '<button  title="' . $title . '" data-url="' . $value['url'] . '" ' . $data_type . ' data-id="' . $value['data_id'] . '" ' . $btn_id . ' ' . $onclick . ' class="btn_space ' . $value['btn_class'] . ' btn-xs">' . $value['btn_name'] . '</button>';
                else
                    $operation .= '<button type="button" class="btn_space ' . $value['btn_class'] . ' btn-xs" data-toggle="modal" ' . $btn_id . ' ' . $onclick . ' data-target="#' . $value['modal_id'] . '">' . $value['btn_name'] . '</button>';
            }
        }
        return $operation;
    }

    function generate_actions_buttons_for_web($params = array(), $isEdit = true, $isView = true, $isDelete = true, $extra = array())
    {
        $operation = '';
        if ($isEdit) {
            $operation .= '<a href="javascript:;" onclick="' . $params['edit_onclick'] . '" class="mr-2" title="Edit"><i class="far fa-edit"></i></a>';
        }
        if ($isView) {
            $operation .= '<a href="javascript:;" onclick="' . $params['view_onclick'] . '" class="mr-2" title="View"><i class="fas fa-eye"></i></a>';
        }
        if ($isDelete) {
            $operation .= '<a href="javascript:;" onclick="' . $params['delete_onclick'] . '" title="delete" class="mr-2"><i class="fas fa-trash-alt"></i></a>';
        }
        if (!empty($extra) && isset($extra['onclick']) && isset($extra['icon']) && isset($extra['title'])) {
            $operation .= '<a href="javascript:;" onclick="' . $extra['onclick'] . '" title="' . $extra['title'] . '" ><i class="' . $extra['icon'] . '"></i></a>';
        }

        return $operation;
    }

    public function directValidation($rules, $messages = [], $direct = true, $data = null)
    {
        $data = ($data) ? $data : request()->all();
        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            $this->errors = $validator->errors()->first();
            if ($direct) {
                echo json_encode(['status' => 412, 'message' => $this->errors]);
                die();
            } else {
                return false;
            }
        } else {
            //            return true;
            return $validator->valid();
        }
    }

    public function upload_image($folder = 'users')
    {
        $data = $_POST['image'];
        if (!empty($data)) {
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);
            $imageName = md5(time() . rand()) . '.jpeg';
            file_put_contents($folder . '/' . $imageName, $data);
            return $imageName;
        } else {
            return $data;
        }
    }


}
