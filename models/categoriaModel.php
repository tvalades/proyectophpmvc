<?php
class CategoriaModel {
	private $id;
	private $nombre;
	private $db;

	public function __construct() {
		$this->db = Database::connect();
	}

    public function getId() {
        return $this->id;
    }

    public function setId($id) { 
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }
    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getCategorias() {
    	$sql = "SELECT * FROM categorias ORDER BY id DESC;";
    	return $this->db->query($sql);
    }


    public function getOne() {
        $sql = "SELECT * FROM categorias WHERE id = {$this->getId()};";
        $getOne = $this->db->query($sql);
        return $getOne->fetch_object();
    }   
    public function save() {
    	$sql = "INSERT INTO categorias VALUES(null,'{$this->getNombre()}');";
    	$save = $this->db->query($sql);

    	$result = false;
    	if($save) {
    		$result = true;
    	}
    	return $result;
    }
}


?>
