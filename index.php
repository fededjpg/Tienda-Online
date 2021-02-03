<?php
session_start();

require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';


function showError(){
    $error = new ErrorController();
    $error->index();
}

//preguntamos si el controlador nos llega por la url
if(isset($_GET['controller'])){
    //si nos llega un controlador por la url  en tpnces le concatenamos lo que venga
	$nombre_controlador = $_GET['controller'].'Controller';
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default;

}else{//en caso de que no venga nada. cortamos la ejecucion 
    showError();
    exit();
}
//comprobamos si existe esa clase en el controlador
if(class_exists($nombre_controlador)){	
    //si existe creamos un objeto
	$controlador = new $nombre_controlador();
    
    //comprobamos si nos llega la variable accion por la url
    //y si el metodo existe dentro del controlador
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        
        $action = $_GET['action'];
        //si existe ejecutamos ese metodo que nos viene por get
		$controlador->$action();
	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $action_default = action_default;
        $controlador->$action_default();
    
    }else{
        //si no existe el metodo dentro del controlador nos escupira este error
        showError();
	}
}else{
    //si no existe la clase dentro del controlador nos escupira este error
        showError();
}

require_once 'views/layout/footer.php';
