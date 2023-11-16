<?php

class Model {
    private $host = 'localhost';
    private $db   = 'AMHLOPHE';
    private $user = 'root';
    private $pass = '';
    private $charset = 'utf8';

    static $pdo;


    function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset, $this->user, $this->pass);
        } catch (\Throwable $th) {
            die($th);
        }
    }
    public function GetOne($query, $data = array()){
        $prepare = $this->pdo->prepare($query);
        $prepare->execute($data);

        return $prepare->fetch(PDO::FETCH_ASSOC);
    }
    
    public function GetAll($query, $data = array()){
        $prepare = $this->pdo->prepare($query);
        $prepare->execute($data);

        return $prepare->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Save($table, $data)
    {
        $values = array();
        
        foreach ($data as $field)
        {
            $values[] = ':' . $field;
        }
        $values = implode(',', $values);
        $fields = implode(',', array_keys($data));
        $query = "INSERT INTO $table ($fields) VALUES ($values)";

        $prepare = $this->pdo->prepare($query);
        foreach ($data as $f => $v)
        {
            $prepare->bindValue(':' . $f, $v);
        }
        $prepare->execute();
       
    }
    
    public function Edit($table, $data, $tail){
        $arr = [];
        foreach ($data as $field => $values)
        {
            $fieldEqualsValue = $field."="."\"".$values."\"";
            array_push($arr, $fieldEqualsValue);
        }

        $fieldsAndValues = implode(', ', $arr);
        $query = "UPDATE `$table` SET $fieldsAndValues WHERE $tail";
        $prepare = $this->pdo->prepare($query);
        $prepare->execute();
    }
}