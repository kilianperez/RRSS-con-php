<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

require_once("../config/ini.php"); // $db

/////// CERRAR SESION /////////

    session_destroy(); // destroy session
    setcookie("PHPSESSID","",time()-3600,"/"); // delete session cookie

        if(isset($_SESSION)){
            header("Location: /index.php");
        }else{
            header("Location: /index.php?login=ErrorLogout");
        }
//\\\\\\\\\\\\\\\\\\\\\

?>