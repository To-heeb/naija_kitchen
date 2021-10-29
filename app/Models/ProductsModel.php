<?php namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'slug';
    protected $useSoftDeletes = true;
    protected $returnType = "object";
    protected $allowedFields = ["title","slug","description","price","image","category","fake_order","fake_ratings","per"];
    protected $useTimestamps = true;

    function getProducts($where = [],$orderby = "id",$order_mode="asc",$limit=200){
        return $this->select("products.*,category.title as category_title")->join("category", "products.category = category.id")->where($where)->orderby($orderby,$order_mode)->paginate($limit);
    }

    function getProduct($where = []){
        return $this->select("products.*,category.title as category_title")->join("category", "products.category = category.id")->where($where)->first();
    }

}
