<?php
namespace Controller;

use Model\Product;

class ProductController 
{
    private $fields;

    public function __construct()
    {
        $this->fields = new Product();
    }

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $data = file_get_contents("php://input");
            $array = json_decode($data, true);

            if (isset($array["title"]) && isset($array["image"]) && isset($array["tags"]) && isset($array["description"]))
            {
                $title = htmlspecialchars($array["title"]);
                $image = htmlspecialchars($array["image"]);
                $tags = htmlspecialchars($array["tags"]);
                $description = htmlspecialchars($array["description"]);

                $this->fields->storeProduct($title, $image, $tags, $description);

                $response = ["success"=>true];
                echo json_encode($response);
                return;
            }
        }   
    }

    public function all()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET")
        {
            $data = $this->fields->allProducts();
            if ($data) {
                $response = $data;
                echo json_encode($response);
                return;
            }
            return false;
        }
        return false;
    }


    public function put()
    {
        if ($_SERVER["REQUEST_METHOD"] === "PUT")
        {
            $data = file_get_contents("php://input");
            $array = json_decode($data, true);

            if (isset($array["id"]) && isset($array["title"]) && isset($array["image"]) && isset($array["tags"]) && isset($array["description"]))
            {
                $id = intval($array["id"]);
                $title = htmlspecialchars($array["title"]);
                $image = htmlspecialchars($array["image"]);
                $tags = htmlspecialchars($array["tags"]);
                $description = htmlspecialchars($array["description"]);

                $handle = $this->fields->updateProduct($id, $title, $image, $tags, $description);
                if ($handle)
                {
                    $response = ["success" => true];
                    echo json_encode($response);
                    return;
                }
                return false;
            }
        }
    }

    public function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] === "DELETE")
        {
            $data = file_get_contents("php://input");
            $array = json_decode($data, true);

            if (isset($array["id"]))
            {
                $id = intval($array["id"]);

                $handle = $this->fields->deleteProducts($id);
                if ($handle)
                {
                    $response = ["success" => true];
                    echo json_encode($response);
                    return;
                }
                return false;
            }
        }
    }
    
}