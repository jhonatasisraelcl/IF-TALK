<?php


	class DaoGrupo extends connect {
	
	public function ConsGrupo (){
		return $this->Conect->query("SELECT nome FROM grupo");
	}

	public function InseGrupo($grupo){
		$this->Conect->query("insert into grupo (nome) VALUES '$grupo'");
	}

	public function Contatos($fk){
		$var = $this->Conect->query("SELECT * FROM grupo WHERE $fk = PK_grupo");
		
		return $this->Arra($var);
	}
	
		public function NumCont(){
		$var = $this->Conect->query("SELECT * FROM grupo");
		
		return $this->Arra($var);
	}	
	
	public function Arra($var){
			for($i = 0; $i<mysqli_num_rows($var);$i++){
				$ar[] = mysqli_fetch_array($var);
			}
			return $ar;
		}
}

?>