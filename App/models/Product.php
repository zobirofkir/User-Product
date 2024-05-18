<?php
namespace Model;

use Model\Model;

class Product extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "products";
    }
    

    public function storeProduct($title, $image, $tags, $description)
    {
        $fields = [
            "title"=>$title,
            "image"=>$image,
            "tags"=>$tags, 
            "description"=>$description
        ];

        return parent::store($fields);
    }

    public function updateProduct($id, $title, $image, $tags, $description)
    {
        $fields = [
            "title"=>$title,
            "image"=>$image,
            "tags"=>$tags, 
            "description"=>$description
        ];
        $this->condition = [
            "id"=>$id
        ];

        return parent::put($fields, $this->condition);
    }

    public function allProducts()
    {
        return parent::get();
    }

    public function deleteProducts($id)
    {
        $this->condition = [
            "id"=>$id
        ];
        return parent::delete($this->condition);
    }
}