<?php
	// error_reporting(E_ALL);
	// ini_set('display_errors', '1');
    require_once("config/ini.php");
    	// si no esta login de vuelta a la home 

	 if(!$is_login){ 
		header("Location:../views/login.php");
		exit;
	}



    
?>
<!DOCTYPE html>
<html>
<head>
    <!--------- SEO ------->
        <title>TIPPS | Professional Social Network</title>
    <!------------->
	<?php
	require_once("assets/css/css.php");
	?>
</head>
<body>
	<!------- NAV ------->
        <?php
        require_once("modules/nav.php");
        ?>
    <!------------->
    <!------- CONTENIDO ------->
        <div class="container-fluid gedf-wrapper">
            <div class="row">
                <!---------- CARD IZQ -------->
                    <div class="col-md-3">
                        <?php
                            if (empty($_SESSION["id"])) {
    
                                // VISTA DEL USUARIO QUE HA ESCRITO EL POST(ARTICULO)
                                require_once("./modules/discovercard.php");
                                //\\\\\\\\\\\\ NO ESTA HECHO
                        
                            }else if(!empty($_SESSION["id"])){
                        
                                /////////// VISTA CUANDO EL USUARIO TIENE SESION 
                                    require_once("./modules/infosession.php");
                                //\\\\\\\\\\\\
                            }
                        ?>
                    </div>
                <!------------->
                <!--------- FEED ------------->
                    <div class="col-md-6 gedf-main">
                        <!-----------CREAR POST--------->
                            <?php
                             if ($_SESSION["id"]) {
                                 require_once("./modules/createpostfeed.php");
                                }
                            ?>
                        <!---------->
                        <!-- PUBLICACIONES RECIENTES -->
                            <!-- <div class="container page"> -->
                                <?php

                                    require_once("./modules/infopostm.php");
                                    require_once("./modules/pagination.php");
                                
                                
                                
                                ?>
                            <!-- </div> -->
                        <!---------->
                    </div>
                <!------------->
                <!--------- CARD DERE -------->
                    <div class="col-md-3">

                            <?php require("./modules/infoposts.php");?>
                        
                    </div>
                <!------------->
            </div>
        </div>
    <!------------->
	<!------- FOOTER ------->
        <?php
        require_once("modules/footer.php");
        ?>
    <!------------->
    <!------- SCRIPTS ------->
        <?php
        require_once("assets/js/javascripst.php");
        ?>
        <script src="../assets/js/scriptboots.js"></script>
        <!------- NO CONSIGO PONERLO CON EL RESTO DE JS EN assets/js/javascripst.php -->
            <!-- <script src="../assets/js/scriptboots.js"></script> -->
        <!------------->
    <!------------->
</body>
</html>