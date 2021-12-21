<?php

class Notificaciones_modelo{
    
    private $db; //variable privada
    
    private $idReporte,$remitente,$email,$imagenUrl,$idPermiso,$idEstado;
    
    public function __construct(){
        
        require_once '../modelo/Conectar.php';  // realiza coneccion
        
        $this->db= Conectar::conexion();  //almaceno en "db"
        
        $this->notificacion=array();  // convierte a un arreglo
        

  
    }
    
     //esta funcion trae toda la informacion de la tabla reporte
    //segun el id que nos enviamos al seleccionar un reporte. Como nos enviaremos un id por url
    // la consulta la ejecutaremos con un "prepare" para evitar errores de "inyección sql"
    public function get_reporteBy($i) {
        
        $id=$i;
        
       $consultar= $this->db->prepare("SELECT *
                                       FROM reporte
                                       WHERE idReporte=:r");
       
       $consultar->bindParam(":r", $id);
       $consultar->execute();
       
       
        while($filas=$consultar->fetch(PDO::FETCH_ASSOC)){
            $this->notificacion[]=$filas;
        
          
        }
        return $this->notificacion;
        
    }
    
    //-----------------------------------------------------------------------------------
    
    public function change($e) {
        $id=$e;
        
        
        $query= $this->db->prepare( "UPDATE reporte SET idEstado=:r
                                     WHERE idReporte="."'".$this->getIdReporte()."';"
                                    );
        $query->bindParam(":r",$id);
        $query->execute();
        
        return $query;
    }
    
    
    
    //-----------------------------------------------------------------------------------
    function getIdReporte() {
        return $this->idReporte;
    }

    function getRemitente() {
        return $this->remitente;
    }

    function getEmail() {
        return $this->email;
    }

    function getImagenUrl() {
        return $this->imagenUrl;
    }

    function getIdPermiso() {
        return $this->idPermiso;
    }

    function getIdEstado() {
        return $this->idEstado;
    }

    function setIdReporte($idReporte) {
        $this->idReporte = $idReporte;
    }

    function setRemitente($remitente) {
        $this->remitente = $remitente;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setImagenUrl($imagenUrl) {
        $this->imagenUrl = $imagenUrl;
    }

    function setIdPermiso($idPermiso) {
        $this->idPermiso = $idPermiso;
    }

    function setIdEstado($idEstado) {
        $this->idEstado = $idEstado;
    }

 
}

?>