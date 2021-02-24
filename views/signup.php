<!DOCTYPE html>
<html>
<head>
	<title> Blog </title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">

</head>
<body>


	<?php
	require_once("../modules/nav.php");

	?>

	<div class="container-fluid page">
  		<h1 class="text-center"> Regístrate en el Blog </h1>
  		<div class="row justify-content-center">
  			<div class="col-6">
  				<form action="../controllers/user.controller.php" method="post" enctype="multipart/form-data">
  					<div class="form-group">
    					<label for="name_user">Nombre</label>
					    <input type="text" class="form-control" id="name_user" name="name_user"> 
					</div>
					<div class="form-group">
    					<label for="surname_user">Apellidos</label>
					    <input type="text" class="form-control" id="surname_user" name="surname_user"> 
					</div>
					<div class="form-group">
    					<label for="proficiency_user">Habilidad</label>
					    <input type="text" class="form-control" id="proficiency_user" name="proficiency_user"> 
					</div>





					<!-- AQUIIIIIIIIIIIIIIII -->
					<div class="form-group">
						<label for="role_user">Experiencia (habilidad)</label>
						<select class="form-control" id="role_user" name="role_user">
						<option value="Trainee">0 - 1 años</option>
						<option value="Junior">2 - 3 años</option>
						<option value="Semi-senior">3 - 5 años</option>
						<option value="Senior">más de 5 años</option>

					</select>
					</div>

					  	<div class="custom-file">
							<input type="file" class="custom-file-input" id="img_user" name="img_user">
							<label class="custom-file-label" for="img_user">Seleciona imagen de perfil</label>
						</div>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="img_header" name="img_header">
							<label class="custom-file-label" for="img_header">Seleciona imagen de cabecera</label>
						</div>
  					<div class="form-group">
    					<label for="email_user">Correo</label>
					    <input type="email" class="form-control" id="email_user" name="email_user" >
					    <small id="correoHelp" class="form-text text-muted">Debe introducir un correo con el formato nombre@algo.com</small>
  					</div>
  					<div class="form-group">
    					<label for="password_user">Contraseña</label>
					    <input type="password" class="form-control" id="password_user" name="password_user">
					    <small id="correoHelp" class="form-text text-muted">La contraseña debe ser al menos de 6 caracteres</small>
					</div>
					  
					<div class="form-group">
    					<label for="password2_user">Repita contraseña</label>
					    <input type="password" class="form-control" id="password2_user" name="password2_user">
  					</div>
  					<div class="form-group">
  						<input type="submit" name="signup_user" value="Registrar" class="btn btn-primary">
					  </div>

						<?php
						require_once("../modules/alertserrors.php");

						?>
					  
  				</form>
  			</div>
  		</div>
  	</div>

  		<!-- FOOTER -->
  	<?php
	require_once("../modules/footer.php");

	?>


</body>
</html>