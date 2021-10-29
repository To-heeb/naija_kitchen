<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        // symlink(WRITEPATH."/uploads","uploads");
        // symlink(WRITEPATH."/assets","assets");
        $data["title"] = "Home";
        $data["products"] = model("ProductsModel")->getProducts([], "id", "RANDOM", 6);
        $data["cart"] = session("cart");
        $data["categories"] = model("CategoryModel")->orderBy("id","desc")->findall();
        return view('pages/landing', $data);
    }
    public function explore()
    {
        $model = model("ProductsModel");
        $data["products"] = $model->getProducts([], "title", "asc", 9);
        $request = $this->request->getGet();
        
        if (array_key_exists("keyword", $request) && array_key_exists("category", $request) && array_key_exists("sortby", $request) && array_key_exists("order", $request)) {
            $category = null;
            $sortby = null;
            $keyword = $request["keyword"];
            $order = $request["order"];
            if ($request["category"] == "all") {
                $category = [];
            } else {
                $category = "category = ".$request["category"];
            }
            if ($request["sortby"] == "default") {
                $sortby = "id";
            } else {
                $sortby = $request["sortby"];
            }
            $data["products"] = $model->select("products.*,category.title as category_title")->join("category", "products.category = category.id")->like("products.title", $keyword, "BOTH")->where($category)->orderby($sortby, $order)->paginate(9);
        }

        $data["title"] = "Explore";
        $data["pager"] = $model->pager;
        $data["categories"] = model("CategoryModel")->findall();

        return view('pages/explore', $data);
    }
    public function blog($create = false)
    {   
        if ($create === false) {
            $model = model("ProductsModel");
            $data["products"] = $model->getProducts([], "title", "asc", 9);
    
            $data["title"] = "Blog";
            $data["pager"] = $model->pager;
            $data["categories"] = model("CategoryModel")->findall();
    
            return view('pages/blog', $data);
        }else {
            $model = model("BlogModel");
            $data["category"] = $model->getBlogCategory();
            $data["title"] = "Create Blog";
            return view('pages/create', $data);
        }
    }
    public function createBlog(){
        
        if ($this->request->getMethod() === 'post' && $this->validate([
            'blog_title' => 'required|min_length[7]|max_length[255]',
            'blog_category' => 'required',
            'blog_body'  => 'required',
            
        ]))
        {
            $model = model("BlogModel");
            
            $data = [
                'blog_title' => $this->request->getPost('blog_title'),
                'blog_slug'  => url_title($this->request->getPost('blog_title'), '-', TRUE),
                'blog_body'  => $this->request->getPost('blog_body'),
                'blog_category' => $this->request->getPost('blog_category'),
            ];
            $model->insertBlog($data);
            $data["title"] = "Success";
            return view('pages/success', $data);
        }
        $model = model("BlogModel");
        $data["category"] = $model->getBlogCategory();
        $data["title"] = "Create Blog";
        return view('pages/create', $data);
    }
    public function myCarts()
    {
        $data["title"] = "Checkout";
        return view('pages/checkout', $data);
    }
    public function products()
    {
        $data["title"] = "Products";
        return view('pages/products', $data);
    }
    public function orders()
    {
        $request = $this->request->getGet();
        if (array_key_exists("action", $request) && array_key_exists("order", $request)) {
            if ($request["action"] == "cancelled") {
                model("OrderModel")->update($request["order"], ["status"=>$request["action"]]);
                return redirect()->to(base_url("orders"));
            }
            if ($request["action"] == "completed") {
                model("OrderModel")->update($request["order"], ["status"=>$request["action"]]);
                return redirect()->to(base_url("orders"));
            }
        }

        $data["orders"] = model("OrderModel")->getOrders();
        $data["title"] = "All Orders";
        return view('pages/orders', $data);
    }
    public function addToCart()
    {
        $request = $this->request->getGet();
        $cart = [];
        if (session("cart")) {
            $cart = session("cart");
        }
        array_push($cart, $request["product"]);
        session()->set("cart", array_unique($cart));

        return $this->getCart();
    }
    public function removeFromCart()
    {
        $request = $this->request->getGet();
        $cart = session("cart");
        
        $index = array_search($request["product"], $cart);
        unset($cart[$index]);
        session()->set("cart", array_unique(array_values($cart)));
        return $this->getCart();
    }
    public function getCart()
    {
        return $this->respond([
             "status"=>true,"data"=>session("cart") ? session("cart"):[]
         ]);
    }
    public function clearCart()
    {
        session()->remove("cart");
        return $this->cartInfo();
    }
    public function cartInfo()
    {
        $product = [];
        if (session("cart") && is_array(session("cart"))) {
            foreach (session("cart") as $key) {
                array_push($product, model("ProductsModel")->select("id,slug,title,description,price,image,per")->find($key));
            }
        }
        foreach ($product as $key) {
            $key->qty = 1;
        }

        return $this->respond([
             "status"=>true,"data"=>($product)
         ]);
    }
    public function checkOut() 
    {
        $request = $this->request->getPost();
        $transaction = null;
        $model = model("OrderModel");
        if ($request["payment"] == "online-payment" && array_key_exists("payment_reference", $request)) {
            $reference = $request["payment_reference"];
            if ($model->where(["payment_reference" => $reference])->countAllResults() > 0) {
                return $this->respond([
                    "status"=>false,"message"=>"Already existing transaction reference"
                ]);
            }
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer ".env('paystack_private_key'),
                "Cache-Control: no-cache",
                ),
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            if ($err) {

                return $this->respond([
                    "status"=>false,"message"=>"cURL Error #:" . $err
                ]);
            } else {
                $transaction = json_decode($response);
                $request["payment_status"] = $transaction->data->status;
                $request["payment_reference"] = $reference;
                $request["paystack_payment_data"] = \serialize($transaction);
            }
        }
        $item = [];
        for ($i=0; $i < count($request["item"]) ; $i++) {
            $tt = [];
            $tt["name"] = $request["item"][$i] ;
            $tt["qty"] = $request["qty"][$i] ;
            $tt["amount"] = $request["amount"][$i] ;
            array_push($item, $tt);
        }
        unset($request["item"],$request["qty"],$request["amount"]);
        $request["request"] = serialize($item);
        $request["order_id"] = \random_string();

        $saved = $model->save($request);
        if ($request["payment"] == "payment-on-delivery" || ($transaction && $transaction->data->status == "success")) {
            order_request($request);
            order_confirmation($request);
            session()->remove("cart");
            
            return $this->respond([
                "status"=>true,"message"=>"Your Order has been received. We will get back to you shortly"
            ]);
        } else {

            return $this->respond([
                "status"=>false,"message"=>$transaction->data->gateway_response
            ]);
        }
    }


    public function settings()
    {
        $data["title"] = "Settings";
        $data["email_templates"] = model("SettingsEmailTemplate")->findAll();
        return view('pages/settings', $data);
    }

    public function saveSettings()
    {
        $request = $this->request->getPost();
        if (isset($request["addresses"]) && $request["addresses"]) {
            $request["addresses"] = \serialize($request["addresses"]);
        }
        if (isset($request["phones"]) && $request["phones"]) {
            $request["phones"] = \serialize($request["phones"]);
        }
        $db = db_connect()->table("settings");
        foreach ($request as $key => $value) {
            if ($db->getWhere(["type"=>$key])->getRow()) {
                $db->update(["description"=>$value], ["type"=>$key]);
            } else {
                $db->insert(["type"=>$key,"description"=>$value]);
            }
        }
        session()->set("settings", $db->get()->getResult());
        set_message("success", "", "Setting Saved");
        return redirect()->to(base_url("settings"));
    }
    public function saveEmailTemplate()
    {
        $request = $this->request->getPost();
        model("SettingsEmailTemplate")->save($request);
        return redirect()->to(base_url("settings"));
    }
    public function updatePassword()
    {
        $request = $this->request->getPost();
        $site_password = get_settings("site_password");
        if ($site_password !== sha1($request['old_password'])) {
            set_message("error", "Invalid Password", "Password Updated Failed");
        } else {
            $db = db_connect()->table("settings");
            $db->update(["description"=>sha1($request['new_password'])], ["type"=>$request['old_password']]);
            set_message("success", "", "Password Updated");
        }
        return redirect()->to(base_url("settings"));
    }

    public function loginAttempt()
    {
        $request = $this->request->getPost();
        $result = auth_attempt($request);
        return redirect()->to($result["redirect_url"]);
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }




    public function apiGatewayDetails()
    {
        $request = $this->request->getGet("order");
        if (!$request) {
            return $this->respond([
                "status"=>false,"message"=>"No Order Id"
            ]);
        }
        $data = model("OrderModel")->select("paystack_payment_data")->find($request);
        if (!$data) {
            $data = null ;
        } else {
            $data = unserialize($data->paystack_payment_data);
        }
        return $this->respond([
                "status"=>(Boolean)$data,"data"=>$data
            ]);
    }


    //--------------------------------------------------------------------
}
