<?php
    class AppController
    {

        function __construct()
        {
            $this->view = new ViewConfig();
        }

        // public function index()
        // {
        //     //método index genérico
        // }

        public function metodoNaoExiste($method)
        {
            $this->view->renderErro('ActionNotFound');
        }

        public function getPost()
        {
            return $_POST;
        }

        public function isPost()
        {
            return ($_POST) ? true : false;
        }
    }