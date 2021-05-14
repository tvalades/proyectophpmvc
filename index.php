<!-- CONTROLADOR FRONTAL - Se encarga de recoger parámetros por la URL y ver a qué controlador pertenecen -->
<?php

session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layouts/header.php';
require_once 'views/layouts//sidebar.php';

function showError() {
	$error = new ErrorController();
	$error->index();
}

//Compruebo si me llega el controlador por la URL
if(isset($_GET['controller'])){
	$nombre_controlador = $_GET['controller'].'Controller';
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
	$nombre_controlador = CONTROLLER_DEFAULT;
}else{
	showError();
	exit();
}

if(class_exists($nombre_controlador)){	
	$controlador = new $nombre_controlador();
	
	if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
		$action = $_GET['action'];
		$controlador->$action();
	}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
		$default = ACTION_DEFAULT;
		$controlador->$default();
	}else{
		showError();
	}
}else{
	showError();

}
require_once 'views/layouts/footer.php';