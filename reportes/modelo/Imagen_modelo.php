<?php
class Imagen_modelo{

private $db; //variable privada
     
     public function __construct(){
        
        require_once '../modelo/Conectar.php';  // realiza coneccion
        
        $this->db= Conectar::conexion();  //almaceno en "db"
        

    }

    //esta funcion se encargara de modificar el ultimo reporte insertado en el atributo imagen, "la ruta",
    // y de mover la imagen al server.
    //ya que en una primera instancia del insert en reportes solo se encarga de guardar datos simples,
    //por lo que solo establece en los campos imagen, una informacion transitoria, que luego sera modificada
    //en el mismo segundo por esta funcion.
    public function uploadImage($Imagen,$carpeta,$i){ //imagen, carpeta, id
                $id=$i;//guardo id
		$ruta = 'imagenes/'.$carpeta.'/'.$Imagen['imagen']['name']; //ruta de destino en el servidor
                
		move_uploaded_file($Imagen['imagen']['tmp_name'],'../'.$ruta); //comando para mover la imagen al servidor en la ruta
		
                $SQLStatement = $this->db->prepare("UPDATE reporte SET imagenUrl =:url WHERE idReporte =:r"); //actualizo la informacion segun el ultimo reporte
		$SQLStatement->bindParam(":url",$ruta);
                $SQLStatement->bindParam(":r", $id);
		$SQLStatement->execute();
                
              
	}
        



}
?>