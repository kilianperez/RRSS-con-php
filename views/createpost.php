<?php
	// error_reporting(E_ALL);
	// ini_set('display_errors', '1');
	require_once("../config/ini.php");


	// si no esta login de vuelta a la home 

	 if(!$is_login){ 
		header("Location:../index.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Crear Post </title>

	<?php
	require_once("../assets/css/css.php");

	?>

</head>
<body>


	<?php
	require_once("../modules/nav.php");

	?>

	<div class="container-fluid page">
  		<h1 class="text-center"> Crea un Post </h1>
  		<div class="row justify-content-center">
  			<div class="col-6">
  				<form action="../controllers/createpost.controller.php" method="post" enctype="multipart/form-data">
  					<div class="form-group">
    					<label for="tittle_post">Título</label>
					    <input type="text" class="form-control" id="tittle_post" name="tittle_post" >
  					</div>
  					
					<div class="form-group ">
						<label for="text_post">Post</label>
						<textarea class="form-control" id="text_post" name="text_post" rows="15"></textarea>
					</div>

					<span class="m5rm">Imagen</span>
					<div class="form-group custom-file">
						<input type="file" class="custom-file-input" id="img_post" name="img_post">
						<label class="custom-file-label" for="img_post">Imagen del Post</label>
					</div>

				  	<div class="form-group">
              			<input type="submit"  id="create_post" name="create_post" class="btn btn-primary" value="Compartir">
            		</div>
  				</form>
  			</div>
  		</div>
  	</div>

  		<!-- FOOTER -->
  	<?php
	require_once("../modules/footer.php");

	?>

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="../assets/js/scriptboots.js"></script>



</body>
</html>