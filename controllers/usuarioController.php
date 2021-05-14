<?php

require_once 'models/usuarioModel.php';
class UsuarioController {
	public function index(){
		echo "Usuario Controller";
	}
	public function registro() {
		require_once 'views/usuario/registro.php';
	}

	//Función que guarda el usuario del formulario del registro a la base de datos
	public function save() {
		if(isset($_POST)) {
			//Creamos un objeto de la clase Usuario
			$usuario = new UsuarioModel();
			//Almacenamos los datos que nos llegan desde el formulario
			$usuario->setNombre($_POST['nombre']);
			$usuario->setApellidos($_POST['apellidos']);
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);

			//Guardamos el usuario en la base de datos
			$save = $usuario->save();

			if($save) {
				$_SESSION['register'] = "complete";
			} else {
				$_SESSION['register'] = "failed";
			}
		} else {
			$_SESSION['register'] = "failed";
		}
		header("Location:".SITE_URL.'usuario/registro');
	}

	public function login() {
		if(isset($_POST)) {
			//Identificamos al usuario
			//Consulta a la base de datos para comprobar las credenciales
			$usuario = new UsuarioModel();
			$identity = $usuario->login($_POST['email'], $_POST['password']);

			if($identity && is_object($identity)) {
				$_SESSION['identity'] = $identity;

				if($identity->rol == 'admin') {
					$_SESSION['admin'] = true;
				}
			} else {
				$_SESSION['error_login'] = "Identificación Fallida";
			}
		}

		header("Location:".SITE_URL);
	}

	public function logout() {
		if(isset($_SESSION['identity'])) {
			unset($_SESSION['identity']);
		}

		if(isset($_SESSION['admin'])) {
			unset($_SESSION['admin']);
		}

		header("Location:".SITE_URL);
	}
}