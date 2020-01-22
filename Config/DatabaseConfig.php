<?php
    class DatabaseConfig
    {
        private $host = "ec2-107-21-214-101.compute-1.amazonaws.com";
        private $user = "ulyegoafqtopnv";
        private $password = "a9d5dc43bbdbff4b4add817814d6b25135eb4d6d5a0d074baed297021fcc06a7";
        private $dbName = "db_rent_a_car";
        private $port = 5432;

        //Conexao
        private $conexao;

        public function __construct()
        {
            try
            {
                $this->conexao = new PDO("postgresql:host=$this->host;port=$this->port;dbname=$this->dbName",
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