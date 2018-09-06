<?php
include_once "connect.php";
include_once "TraitArra.php";
class DaoUsuario extends connect {

	public function ConsLogin ($matricula){

$sql = "SELECT * FROM usuario WHERE $matricula = matricula";
$var = $this->Conect->query($sql);

		/*use A, B {
        B::smallTalk insteadof A;
        A::bigTalk insteadof B;
		}
		$vari*/
		
		$vari =  $this->Arra($var);

		if (isset($vari[0]))
			return $vari[0];

	}


	public function Arra($var){
		if (!empty($var))
		{
			$ar = array();
			for($i = 0; $i<mysqli_num_rows($var);$i++){
				$ar[] = mysqli_fetch_array($var);
			}
			return $ar;
		}
		else return;
	}


	function ListarContato($matricula){

		$var = $this->Conect->query("SELECT * FROM usuario WHERE $matricula = matricula");
		return $this->Arra($var);

	}


	function Auxi($pk){

		$var = $this->Conect->query("SELECT * FROM auxiliar WHERE $pk = FK_usuario");
		return $this->Arra($var);

	}
}
?>
