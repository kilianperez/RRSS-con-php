<?php
    /* 
        services/functions.php
        Archivo para cargar las funciones generales
    */

    function isSession():bool{
        session_start();
        if(!empty($_SESSION['id'])){
            return true;
        }
        return false;
    }
                        
    function validatePass($password, $password2){
                    
        $resultado= "";
        $status_validate = TRUE;

        if (($password!==$password2)){
            
            $resultado .= "password_dif=fail&";
            $status_validate = FALSE;

        }
        if (preg_match("/[a-zA-Z0-9]{6,}/", $password)!==1){

            $resultado .= "password_char=fail&";
            $status_validate = FALSE;
            
        }
        if(stristr($password, 'password') !== FALSE){
            $resultado .= "password_pas=fail&";
            $status_validate = FALSE;

        }
        if(empty($password)){
            $resultado .= "password_empty=fail&";
            $status_validate = FALSE;
        }
        if(stristr($password, '123456') !== FALSE){
            $resultado .= "password_num=123456&";
            $status_validate = FALSE;

        }

        if($status_validate){
            return $resultado = TRUE;
        }else{
            return $resultado;
        }
        
    }        

    function validateEmail($email){

        $resultado = "";
        $status_validate = TRUE;


        if (!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/", $email)){
            echo "NO validado";
            $resultado .= "email_user=fail&";
            $status_validate = FALSE;


        }

        if($status_validate){
            return $resultado = TRUE;
        }else {
            return $resultado;
        }

    }

    function validateinfoUser($name,$surname,$proficiency,$role_user){

        $resultado = "";
        $status_validate = TRUE;

        if (empty($name)){
            echo "NO validado name";
            $resultado .= "name=fail&";
            $status_validate = FALSE;

        }
        if (empty($surname)){
            echo "NO validado surname";
            $resultado .= "surname=fail&";
            $status_validate = FALSE;

        }
        if (empty($proficiency)){
            echo "NO validado proficiency";
            $resultado .= "proficiency=fail&";
            $status_validate = FALSE;

        }
        if (empty($role_user)){
            echo "NO validado role";
            $resultado .= "role=fail&";
            $status_validate = FALSE;

        }
        if($status_validate){
            return $resultado = TRUE;
        }else {
            return $resultado;
        }
    }

    function saveImg($img, $route_url){

        // VARIABLES NECESARIAS QUE ENTRAN POR FILE PARA GUARDAR

        $img['name']; 
        $img['type'];
        $img['size'];
        $img['tmp_name']; // ANTIGUA CARPETA
        $route_url; // NUEVA CARPETA


        // MOVER DE IMG DE DE ORIGEN A DESTINO
        
        $img_save = move_uploaded_file($img['tmp_name'],$route_url.$img['name']);
        if (!$img_save) {
        return "img_move_uploaded=fail&";
        }else{
            // "guadado con exito"
            return TRUE;
        }


    }

    function validateImgType($img){
        if ($img['type'] =='image/jpeg' ||
            $img['type'] =='image/jpg'  ||
            $img['type'] =='image/png'  ){

        return TRUE;

        }else{

            return "validateImgType=fail&";

        }
        
    

    }

    function validateImgType2($img){
        if ($img['type'] =='image/jpeg' ||
            $img['type'] =='image/jpg'  ||
            $img['type'] =='image/png'  ){

        return TRUE;

        }

        return FALSE;

        
        
    

    }


    function validateImgUser($img_user,$img_header,$route_img_user,$route_img_header){

        $resultado = "";
        $status_validate = TRUE;

        if (validateImgType($img_user)!==TRUE) {
            print_r($resultado .= validateImgType($img_user));
            $status_img_user = FALSE;
            $status_validate = FALSE;
            
        }else{
            print_r($img_user = saveImg($img_user, $route_img_user));
            $status_validate = TRUE;
        }   
        
        // if (validateImgType($img_header)!==TRUE) {
            //     print_r($resultado .= validateImgType($img_header));
            //     $status_img_header = FALSE;
            //     $status_validate = FALSE;
            // }

            // if ($status_img_header   !== FALSE &&
            //         $status_img_user    !== FALSE){

            //         if (!empty($img_user)){
                        
            //             print_r($img_user = saveImg($img_user, $route_img_user));
            //         }
            //         if (!empty($img_header)){
                        
            //             print_r( $img_header = saveImg($img_header, $route_img_header));
            //         }
            //         $status_validate = TRUE;
        //     }

            if (empty($img_user)){
                $img_user = "../assets/imgs/predefinedimg/user.png";
                $status_validate = TRUE;
            }
            if (empty($img_header)){
                $img_header = "../assets/imgs/predefinedimg/fondo.jpg";
                $status_validate = TRUE;
            }
            if($status_validate){
                return $resultado = TRUE;
                
            }else {
                return $resultado;
            }

    }

    function validatePostText($title, $text_valid, $characters_text){

        $resultado = "";
        $status_validate = TRUE;
        
        if (str_word_count($text_valid, 0, "724")<=$characters_text){
            $resultado .= "not_text=fail&";
            $status_validate = FALSE;
        }
   
        if (empty($title)){
            $resultado .= "not_title=fail&";
            $status_validate = FALSE;

        }


        if($status_validate){
            return $resultado = TRUE;
        }else {
            return $resultado;
        }

 
    
    }
    
    function createSourceUrl($source_name, $user_id,$source_url ){
        

        if (empty($source_name) ||
            empty($source_url)
        ){
            return $source_url = "../views/user.php?user=$user_id";
        }

        return $source_url;
 
    }

    function validateImgSave($img, $route_url, $route_fail){

        if (!empty($img["type"])) {
            // $img = $_FILES['img']; 

            $validatetype = validateImgType($img);
            if(  $validatetype !== TRUE){
                header("Location: $route_fail?$validatetype");
                exit();
                echo "<br>NO VALIDADA<br>";
            }

            $save_img = saveImg($img, $route_url);

            if ($save_img !== TRUE){
                echo "<br>NO GUARDAA<br>";                    


                header("Location: $route_fail?$save_img");
                exit();
            }

            return $route_url.$img['name'];


             
        }
    }
    
?>