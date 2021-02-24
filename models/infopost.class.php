<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', '1');

    ////////// INFO //////////

        /* DISPONEBLE EN: 

            - views/pagepost.php (MUESTRA LA INFORMACION DEL POST(ARTICULO))
            - views/user.php (MUESTRA LA INFORMACION DE LOS ULTIMOS ARTICULOS DE UN USUARIO)

        */

        /* ARRAY DISPONIBLE:
        
            // $content_post["id"];
            // $content_post["user_id"];
            // $content_post["title"];
            // $content_post["post_text"];
            // $content_post["created_at"];
            // $content_post["source_name"];
            // $content_post["post_img"];
            // $content_post["source_url"];

        */

    //\\\\\\\\\\ 

    ///////BUSCADOR Y PAGINACIONES ULTIMAS ENTRADAS////////
        $search = "";
        
        if(!empty($_GET["search"])){
            
            $searches = $_GET["search"];
            $search = 
            "AND name LIKE '%$searches%' OR
            surname LIKE '%$searches%' OR
            title LIKE '%$searches%' OR
            post_text LIKE '%$searches%'
            ";
        }

        if(!empty($_GET["user"])){
            
            $searches = $_GET["user"];
            $search = 
            "AND blog_post.`user_id` LIKE $searches
            ";
        }

    //\\\\\\\\\\ 

    ///////PAGINACIONES////////
        
        $offset = 0;
        $num_items = 4;

        if(!empty($_GET["page"])){
            $page = $_GET["page"];
            $offset = ($page -1)*$num_items;
        }else{
            $page = 1;
        }
        
    //\\\\\\\\\\ 

    //////////// PREGUNTAR INFORMACION DE LAS ULTIMAS ENTRADAS DEL BLOG  ////////////

        if(empty($_GET['user'])){
            // 2. QUERY
            $q_latest_post_user = "SELECT 
            blog_post.id, 
            user.id as 'user_id',
            user.name, 
            user.surname, 
            user.user_img, 
            user.role_user, 
            user.proficiency, 
            blog_post.source_name, 
            blog_post.source_url, 
            blog_post.title, 
            blog_post.post_text, 
            blog_post.created_at, 
            blog_post.post_img 
            FROM user INNER JOIN 
            blog_post ON 
            user.id = blog_post.`user_id` 
            WHERE 1 ".$search." 
            ORDER BY `blog_post`.`created_at` 
            DESC LIMIT $num_items 
            OFFSET $offset"; // 0 ó 1 USER
            // 3. Ejecutar query;

            $exec_latest_post = mysqli_query( $db,  $q_latest_post_user) or die("FALLO DE MOSTAR ULTIMOS POST");
            // 4. Recoger información

        }




    //\\\\\\\\\\\\\ 

    //////////// PREGUNTAR INFORMACION DE LAS ULTIMAS ENTRADAS DE UN USUARIO  ////////////
    
        if(!empty($_GET['user'])){
            // 2. QUERY

            if(!empty($_GET['profile'])){

                // DEBE CREAR UNA ENTRADA PARA VER SU PERFIL    

                // 2. QUERY
                $q_user = "SELECT `user_id` FROM `blog_post` WHERE `user_id` = ".$_GET['user']; // 0 ó 1 USER

                //3. Ejecutar query
                $exec_user = mysqli_query($db, $q_user) or die("MUERTE en select de user");
                // Si el número de users es = 0 --> redirección a login
                
                if( $exec_user->num_rows == 0 ){
                    // No pasamos la validación --> Redirección a login.view.php
        
                    // Para ver el perfil, debe crear contenidoç
                    header("Location: ../index.php?create_post=now");
                    // exit();
        
        
        
                }
            }
            
            $q_latest_post_user = "SELECT 
            blog_post.id, 
            user.id as 'user_id',
            user.name, 
            user.surname, 
            user.user_img, 
            user.role_user, 
            user.proficiency, 
            blog_post.source_name, 
            blog_post.source_url, 
            blog_post.title, 
            blog_post.post_text, 
            blog_post.created_at, 
            blog_post.post_img 
            FROM user INNER JOIN 
            blog_post ON 
            user.id = blog_post.user_id 
            AND user.id = ".$_GET['user']." 
            ORDER BY `blog_post`.`created_at` 
            DESC LIMIT $num_items 
            OFFSET $offset "; // 0 ó 1 USER
            // 3. Ejecutar query;

            $exec_latest_post = mysqli_query( $db,  $q_latest_post_user) or die("FALLO DE MOSTAR ULTIMOS POST");
            // 4. Recoger información

        }  


        
    //\\\\\\\\\\\\\ 

    ///////PAGINACION SELECT////////
        $total = "SELECT blog_post.id FROM user INNER JOIN 
        blog_post ON user.id = blog_post.`user_id`  WHERE 1 ".$search;
        $exec_total = mysqli_query( $db, $total);

        // Número de artiulos totales
        $num_total = $exec_total->num_rows;
        
        $num_paginas = ceil($num_total / $num_items);
        // echo $num_paginas;
    //\\\\\\\\\\ 

    ///////NUEVOS USUARIOS////////

        // 2. QUERY
        $q_new_users = "SELECT 
        id, 
        name, 
        surname, 
        user_img, 
        email, 
        role_user, 
        proficiency 
        FROM user  
        ORDER BY `created_at` 
        DESC LIMIT $num_items 
           "; // 0 ó 1 USER
        // 3. Ejecutar query;

        $exec_new_users = mysqli_query( $db,  $q_new_users) or die("FALLO DE MOSTAR NUEVOS USUARIOS");
        // 4. Recoger información
    //\\\\\\\\\\ 
?> 





    


  