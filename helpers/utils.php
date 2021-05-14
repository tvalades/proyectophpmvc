<?php

class Utils {
	public static function deleteSession($name) {
		if(isset($_SESSION[$name])) {
			$_SESSION[$name] = null;
			unset($_SESSION[$name]);
		} 
		return $name;
	}

	public static function isAdmin() {
		if(!isset($_SESSION['admin'])) {
			header("Location:".SITE_URL);
		} else {
			return true;
		}
	}

	public static function showCategorias() {
		require_once 'models/categoriaModel.php';
		$categoria = new CategoriaModel();
		$categorias = $categoria->getCategorias();
		return $categorias;
	}

	public static function showTotalCart() {
		$stats = array( 
			'count' => 0,
			'total' => 0
		);
		if(isset($_SESSION['carrito'])) {
			$stats['count'] = count($_SESSION['carrito']);

			foreach($_SESSION['carrito'] as $valor) {
				$stats['total'] += $valor['precio']*$valor['unidades'];
			}
		}

		return $stats;
	}
}

?>