<?php

class Ubicacion_modelo{
    
    private $db; //variable privada
    
    private $nombreCalle,$numeroCalle,$lat,$lng;
     
    public function __construct(){
        
        require_once '../modelo/Conectar.php';  // realiza coneccion
        
        $this->db= Conectar::conexion();  //almaceno en "db"
        
        $this->ubicaciones=array();  // convierte a un arreglo
        
        $this->dato=array();
    }


    
    public function save(){
        
          $query="INSERT INTO ubicacion (idUbicacion,nombreCalle,numeroCalle,lat,lng)"
                    ."VALUES (NULL,"
                    ."'".$this->getNombreCalle()."',"
                    ."'".$this->getNumeroCalle()."',"
                    ."'".$this->getLat()."',"
                    ."'".$this->getLng()."'"
                    .");";
        $save= $this->db->query($query);
        
        
        return $save;
        
    }
    

     //traemos el ultimo id de la tabla ubicacion, esto nos serviria para el insert en la tabla registro. porque en la tabla registro debemos hacer
    // un insert que involucra la tabla ubicacion(clave foranea), realizando una prediccion del id que tendra el siguiente registro en la tabla ubicacion y
    //guardandolo en la tabla registro. por ahora solo se trae el ultimo id pero mas adelante se le sumara uno a ese id y de esa forma obtendremos
    //la prediccion del siguiente registro en tabal ubicacion
    public function get_idubicacion() { //traemos el ultimo id de la tabla, esto nos serviria para el insert en la tabla registro
        
        $consultas=$this->db->query("SELECT idUbicacion FROM  ubicacion ORDER BY idUbicacion DESC LIMIT 1 ");
        
           while($filas=$consultas->fetch(PDO::FETCH_ASSOC)){
            $this->ubicaciones[]=$filas;
        }
       
        return $this->ubicaciones;
         
    }
    
    //traigo la informacion segun el id entregado por parametro
    public function get_byid($i) {
        $id=$i;
        $consultar= $this->db->prepare("SELECT * FROM ubicacion WHERE idUbicacion =:r");
        $consultar->bindParam(":r", $id);
        $consultar->execute();
        
        while ($filas=$consultar->fetch(PDO::FETCH_ASSOC)){
            $this->dato[]=$filas;
        }
        
        return $this->dato;
    }
    
    function getNombreCalle() {
        return $this->nombreCalle;
    }

    function getNumeroCalle() {
        return $this->numeroCalle;
    }

    function getLat() {
        return $this->lat;
    }

    function getLng() {
        return $this->lng;
    }

    function setNombreCalle($nombreCalle) {
        $this->nombreCalle = $nombreCalle;
    }

    function setNumeroCalle($numeroCalle) {
        $this->numeroCalle = $numeroCalle;
    }

    function setLat($lat) {
        $this->lat = $lat;
    }

    function setLng($lng) {
        $this->lng = $lng;
    }

    

}

?>