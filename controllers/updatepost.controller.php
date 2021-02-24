<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', '1');
    
    require_once("../config/ini.php"); // $db
    
    ///////// ACTUALIZAR POST(ARTICULO) DEL BLOG

        // SI NO ESTA VACIO 
        
        if(!empty($_POST['update_post'])){

            // /// VARIABLES QUE VIENEN POR $_POTS
            
            $update_post_id = $_POST["update_post_id"];
            
            $update_tittle_post = $_POST["update_tittle_post"];
            
            $update_text_post = $_POST["update_text_post"];
            
            $update_source_name = $_POST["update_source_name"];
            
            $update_source_url = $_POST["update_source_url"];
            
            $session_id = $_SESSION["id"];

            // VALIDACION DEL TEXTO QUE ENTRA

            


            // ACTUALIZAMOS CONTENIDO DEL POST

            $q_update_post = 
            "UPDATE `blog_post` SET 
            `title` = '$update_tittle_post', 
            `post_text` = '$update_text_post', 
            `source_url`= '$update_source_url', 
            `source_name`= '$update_source_name' 
            WHERE blog_post.id = $update_post_id";

            $exec_update_post = mysqli_query($db, $q_update_post) or die("ERROR ACTUALIZANDO EL ARTICULO");

            if ($exec_update_post) {
                // header("Location: ../views/pagepost.php?blog_post=".$update_post_id);
            }

            // REGISTRAR ACTUALIZACION DEL POST 

               print_r( $q_save_timestap = "INSERT INTO `up_blog`(
                    `id`, 
                    `user_id`, 
                    `blog_id`, 
                    `created_at`) 
                    VALUES 
                    (NULL, 
                    $session_id, 
                    $update_post_id, 
                    CURRENT_TIMESTAMP)");
            
                $exec_save_post = mysqli_query($db, $q_save_timestap) or die("ERROR TIMESTAP");

                // 2. QUERY PARA EL ULTIMO ARTICULO SUBIDO DEL USUARIO ID

                if ($exec_save_post) {
                    header("Location: ../views/pagepost.php?blog_post=".$update_post_id);
                }

            // \\\\\\\\\\

        }



    //\\\\\\\\\\\\\\\\\\\\\


?>




