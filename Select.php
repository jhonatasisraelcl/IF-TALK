<?php
include "includes.php";
$matricula = $_POST['matricula'];
$senha1 = $_POST['senha'];

$mysqli = new Controlador();
$mysqli->login($matricula, $senha1);
?>