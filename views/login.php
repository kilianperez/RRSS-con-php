
<!DOCTYPE html>
<html>
<head>
	<title> Blog </title>

	<?php
	require_once("../assets/css/css.php");

	?>
	
</head>
<body>


	<?php
	session_start();
	require_once("../modules/nav.php");

	?>

	<!-- LOGIN -->
	<div class="container-fluid login-container gedf-wrapper mb-5 ">
   		<div class="row d-flex align-items-center">
			<div class="col-8 d-flex justify-content-center">
				<img src="../assets/imgs/predefinedimg/3543932.jpg" class="img-fluid p-5 w-75 " alt="Responsive image">
			</div>
			
			<div class="col-4">

				<?php
			
				require_once("../modules/login.php");

				?>
			</div>
		</div>
	</div>


  		<!-- FOOTER -->
  	<?php
	require_once("../modules/footer.php");

	?>


</body>
</html>