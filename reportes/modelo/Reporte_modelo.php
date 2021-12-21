<?php
class Reporte_modelo{

    private $db; //variable privada

    private $idTipo,$remitente,$email,$descripcion,$idUbicacion,$imagenUrl,$idPermiso,$idEstado;
    
    public function __construct(){
        
        require_once '../modelo/Conectar.php';  // realiza coneccion
        
        $this->db= Conectar::conexion();  //almaceno en "db"
        
        $this->reportesultimo=array();  // convierte a un arreglo
        
        $this->listareporte=array();
        
        $this->listafiltrada=array();
  
    }
    
    
    public function save(){
        
        $query="INSERT INTO reporte (idReporte,idTipo,remitente,email,descripcion,idUbicacion,imagenUrl,idPermiso,idEstado)"
                    ."VALUES (NULL,"
                    ."'".$this->getIdTipo()."',"
                    ."'".$this->getRemitente()."',"
                    ."'".$this->getEmail()."',"
                    ."'".$this->getDescripcion()."',"
                    ."'".$this->getIdUbicacion()."',"
                    ."'".$this->getImagenUrl()."',"
                    ."'".$this->getIdPermiso()."',"
                    ."'".$this->getIdEstado()."'"
                    .");";
        $save= $this->db->query($query);
        
   
        return $save;
        
        
    }
    
   
    public function get_idreporte() { //traemos el ultimo id de la tabla, esto nos serviria para el insert en la tabla registro
        
        $consultas=$this->db->query("SELECT idReporte FROM  reporte ORDER BY idReporte DESC LIMIT 1 ");
        
           while($filas=$consultas->fetch(PDO::FETCH_ASSOC)){
            $this->reportesultimo[]=$filas;
        }
      
        return $this->reportesultimo;
        
    }
    //esta funcion trae toda la informacion de la tabla reporte y sus relaciones con
    //la tabla tipo,ubicacion,permiso y estado.
    public function get_reporte() {
        
        $consulta= $this->db->query("SELECT reporte.*, 
                                             tipo.nombreTipo,
                                             permiso.nombrePermiso,
                                             estado.nombreEstado
                                     FROM reporte INNER JOIN tipo 
                                     ON reporte.idTipo=tipo.idTipo
                                                                      
                                     INNER JOIN permiso
                                     ON reporte.idPermiso=permiso.idPermiso
                                     
                                     INNER JOIN estado
                                     ON reporte.idEstado=estado.idEstado");
        
        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->listareporte[]=$filas;
        }
        return $this->listareporte;
    }
    
    
        public function get_reporteFiltrado($f) {
        
        $consulta= $this->db->query("SELECT reporte.*, 
                                             tipo.nombreTipo,
                                             permiso.nombrePermiso,
                                             estado.nombreEstado
                                     FROM reporte INNER JOIN tipo 
                                     ON reporte.idTipo=tipo.idTipo
                                                                      
                                     INNER JOIN permiso
                                     ON reporte.idPermiso=permiso.idPermiso
                                     
                                     INNER JOIN estado
                                     ON reporte.idEstado=estado.idEstado
                                     
                                     WHERE tipo.nombreTipo="."'".$f."'");
        
        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->listafiltrada[]=$filas;
        }
        return $this->listafiltrada;
    }

    
    function getIdTipo() {
        return $this->idTipo;
    }

    function getRemitente() {
        return $this->remitente;
    }

    function getEmail() {
        return $this->email;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getIdUbicacion() {
        return $this->idUbicacion;
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

    function setIdTipo($idTipo) {
        $this->idTipo = $idTipo;
    }

    function setRemitente($remitente) {
        $this->remitente = $remitente;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setIdUbicacion($idUbicacion) {
        $this->idUbicacion = $idUbicacion;
    }

    function setImagenUrl($imagenUrl) {
        $this->imagenUrl = $imagenUrl;
    }

    function setIdPermiso($idPermis) {
        $this->idPermiso = $idPermis;
    }

    function setIdEstado($idEstado) {
        $this->idEstado = $idEstado;
    }


}
?>