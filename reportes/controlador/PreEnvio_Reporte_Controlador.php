<?php
//este controlador se encarga de realizar una carga del combo que contiene 
//los tipos de reportes antes de mostrar el formulario
require '../modelo/Tipo_modelo.php';

$tipo=new Tipo_modelo();//instanciamos la clase con su constructor

$matrizTipo=$tipo->get_tipo();


require '../vista/Envio_reporte_view.php'; // llama al archivo en la vista y apartir de aqui empieza a mostrar por pantalla


?>
