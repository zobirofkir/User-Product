<?php
namespace Model;

use Model\Model;

class User extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "users";
    }

    public function stor($username, $email, $password)
    {
        $fields = [
            "username"=>$username,
            "email"=>$email,
            "password"=>$password
        ];

        return parent::store($fields);
    }

    public function all()
    {
        return parent::get();
    }

    public function update($id, $username,$email,$password)
    {
        $fields = [
            "username" => $username,
            "email" => $email,
            "password" => $password
        ];

        $this->condition = [
            "id"=>$id
        ];
        return parent::put($fields, $this->condition);
    }

    public function remove($id)
    {
        $this->condition = [
            "id" => $id
        ];
        return parent::delete($this->condition);
    }
}