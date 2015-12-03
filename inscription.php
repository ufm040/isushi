<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>connexion</title>
</head>

<?php

$error = '';
$address = '';
$allFields = !empty($_POST['new_client']['name']) && !empty($_POST['new_client']['firstname']) && !empty($_POST['new_client']['email']) && !empty($_POST['new_client']['password'])&& !empty($_POST['new_client']['password_conf']) && !empty($_POST['new_client']['phone']) && !empty($_POST['new_client']['number_street']) && !empty($_POST['new_client']['street']) && !empty($_POST['new_client']['zip']) && !empty($_POST['new_client']['city']);
if ( $_POST ) {

	if ( !empty($_POST['action']['registred']) ) {
		
		if ($allFields) {
		// if ( !empty($_POST['new_client']['name']) && !empty($_POST['new_client']['firstname']) 
		// 	&& !empty($_POST['new_client']['email']) && !empty($_POST['new_client']['password'])
		// 	&& !empty($_POST['new_client']['password_conf']) && !empty($_POST['new_client']['phone'])
		// 	&& !empty($_POST['new_client']['number_street']) && !empty($_POST['new_client']['street']) 
		// 	&& !empty($_POST['new_client']['zip']) && !empty($_POST['new_client']['city']) ) {

			$pdo = include('data/pdo.php');
			$address = $_POST['new_client']['number_street'] . ", " . $_POST['new_client']['street'] . ", " . $_POST['new_client']['zip'] . " " . $_POST['new_client']['city'];
			// echo($_POST['new_client']['firstname']);

			$statement = $pdo->prepare('INSERT INTO clients (`name`, `firstname`, `email`, `password`, `phone`, `address`, `created`) 
										VALUES (:name, :firstname, :email, :password, :phone, :address, NOW()) ;');
			$statement->execute([
				':name' => $_POST['new_client']['name'],
				':firstname' => $_POST['new_client']['firstname'],
				':email' => $_POST['new_client']['email'],
				':password' => $_POST['new_client']['password'],
				':phone' => $_POST['new_client']['phone'],
				':address' => $address,
			]);
			//$users = $statement->fetchAll();
			die("formulaire validé !");
			// if ( count($users) ) {
				
			// 	session_start();
			// 	$_SESSION['auth'] = $users[0];
			// 	//die(header('Location: index.html'));
			// 	die(header('Location: ./' . ( !empty($_POST['action']['next']) ? $_POST['action']['next'] : '' ) ));
			// 	// die("vous êtes connecté");

			// } else $error = "Email ou mot de passe erroné.";

		} else $error = "Tous les champs doivent être remplis.";

	} else $error = "Le formulaire n'a pas été correctement validé.";

}


?>

<body>
	<h2>Nouveau client</h2>
	<h3>Formulaire d'inscritpion</h3>

	<form id="form-new-client" action="inscription.php" method="POST">

		<?php if ( $error ) { ?>
			<h2 style="color: red;"><?=$error?></h2>
		<?php } ?>

		<fieldset>

			<input
				type="text"
				placeholder="nom"
				name="new_client[name]"
				value="<?=!empty($_POST['new_client']['name']) ? $_POST['new_client']['name'] : ''?>"
			/>
			<br />	

			<input
				type="text"
				placeholder="prénom"
				name="new_client[firstname]"
				value="<?=!empty($_POST['new_client']['firstname']) ? $_POST['new_client']['firstname'] : ''?>"
			/>

			<br />
			<input
				type="text"
				placeholder="email"
				name="new_client[email]"
				value="<?=!empty($_POST['new_client']['email']) ? $_POST['new_client']['email'] : ''?>"
			/>

			<br />
			<input type="password" placeholder="password" name="new_client[password]" />
			<br />
			<input type="password" placeholder="confirmation password" name="new_client[password_conf]" />

			<br />
			<input
				type="tel"
				placeholder="téléphone"
				name="new_client[phone]"
				value="<?=!empty($_POST['new_client']['phone']) ? $_POST['new_client']['phone'] : ''?>"
			/>

			<br />
			<input
				type="int"
				placeholder="n° de rue"
				name="new_client[number_street]"
				value="<?=!empty($_POST['new_client']['number_street']) ? $_POST['new_client']['number_street'] : ''?>"
			/>

			<br />	
			<input
				type="text"
				placeholder="rue"
				name="new_client[street]"
				value="<?=!empty($_POST['new_client']['street']) ? $_POST['new_client']['street'] : ''?>"
			/>

			<br />
			<input
				type="int"
				placeholder="code postal"
				name="new_client[zip]"
				value="<?=!empty($_POST['new_client']['zip']) ? $_POST['new_client']['zip'] : ''?>"
			/>

			<br />
			<input
				type="text"
				placeholder="ville"
				name="new_client[city]"
				value="<?=!empty($_POST['new_client']['city']) ? $_POST['new_client']['city'] : ''?>"
			/>

			<br />
			<input
				type="hidden"
				name="action[next]"
				value="<?=!empty($_GET['next']) ? $_GET['next'] : ( !empty($_POST['action']['next']) ? $_POST['action']['next'] : '' )?>"
			/>

			<input type="submit" name="action[registred]" value="inscription" />
		</fieldset>
		

	</form>
</body>
</html>