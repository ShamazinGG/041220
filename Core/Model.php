<?php

abstract class Model
{
    protected $attributes;
    protected $table;
    protected $id;
    protected $db;

    public function __construct()
    {
        $this->db = DB::getDB();
    }

    public  function getAll()
    {
        $table = $this->table;
        $sql = $this->db->query("SELECT * FROM $table");
        return $sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getById()
    {
        $id = Router::getInstance()->getId();
        $sql = $this->db->query("SELECT $this->attributes FROM $this->table WHERE id = $id");
        foreach ($sql as $render){
            return $render;
        }
    }

    public function putDB($data)
    {
        $attributes = implode(',', $this->attributes);
        $sql = "INSERT INTO $this->table ($attributes) VALUES (NULL, '$data')";
        $query = $this->db->query($sql);

    }


    public function create ($data)
    {
        $attributes = implode("','", $data);
        $this->putDB($attributes);
        return $data;

    }

        public function delete()
        {
            $id = Router::getInstance()->getId();
            $sql = "DELETE FROM $this->table WHERE id= $id";
            return $this->db->query($sql);

        }






}