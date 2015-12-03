<?php
session_start();

if (isset($_SESSION['auth'])) {
	$connect = "Déconnexion";
	$connectPage = "deconnexion.php";
	$nameUser = $_SESSION['auth']['firstname'];
} else {
	$connect = "Connexion";
	$connectPage = "connexion.php";
}
echo "<pre>";
//var_dump($_SESSION);
echo "</pre>" ;
?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>iSushi.fr!</title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:600">	
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<div class="container">

		<!-- page header -->
		<?php include('includes/header.html') ; ?>

		<section class="products">
			<article>
				<h2>Les meilleurs Sushi de Paris !<span id="userhello"><?= !empty($nameUser) ? 'Bonjour '. $nameUser  : ''?></span></h2>
				 
				<div id="tease" class="clearfix">
					<img src="img/img-accueil.png" alt="Les meilleurs sushi de Paris">				
					<p>Chez vous en moins d'une demi-heure, déguster les meilleurs sushi de Paris, fabriqués des maîtres sushi d'exception</p>
				</div>
			</article>
		</section>
		<section class="products" id="nav-bottom">
			<nav>
				<ul>
					<li><a href="#" title="carte">carte <i class="fa fa-chevron-right"></i></a></li>
					<li><a href="#" title="compte">compte client<i class="fa fa-chevron-right"></i>
</a></li>
					<li><a href="#" title="contact">contact<i class="fa fa-chevron-right"></i>
</a></li>
				</ul>
			</nav>
			
		</section>

	</div>	
	<!-- pied de page du site -->
	<?php include('includes/footer.html') ; ?>
</body>
</html>