<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LoginFilter implements FilterInterface
{

	public function before(RequestInterface $request)
	{ 

		if (!is_logged_in()) {
           session()->set('redirect_url', current_url()."?{$_SERVER['QUERY_STRING']}");
            set_message("warning", "Authentication Required", "Please Login to continue");
            return redirect()->to(base_url());
        }
	}

	public function after(RequestInterface $request, ResponseInterface $response)
	{

	}

	//--------------------------------------------------------------------
}
