<?php
//aqui incluimos la clase ubicacion para usar su funcion save pero ademas usar su otra funcion
// que nos trae el id de su ultimo registro
require_once '../modelo/Ubicacion_modelo.php';




//---datos para la tabla ubicacion------
$nombrecalle=$_POST['direccion'];
$numerocalle=$_POST['callenumero'];
$lat=$_POST['latitud'];
$lng=$_POST['longitud'];
//--------------------------------------




// insercion en la tabla ubicacion---
$ubicacion=new Ubicacion_modelo(); //instanciamos

$ubicacion->setNombreCalle($nombrecalle);
$ubicacion->setNumeroCalle($numerocalle);
$ubicacion->setLat($lat);
$ubicacion->setLng($lng);

$ubicacion->save();


//--------------------------------------------------------
require_once '../modelo/Reporte_modelo.php';
 
 
 
//--datos para la tabla reporte----

$idtipo=$_POST['tipo'];
$remitente=$_POST['remitente'];
$correo=$_POST['email'];
$descripcion=$_POST['comentario'];

$idPermiso='2'; //por defecto tendra el permio numero dos que alude a operador, osea quien gestionara el reporte
$idEstado='1'; //por defecto tendra el estado 1 que alude a "Esperando", este estado es el que indica que aun no fue gestionado
//--------------------------

$imagenUrl='url';//asignamos un valor provisorio luego se actualizara con una funcion
 //---insercion en la tabla reporte

$reporte=new Reporte_modelo();
 
//-----trae el id del ultimo registro en tabla ubicacion para la insercion en la tabla reporte---

 $idUbicacionMatriz= $ubicacion->get_idubicacion();
 
 foreach ($idUbicacionMatriz as $ubi){
     $UltimoIdUbicacion=$ubi['idUbicacion'];
 }

 
 $reporte->setIdTipo($idtipo);
 $reporte->setRemitente($remitente);
 $reporte->setEmail($correo);
 $reporte->setDescripcion($descripcion);
 $reporte->setIdUbicacion($UltimoIdUbicacion);
 $reporte->setImagenUrl($imagenUrl);
 $reporte->setIdPermiso($idPermiso);
 $reporte->setIdEstado($idEstado);
 
 $reporte->save();
 
 //------------------------------------
 
 require_once '../modelo/Imagen_modelo.php';
 


$img=new Imagen_modelo();

//---consulta sobre el ultimo id en reportes para aplicar el update de imagen
$reporteMatriz=$reporte->get_idreporte();
 
 

 foreach ($reporteMatriz as $repo){
 $UltimoIdReporte=$repo['idReporte'];
 }
 

 //case para establecer la ruta de la carpeta de la imagen segun el tipo de reporte que se eligio 
switch ($idtipo) {
    case '1':
        $carpeta='Alumbrado';
        break;
    case '2':
        $carpeta='Acera';
        break;
    case '3':
        $carpeta='Espacios verdes';
        break;
    case '4':
        $carpeta='Calzada';
        break;
}
 

//carga de imagen, carpeta,ultimo id de reporte
 $img->uploadImage($_FILES, $carpeta, $UltimoIdReporte);
 

 require_once '../vista/Envio_reporte_view.php';
?>