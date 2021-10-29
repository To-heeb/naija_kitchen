<?php

if (! function_exists('order_request')) {
    function order_request($data)
    {
        $template = model("SettingsEmailTemplate")->where(["id"=>2])->first();
        if ($template->status == "enabled") {
            $fullname = $data["fullname"];
            $address = $data["address"];
            $email = $data["email"];
            $phone = $data["phone"];
            $total = currency($data["total"]);
            $method = $data["payment"];
            $order_id = $data["order_id"];
            $request  = unserialize($data["request"]);
            $orders = '<ul>';
            foreach ($request as $r){
                $orders .= "<li>{$r['qty']}x items of {$r['name']} </li>";
            }
            $orders .= '</dlil>';

            $tags = [
                "{fullname}","{address}","{email}","{phone}","{total}","{method}","{order_id}","{orders}"
            ];
            $replacements = [
                $fullname,$address,$email,$phone,$total,$method,$order_id,$orders
            ];
            $subject    = str_ireplace($tags, $replacements, $template->subject);
            $body       = str_ireplace($tags, $replacements, $template->email_body);

            $message = $body;
            return do_email(get_settings("site_email"), $subject, $message);
        }
    }
}
if (! function_exists('order_confirmation')) {
    function order_confirmation($data)
    {
        $template = model("SettingsEmailTemplate")->where(["id"=>1])->first();
        if ($template->status == "enabled") {
            $fullname = $data["fullname"];
            $address = $data["address"];
            $email = $data["email"];
            $phone = $data["phone"];
            $total = currency($data["total"]);
            $method = $data["payment"];
            $order_id = $data["order_id"];
            $request  = unserialize($data["request"]);
            $orders = '<ul>';
            foreach ($request as $r) {
                $orders .= "<li>{$r['qty']}x items of {$r['name']} </li>";
            }
            $orders .= '</dlil>';

            $tags = [
                "{fullname}","{address}","{email}","{phone}","{total}","{method}","{order_id}","{orders}"
            ];
            $replacements = [
                $fullname,$address,$email,$phone,$total,$method,$order_id,$orders
            ];
            $subject    = str_ireplace($tags, $replacements, $template->subject);
            $body       = str_ireplace($tags, $replacements, $template->email_body);

            $message = $body;
            return do_email($email, $subject, $message);
        }
    }
}
