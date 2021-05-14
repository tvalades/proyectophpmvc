<?php

function controllers_autoload($classname){
	//Entra en la carpeta de controladores y hacer un include de cada uno de los controladores
	include 'controllers/' . $classname . '.php';
}

spl_autoload_register('controllers_autoload');