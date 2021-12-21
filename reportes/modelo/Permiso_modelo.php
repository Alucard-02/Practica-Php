<?php
class Permiso_modelo{

    
     private $db; //variable privada
     
     public function __construct(){
        
        require '../modelo/Conectar.php';  // realiza coneccion
        
        $this->db= Conectar::conexion();  //almaceno en "db"
        
        $this->permisos=array();  // convierte a un arreglo
  
    }
    
    public function get_permiso(){
        
        $consultas=$this->db->query("SELECT * FROM permiso");
        
        while($filas=$consultas->fetch(PDO::FETCH_ASSOC)){
            $this->permisos[]=$filas;
        }
        
        return $this->permisos;
        
    }
    
    
}
?>
