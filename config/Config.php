<?php
namespace Config;

class Config
{
    protected $routes;

    public function handleUri()
    {
        $handleMethod = $_SERVER["REQUEST_METHOD"];
        $handleUrl = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

        if (isset($this->routes[$handleMethod][$handleUrl]))
        {
            call_user_func($this->routes[$handleMethod][$handleUrl]);
        }
        http_response_code(404);
    }
    
}