<?php
include_once "includes.php";
$var = new Controlador;
if (isset($_GET['X']))
	$var->AbrePag($_GET['X']);
else
	$var->AbrePag("");
?>
