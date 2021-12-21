<?php
require '../modelo/Tipo_modelo.php';

$tipo=new Tipo_modelo();//instanciamos la clase con su constructor

$matrizTipo=$tipo->get_tipo();



require_once '../modelo/Reporte_modelo.php';

$report= new Reporte_modelo();//instanciamos la clase con su constructor

$matrizReport=$report->get_reporte();//me trae los datos de reporte y los almacena en la variable matrizReport




require_once '../vista/Reportes_view.php';
?>