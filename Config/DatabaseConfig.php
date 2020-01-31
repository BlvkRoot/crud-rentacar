<?php
    class DatabaseConfig
    {
        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $dbName = "db_rent_a_car";
        private $port = 3307;

        //Conexao
        private $conexao;

        public function __construct()
        {
            try
            {
                $this->conexao = new PDO("mysql:host=$this->host;port=$this->port;dbname=$this->dbName",
                                      $this->user, $this->password, array(PDO::ATTR_PERSISTENT, false));
            }catch(PDOException $ex)
            {
                echo "Erro: " . $ex->getMessage();
            }
            
        }

        public function getConnection()
        {
            return $this->conexao;
        }
    }