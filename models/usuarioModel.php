<?php
class UsuarioModel {
	private $id;
	private $nombre;
	private $apellidos;
	private $email;
	private $password;
	private $rol;
	private $imagen;
	private $db;

	public function __construct() {
		$this->db = Database::connect();;
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

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = password_hash($this->db->real_escape_string($password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol) {
        $this->rol = $this->db->real_escape_string($rol);
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $this->db->real_escape_string($imagen);
    }

    //Almacena en la base de datos el registro
    public function save() {
    	$sql = "INSERT INTO usuarios VALUES(null, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null );";
    	$save = $this->db->query($sql);
    	$result = false;
    	if($save) {
    		$result = true;
    	}
    	return $result;
    }

    public function login($email, $password) {
        $result = false;
        //Comprobar si existe el email
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $login = $this->db->query($sql);

        //SI login da true y si la consulta que hemos hecho devuelve una línea 
        if($login && $login->num_rows == 1) {
            //Sacamos el objeto que nos devuelve la base de datos
            $usuario = $login->fetch_object();
            //Verificamos la contraseña
            $verify = password_verify($password, $usuario->password);
                         
            if($verify) {
                $result = $usuario;
            } 
        } 
        return $result;
    }
}