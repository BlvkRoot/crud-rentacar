<?php
    class ClientesController extends AppController
    {
        private $carRepo;
        private $carModel;

        function __construct()
        {
            parent::__construct();
            $this->carRepo = new CarroRepository();
            $this->carModel = new CarroModel();
        }

        function index()
        {
            return $this->carRepo->viewCar();
        }

        function setCarroProperties()
        {

            $plateNumber = (isset($_POST['plateNumber'])) ? $_POST['plateNumber'] : '';
            $name = (isset($_POST['name'])) ? $_POST['name'] : '';
            $color = (isset($_POST['color'])) ? $_POST['color'] : '';
            $status = (isset($_POST['status'])) ? $_POST['status'] : '';
            $this->carModel->setCampos($plateNumber, $name, $color, $status);
        }

        //Save car details
        function store()
        {
            $this->view->render('Carro/dashboardView', $this->index());
            /***
             * Check if the submit form variable is set to save
             * Then Check for empty fields in the form
             * Save car properties if no fields empty
             * 
             */
            if(isset($_POST['save']))
            {
                $this->setCarroProperties();

                if($this->carModel->isEmpty())
                {
                    echo "<p style='text-align:center; color: red;'>Campos vazios</p>";
                    exit();
                }else{
                    $this->carRepo->addCar($this->carModel);
                    echo "<p style='text-align:center; color: green;'>Salvo com successo.</p>";
                    exit();
                }
            }
            
        }

        function list()
        {
            $this->view->render('Carro/listView', $this->index());
        }

        function carInfo()
        {
            if(isset($_GET['edit']))
            {
                $id = $_GET['edit'];
                $result = $this->carRepo->fetchCarInfoById($id);

                $this->view->render('Carro/editView', $result);
            }else
            {
                echo "Nothing to display.";
            }
        }

        function edit()
        {
            if(isset($_POST['update']))
            {
                $cId = isset($_POST['id']) ? $_POST['id'] : null;
                $this->setCarroProperties();
                $this->carRepo->updateCar($this->carModel, $cId);
                $this->store();
            }  
        }

        function delete()
        {
            if(isset($_GET['remove']))
            {
                $id = $_GET['remove'];

                $this->carRepo->deleteCar($id);
                $this->store();
            }else
            {
                $this->view->render('Errors/DeleteError');
            }
        }
    }