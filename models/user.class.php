<?php
    /* 
        Clase para usuario
    */
        class User {
            protected $name;
            protected $email;
            protected $password;

            public function __construct( $name, $email, $password ) {
                $this->name = $name;
                $this->email = $email;
                $this->password = $password;
            }

            
            public function getName() {
                return $this->name;
            }
            
            public function getEmail() {
                return $this->email;
            }
            
            public static function getAllUsers() {
                $select_users = "SELECT * FROM users";
                $data = $db->query($select_ussers);
                $users = array();

                while ( $data_user = $data->fetch_assoc() ) {
                    $users = new User($data_user);
                    $users[] = $users;
                }
                return $users;
            }

            public static function isSessionOpen() {
                session_start();
                if( empty($_SESSION["id"])){
                    // No hay session abierta
                    return false;
                }
                $user = new User ($_SESSION["name"], $_SESSION["email"]);
                return $user;
            }

            public function save(){
                $select_users = "UPDATE SET name VALUES $this->name";
                $data = $db->query($select_ussers);
                $users = array();

                while ( $data_user = $data->fetch_assoc() ) {
                    $users = new User($data_user);
                    $users[] = $users;
                }
                return $users;
            }



        }

        /* 
        
    */
?>