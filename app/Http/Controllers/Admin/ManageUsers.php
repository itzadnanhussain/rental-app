<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class ManageUsers extends Controller
{

    ///load_users_list
    public function load_users_list()
    {
        $data = array();
        $data['users_list'] = GetAllRecords('tbl_users');
        ///common  lines
        $data['title'] = GetTitle();
        return view('admin.userlist', $data);
    }

    ///add_user
    public function add_user()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        return view('admin.adduser', $data);
    }


    ///edit_user
    public function edit_user($id)
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $data['user'] = GetByWhereRecord('tbl_users', array('user_id'=> $id));
        return view('admin.edituser', $data);
    }


    ///add_user_process
    public function add_user_process(Request $request)
    {
        ///check form validation
        $validation = Validator::make($request->all(), [
            'user_type' => 'required',
            'email' => 'required|unique:tbl_users',
            'profile' => 'required',
       ]);

        ///validation errors
        if ($validation->fails()) {

            ///validation errors code
            $errors = $validation->errors()->toArray();
            $error_array = array();
            foreach ($errors as $key => $value) {
                $error_array[] = array($key , $value[0]);
            }
            $data = array('code' => 'errors', 'message' => $error_array);
            echo json_encode($data);
            die;
        } else {
            $postData = array();
            $postData['email'] = $request->email;
            $postData['user_type'] = $request->user_type;

            $last_id = AddNewRecord('tbl_users', $postData);

            ///handle profile
            if ($request->hasfile('profile')) {
                $file = $request->file('profile');
                $name = 'profile_'.$last_id.'.'.$file->extension();
                $file->move(public_path('admin/profiles/'.$last_id), $name);
            }

            $url = SERVER_ROOT_PATH.'admin/users_list';
            $data = array('code' => 'success_url', 'message' => 'New User Has Been Added!','redirect_url'=> $url);
            echo json_encode($data);
            die;
        }
    }


    ///delete_user_process
    public function delete_user_process(Request $request)
    {
        extract($request->all());
        $where = array('user_id'=>$id);
        $is_deleted = DeleteRecord('tbl_users', $where);
        if ($is_deleted) {
            $data = array('code' => 'success', 'message' => 'Record deleted!');
            echo json_encode($data);
            die;
        } else {
            $data = array('code' => 'warning', 'message' => 'Record not deleted!');
            echo json_encode($data);
            die;
        }

        

        echo 'you are here : '.$id;
        die;
    }
}
