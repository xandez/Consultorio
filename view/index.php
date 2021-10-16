<?php 
	error_reporting(0);
	session_start();

	$link = $_GET['link'];

	switch ($link) {
		case 1:
			unset($_SESSION["user"]);
			unset($_SESSION["nome"]);
			break;
		
		default:
			# code...
			break;
	}
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Consultorio XXX</title>
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	</head>
	<body>
	    <div class="container">
		    <div class="row">
			    <div class="col align-self-center">
			      <!--Formulario de Login -->
				    <div class="modal-dialog">
						<div class="modal-content">
					      <div class="modal-header">
					        <h4>LOGIN DO RESPONSAVEL</h4>
					      </div>
					      <div class="modal-body">
					        <div class="row">
					          <p class="text-muted">Para acessar a essa área, é necessario fazer login</p>  
					          <br>
									<form method="POST" action="../control/login.php">
										<div class="form-floating mb-3">
										  <input type="text" required class="form-control" id="floatingInput" name="etUsuario" placeholder="name@example.com">
										  <label for="floatingInput">Usuario</label>
										</div>
										<div class="form-floating">
										  <input type="password" required class="form-control" id="floatingPassword" name="etSenha" placeholder="Password">
										  <label for="floatingPassword">Senha</label>
										</div>
										<br>
										<input type="submit" class="btn btn-primary" class="btentrar" name="entrar" value="Login">
									</form>                  
					        </div>  
					      </div>
					    </div>
				    </div>
			    </div>
		    </div>
		</div>
    <!-- Parte estatica -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

	</body>
	</html>