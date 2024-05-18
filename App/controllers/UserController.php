<?php
namespace Controller;

use Model\User;

class UserController 
{
    private $fields;

    public function __construct()
    {
        $this->fields = new User();
    }

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $data = file_get_contents("php://input");
            $array = json_decode($data, true);

            if (isset($array["username"]) && isset($array["email"]) && isset($array["password"]))
            {
                $username = htmlspecialchars($array["username"]);
                $email = htmlspecialchars($array["email"]);
                $password = password_hash($array["password"], true);

                $handle = $this->fields->stor($username, $email, $password);
                if ($handle)
                {
                    $response = ["success"=>true];
                    echo json_encode($response);
                    return;
                }
                $response = ["success"=>false];
                echo json_encode($response);
                return;
            }
        }   
    }

    public function all()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET")
        {
            $data = $this->fields->all();
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

            if (isset($array["id"]) && isset($array["username"]) && isset($array["email"]) && isset($array["password"]))
            {
                $id = intval($array["id"]);
                $username = htmlspecialchars($array["username"]);
                $email = htmlspecialchars($array["email"]);
                $password = password_hash($array["password"], PASSWORD_DEFAULT);

                $handle = $this->fields->update($id, $username,$email, $password);
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

                $handle = $this->fields->remove($id);
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