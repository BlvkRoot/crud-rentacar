<?php
    class PaginationRepository extends AppRepository
    {
        private $tableName;
        private $conexao;

        function __construct(){
            parent::__construct();
            $db_connect = new DatabaseConfig();
            $this->conexao = $db_connect->getConnection();
            $this->tableName = 'cars';
        }

        public function countCars()
        {
            $query = 'SELECT COUNT(*) FROM '.$this->tableName.'';
            $stmt = $this->conexao->query($query);

            return $stmt->fetchColumn();
        }

        public function getLimitedCars($limit)
        {
            $query = 'SELECT * FROM '.$this->tableName.' '.$limit.'';

            $stmt = $this->conexao->query($query);
            $result = $stmt->fetchAll();

            return $result;
        }


    }