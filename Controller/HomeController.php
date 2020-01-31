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
			$this->indexController->index();
		 }

		 public function createCar()
		 {
			return $this->view->render('Carro/createView');
		 }
		 
		 public function create()
		 {
			$this->carController->create();
		 }

		public function dashboard()
		{
			$userCheck = $this->loginController->verifyUser();

			if($userCheck > 0) 
			{
				$this->indexController->adminPanel();
				
				// if(isset($_SESSION['username']) && ($_SESSION['username'] == 'Admin') )
				// {
				// 	$this->indexController->adminPanel();
				// }else
				// {
				// 	$this->indexController->home();
				// }

			}else{
				$this->index();
			}
		}

		public function update()
		{
			$this->carController->edit();
		}
		
		public function store()
		{
			$this->carController->store();
		}

		public function destroy()
		{
			return $this->carController->delete();
		}
		
		public function logout()
		{
			session_destroy();
			header('Location: home');
		}

	}
