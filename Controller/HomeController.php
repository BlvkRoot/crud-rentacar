<?php
	session_start();
	class HomeController extends AppController
	{
        private $carController;
		private $indexController;
		private $loginController;

		function __construct()
		{
			parent::__construct();
			$this->carController = new CarrosController();
			$this->indexController = new IndexController();
			$this->loginController = new LoginController();
		}

		public function index()
		{
			var_dump('Ola'); die();
		 }
		 
		 public function create()
		 {
			$this->carController->create();
		 }

		public function dashboard()
		{
			$userCrede = $this->loginController->verifyUser();

			if(isset($_SESSION['username']) && ($_SESSION['username'] == 'Admin') )
			{
				if ($userCrede > 0) 
				{
					$this->indexController->dashboard();
				}else
				{
					$this->indexController->home();
				}
			}
		}

		public function update(){
			$this->carController->edit();
		}
		
		public function store(){
			$this->carController->store();
		}

		public function destroy(){
			return $this->carController->delete();
		}
		
		public function logout(){
			session_destroy();
			header('Location: home');
		}

	}
