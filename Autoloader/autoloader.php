<?php
    //Autoloading classes inside config directory
	spl_autoload_register('configAutoloader');

	function configAutoloader($class)
	{
        $path = 'Config/';
		$ext = '.php';
        $fullPath = $path . $class . $ext;
		
		if(file_exists($fullPath))
            require_once($fullPath);
		else
			return false;
	}

	//Autoloading classes inside the Controller Directory
	spl_autoload_register('controllerAutoLoader');

    function controllerAutoLoader($class)
    {
        $path = "Controller/";
        $ext = ".php";
        $fullPath = $path . $class . $ext;

        if(file_exists($fullPath))
            require_once($fullPath);
        else
            return false;
    }

	//Autoloading classes inside Repository directory
	spl_autoload_register('repositoryAutoloader');

    function repositoryAutoloader($class)
    {
        $path = 'Repository/';
        $ext = '.php';
        $fullPath = $path . $class . $ext;

        if(file_exists($fullPath))
            require_once($fullPath);
        else
            return false;
	}
	
	//Autoloading classes inside Model Directory

	spl_autoload_register('modelAutoloader');

	function modelAutoloader($class)
	{
		$path = 'Model/';
		$ext = '.php';
		$fullPath = $path . $class . $ext;

		if(file_exists($fullPath))
			require_once($fullPath);
		else
			return false;
	}