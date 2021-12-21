<?php

require_once '../modelo/Ubicacion_modelo.php';

$datos=new Ubicacion_modelo();//instancio la clase que contiene el constructor

$ub=base64_decode($_GET['ubi']);// decodifico el id enviado por url y asgino a variable

$matrizUbicacion=$datos->get_byid($ub);// llamo a la funcion y le paso por parametro la variable "ub"

require_once '../vista/Ubicacion_view.php';

?>