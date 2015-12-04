 <?php
 try {
	$pdo = include('data/pdo.php');

} catch (Exception $e) {


        die('Erreur');

}
		
$getimage = $pdo->query('SELECT id, image, name, description, price  FROM produits Order By name');
$donnees = $getimage->fetchall();
	

foreach ($donnees as $key => $value) {
	?>
	<div class="menu-mosaic" id="product-<?=$donnees[$key]['id']; ?>">
		<span class="imgSize">
			<img src="<?php echo $donnees[$key]['image'];?>" class="adapt-image"/>
		</span>
		<div class="selection">
			<form class='myform' method='POST' action='#'>
    			<input type='button' value='-' class='qtyminus' field='quantity' />
    			<input type='text' name='quantity' value='0' class='qty' />
    			<input type='button' value='+' class='qtyplus' field='quantity' />
			</form>
			<button type="submit" value="text" class="basketAdd">acheter !</button>
		
		</div>
		<div class="menuText">
		<h3><?php echo $donnees[$key]['name'] . " " .$donnees [$key]['price'] . "€";?></h3>
		<p><?php echo $donnees [$key]['description'];?></p>
		</div>
	</div>

	<?php
}	
	
?>
