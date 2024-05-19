<?php
namespace Route;

use Config\Config;
use Controller\ProductController;
use Controller\UserController;

class Routes extends Config
{
    private $userController;
    private $productController;


    public function __construct()
    {
        $this->userController = new UserController();
        $this->productController = new ProductController();
    }

    public function handleRoutes()
    {
        $this->routes = [
            'POST' => [
                '/users' => [$this->userController, 'store'],
                '/products' => [$this->productController, 'store']
            ],

            'GET'=> [
                '/users' => [$this->userController, 'all'],
                '/products' => [$this->productController, 'all']
            ],
            
            'PUT' => [
                '/users'=>[$this->userController, 'put'],
                '/products' => [$this->productController, 'put']
            ],
            
            'DELETE' => [
                '/users' => [$this->userController, 'delete'],
                '/products' => [$this->productController, 'delete']
            ]
        ];
        $this->handleUri();
    }
}