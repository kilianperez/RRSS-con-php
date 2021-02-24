<?php
	// error_reporting(E_ALL);
	// ini_set('display_errors', '1');
    require_once("../config/ini.php");

    if($is_login){ 
		header("Location:../index.php");
		exit;
	}

?>
<!DOCTYPE html>
<html>
<head>

    <!--------- SEO ------->
    <title>TIPPS | Descubrir</title>
    <!------------->
	<?php
	require_once("../assets/css/css.php");
	?>
</head>
<body>
	<!------- NAV ------->
        <?php
        require_once("../modules/nav.php");
        ?>
    <!------------->
    <!------- CONTENIDO ------->
        <div class="container-fluid gedf-wrapper">
            <div class="row">
                <!---------- CARD IZQ -------->
                    <div class="col-md-3">
                        <?php require_once("../modules/discovercard.php");?>
                    </div>
                <!------------->
                <!--------- FEED ------------->
                    <div class="col-md-6 gedf-main">
                        <!-- PUBLICACIONES RECIENTES -->
                            <?php require_once("../modules/infopostm.php"); ?>
                            <?php require_once("../modules/pagination.php"); ?>
                        <!---------->
                    </div>
                <!------------->
                <!--------- CARD DERE -------->
                    <div class="col-md-3">
                    <?php require_once("../modules/login.php");  ?>

                <!------------->
                </div>
            </div>
        </div>
    <!------------->

	<!------- FOOTER ------->
        <?php
        
        require_once("../modules/footer.php");

        ?>
    <!------------->

    <!------- SCRIPTS ------->
        <?php
        require_once("../assets/js/javascripst.php");
        ?>
        <!------- NO CONSIGO PONERLO CON EL RESTO DE JS EN assets/js/javascripst.php -->
            <!-- <script src="../assets/js/scriptboots.js"></script> -->
        <!------------->
    <!------------->

</body>
</html>