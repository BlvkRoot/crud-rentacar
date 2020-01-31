<?php
    class IndexController extends AppController
    {
        private $carRepository;
        private $paginationController;


        function __construct()
        {
            parent::__construct();
            $this->carRepository = new CarroRepository();
            $this->paginationController = new PaginationController();
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

        public function adminPanel()
        {
            // $carList = $this->carRepository->viewCar();

            $listaCarros = $this->paginationController->getCars();
            $nextPageLink = $this->paginationController->next();
            $previousPageLink = $this->paginationController->previous();

            // var_dump($paginationControl); die();
            $this->view->render('Carro/dashboardView', $listaCarros, $previousPageLink, $nextPageLink);
        }
    }