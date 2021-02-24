<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors', '1');
    
    require_once("../config/ini.php"); // $db


    ///////// CONTROLADOR DE USURIO ----->LOGIN, LOGOUT, REGISTRO ///////
    
        // Controlador de usuario

        /* si viene una peticion POST: hacemos la funcionalidad correspondiente
        
        LOGIN de USUARIO:
            si no está vacío POST["login_user"] ==> Ejecutamos Login de usuario:
                -- Recoger datos, validación de datos, Preguntar si existe un usuario de <email> , comprobar password, y crear session y redirección a INDEX

        REGISTRO DE USUARIO:
            si no está vacío POST["registro_user"] ==> Ejecutamos Registro de usuario:
                -- Recoger datos, validación de datos, Preguntar si NO existe un usuario de <email> e insertar usuario y redirección a registro.
        
        LOGOUT DE USUARIO:
            si no está vacío POST["logout_user"] ==> Ejecutamos Destruir session de usuario
            destroy_session ... y redirigir a LOGIN
        ...
        */



        if(!empty($_POST['signup_user'])){

            // DATOS DEL REGISTRO
                $name           = $_POST['name_user'];
                $surname        = $_POST['surname_user'];
                $proficiency    = $_POST['proficiency_user'];
                $role_user      = $_POST['role_user'];
                $email          = $_POST['email_user'];
                $password       = $_POST['password_user'];
                $password2      = $_POST['password2_user'];
                $img_user       = $_FILES["img_user"];
                $img_header     = $_FILES["img_header"];
                $route_img_user = "../uploads/userimg/";
                $route_img_header = "../uploads/headers/";
                $route_fail = "../views/signup.php";
                
            //\\\\\\\\\\\\
            

            /// CONTROL VALIDACIONES REGISTRO
                $status_infouser = validateinfoUser($name,$surname,$proficiency,$role_user);
                $status_password = validatePass($password,$password2); 
                $status_email    = validateEmail($email);
                $img_user = validateImgSave($img_user, $route_img_user, $route_fail);
                $img_header = validateImgSave($img_header, $route_img_header, $route_fail);
                $img_user["type"]    == "" ? $img_user  = "../assets/imgs/predefinedimg/userundefined.jpg" : $img_user =$img_user;
                $img_header["type"]  == "" ?  $img_header  = "../assets/imgs/predefinedimg/headerundefined.jpg" : $img_header =$img_header;
           
            
                // $status_imguser = validateImgUser($img_user,$img_header,$route_img_user,$route_img_header);

                if ($status_infouser    !==TRUE ||
                    $status_password    !==TRUE ||
                    $status_email       !==TRUE) {

                    $status_infouser == 1 ? $status_infouser = '' : $status_infouser;
                    $status_password == 1 ? $status_password = '' : $status_password;
                    $status_email    == 1 ? $status_email    = '' : $status_email;
                    
                    header("Location: ../views/signup.php?$status_infouser$status_password$status_email$status_imguser");
                    exit();
                }
            //\\\\\\\\\\\\
                
            // GUARDAR IMG


            //\\\\\\\\\\\












            // REGISTRO DE USUARIO

                // Preguntar si existe en BBDD ese email
                // 2. QUERY
                $q_user = "SELECT id FROM user WHERE email = '$email'"; // 0 ó 
                // 3. Ejecutar query;
                $exec_user = mysqli_query( $db,  $q_user) or die("FALLO DE REGISTRO DE USUARIO");
                $exec_user;
                if( $exec_user->num_rows!=0 ){
                    // existe ese USER!
                    header("Location: ../views/signup.php?fail=user_exists");
                }

                print_r($img_user);
                // Registro de Usuario

                $pass_hash = password_hash( $password, PASSWORD_DEFAULT );

                $q_save_user = "INSERT INTO `user`(
                `email`, 
                `name`, 
                `surname`, 
                `password`,
                `role_user`,
                `proficiency`,
                `user_img_header`,
                `user_img`
                ) VALUES (
                '$email',
                '$name',
                '$surname',
                '$pass_hash',
                '$role_user',
                '$proficiency',
                '$img_header',
                '$img_user'
                )";
               

                $exec_save_user = mysqli_query($db, $q_save_user) or die("ERROR GUARDANDO USER");

                echo "Usuario Guardado";
                // HEMOS GUARDADO EL User!
                // header("Location: ../index.php?success=register_ok");
                // exit();
            //\\\\\\\\\\\\
            $_POST['login_user'] = TRUE;
            $_POST['login_user'] = TRUE;
            $_POST['login_user'] = TRUE;


        }
        
        if(!empty($_POST['login_user'])){
            
            // DATOS 
                $email = $_POST['email_user'];
                $password = $_POST['password_user'];
            //\\\\\\\\\\\\\\
            
            // VALIDACIONES DE CAMPOS

                // Campos vacios, email con formato email y password "robusta"
           
                $status_email       = validateEmail($email);
                empty($email)       == 1 ? $email = "not_email=fail&" : $email;
                empty($password)    == 1 ? $password = "not_pass=fail&" : $password;
                
                if ($status_email   !==TRUE ||
                    $password       == "not_email=fail&" ||
                    $email          == "not_pass=fail&") {

                    $status_email   == 1 ? $status_email = '' : $status_email;
                    $password       !== "not_email=fail&" ? $password = '' : $password;
                    $email          !== "not_email=fail&" ? $email = '' : $email;

                    

                    header("Location: ../views/login.php?$status_email$password$email");
                    exit();

                    
                }
            
            //\\\\\\\\\\\

            // LOGIN 
            
                // 2. QUERY
                $q_user = "SELECT * FROM user WHERE email = '$email'"; // 0 ó 1 USER

                //3. Ejecutar query
                $exec_user = mysqli_query($db, $q_user) or die("MUERTE en select de user");
                print_r($exec_user);
                // Si el número de users es = 0 --> redirección a login
                
                if( $exec_user->num_rows == 0 ){
                    // No pasamos la validación --> Redirección a login.view.php
                    header("Location: ../views/login.php?not_user=fail");
                    exit();
                }


                // 4. Recoger información
                $user = mysqli_fetch_assoc($exec_user);

                // 111111 viene del form con la pass (hash) de la BBDD
                if( password_verify($password, $user['password'] )==false){
                    header("Location: ../views/login.php?password_login=fail");
                    exit();
                }

                // LOGIN --> Crear session
                session_start(); // $_SESSION
                $_SESSION['id']          = $user['id'];
                $_SESSION['email']       = $user['email'];
                $_SESSION['name']        = $user['name'];
                $_SESSION['surname']     = $user['surname'];
                $_SESSION['role_user']   = $user['role_user'];
                $_SESSION['proficiency'] = $user['proficiency'];
                $_SESSION['user_img']    = $user['user_img'];
                $_SESSION['header_img']  = $user['user_img_header'];

                header("Location: ../index.php");
            //\\\\\\\\\\\
        }

    //\\\\\\\\\\\\\\\\\\\\\
?>  

