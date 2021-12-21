<?php

require_once '../modelo/Notificaciones_modelo.php';


$idR=$_POST['idreporte'];// id del reporte donde se hara el update

$IdE=$_POST['estado']; // valor del estado que se cambiara

$Notific = new Notificaciones_modelo(); //instansiacion de una clase

$Notific->setIdReporte($idR); //seteo del id del reporte donde haremos el update

$Notific->change($IdE); // aplicacion de la funcion y envio del parametro valor de cambio

require_once '../controlador/Reportes_View_Controlador.php';
?>