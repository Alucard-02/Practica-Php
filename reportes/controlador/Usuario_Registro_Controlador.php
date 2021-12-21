<?php
//en este controlador ejecutara la carga de un nuevo usuario que operara en el sistema
require '../modelo/Usuarios_modelo.php';



       
     
    $user=$_POST['usuario'];
    $pass=$_POST['password'];
    $email=$_POST['email'];
    $permiso=$_POST['permiso'];
    


    $usuario=new Usuario_modelo(); //instanciamos la clase con su constructor

    $usuario->setNombreUsuario($user);
    $usuario->setPassword($pass);
    $usuario->setEmail($email);
    $usuario->setIdPermiso($permiso);
    
    $usuario->save();


require '../vista/agregar_usuario_view.php'; // llama al archivo en la vista y apartir de aqui empieza a mostrar por pantalla


?>