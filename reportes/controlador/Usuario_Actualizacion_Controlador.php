<?php
//en este controlador se realizara la actualizacion de los usuarios
require_once '../modelo/Usuarios_modelo.php';



       
    $iduser=$_POST['iduser'];
    $user=$_POST['usuario'];
    $pass=$_POST['password'];
    $email=$_POST['email'];
    $permiso=$_POST['permiso'];
    


    $usuario=new Usuario_modelo(); //instanciamos la clase con su constructor

    $usuario->setIdUsuario($iduser);
    $usuario->setNombreUsuario($user);
    $usuario->setPassword($pass);
    $usuario->setEmail($email);
    $usuario->setIdPermiso($permiso);
    
    $usuario->change();


require_once '../controlador/Usuario_Controlador.php'; // vuelve a la tabla usuario


?>
