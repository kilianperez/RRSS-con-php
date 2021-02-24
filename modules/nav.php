<!--  Navegador -->
<nav class="navbar navbar-light bg-white m-auto">
   <a class="navbar-brand title-brand" href="/">Tips</a>
   	<ul class="nav justify-content-end">
	     
		<?php if(!$is_login){ ?>
			<li class="nav-item">
				<a href="/views/signup.php" class="btn btn-primary" href="#">Registro</a>
			</li>
		<?php 
			}else{ 
		?>
		<form class="form-inline mr-2" action="../index.php" method="get" >
			<div class="input-group">
				<input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" id="search" name="search">

				<div class="input-group-append">
					<button type="submit"  class="btn btn-outline-primary"  id="button-addon2">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</div>
		</form>


		<?php
			if (!empty($_GET["edit_post"]) &&
				!empty($_POST["edit_post_id"])
			) {
		?>

		<li class="nav-item">

		<a class="btn btn-primary mr-2" href="../views/pagepost.php?blog_post=<?=$_POST["edit_post_id"]?>">VOLVER</a>
		</li>

		<?php
		} 
		?>

			<div class=" nav-item dropdown">

				<button class="btn btn-link dropdown p-0" type="button" id="gedf-drop1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<div class="mr-2">

					<img class="rounded-circle cicle-small" src="<?= $_SESSION["user_img"]?>" alt="">
					
				</div>
				</button>
				
				<div class="dropdown-menu position-move dropdown-menu-right" aria-labelledby="gedf-drop1">

					<div class="h6 dropdown-header">Cuenta</div>
					<a class="dropdown-item" href="../views/user.php?user=<?=$_SESSION["id"]?>&profile=true">Ver perfil</a>

					<div class="dropdown-divider"></div>
					<form action="../controllers/logout.controller.php" method="post">
					<input class="dropdown-item" type="submit" value="Salir" name="logout">
					</form>
					
				</div>
				
			</div>

		<?php 
		}
		?>
	</ul>
</nav>
