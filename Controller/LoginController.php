<?php
    class LoginController extends AppController
    {
		private $loginRepository;
        public function __construct()
        {
            parent::__construct();
            $this->loginRepository = new LoginRepository();
        }

        public function verifyUser()
		{
            $userCredentials = $this->getPost();
            
            session_destroy();
			$username = isset($_SESSION['username']) ? ($_SESSION['username'] = true) : ($_SESSION['username'] = $userCredentials['username']);
			
			$password = isset($_SESSION['password']) ? ($_SESSION['password'] = true) : ($_SESSION['password'] = $userCredentials['password']);

			$result = $this->loginRepository->checkUserCredentials($username, $password);

            
            // var_dump($result); die();
			return $result;
		}

    }