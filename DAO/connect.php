<?php
class connect {
		public $Host = "localhost";
		public $Usuario = "chatmobile";
		public $Senha = "123456";
		public $BD = "chatmobile";

		public $Conect;
		
		public function __construct () {
			$this->Conect = mysqli_connect($this->Host, $this->Usuario, $this->Senha, $this->BD);
		}
}
?>