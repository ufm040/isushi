 <?php
 try {
	$pdo = include('data/pdo.php');

} catch (Exception $e) {


        die('Erreur');

}
		
$getimage = $pdo->query('SELECT image, name, description, price  FROM produits Order By name');
$donnees = $getimage->fetchall();
	

foreach ($donnees as $key => $value) {
	?>
	<div id="menu-mosaic">
		<span class="imgSize">
			<img src="<?php echo $donnees[$key]['image'];?>" class="adapt-image"/>
		</span>
		<div id="selection">
			<form id='myform' method='POST' action='#'>
    			<input type='button' value='-' class='qtyminus' field='quantity' />
    			<input type='text' name='quantity' value='0' class='qty' />
    			<input type='button' value='+' class='qtyplus' field='quantity' />
			</form>
			<button type="submit" value="text" id="basketAdd">acheter !</button>
		
		</div>
		<div id="menuText">
		<h3><?php echo $donnees[$key]['name'] . " " .$donnees [$key]['price'] . "€";?></h3>
		<p><?php echo $donnees [$key]['description'];?></p>
		</div>
	</div>

	<?php
}	
	
?>
