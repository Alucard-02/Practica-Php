<?php

require_once '../modelo/Reporte_modelo.php';

$report= new Reporte_modelo();//instanciamos la clase con su constructor

$tipo=$_POST['filtro'];

switch ($tipo) {
    case '1':
        $filtrado='Alumbrado';
        break;
    case '2':
        $filtrado='Acera';
        break;
    case '3':
        $filtrado='Espacios verdes';
        break;
    case '4':
        $filtrado='Calzada';
        break;
}

$matrizReport=$report->get_reporteFiltrado($filtrado);

require '../modelo/Tipo_modelo.php';

$tipo=new Tipo_modelo();//instanciamos la clase con su constructor

$matrizTipo=$tipo->get_tipo();


require_once '../vista/Reportes_view.php';
?>

