<?php 
	class ConexaoBD{
		private static $host = 'localhost';
		private static $bd = 'consultorio';				
		private static $user = 'root';		
		private static $senha = '';
		private static $connection;

		public static function conectar(){
			ConexaoBD::$connection = new mysqli(ConexaoBD::$host,ConexaoBD::$user,ConexaoBD::$senha,ConexaoBD::$bd);
			if (ConexaoBD::$connection->connect_error) {
				die("Connection failed: " . ConexaoBD::$connection->connect_error);
			}
		}

		public static function desconecta(){
			mysqli_close(ConexaoBD::$connection);
		}

		public static function executar($sql){
			$query = mysqli_query(ConexaoBD::$connection,$sql);
			if ($query) {
				return $query;
			}else{
				return null;
			}
		}

		public function mensagem($erro){
			echo $erro;
		}

		public function __destruct(){
			ConexaoBD::desconecta();
		}
	}

 ?>