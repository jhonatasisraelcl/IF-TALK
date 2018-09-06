<?php
include_once "includes.php";
$id = $_POST['id'];
$mensa = $_POST['mensa'];
$tam = strlen($mensa);
if($mensa != null && $id != ""){
	for($i = 0; $i<$tam; $i++){
	
	}
	$adc = new DaoMensagem();
	$batata = $adc->InseMensagem($mensa, $id);
	
?>
	<div style="width:auto;height:auto;-webkit-border-radius: 73px 99px 3px 99px;-moz-border-radius: 73px 99px 3px 99px;border-radius: 73px 99px 3px 99px;background-color:#93BFD9;-webkit-box-shadow: #B3B3B3 19px 19px 19px;-moz-box-shadow: #B3B3B3 19px 19px 19px; box-shadow: #B3B3B3 19px 19px 19px;">
		<p>
		<?php
			@session_start();
			$nome = $_SESSION["NomeUsu"];
			echo $mensa;
			echo "</br>";
			echo date("Y-m-d h:i:s"); 
			echo "</br>";
			echo $nome;
		?>
		</p>
	</div>
<?php
} else {?>
	<script language = javascript>alert('Campo não preenchido');</script>
	<?php
}
?>
