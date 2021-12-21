<?php

require_once '../modelo/Estado_modelo.php';

$estado=new Estado_modelo();//instanciamos la clase con su constructor

$matrizEstado=$estado->get_estado();

//--------------------------------------------------------------------------------------
require_once '../modelo/Notificaciones_modelo.php';

$informacion=new Notificaciones_modelo();//instanciamos la clase con su constructor

$r=base64_decode($_GET['idR']); //captura el id por url que viene codificada y la decodifico

$matrizNotific=$informacion->get_reporteBy($r); // usamos la funcion y le pasamos por parametro el id
                                                // NOTA: la funcion esta protegida de errores "inyeccion sql"


require_once '../vista/Notificaciones_View.php';


?>