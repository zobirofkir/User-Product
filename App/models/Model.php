<?php
namespace Model;

use QueryBuilder\QueryBuilder;

class Model 
{
    private $query;
    protected $table;
    protected $data;
    protected $condition = [];

    public function __construct()
    {
        $this->query = new QueryBuilder();
    }

    public function store($data)
    {
        return $this->query->insert($this->table, $data);
    }
    
    public function get($condition = [])
    {
        return $this->query->get($this->table, $condition);
    } 

    public function put($data, $condition = [])
    {
        return $this->query->put($this->table, $data, $condition);
    }

    public function delete($condition = [])
    {
        return $this->query->delete($this->table, $condition);
    }
}
