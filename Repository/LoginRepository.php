<?php
	class LoginRepository extends AppRepository
	{
		private $id;
		private $tableName;
		private $model;
		private $conexao;

		public function __construct()
		{

			$this->model = new LoginModel();
			$db_connect = new DatabaseConfig();
			$this->conexao = $db_connect->getConnection();
			$this->id = 'id';
			$this->tableName = 'login';
		}

		public function checkUserCredentials($username, $password)
		{
			//var_dump($this->tableName); exit();
			$sql = "SELECT * FROM $this->tableName WHERE username = ? AND password = ?";
			$stmt = $this->conexao->prepare($sql);
			$stmt->bindParam(1, $username);
			$stmt->bindParam(2, $password);

			$stmt->execute();

			$count = $stmt->rowCount();

			return $count;
		}
	}