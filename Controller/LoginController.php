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
			
			// $_SESSION['username'] = $userCredentials['username'];
			
            // $username = $userCredentials['username'];

			// $_SESSION['password'] = $userCredentials['password'];

            // $password = $userCredentials['password'];


            $result = $this->loginRepository->checkUserCredentials('Admin', 'admin');
            
			return $result;
		}

    }