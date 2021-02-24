<?php

    ////////// INFO //////////

        /* DISPONEBLE EN: 

            - views/pagepost.php (MUESTRA LA INFORMACION DEL USUARIO QUE HGA ESCRITO EL BLOG)
            - views/user.php (MUESTRA LA INFORMACION DEL USUARIO)

        */

        /* VARIABLES QUE DEVUELVE DE LA BBDD:
        
            $content_post["id"];
            $content_post["user_id"];
            $content_post["user_img"];
            $content_post["title"];
            $content_post["post_text"];
            $content_post["created_at"];
            $content_post["source_name"];
            $content_post["post_img"];
            $content_post["source_url"];

        */

    //\\\\\\\\\\ 

    /////// PREGUNTAR UN POST POST(ARTICULOS) DEL BLOG A LA BBDD  /////////
        if(!empty($_GET['blog_post'])){
            $q_select_post = "SELECT * 
            FROM user INNER JOIN 
            blog_post ON 
            user.id = blog_post.
            `user_id` WHERE 
            blog_post.`id` = ".$_GET['blog_post']." 
            ORDER BY `blog_post`.
            `created_at` DESC";
            $exec_select_post = mysqli_query($db, $q_select_post) or die("ERROR PETICION BBDD views/pagepost.php");
            $content_post = mysqli_fetch_assoc($exec_select_post);
        }
    //\\\\\\\\\\\\\\\\\

    /////// PREGUNTAR TODA LA INFO DE UN USUARIO A PARA LOS POST /////////
    
        if(!empty($_GET['user'])){
         
            $q_select_post = "SELECT * 
            FROM user INNER JOIN 
            blog_post ON 
            user.id = blog_post. `user_id` 
            WHERE 
            user.`id` = ".$_GET['user']."  
            ORDER BY `blog_post`. `created_at` 
            DESC";
            $exec_select_post = mysqli_query($db, $q_select_post) or die("ERROR PETICION BBDD views/user.php");
            $content_post = mysqli_fetch_assoc($exec_select_post);
        }
    //\\\\\\\\\\\\\\\\\


    /////// PREGUNTAR TODA LA INFO UN USUARIO /////////
    
        if(!empty($_GET['user'])){
         
            $q_select_post = "SELECT * 
            FROM user  
            WHERE 
            user.`id` = ".$_GET['user']."";
            $exec_select_post = mysqli_query($db, $q_select_post) or die("ERROR PETICION BBDD views/user.php");
            $user_info = mysqli_fetch_assoc($exec_select_post);
        }
    //\\\\\\\\\\\\\\\\\

    

?>