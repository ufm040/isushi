 <?php
if (isset($_SESSION['auth'])) {
	$connect = "Déconnexion";
	$connectPage = "deconnexion.php";
	$nameUser = $_SESSION['auth']['firstname'];
} else {
	session_start();
	$connect = "Connexion";
	$connectPage = "connexion.php";
}


include('includes/header.php') ;
?>

<div id="fullcarte">
	<?php
	include('menu-choice.php');	
	?> 
</div>
<?php 		
include('includes/footer.html') ; 	
?>
