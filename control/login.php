<?php 
	require_once '../Model/Conexao.php';

	$usuario = preg_replace('/[^[:alnum:]_]/','',$_POST['etUsuario']);
	$senha 	 = preg_replace('/[^[:alnum:]_]/','',$_POST['etSenha']);
	$entrar  = $_POST['entrar'];

	ConexaoBD::conectar();
	session_start();

	if (isset($entrar)) {
		$verifica = ConexaoBD::executar("SELECT * FROM usuario where usuario = '$usuario' and senha = '$senha'") or die("Erro ao Logar");
		$guarda = mysqli_fetch_assoc($verifica);
		if (mysqli_num_rows($verifica) <= 0) {
			header("refresh:1;url=../view/index.php");
			echo "<script>alert ('Senha ou usuario incorretos!')</script>";
			die();
		}else{
			$_SESSION["nome"] = $guarda["nome"];
			$_SESSION["nivel"] = $guarda["nivel"];
			$_SESSION['user'] = $usuario;
			header("Location:../view/menu.php");
		}
	}
 ?>