
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
			<div id="menu-mosaic">
			<img src="<?php echo $donnees[$key]['image'];?>"/>
			<button type="submit" value="text" >selectionner</button>
			<input type="number" name="howmuch">
			<h3><?php echo $donnees[$key]['name'];?></h3>
			<p><?php echo $donnees [$key]['description'];?></p>
			<p><?php echo $donnees [$key]['price'] . "€";?></p>
			</div>
			



			<?php
		}	
		
		

	
?>
