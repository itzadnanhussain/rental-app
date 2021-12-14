<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class ManageEmail extends Controller
{

    ///load_email_list
    public function load_email_list()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        return view('admin.emaillist', $data);
    }
}
