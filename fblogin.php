<?php

// chargement du Facebook SDK
require_once __DIR__ . '/libs/facebook/src/Facebook/autoload.php';

// demarre une session
session_start();

// crée notre objet facebook
$fb = new Facebook\Facebook([
   'app_id' => '156797891346226',
  'app_secret' => '52b4cd95ff1ca798b46bdebf6196b5a1',
  'default_graph_version' => 'v2.5',
  ]);

$helper = $fb->getRedirectLoginHelper();

// demande les permissions
$permissions = ['email']; // Optional permissions

// recupere l'url avec notre callback ( parametre next )
$loginUrl = $helper->getLoginUrl(sprintf(
	'http://localhost/isushi/fbcallback.php', //appelle la page fbcallback tjrs
	!empty($_GET['next']) ? $_GET['next'] : ''
), $permissions);

die(
	header(
		sprintf(
			'Location: %1$s',
			$loginUrl
		)
	)
);