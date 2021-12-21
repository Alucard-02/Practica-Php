<?php

class Usuario_modelo{ // en cuanto instancio esta clase se ejecuta el "construct"
    
    private $db; //variable privada
    
    private $usuarios; //variable privada
    
    private $idUsuario, $nombreUsuario, $password, $email, $idPermiso; //tabla usuario
    
    private $nombrePermiso; // tabla permiso


    public function __construct(){
        
        require_once '../modelo/Conectar.php';  // realiza coneccion
        
        $this->db= Conectar::conexion();  //almaceno en "db"
        
        $this->usuarios=array();  // convierte a un arreglo
  
        $this->login=array();
    }
    
    public function get_usuarios(){
       
        $consulta= $this->db->query("SELECT usuario.*, permiso.nombrePermiso 
                                     FROM usuario INNER JOIN permiso 
                                     ON permiso.idPermiso=usuario.idPermiso");
        
        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->usuarios[]=$filas;
        }
        
        return $this->usuarios;
    }
    
    
    
    
    public function save() {
        
        $query="INSERT INTO usuario (idUsuario,nombreUsuario,password,email,idPermiso)"
                    ."VALUES (NULL,"
                    ."'".$this->getNombreUsuario()."',"
                    ."'".$this->getPassword()."',"
                    ."'".$this->getEmail()."',"
                    ."'".$this->getIdPermiso()."'"
                    .");";
        $save= $this->db->query($query);
        
        return $save;
    }
    
       public function change() {
        
        $query="UPDATE usuario SET nombreUsuario="."'".$this->getNombreUsuario()."',"
                                   ."password="."'".$this->getPassword()."',"
                                   ."email="."'".$this->getEmail()."',"
                                   ."idPermiso="."'".$this->getIdPermiso()."'"
                                   ." WHERE idUsuario="."'".$this->getIdUsuario()."';"

                ;
        $change= $this->db->query($query);
        
        return $change;
    }
    
    
    public function getLogin($l,$p){
        $log=$l;
        $pass=$p;
        
       $consultar= $this->db->prepare("SELECT * FROM usuario
                                       WHERE email=:r
                                       AND password=:a");
       
       $consultar->bindParam(":r", $log);
       $consultar->bindParam(":a", $pass);
       $consultar->execute();
       
       
        while($filas=$consultar->fetch(PDO::FETCH_ASSOC)){
            $this->login[]=$filas;
        
          
        }
        return $this->login;
    }
    
    
//----------------------------------------------------------------------------------            
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function getIdPermiso() {
        return $this->idPermiso;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setIdPermiso($idPermiso) {
        $this->idPermiso = $idPermiso;
    }


    function getNombrePermiso() {
        return $this->nombrePermiso;
    }

    function setNombrePermiso($nombrePermiso) {
        $this->nombrePermiso = $nombrePermiso;
    }


    
 }

?>