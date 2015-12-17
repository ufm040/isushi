<?php

require_once __DIR__ . '/libs/facebook/src/Facebook/autoload.php';

session_start();

$config = [
  'app_id' => '156797891346226',
  'app_secret' => '52b4cd95ff1ca798b46bdebf6196b5a1',
  'default_graph_version' => 'v2.5',
  ];

$fb = new Facebook\Facebook($config);


$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  die("Erreur !");
}

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
$tokenMetadata->validateAppId($config['app_id']);
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
    exit;
  }
}

$_SESSION['fb_access_token'] = (string) $accessToken;


$response = $fb->get('/me?fields=email', $_SESSION['fb_access_token']);

$userData = $response->getGraphUser();

print_r($userData['email']);



$pdo = include('data/pdo.php');
$statement = $pdo->prepare('SELECT * FROM clients WHERE email = :email;');
$statement->execute([
	':email' => $userData['email'],
]);
$users = $statement->fetchAll();


if ( !count($users) ) {
	$statement = $pdo->prepare('INSERT INTO clients ( `email`) VALUES (:email)');
	$statement->execute([
		':email' => $userData['email'],
	]);
	$statement = $pdo->prepare('SELECT * FROM clients WHERE email = :email;');
	$statement->execute([
		':email' => $userData['email'],
	]);
	$users = $statement->fetchAll();
}

$_SESSION['auth'] = $users[0];

die(header('Location: ./' . ( !empty($_POST['action']['next']) ? $_POST['action']['next'] : '' ) ));
