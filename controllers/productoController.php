<?php
require_once 'models/ProductoModel.php';
class productoController {
	public function index(){
		$producto = new ProductoModel();
		$productos = $producto->getProductos();
		require_once 'views/producto/destacados.php';
	}
	public function gestion() {
		Utils::isAdmin();
		$producto = new ProductoModel();
		$productos = $producto->getProductos();
		require_once 'views/producto/gestion.php';
	}

	public function crear() {
		Utils::isAdmin();
		require_once 'views/producto/crear.php';
	}

	//FUNCION QUE GUARDA LOS PRODUCTOS TANTO NUEVOS COMO EDITOS
	public function save() {
		Utils::isAdmin();
		if(isset($_POST)) {
			$producto = new ProductoModel();
			$producto->setNombre($_POST['nombre']);
			$producto->setCategoriaId($_POST['categoria']);
			$producto->setDescripcion($_POST['descripcion']);
			$producto->setPrecio($_POST['precio']);
			$producto->setStock($_POST['stock']);
			$producto->setOferta($_POST['oferta']);
			$producto->setFecha($_POST['fecha']);

			//Guardar la imagen
			if(isset($_FILES['imagen'])) {
				$archivo = $_FILES['imagen'];
				$filename = $archivo['name'];
				$filetype = $archivo['type'];

				if($filetype == "image/jpg" || $filetype == "image/jpeg" || $filetype == "image/png" || $filetype == "image/gif") {
					//Comprobamos que haya directorio de imágenes y si no lo creamos
					if(!is_dir('uploads/images')) {
						mkdir('uploads/images', 0777, true);
					}
					$producto->setImagen($filename);
					//Guardamos la imagen
					move_uploaded_file($archivo['tmp_name'], 'uploads/images/'.$filename);
				} 
			}

			//En un mismo método guardamos tanto un producto nuevo como uno editado
			if(isset($_GET['id'])) {
				$producto->setId($_GET['id']);
				$save = $producto->edit();
			} else {
				$save = $producto->save();
			}

			if($save) {
				$_SESSION['product'] = "complete";
			} else {
				$_SESSION['product'] = "failed";
			}
		} else {
			$_SESSION['product'] = "failed";
		}
		header("Location:".SITE_URL.'producto/gestion');
	}

	public function editar() {
		Utils::isAdmin();
		if(isset($_GET['id'])) {
			$producto = new ProductoModel();
			$producto->setId($_GET['id']);
			//Sacar todo el producto 
			$pro = $producto->getOne();
		} else {
			header("Location:".SITE_URL.'producto/gestion');
		}
		$edit = true;
		require_once 'views/producto/crear.php';
	}

	public function borrar() {
		Utils::isAdmin();
		if(isset($_GET['id'])) {
			$producto = new ProductoModel();
			$producto->setId($_GET['id']);

			$delete = $producto->delete();
			if($delete) {
				$_SESSION['delete'] = "complete";
			} else {
				$_SESSION['delete'] = "failed";
			}
		} else {
			$_SESSION['delete'] = "failed";
		}
		header("Location:".SITE_URL.'producto/gestion');
	}

	public function ver() {
		if(isset($_GET['id'])) {
			$producto = new ProductoModel();
			$producto->setId($_GET['id']);
			//Sacar todo el producto 
			$pro = $producto->getOne();
		} 
		
		require_once 'views/producto/ver.php';
	}


}