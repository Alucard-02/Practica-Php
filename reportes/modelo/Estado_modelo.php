<?php

class Estado_modelo{
    
    
    
    private $db; //variable privada
    
    
    public function __construct(){
        
        require_once '../modelo/Conectar.php';  // realiza coneccion
        
        $this->db= Conectar::conexion();  //almaceno en "db"
        
        $this->estado=array();  // convierte a un arreglo
  
    }
    
    
   public function get_estado(){
        
        $consultas=$this->db->query("SELECT * FROM estado");
        
        while($filas=$consultas->fetch(PDO::FETCH_ASSOC)){
            $this->estado[]=$filas;
        }
        
        return $this->estado;
        
    }  
    
    
    
    
    
}
?>