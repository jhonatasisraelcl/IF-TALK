<?php
	trait Arra{
		public function Arra($var){
			for($i = 0; $i<mysqli_num_rows($var);$i++){
				$ar[] = mysqli_fetch_array($var);
			}
			return $ar;
		}
	}
?>