<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class ManageContent extends Controller
{

    ///load_content_list
    public function load_content_list()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        return view('admin.contentlist', $data);
    }


    ///add_content
    public function add_content()
    {
        $data = array();
        ///common  lines
        $data['title'] = GetTitle();
        return view('admin.addcontent', $data);
    }

    ///add_content_process
    public function add_content_process(Request $request)
    {
        $this->validate($request, [
            'page_name' => 'required',
            'content' => 'required',
            'filenames' => 'required',
            'filenames.*' => 'image'
       ]);

        ///handle multiple images
        $files = [];
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = time().rand(1, 100).'.'.$file->extension();
                $file->move(public_path('admin/cms'), $name);
                $files[] = $name;
            }
        }
  
        echo '<pre>';
        print_r($files);
        echo '</pre>';
        die;


        ///handle editor images
        $content = $request->content;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');
        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= "/Admin/cms/" . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);
          
            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }
        $content = $dom->saveHTML();
        echo '<pre>';
        print_r($content);
        echo '</pre>';
        die;
    }
}
