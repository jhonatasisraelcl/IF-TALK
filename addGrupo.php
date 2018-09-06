<?php
include "includes.php";
$nomeGrupo = $_POST['user'];

$obj = new Controlador();
$obj->novoGrupo($nomeGrupo);
?>