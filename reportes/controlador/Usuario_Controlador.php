<?php
//en este controlador se encargar de cargar los datos que se mostraran en la vista del usuario
require_once '../modelo/Usuarios_modelo.php';


$usuario=new Usuario_modelo(); //instanciamos la clase con su constructor

$matrizUsuario=$usuario->get_usuarios(); //me trae los alumno y los almacena en la variable matrizAlumno


require_once '../vista/Usuarios_view.php'; // llama al archivo en la vista y apartir de aqui empieza a mostrar por pantalla


?>

