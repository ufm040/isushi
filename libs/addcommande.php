<?php
session_start();
echo '<pre>' ;
var_dump($_SESSION['basket']);

unset($_SESSION['basket']);
echo "Merci pour votre commande " ;