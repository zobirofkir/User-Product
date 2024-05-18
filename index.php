<?php

use Config\Connection;
use Controller\ProductController;
use Controller\UserController;
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json; charset=utf-8');

require_once  __DIR__ . "/vendor/autoload.php";

class RouteIndex
{
    private $userController;
    private $productController;

    public function __construct()
    {
        $this->userController = new UserController();
        $this->productController = new ProductController();
    }

    public function store()
    {
        if ($_SERVER["REQUEST_URI"] === "/users")
        {
            return $this->userController->store();
        }
    }

    public function all()
    {
        if ($_SERVER["REQUEST_URI"] === "/users")
        {
            return $this->userController->all();
        }
    }

    public function put()
    {
        if ($_SERVER["REQUEST_URI"] === "/users")
        {
            return $this->userController->put();
        }
    }

    public function delete()
    {
        if ($_SERVER["REQUEST_URI"] === "/users")
        {
            return $this->userController->delete();
        }
    }

    /*
        Store Product
    */


    public function storeProduct()
    {
        if ($_SERVER["REQUEST_URI"] === "/products")
        {
            return $this->productController->store();
        }
    }
    public function updateProduct()
    {
        if ($_SERVER["REQUEST_URI"] === "/products")
        {
            return $this->productController->put();
        }
    }

    public function allProduct()
    {
        if ($_SERVER["REQUEST_URI"] === "/products")
        {
            return $this->productController->all();
        }
    }

    public function deleteProduct()
    {
        if ($_SERVER["REQUEST_URI"] === "/products")
        {
            return $this->productController->delete();
        }
    }

}

$store = new RouteIndex();
$store->store();
$store->all();
$store->put();
$store->delete();

/*
    Store Product Controller
*/

$store->storeProduct();
$store->updateProduct();
$store->allProduct();
$store->deleteProduct();