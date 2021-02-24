<?php



    ////// CONECTARSE AL AL SERVIDOR ///////////

        class DBConexion
        {
             // SERVIDOR
            const HOST          = "localhost";
            // USUARIO DE LA BBDD
            const DB_USER       = "kilianpe_tips_blog";
            // CONSTRASEÑA DEL USUARIO DE LA BBDD
            const DB_PASSWORD   = "&ib,a,j#JsSX";
            // NOMBRE DE LA BBDD
            const DB_NAME       = "kilianpe_proyecto_tips";



                // // LOCAL
                // const HOST          = "localhost";
                // // USUARIO DE LA BBDD
                // const DB_USER       = "root";
                // // CONSTRASEÑA DEL USUARIO DE LA BBDD
                // const DB_PASSWORD   = "root";
                // // NOMBRE DE LA BBDD
                // const DB_NAME       = "db_pokedex";
            



            public function __construct(){

                
            }

            public static function connect(){
                $conectarDB = mysqli_connect( self::HOST, self::DB_USER, self::DB_PASSWORD, self::DB_NAME ) or die("¡Error de conexión en la BBDD!");
                mysqli_set_charset($conectarDB, 'utf8');
                
                return $conectarDB;
            }
        
        }


    //\\\\\\\\\\\\\\\\\\\\\\\\\
    

?>