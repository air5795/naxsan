<?php 

	class conectar{
		private $servidor="localhost:3316";
		private $usuario="root";
		private $password="";
		private $bd="ventas";

		public function conexion(){
			$conexion=mysqli_connect($this->servidor,
									 $this->usuario,
									 $this->password,
									 $this->bd);
			return $conexion;
		}
	}


 ?>