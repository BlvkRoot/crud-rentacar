<?php
    class RouteConfig
    {
        function startApp()
        {
            $request = new RequestConfig(); 
            $request->requestHandler();
        }
    }
?>