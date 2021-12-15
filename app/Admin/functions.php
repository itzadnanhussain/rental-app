<?php
use Illuminate\Support\Str;

///GetTitle
if (!function_exists('GetTitle')) {
    function GetTitle()
    {
        $url = Str::of(url()->current())->after(SERVER_ROOT_PATH);
        $find = array("/", "-");
        $replace = array(" ", " ");
        return ucwords(str_replace($find, $replace, $url));
    }
}


/////decryptData//////
if (!function_exists('decryptData')) {
    function decryptData($string, $salt)
    {
        $password = "yEfHZ18ly"; //$thiz->objDefaultVariable->VAR_PASSWORD_CRYPTO_KEY;

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = $password;
        $secret_iv = $salt;

        $secret_iv_first = strrev(substr($secret_iv, 0, 5));
        $secret_iv_last = strrev(substr($secret_iv, -5));
        $secret_iv = $secret_iv_last . '9' . $secret_iv_first;

        // hash
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        return $output;
    }
}


////encryptData
if (!function_exists('encryptData')) {
    function encryptData($plaintext)
    {
        $password = "yEfHZ18ly"; //$thiz->objDefaultVariable->VAR_PASSWORD_CRYPTO_KEY;
        //$password = $thiz->objDefaultVariable->VAR_PASSWORD_CRYPTO_KEY;

        $rand_IV = date('His', time()) . mt_rand();
        $rand_IV = str_shuffle($rand_IV);



        $encrypt_method = "AES-256-CBC";
        $secret_key = $password;

        $secret_iv = $rand_IV;
        $secret_iv_first = strrev(substr($secret_iv, 0, 5));
        $secret_iv_last = strrev(substr($secret_iv, -5));
        $secret_iv = $secret_iv_last . '9' . $secret_iv_first;
        // hash
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = openssl_encrypt($plaintext, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
        $d["enc_text"] = $output;
        $d["salt"] = $rand_IV;
        return $d;
    }
}

///file
if (!function_exists('file_upload')) {
    function file_upload()
    {
        ///handle profile
        // if ($request->hasfile('profile')) {
        //     $file = $request->file('profile');
        //     $name = 'profile_'.$last_id.'.'.$file->extension();
        //     $file->move(public_path('admin/profiles/'.$last_id), $name);
        // }
    }
}

///
if (!function_exists('ReadMore')) {
    function ReadMore($text = null, $link = null)
    {
        $string = strip_tags($text);
        if (strlen($string) > 50) {
            // truncate string
            $stringCut = substr($string, 0, 50);
            $endPoint = strrpos($stringCut, ' ');
            
            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            if ($link) {
                $string .= '... <a href="'.$link.'">Read More</a>';
            } else {
                $string .= '...';
            }
        }
       
        return $string;
    }
}
