<?php namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class App extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $data["title"] = "Home";
        return view("vue_components/app",$data);
    }
}
