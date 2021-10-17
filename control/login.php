<?php 
	require_once '../Model/Conexao.php';

	$usuario = $_POST['etUsuario'];
	$senha 	 = $_POST['etSenha'];
	$entrar  = $_POST['entrar'];


	ConexaoBD::conectar();
	session_start();

	if (isset($entrar)) {
		$verifica = ConexaoBD::executar("SELECT * FROM usuario where usuario = '$usuario' and senha = '$senha'") or die("Erro ao fazer a query");
		$guarda = mysqli_fetch_assoc($verifica);
		$_SESSION["nome"] = $guarda["nome"];
		$_SESSION["nivel"] = $guarda["nivel"];
		if (mysqli_num_rows($verifica) <= 0) {
			header("refresh:1;url=../view/index.php");
			echo "<script>alert ('Senha ou usuario incorretos!')</script>";
			die();
		}else{
			$_SESSION['user'] = $usuario;
			header("Location:../view/menu.php");
		}
	}
 ?>