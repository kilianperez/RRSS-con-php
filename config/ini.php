<?php

    /*
    config/ini.php
    Se van a cargar todas los elementos de configuración necesarios para el correcto funcionamiento de cualquier archivo en el proyecto: 
        - Carga de archivo de constantes (si se necesitan)
        - Carga de Clases necesarias
        - Configuración de BBDD (conexión)
        - Carga de funciones generales
    */

    require_once('ctes.php');
    
    require_once(__ROOT__.'/models/dbconexion.class.php');

    // Conexión a BBDD. A partir de ahora en todos los sitios utilizaremos $db para la conexión de BBDD
    
    $db = DBConexion::connect();
    
    require_once(__ROOT__.'/models/user.class.php');
    
    require_once(__ROOT__.'/services/functions.php');
    
    require_once(__ROOT__.'/models/pagepost.class.php');
    
    // require_once(__ROOT__.'/models/follow.class.php');
    
    require_once(__ROOT__.'/models/infopost.class.php');



    $is_login = isSession(); // true - false
    
?>