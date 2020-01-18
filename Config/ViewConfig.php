<?php

    class ViewConfig
    {
        public static function render($nomeDaView, $params = null)
        {
            $viewPath = "View/";
            $view = $viewPath.$nomeDaView.'.php';
            include($view);
        }

        public static function renderErro($nomeDaView)
        {
            $viewPath = "View/Errors/";
            $view = $viewPath.$nomeDaView.'.php';
            include($view);
        }
    }