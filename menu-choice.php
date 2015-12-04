<<<<<<< HEAD
 <?php
 try {
	$pdo = include('data/pdo.php');

} catch (Exception $e) {


        die('Erreur');

}
		
$getimage = $pdo->query('SELECT image, name, description, price  FROM produits');
$donnees = $getimage->fetchall();
	

foreach ($donnees as $key => $value) {
	?>
	<button type="submit" value="text" >selectionner</button>
	<input type="number" name="howmuch">
	<img src="<?php echo $donnees[$key]['image'];?>"/>
	<h3><?php echo $donnees[$key]['name'];?></h3>
	<p><?php echo $donnees [$key]['description'];?></p>
	<p><?php echo $donnees [$key]['price'] . "€";?></p>
	<?php
}	
		
?>
=======

 <?php 
try {
	$pdo = include('data/pdo.php');

} catch (Exception $e) {


        die('Erreur');

}
		
<<<<<<< HEAD
		$getimage = $pdo->query('SELECT image, name, description, price  FROM produits');
		$donnees = $getimage->fetchall();
 		
=======
$getimage = $pdo->query('SELECT image, name, description, price  FROM produits');
$donnees = $getimage->fetchall();
	
>>>>>>> refs/remotes/origin/catherine_test

		foreach ($donnees as $key => $value) {
			?>
			<div id="menu-mosaic">
			<img src="<?php echo $donnees[$key]['image'];?>"/>
			<button type="submit" value="text" >selectionner</button>
			<input type="number" name="howmuch">
			<h3><?php echo $donnees[$key]['name'];?></h3>
			<p><?php echo $donnees [$key]['description'];?></p>
			<p><?php echo $donnees [$key]['price'] . "€";?></p>
			</div>
<<<<<<< HEAD
			



			<?php
		}	
=======
		
	<?php
}	
>>>>>>> refs/remotes/origin/catherine_test
		
		

	
?>
>>>>>>> arthur_test
