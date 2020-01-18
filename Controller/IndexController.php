<?php
    class IndexController extends AppController
    {
        private $carRepository;

        function __construct()
        {
            parent::__construct();
            $this->carRepository = new CarroRepository();
        }

        function index()
        {
            $this->view->render('Index/index');
        }

        function home()
        {
            $carList = $this->carRepository->viewCar();
            $this->view->render('Carro/homeView', $carList);
        }

        public function dashboard()
        {
            $carList = $this->carRepository->viewCar();
            $this->view->render('Carro/dashboardView', $carList);
        }
    }