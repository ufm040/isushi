<!-- page header -->
<?php include('includes/header.php') ; ?>
<?php  try {
	$pdo = include('data/pdo.php');
} catch (Exception $e) {
        die('Erreur');
}
$totalPanier = 0;
?>
<div class="panier clearfix">
	<h1> Récapitulatif de votre Panier</h1>
<?php
	if (isset($_SESSION['basket'])) {	
		foreach ($_SESSION['basket'] as $key => $value) {
			$productQuery = $pdo->prepare('SELECT image, name, description, price  FROM produits WHERE id = :productid ');
			$productQuery->execute([
				':productid' => $value['product']
			]);
			$product = $productQuery->fetchAll();
			$totalPanier += $value['qty'] *  $product[0]['price'] ; 		
			if ( $product) {
				?>
				<article>			
					<div class="one-product" id="product-<?=$value['product']; ?>">
						<h3><?=$product[0]['name'];?></h3>
						<img src="<?= $product[0]['image'];?>" alt="<?=$product[0]['name'];?>"/>
						<aside>
							<h3><?= $product[0]['description'];?></h3>	
							<ul class="detail">
								<li> Prix  : <?= $product[0]['price'] . " €";?></li>
								<li>
									<input type='button' value='-' class='subarticle' field='quantity' />
	    							<input type='text' name='quantity' value=<?= $value['qty'];?> class='qty' />
	    							<input type='button' value='+' class='addarticle' field='quantity' />
								 </li>
								<li> Total : <?= $value['qty'] *  $product[0]['price'] ." €";?></li>
							</ul>
						</aside>
					</div>
				</article>	
				<?php	
			}
		}		
	} else {
		echo "Votre panier est vide";
	} 
	?>
</div>
<div id="totalpanier">
	<p> Total du Pannier : <?= $totalPanier ." €";?></p> 
</div>
<div id="connectpanier">
	<?php 
	if (!isset($_SESSION['auth'])) {
		?>
		<a href="connexion.php" title="Se connecter">Connexion</a>
		<?php			
	} else {
		?>
		<input id="commande" type="submit" value="Commander" ></input>
		<?php
	}
?>
</div>


<!-- pied de page du site -->
<?php include('includes/footer.html') ; ?>
