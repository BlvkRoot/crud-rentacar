<?php    

    class CarroRepository extends AppRepository
    {
        private $conexao;
        private $id;
        private $tableName;
        private $model;

        public function __construct()
        {
            $this->model = new CarroModel();
            $db_connect = new DatabaseConfig();
            $this->conexao = $db_connect->getConnection();
            $this->id = 'id';
            $this->tableName = 'cars';
        }

        public function setUpDados($dados)
        {
            return parent::setUpModel($this->model, $dados);
        }
        
        public function fetchCarInfoById($id)
        {
            $query = "SELECT * FROM $this->tableName WHERE $this->id = $id";
            $result = $this->conexao->query($query);

            $row = $result->fetchAll();

            return $row;        
        }

        public function deleteCar($id)
        {
            $query = "DELETE FROM $this->tableName WHERE $this->id = ?"; 
            $stmt = $this->conexao->prepare($query);
            $stmt->bindParam(1, $id);

            $stmt->execute();

        }

        public function viewCar()
        {
            return $this->model->select();
        }

    }
?>