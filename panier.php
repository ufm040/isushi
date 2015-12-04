<!-- page header -->
<?php include('includes/header.php') ; ?>
<?php  try {
	$pdo = include('data/pdo.php');
} catch (Exception $e) {
        die('Erreur');
}
var_dump($_SESSION);
?>

<h1> Votre Panier</h1>
<?php 
	foreach ($_SESSION['basket'] as $key => $value) {
		$productQuery = $pdo->prepare('SELECT image, name, description, price  FROM produits WHERE id = :productid ');
		$productQuery->execute([
			':productid' => $value['product']
		]);
		$product = $productQuery->fetchAll();
		if ( $product) {
			?>
			<div class="one-product" id="product-<?=$product[0]['id']; ?>">
				<h3><?=$product[0]['name'];?></h3>
				<img src="<?= $product[0]['image'];?>" alt="<?=$product[0]['name'];?>"/>
				<p><?= $product[0]['description'];?></p>
				<p><?= $product[0]['price'] . " €";?></p>
				<p><?= $value['qty'];?></p>
				<p><?= $value['qty'] *  $product[0]['price'] ." €";?></p>
			</div>	
			<?php
		}
	}

	if (!isset($_SESSION['auth'])) {
		?>
		<a href="connexion.php" title="Se connectere">Connexion</a>
		<?php			
	} else {
		?>
		<input id="commande" type="submit" value="Commander" ></input>
		<?php
	}
?>


<!-- pied de page du site -->
<?php include('includes/footer.html') ; ?>
