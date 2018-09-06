<?php

	class Controlador {
	
		public function login($matri, $senha1) {
			
			$Objeto = new DaoUsuario();

			$result = $Objeto->ConsLogin($matri);
			if($result && $result['senha'] == $senha1){
				@session_start();
				$_SESSION["Status"] = $result['PK_usuario'];
                                $_SESSION["Mat"] = $result['matricula'];
								$_SESSION["NomeUsu"] = $result['nome'];
				$this->AbrePag("");
				//include_once "index.php";
			}else{
				include_once "PaginaInicial.html";
				echo "<script language = javascript>alert('Usuário ou senha incorreta');</script>";
			}
			
		}
		
		public function Ver () {
		
            @session_start();
		
			if(!isset($_SESSION["Status"])){
				return "";
			}else {
				return "Logado";
			}
			
		}

		
		public function novoGrupo($nome) {
		
            $obj = new DaoGrupo();
			$obj->InseGrupo($nome);
			
		}
		
		
		public function Deslogar () {
		
			@session_start();
			@session_destroy();
			//$this->AbrePag("Formulario");
			
		}

		
		public function AbrePag($var){

		
			if($this->Ver() == "Logado"){
if($var == "BP"){
	if (isset($_GET['id']))
		$id = $_GET['id'];
	if (isset($_POST['mensagem']))
		$mens = $_POST['mensagem'];
	if(isset($mens) AND isset($id)){
		$adc = new DaoMensagem();
		$batata = $adc->InseMensagem($mens, $id);
		//header('Location: ./?X=BP&id='.$id);
	}
	include_once "NewBP.php";
	//BP($id);
}
else if($var == "Deslogar"){
	include_once "Deslogar.php";
}else if ($var == 'remCon')
{
}
else //con
{
	include_once "Contatos.php";
}
				}
				
			else{
			
				if($var == "login"){
					include_once "Select.php";
				}else{
					if($var == "addGrupo"){
						include_once "addGrupo.php";
					}else{
						include_once "PaginaInicial.html";
					}
				}
				
			}

			}
			
			public function VM($id){
$adc = new DaoMensagem();
$q = $adc->ConsMensagem($id);

/*for($i = 0; $i<count($result);$i++){
	for($j=0; $j<count($result[$i]); $j++){

		echo $result[$i][$j];
	}
	
}*/

$ret = array();
		while ($l = mysqli_fetch_assoc($q))
		{
			$ret[] = $l;
		}
foreach($ret as $Lresult){
		$dataHoral = date("d/m/Y h:i");
		echo "<p style= 'font-size:45px'; width:auto; height:auto;>";
		echo "<div style='width:auto;height:auto;-webkit-border-radius: 73px 99px 3px 99px;-moz-border-radius: 73px 99px 3px 99px;border-radius: 73px 99px 3px 99px;background-color:#93BFD9;-webkit-box-shadow: #B3B3B3 19px 19px 19px;-moz-box-shadow: #B3B3B3 19px 19px 19px; box-shadow: #B3B3B3 19px 19px 19px;'>";
	foreach($Lresult as $Cresult){
		echo $Cresult;
		
		echo "<br/>";
	} 
		echo "</div>";
		echo "</p>";
} 
}

public function listar($matricula){
			$this->Objeto = new DaoUsuario;
			$lista = $this->Objeto->ListarContato($matricula);
			return $lista;
}
			
		}



?>		
