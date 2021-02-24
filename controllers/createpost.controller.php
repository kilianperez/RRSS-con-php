<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', '1');
    
    require_once("../config/ini.php"); // $db
    
    ///////// CREAR ENTRADA ARTICULO POST //////////
        
        if(!empty($_POST['create_post'])){
        
            // DATOS DEL POST(ARTICULO)

                $user_id        =  $_SESSION['id']; // OK
                $title_post     = $_POST["tittle_post"]; // OK
                $text_post      = $_POST["text_post"]; // OK
                $source_name    = $_POST["source_name"]; // OK
                $source_url     = $_POST["source_url"]; // OK
                $img_post       = $_FILES['img_post']; // OK
                
            //\\\\\\\\\\\
            
            // VALIDACIONES DE CAMPOS

                $source_url = createSourceUrl( $source_name, $user_id,$source_url);
                $status_validate_post = validatePostText($title_post, $text_post, 149);
                $source_name  == "" ? $source_name = 'Contenido Propio' : $source_name ;

                // print_r($img_post ["name"]);
                // print_r($img_post ["name"]);

                if ($status_validate_post !== TRUE 
    
                ){

                    $status_validate_post   == 1 ? $status_validate_post = '' : $status_validate_post;

                    header("Location: ../index.php?$status_validate_post$status_validate_img");
                    exit();
                }
                     
            //\\\\\\\\\\\

            // GUARDAR IMG
              
                $img_post = validateImgSave($img_post, "../uploads/postimg/", "../index.php");
               
            //\\\\\\\\\\\
            
            // REGISTRAR ENTRADA DEL POST 

                $q_save_post = "INSERT INTO `blog_post`(
                `id`, 
                `title`, 
                `post_text`, 
                `created_at`, 
                `post_img`, 
                `user_id`, 
                `source_url`, 
                `source_name`) 
                VALUES 
                (NULL, 
                '$title_post', 
                '$text_post', 
                CURRENT_TIMESTAMP, 
                '$img_post', 
                '$user_id', 
                '$source_url',
                '$source_name')";
            
                $exec_save_post = mysqli_query($db, $q_save_post) or die("ERROR GUARDANDO POST");


                // 2. QUERY PARA EL ULTIMO ARTICULO SUBIDO DEL USUARIO ID

                $q_latest_post_user = "SELECT blog_post.id, blog_post.title, blog_post.post_text, blog_post.created_at, blog_post.post_img FROM user INNER JOIN blog_post ON user.id = blog_post.`user_id`WHERE blog_post.`user_id` = ".$_SESSION["id"]." ORDER BY `blog_post`.`created_at` DESC"; // 0 ó 1 USER

                // 3. Ejecutar query;
                $exec_latest_post = mysqli_query( $db,  $q_latest_post_user) or die("FALLO DE REGISTRO DE USUARIO");


                // 4. Recoger información
                
                $result_lastp_user = mysqli_fetch_assoc($exec_latest_post);

                
                // 4. ENVIO información
                


                if ($exec_save_post) {
                    header("Location: ../views/pagepost.php?blog_post=".$result_lastp_user["id"]);
                }

            // \\\\\\\\\\
        }

    //\\\\\\\\\\\\\\\\\\\\\
    

?>  