<?php
	// error_reporting(E_ALL);
	// ini_set('display_errors', '1');
	require_once("config/ini.php");

	$search = "";
	if(!empty($_GET["search"])){
		$search = "AND title LIKE '%".$_GET['search']."%'";
	}

	$offset = 0;
	$num_items = 2;

	if(!empty($_GET["page"])){
		$page = $_GET["page"];
		$offset = ($page -1)*$num_items;
	}
	/*
	(page - 1) * 3; 
	
	Page 1 --> Offset 0    
	Page 2 --> Offset 3    2
	Page 3 --> Offset 6	   3
	Page 4 --> Offset 9
	Page 5 --> Offset 12
	Page 6 --> Offset 15
	Page 7 --> Offset 18
	*/
	$articulos = "SELECT * FROM article WHERE 1 ".$search." ORDER BY created_at DESC LIMIT $num_items OFFSET $offset";

	$exec_art = mysqli_query( $db, $articulos);
	
	// Cuántas páginas tenemos que sacar?
	//  8 artículos --> Sacar cuantos artículos tenemos en total
	$total = "SELECT id FROM article WHERE 1 ".$search;
	$exec_total = mysqli_query( $db, $total);

	// Número de artiulos totales
	$num_total = $exec_total->num_rows;
	
	$num_paginas = ceil($num_total / $num_items);
	echo $num_paginas;

?>
<!DOCTYPE html>
<html>
<head>
	<title> Blog de PHP </title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./assets/css/style.css">
	<meta charset="utf-8">

</head>
<body>
	<!-- NAVEGADOR -->
	<?php
		require_once("modules/nav.php");
	?>

	<!-- PUBLICACIONES -->
	<div class="container page">
		<form class="search" action="" method="GET">
			<input type="search" name="search" id="search">
			<input type="submit" value="Buscar" class="btn btn-light">
			<a href="/index.php" class="btn btn-dark">Restablecer</a>
		</form>
		
		<div class="row">
			<?php
				while($articulo = mysqli_fetch_assoc( $exec_art ) ){
					require("modules/card_article.php");
				}
			?>
		</div>
		<nav aria-label="Page navigation example">
			<ul class="pagination">
				<li class="page-item"><a class="page-link" href="/index.php?page=<?= $page-1 ?>">Previous</a></li>
				<?php
					for ($i=1; $i <= $num_paginas; $i++) { 
						if($page == $i){
							$active = "active";
						}else{
							$active = "";
						}

						echo "<li class='page-item ".$active."'>
							<a class='page-link' href='/index.php?page=".$i."'>".$i."</a>
						</li>";
					}
				?>
				<li class="page-item"><a class="page-link" href="/index.php?page=<?= $page+1 ?>">Next</a></li>
			</ul>
		</nav>
	</div>


	
	

	<!-- FOOTER -->
	<?php
	require_once("modules/footer.php");

	?>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</body>
</html>