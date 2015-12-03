<?php

$error = '';  // pour le message d'erreur à afficher.

if ( $_POST ) {   // on vérifie qu'il y a bien quelque chose de posté. (Empêche l'affichage dès le 1er affichage de la page d'un message d'erreur)

	if ( !empty($_POST['action']['connexion']) ) {  // on vérifie qu'il y a bien eu un clic sur le bouton "connexion"  -> si "connexion" pas vide...
		
		if ( !empty($_POST['auth']['email']) && !empty($_POST['auth']['password']) ) { // teste si les champs sont non-vides

			$pdo = include('conf/pdo.php');
			$statement = $pdo->prepare('SELECT * FROM users WHERE email = :email AND password = :password;');
			$statement->execute([
				':email' => $_POST['auth']['email'],
				':password' => $_POST['auth']['password'],
			]);
			$users = $statement->fetchAll();  // retourne soit rien, soit 1 ligne (cf notre configuration de la base de données)
			if ( count($users) ) {  // on vérifie qu'il y a quelque chose dans $users. (Dans notre configuration : soit 0, soit 1)
				
				session_start();
				$_SESSION['auth'] = $users[0];  // il n'y a que cet indice de possible pour $users dans notre configuration 
				die(header('Location: ./' . ( !empty($_POST['action']['next']) ? $_POST['action']['next'] : '' ) ));  // * : cf lien avec le html en dessous (imput "hidden")
																													// permet de garder en mémoire sur quelle page l'utilisateur était avant la page de connexion
																													// car ici, dès la page de connexion, (même sans être connecté), les liens du menu sont valides
																													// l'utilisateur ne pourra accéder réellement au contenu des pages que s'il est connecté
																													// si jamais il clique sur un lien sans être connecté, renvoie à la page de connexion

			} else $error = "Email ou mot de passe erroné.";

		} else $error = "Tous les champs doivent être remplis.";

	} else $error = "Le formulaire n'a pas été correctement validé.";

}

?><html>
<head>
</head>
<body>
	<form action="connexion.php" method="post">
		
		<?php if ( $error ) { ?>
		<h2 style="color: red;"><?=$error?></h2>
		<?php } ?>
		<fieldset>
			<!-- Nouvelles construction des input : sous forme de tableau -> meilleure lisibilité, mieux structurée --> 
			<!-- pour le tableau inclus dans 'auth' concerne uniquement les champs des données utilisateur -->
			<input
				type="text"
				placeholder="email"
				name="auth[email]"
				value="<?=!empty($_POST['auth']['email']) ? $_POST['auth']['email'] : ''?>"
			/>		<!-- l'expression ternaire permet de concerver le mail s'il est ok (mais que le mot de passe ne l'est pas) OU de se vider --> 

			<br />
			<input type="password" placeholder="password" name="auth[password]" />
		</fieldset>
		<fieldset>
			<!-- pour le tableau inclus dans 'action' concerne uniquement les champs de gestion du formulaire -->
			<input
				type="hidden"   
				name="action[next]"
				value="<?=!empty($_GET['next']) ? $_GET['next'] : ( !empty($_POST['action']['next']) ? $_POST['action']['next'] : '' )?>"
			/> <!--  cet imput "hidden" passé en GET : permet de savoir sur quelle page on doit rediriger l'utilisateur après la connexion 
							voir * dans le php plus haut  et aussi dans les pages topics.php et profile.php -->

			<input type="submit" name="action[connexion]" value="connexion" />
		</fieldset>

	</form>
</body>