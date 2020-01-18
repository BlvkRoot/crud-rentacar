<?php
	class LoginModel extends AppModel
	{
		private $username;
		// private $password;

		public function __construct()
		{}

		public function setCampos($username, $password)
		{
			$this->username = $username;
			$this->password = $password;
		}

		public function getUsername()
		{
			return $this->username;
		}

		public function getPassword()
		{
			return $this->password;
		}

	}