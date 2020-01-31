<?php

    class ViewConfig
    {
        public static function render($nomeDaView, $params = null, $previous = '', $next = '')
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