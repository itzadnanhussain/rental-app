<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class ManageCategory extends Controller
{

    ///load_category_list
    public function load_category_list()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $data['category_list'] = GetByWhereRecord('tbl_categories');
        return view('admin.categorylist', $data);
    }


    ///add_category
    public function add_category()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        return view('admin.addcategory', $data);
    }


    ///edit_category
    public function edit_category($id)
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        $data['category'] = GetByWhereRecord('tbl_categories', array('cat_id'=> $id));
        return view('admin.editcategory', $data);
    }


    ///add_category_process
    public function add_category_process(Request $request)
    {
        ///check form validation
        $validation = Validator::make($request->all(), [
            'cat_name' => 'required|unique:tbl_categories',
       ]);

        ///validation errors
        if ($validation->fails()) {
            $data = array('code' => 'errors', 'message' =>  $validation->errors());
            echo json_encode($data);
            die;
        } else {
            $postData = array();
            $postData['cat_name'] = ucfirst($request->cat_name);
            $last_id = AddNewRecord('tbl_categories', $postData);
            if ($last_id) {
                $url = SERVER_ROOT_PATH.'admin/category_list';
                $data = array('code' => 'success_url', 'message' => 'New category Has Been Added!','redirect_url'=> $url);
                echo json_encode($data);
                die;
            }
        }

        

        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        die;
    }


    ///delete_category_process
    public function delete_category_process(Request $request)
    {
        extract($request->all());
        $where = array('cat_id'=>$id);
        $is_deleted = DeleteRecord('tbl_categories', $where);
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
