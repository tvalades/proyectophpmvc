<?php
require_once 'models/productoModel.php';
class carritoController {
	public function index(){
		require_once 'views/carrito/ver.php';
	}

	public function addCart() {
		if(isset($_GET['id'])) {
			$producto_id = $_GET['id'];
		} else {
			header("Location:".SITE_URL);
		}
		if(isset($_SESSION['carrito'])) {
			$contador = 0;
			foreach($_SESSION['carrito'] as $indice => $valor) {
				//Si el producto que tenemos en el carrito es el mismo que estamos añadiendo recientemente añadimos la cantidad en 1
				if($valor['id_producto'] == $producto_id) {
					$_SESSION['carrito'][$indice]['unidades']++;
					$contador++;
				}
			}
		}

		if(!isset($contador) || $contador == 0) {
			//Conseguir producto
			$producto = new ProductoModel();
			$producto->setId($producto_id);
			$producto = $producto->getOne();

			if(is_object($producto)) {
				//Añadir al carro cuando todavía no existe
				$_SESSION['carrito'][] = array(
					"id_producto" => $producto->id,
					"precio" => $producto->precio,
					"unidades" => 1,
					"producto" => $producto
				);
			}	
		}
		header("Location:".SITE_URL."carrito/index");
	}

	public function remove() {

	}

	//Eliminar todo lo que contiene el carrito
	public function delete() {
		unset($_SESSION['carrito']);
		header("Location:".SITE_URL."carrito/index");
	}
}