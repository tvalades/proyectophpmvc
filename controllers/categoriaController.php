<?php
require_once 'models/categoriaModel.php';
require_once 'models/productoModel.php';
class categoriaController {
	public function index(){
		Utils::isAdmin();
		$categoria = new CategoriaModel();
		$categorias = $categoria->getCategorias();
		require_once 'views/categoria/index.php';
	}

	public function ver() {
		$categoria = new CategoriaModel();
		$categoria->setId($_GET['id']);
		$categoria = $categoria->getOne();

		$producto = new ProductoModel();
		$producto->setCategoriaId($_GET['id']);
		$productos = $producto->getAllCategory();
		require_once 'views/categoria/ver.php';
	}

	public function crear() {
		Utils::isAdmin();
		require_once 'views/categoria/crear.php';
	}

	public function save() {
		Utils::isAdmin();
		if(isset($_POST)) {
			$categoria = new CategoriaModel();

			$categoria->setNombre($_POST['nombre']);
			$save = $categoria->save();

			if($save) {
				$_SESSION['category'] = "complete";
			} else {
				$_SESSION['category'] = "failed";
			}
		}  else {
			$_SESSION['category'] = "failed";
		}
		header("Location:".SITE_URL.'categoria/crear');
		
	}
}