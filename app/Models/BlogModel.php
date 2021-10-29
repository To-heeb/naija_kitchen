<?php namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog';
    protected $primaryKey = 'blog_id';
    protected $returnType = "object";
    protected $allowedFields = ["blog_id","blog_category","blog_title","blog_slug","blog_body"];
    protected $useTimestamps = true;

    public function insertBlog($data)
    {
        return $this->insert($data);
    }

    public function getBlogCategory()
    {
      $query = $this->asArray()->select("`blog`.`blog_category`, blog_category.*")->join("blog_category", "blog.blog_category = category_id", "right");
      return $query->findAll();
    }
    public function getBlogs()
    {
      $this->get();
    }



}
