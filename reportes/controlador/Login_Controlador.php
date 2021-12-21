<?php

require_once '../modelo/Usuarios_modelo.php';

$login = new Usuario_modelo();// instanciamos la clase

$log=$_POST['inputEmail']; //recibimos el valor correo de la vista

$clave=$_POST['inputPassword']; // recibimos el valor password de la vista

$matrizLogeo=$login->getLogin($log, $clave); // llamamos a la funcion de busqueda de usuario segun los parametros correo y clave


if (isset($matrizLogeo) && !empty($matrizLogeo)){
    
     foreach ($matrizLogeo as $destino){
         
         $direccion=$destino["idPermiso"];
     }
        
     switch ($direccion){
            
        case 1:
             require_once '../controlador/Usuario_Controlador.php';
            break;
         
        case 2:
            require_once '../controlador/Reportes_View_Controlador.php';
            break;
        
        case 3:
            
            echo' 
                <script type="text/javascript">
               alert(\'su cuenta esta inhabilitada\');
               </script> ';
                require_once '../vista/Login_View.php';
            break;
        }
     
    
    
    } else {
        
        require_once '../vista/Login_View.php';
        
    }





?>