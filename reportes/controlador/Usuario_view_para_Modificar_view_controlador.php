<?php
//en este controlador se busca enrutar dos vista con un funcionamiento previo,
//este funcionamiento se trata de la carga del combo "permiso" en la vista de modificacion de datos usuario
require_once '../modelo/Permiso_modelo.php';

$permiso=new Permiso_modelo() ;//instanciamos la clase con su constructor

$matrizPermiso=$permiso->get_permiso();



require_once '../vista/modificar_usuario_view.php';

?>