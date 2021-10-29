<?php namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;
class Product extends BaseController
{
	use ResponseTrait;
	public function index()
	{
		$request = $this->request->getGet();
		if(array_key_exists("action",$request) && array_key_exists("slug",$request)){
			if($request["action"] == "soft_delete"){
				if(model("ProductsModel")->delete($request["slug"])){

					set_message("success", "", "Product removed");
				}
				return redirect()->to(base_url("products"));
			}
			if($request["action"] == "edit"){
				$product = model("ProductsModel")->getProduct(["products.slug"=>$request["slug"]]);
				if($product){
					$data["product_item"] = $product;
				}

			}
			
		}
		$data["title"] = "Products";
		$data["categories"] = model("CategoryModel")->findall();
		$data["products"] = model("ProductsModel")->getProducts();
		return view('pages/products',$data);
	}

	public function save()
	{
		$request = $this->request->getPost();

		if($this->request->getFile("image") && $this->request->getFile("image")->isValid()){
			$request["image"] = $this->request->getFile("image")->store();
		}
		$request["slug"] = url_title($request["title"],"-",true)."-".time();
		if(model("ProductsModel")->insert($request)){

			set_message("success", "", "Product Added");
		}
		return redirect()->to(base_url("products")); 
	}
	public function update()
	{
		$request = $this->request->getPost();
		if($this->request->getFile("image") && $this->request->getFile("image")->isValid()){
			$request["image"] = $this->request->getFile("image")->store();
			if(isset($request["previous_image"]) && $request["previous_image"]){
				file_exists(WRITEPATH."uploads/".$request["previous_image"]) ? unlink(WRITEPATH."uploads/{$request["previous_image"]}"):"";
			}
		}
		if(!isset($request["fake_order"])){
			$request["fake_order"] = null;
		}
		if(!isset($request["fake_ratings"])){
			$request["fake_ratings"] = null;
		}

		model("ProductsModel")->save($request);
		return redirect()->to(current_url()."?{$_SERVER['QUERY_STRING']}"); 
	}


	public function categories()
	{
		$request = $this->request->getGet();
		if(array_key_exists("action",$request) && array_key_exists("slug",$request)){
			if($request["action"] == "delete"){
				if(!strstr($request["slug"],"others")){
					if(model("CategoryModel")->handleDelete($request["slug"])){
						set_message("success", "", "Product removed");
					}
					return redirect()->to(base_url("products/categories"));
				}
				return;
			}
			if($request["action"] == "edit"){
				$category = model("CategoryModel")->getCategory(["slug"=>$request["slug"]]);
				if($category){
					$data["category_item"] = $category;
				}

			}
		}
		$data["title"] = "Categories";
		$data["categories"] = model("CategoryModel")->getCategories();
		return view('pages/categories',$data);
	}

	public function categorySave()
	{
		$request = $this->request->getPost();

		if($this->request->getFile("image") && $this->request->getFile("image")->isValid()){
			$request["image"] = $this->request->getFile("image")->store();
		}
		$request["slug"] = url_title($request["title"],"-",true)."-".time();
		if(model("CategoryModel")->insert($request)){
			set_message("success", "", "Category Saved");
		}
		return redirect()->to(base_url("products/categories")); 
	}

	public function categoryUpdate()
	{
		$request = $this->request->getPost();
		if($this->request->getFile("image") && $this->request->getFile("image")->isValid()){
			$request["image"] = $this->request->getFile("image")->store();
			if(isset($request["previous_image"]) && $request["previous_image"]){
				file_exists(WRITEPATH."uploads/".$request["previous_image"]) ? unlink(WRITEPATH."uploads/{$request["previous_image"]}"):"";
			}
		}
		model("CategoryModel")->save($request);
		return redirect()->to(current_url()."?{$_SERVER['QUERY_STRING']}");
	}

	public function getRandomProducts(){
		$request = $this->request->getGet();
		return $this->respond(model("ProductsModel")->getProducts([], "id", "RANDOM", $request["count"] ?? 6));
	}










	

	//--------------------------------------------------------------------

}
