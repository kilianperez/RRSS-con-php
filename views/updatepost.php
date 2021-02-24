<?php
	// error_reporting(E_ALL);
	// ini_set('display_errors', '1');
	require_once("../config/ini.php");


	// si no esta login de vuelta a la home ( NO FUNCIONAAAAAAAAA)

	 if(!$is_login){ 
		header("Location:../index.php");

		exit;
	}

	// si no esta login de vuelta a la home 

	if(empty($_GET["edit_post"])){ 
		header("Location:../index.php");

		exit;
	}
	
	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edita el post</title>

	<?php
	require_once("../assets/css/css.php");
	?>

</head>
<body>

	<?php
	require_once("../modules/nav.php");
	?>

	<div class="container-fluid page">
  		<h1 class="text-center">Edita el post</h1>
  		<div class="row justify-content-center">
  			<div class="col-6">
  				<form action="../controllers/updatepost.controller.php" method="post" enctype="multipart/form-data">
				  	<input type="hidden" name="update_post_id" value="<?=$_POST["edit_post_id"]?>" />
				 	<div class="form-group">
    					<label for="update_tittle_post">Título</label>
					    <input type="hiddem" value="<?=$_POST["edit_title"]?>" class="form-control" id="update_tittle_post" name="update_tittle_post" >
  					</div>
					  <div class="form-group">
    					<label for="update_source_name">¿Alguna fuente que apoye el Tip?</label>
					    <input type="hiddem" value="<?=$_POST["edit_source_name"]?>" class="form-control" id="update_source_name" name="update_source_name" >
					</div>
					<div class="form-group">
    					<label for="update_source_url">URL Fuente</label>
					    <input type="hiddem" value="<?=$_POST["edit_source_url"]?>" class="form-control" id="update_source_url" name="update_source_url" >
  					</div>  
					<div class="form-group ">
						<label for="update_text_post">Post</label>
						<textarea class="form-control" id="update_text_post" name="update_text_post" rows="15"><?=$_POST["edit_post_text"]?></textarea>
					</div>

				  	<div class="form-group">
              			<input type="submit"  id="update_post" name="update_post" class="btn btn-primary" value="Actualizar">
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