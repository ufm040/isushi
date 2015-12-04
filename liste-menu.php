<<<<<<< HEAD
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
include('menu-choice.php');	
		
include('includes/footer.html') ; 	
?>
=======
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
include('product.php');	
		
include('includes/footer.html') ; 	
?>
>>>>>>> refs/remotes/origin/catherine_test
