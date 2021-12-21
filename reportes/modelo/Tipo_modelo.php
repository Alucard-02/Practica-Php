<?php
class Tipo_modelo{

    private $db; //variable privada
    
    
    public function __construct(){
        
        require_once '../modelo/Conectar.php';  // realiza coneccion
        
        $this->db= Conectar::conexion();  //almaceno en "db"
        
        $this->tipos=array();  // convierte a un arreglo
  
    }
    
    public function get_tipo(){
        
        $consultas=$this->db->query("SELECT * FROM tipo");
        
        while($filas=$consultas->fetch(PDO::FETCH_ASSOC)){
            $this->tipos[]=$filas;
        }
        
        return $this->tipos;
        
    }
    

}
?>