<?php

/**
 * The goal of this file is to allow developers a location
 * where they can overwrite core procedural functions and
 * replace them with their own. This file is loaded during
 * the bootstrap process and is called during the frameworks
 * execution.
 *
 * This can be looked at as a `master helper` file that is
 * loaded early on, and may also contain additional functions
 * that you'd like to use throughout your entire application
 *
 * @link: https://codeigniter4.github.io/CodeIgniter4/
 */

   if (! function_exists('pretty_print')) {
       function pretty_print($data)
       {
           echo "<pre>";
           print_r($data);
           echo "</pre>";
           return;
       }
   }

   if (!function_exists("get_settings")) {
       function get_settings($name)
       {
           if (session()->has("settings")) {
               $settings = session("settings");
               foreach (array_values($settings) as $key) {
                   if ($key->type == $name) {
                       return $key->description;
                   }
               }
           }
           $db = db_connect()->table("settings");
           return $db->getWhere(["type"=>$name])->getRow("description");
       }
   }

if (! function_exists('is_logged_in')) {
    function is_logged_in()
    {
        return session()->has("logged_in") && session("logged_in") == true;
    }
}



   if (! function_exists('process_image')) {
       function process_image($file)
       {
           \Config\Services::image()
        ->withFile($file)
        ->save(WRITEPATH."uploads/file25.jpg");
       }
   }

   if (! function_exists('auth_attempt')) {
    function auth_attempt(array $credentials)
    {
        $site_email = get_settings("site_email");
        $site_password = get_settings("site_password");
        if ($site_email !== $credentials['email'] && $site_password !== sha1($credentials['password'])) {
            set_message("warning","Error","Please check your credentials.");
            return ["status"=>false,"message"=>"Unable to log you in. Please check your credentials.",'redirect_url'=>base_url()];
        }

        session()->set("logged_in",true);
        $redirectURL = base_url('orders');
        if (session()->has("redirect_url") && session("redirect_url")) {
            $redirectURL = session('redirect_url');
            unset($_SESSION['redirect_url']);
        }
        set_message("success", "", "Welcome back");
        return  ["status"=>true,"message"=>"Login Successful",'redirect_url'=>$redirectURL];
    }
}

 if (! function_exists('set_message')) {
     function set_message($status, $title, $message)
     {
         session()->setFlashdata('notification', "<script>simpleAlert('$status','$message','$title')</script>");
     }
 }

 if (! function_exists('do_email')) {
    function do_email(string $to, string $subject, $view_data)
    {
        $mail = service("phpmailer",true);

        try {
            $site_name      = get_settings('site_name');
            $site_email     = get_settings('site_email');
            if (env('mailer_type') == "isSMTP") {
                $mail->isSMTP();
            } else {
                $mail->isMail();
            }
        
            $mail->Host = env('host');//get_settings('host');
            $mail->SMTPAuth = env('smtp_auth');//get_settings('smtp_auth')?true:false;
            $mail->Username = get_settings('site_email');
            $mail->Password = env('smtp_password');//get_settings('smtp_password');
            $mail->SMTPSecure = env('smtp_secured');//get_settings('smtp_secure');
            $mail->Port = env('port');//get_settings('port');
            $mail->setFrom($site_email, $site_name);
            $mail->addReplyTo($site_email, $site_name);
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->isHTML(true);

            $data["content"] = $view_data;
            $mail->Body = view("email/index", $data);
        
            $mail->send();
            return true;
        } catch (\Throwable $th) {
            return [false,$th->getMessage()];
        } finally {
            $mail->smtpClose();
        }
    }
}

if (! function_exists('currency')) {
    function currency($amount)
    {
        return is_numeric($amount)||empty($amount)?"&#8358; ".number_format(round($amount, 2), 2):$amount;
    }
}




