<?php
// este controlador se encarga de enrutar dos vistas con un funcionamiento previo,
//este funcionamiento se trata de la carga del combo "permiso" en la vista de agregar nuevo usuario
require '../modelo/Permiso_modelo.php';

$permiso=new Permiso_modelo() ;//instanciamos la clase con su constructor

$matrizPermiso=$permiso->get_permiso();


require '../vista/agregar_usuario_view.php';

?>

