<?php

class AppModel
{
    public $id;
    public $errors = array();
    public $rules = array();
    public $tableName;

    public function __construct()
    {
        $this->getTableName();
    }

    public function setUp($dados)
    {
        foreach ($dados as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = htmlspecialchars($value);
            }
        }
        return $this;
    }

    public function save()
    {
        $vars = get_object_vars($this);

        if($this->id != "save"){
            $sql = $this->make_update($vars);
        } else {
            $sql = $this->make_insert($vars);
        }
        return $this;
    }

    public function select()
    {
        $sql = $this->make_select_all();
        return $sql;
    }

    private function getTableName()
    {
        if (!is_null($this->tableName)) return $this->tableName;
        $x = explode('Model', get_class($this));
        $this->tableName = $x[0] . 's';
    }


    private function make_insert($fields = array())
    {
        $field_names = '';
        $field_names2 = '';
        $field_values = array();

        foreach ($fields as $key => $value) {

            if ($this->is_bd_field($key)) {
                $field_names .= $key . ',';

                $field_names2 .= "'".htmlspecialchars($value)."',";
                array_push($field_values, htmlspecialchars($value));
            }
        }

        $field_names = substr($field_names, 0, strlen($field_names) - 1);
        $field_names2 = substr($field_names2, 0, strlen($field_names2) - 1);
        $sql = 'INSERT INTO '.$this->tableName.' ('.$field_names.') VALUES ('.$field_names2.')';
        // var_dump($sql); die();
        $this->execute($sql);
    }

    private function make_update($fields = array())
    {
        $field_names = '';
        $field_values = array();

        foreach ($fields as $key => $value) {
            if ($this->is_bd_field($key)) {
                $field_names .= $key . " = '".htmlspecialchars($value)."',";
                array_push($field_values, htmlspecialchars($value));
            }
        }

        $field_names = substr($field_names, 0, strlen($field_names) - 1);
        $sql = 'UPDATE '.$this->tableName.' SET '.$field_names.' WHERE id = '.$this->id;
        return $this->execute($sql);
    }

    private function make_select_all()
    {
        $sql = "SELECT * FROM $this->tableName Limit 6";
        $db_connect = new DatabaseConfig();
        $conexao = $db_connect->getConnection();
        $result = $conexao->query($sql);
        $row = $result->fetchAll();
        //var_dump($row); die();
        return $row;
    }
    
    private function execute($sql){
        try{
            $db_connect = new DatabaseConfig();
            $conexao = $db_connect->getConnection();
            $query = $conexao->prepare($sql);
            $result = $query->execute();
            return $result;
            
        }catch(PDOException $erro){
            return $erro;
        }
    }

    private function setBindParams($values, $params)
    {
        try{
            $db_connect = new DatabaseConfig();
            $conexao = $db_connect->getConnection();
            $query = $conexao->prepare($sql);
            $result = $query->execute($params);
            return $result;
        }catch(PDOException $erro){
            return $erro;
        }
    }

    private function is_bd_field($field)
    {
        return !is_array($field) && $field != 'errors' && $field != 'rules' && $field != 'tableName' && $field != 'id';
    }
}
