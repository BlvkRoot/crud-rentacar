<?php
    session_start();

    class CarrosController extends AppController
    {
        private $carRepo;

        function __construct()
        {
            parent::__construct();
            $this->carRepo = new CarroRepository();
        }

        function index()
        {
            //return $this->carRepo->viewCar();
        }

        //Save car details
        function store()
        {
            $listaCarros = $this->carRepo->viewCar();
            $this->view->render('Carro/dashboardView', $listaCarros);
            /***
             * Check if the submit form variable is set to save
             * Then Check for empty fields in the form
             * Save car properties if no fields empty
             * 
             */
            if($this->isPost())
            {
                $dados = $this->getPost();

                $model = $this->carRepo->setUpDados($dados);

                $model->save();
                // header('Location: store');
            }           
        }

        function list()
        {
            $carros = $this->carRepo->viewCar();
            
            $this->view->render('Carro/listView', $carros);
        }

        function edit()
        {
            $id = isset($_POST['car_id']) ? $_POST['car_id'] : null;

            if($id)
            {
                $this->editAction($id);
            }else
            {
                $this->view->render('Errors/DeleteError');
            }
        }

        function delete()
        {
            $id = isset($_POST['car_id']) ? $_POST['car_id'] : null;

            if($id)
            {
                $this->deleteAction($id);
            }
        }

        function editAction($id)
        {
            $result = $this->carRepo->fetchCarInfoById($id);

            $this->view->render('Carro/editView', $result);
            
        }

        function deleteAction($id)
        {
            $this->carRepo->deleteCar($id);
            header('Location: store');
        }

    }