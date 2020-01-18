<?php
	session_start();
	class HomeController extends AppController
	{
        private $carRepository;
		private $indexController;
		private $loginController;

		function __construct()
		{
            parent::__construct();
            $this->carRepository = new CarroRepository();
			$this->indexController = new IndexController();
			$this->loginController = new LoginController();
		}

		public function index()
		{
			// $listaCarros = $this->carRepository->viewCar();
			// $this->view->render('Carro/listView', $listaCarros);
			var_dump('Ola'); die();
 		}

		public function dashboard()
		{
			$userCrede = $this->loginController->verifyUser();

			if(($_SESSION['username'] == true) && ($_SESSION['username'] == 'Admin') )
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

	}
