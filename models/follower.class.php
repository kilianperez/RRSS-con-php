<?php

// error_reporting(E_ALL);
// ini_set('display_errors', '1');

require_once("../config/ini.php"); // $db

///////// ACTUALIZAR FOLLOW NO ESTA HECHO

    // SI NO ESTA VACIO 
    
    if(!empty($_POST['follower'])&&
       !empty($_POST['following'])
    ){
        
        // /// VARIABLES QUE VIENEN POR $_POTS
        
        print_r($follower = $_POST["follower"]);
        echo "<br>"; 
        print_r($following = $_POST["following"]);
        echo "<br>"; 

        // ACTUALIZAMOS CONTENIDO DEL POST

        // Preguntar si existe en BBDD ese email

        // 2. QUERY 
        
        // SELECT id FROM follow_user WHERE follower_user = 1 && following_user = 2

        $q_follow = "SELECT id FROM follow_user WHERE follower_user = $follower && following_user = $following"; // 0 ó 1
        
        // 3. Ejecutar query;
        $exec_follow = mysqli_query( $db,  $q_follow) or die("FALLO DE REGISTRO DE USUARIO");
        print_r($exec_follow);

        if( $exec_follow->num_rows!=0 ){
            // existe ese USER!
            header("Location: ../views/user.php?user=$following&fail=following");
            exit();
        }


       $q_save_follow  = "INSERT INTO `follow_user`(`follower_user`, `following_user`) VALUES ('$follower','$following')";

        $exec_save_follow  = mysqli_query($db, $q_save_follow ) or die("ERROR GUARDANDO USER");

        echo "Usuario Guardado";

    }

//\\\\\\\\\\\\\\\\\\\\\


?>

