<?php
	class DaoMensagem extends connect {
	
	function ConsMensagem ($id){
		@session_start();
		$idUsu = $_SESSION["Status"];
		
		//$idGru = $_SESSION["idGru"];
		
                return $this->Conect->query("SELECT mensagem.conteudo, mensagem.data, usuario.nome FROM auxiliar, mensagem, usuario WHERE FK_auxiliar = PK_auxiliar and PK_usuario = FK_usuario and FK_grupo = $id ORDER BY mensagem.data ASC");
		//return  $this->Conect->query("SELECT nome, conteudo FROM mensagem, usuario, auxiliar WHERE PK_auxiliar = FK_auxiliar and PK_usuario = FK_usuario");

		/*$ret = array();
		while ($l = mysqli_fetch_assoc($q))
		{
			$ret[] = $l;
		}
		return $ret;*/
	}

	function InseMensagem($mensagem, $id){
		
		@session_start();
		$idUsu = $_SESSION["Status"];
		//$idGru = $_SESSION["idGru"];
		//$idGru = $_GET['X'];
		
		$auxi = $this->Conect->query("SELECT PK_auxiliar FROM auxiliar WHERE FK_grupo = $id and FK_usuario = $idUsu");
		
				$ar[] = mysqli_fetch_array($auxi);
			
	
                
		
		return $this->Conect->query("insert into mensagem (conteudo, FK_auxiliar) VALUES ('$mensagem', ".$ar[0]['PK_auxiliar'].")"); 
		
        //echo "insert into mensagem (conteudo, FK_auxiliar, data) VALUES ('$mensagem', 1, '$dataHora')";
		//return $this->Conect->query("insert into mensagem (conteudo, FK_auxiliar) VALUES ('$mensagem', 3)");
		
	}

}

?>