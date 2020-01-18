<?php
class RequestConfig
{
    private $base_dir_controller = "Controller/";
    private $params;

    private function getParameters()
    {
        $path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : null;
        $params = explode('/', ltrim($path));

        $aux = array();
        foreach ($params as $param) {
            if (!is_null($param) && strlen($param) > 0) array_push($aux, $param);
        }

        return $aux;
    }

    private function setParameters()
    {
        $params = $this->getParameters();
        if (count($params) <= 0) return false;

        $this->params['controller'] = $params[0];
        if (count($params) == 1) return false;

        $this->params['action'] = $params[1];
        if (count($params) == 2) return false;

        $aux = array();
        for ($i = 2; $i < count($params); $i++) {
            array_push($aux, $params[$i]);
        }
        $this->params['params'] = $aux;
    }

    private function getController()
    {
        $params = $this->params;
        if (isset($params['controller'])) {

            $Controller = ucfirst($params['controller']) . 'Controller';
            $this->controllerPath = $this->base_dir_controller . $Controller . '.php';

            $isFile = file_exists($this->controllerPath);

            if ($isFile) {
                return new $Controller();
            }
        }
        return new IndexController();
    }

    private function actionHandler()
    {
        $Controller = $this->getController();
        $action = isset($this->params['action']) ? $this->params['action'] : 'index';
        $isMethod = method_exists($Controller, $action);
        
        if ($isMethod) {
            $params = (isset($this->params['params'])) ? $this->params['params'] : null;
            $Controller->$action($params);
        } else {
            $Controller->metodoNaoExiste($action);
        }
    }

    function requestHandler()
    {
        $this->setParameters();
        $this->actionHandler();
    }
}
