<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'slug';
    protected $useSoftDeletes = true;
    protected $returnType = "object";
    protected $allowedFields = ["title","slug","description","image"];
    protected $useTimestamps = true;

    public function getCategory($where = [])
    {
        return $this->where($where)->first();
    }
    public function getCategories($where = [])
    {
        $cat =  $this->where($where)->findAll();
        foreach ($cat as $key) {
            $key->total_count = model("ProductsModel")->where(["category"=>$key->id])->countAllResults();
        }
        return $cat;
    }
    public function handleDelete($slug)
    {
        $cat = $this->select("id")->where(["slug"=>$slug])->first();
        $default_id = $this->select("id")->where(["title"=>"others"])->first();
        db_connect()->table("products")->set(["category"=>$default_id->id])->where(["category"=>$cat->id])->update();
        $this->delete($slug,true);
        return;
    }
}
