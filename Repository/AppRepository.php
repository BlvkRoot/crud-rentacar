<?php    

    class AppRepository
    {
        private $conexao;
        private $campo;
        private $id;
        private $tableName;

        public function __construct()
        {
            $db_connect = new DatabaseConfig();
            $this->conexao = $db_connect->getConnection();
            $this->campo = array('plate', 'name', 'color', 'status');
            $this->id = 'id';
            $this->tableName = 'cars';
        }


        protected function setUpModel($Model, $dados)
        {
            $Model->setUp($dados);
            return $Model;
        }

    }
?>