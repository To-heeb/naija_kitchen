<?php namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $useSoftDeletes = true;
    protected $returnType = "object";
    protected $allowedFields = ["order_id","fullname","address","email","phone","total","payment","request","status","payment_status","payment_reference","paystack_payment_data"];
    protected $useTimestamps = true;

    public function getOrders($where = [])
    {
        $data = $this->findall();
        foreach ($data as $key) {
            $key->request = unserialize($key->request);
        }
        return $data;
        //return $this->select("products.*,category.title as category_title")->join("category", "products.category = category.id")->where($where)->findall();
    }
}
