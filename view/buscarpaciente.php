<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Buscar Paciente</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
	<form method="post" action="listarpaciente.php">
	<table>
    	<tbody>
          	<tr>
          		<th>CPF</th>
          		<th style='width:1%'></th>
          		<th class="col-sm-9">Nome Completo</th>
          	</tr>
          	<tr>
          		<td>
          			<input class='form-control' name='etcpf' maxlength="14" type='text'  onkeypress="$(this).mask('000.000.000-00');">
          		</td>
          		<td style='width:1%'></td>
          		<td colspan='5'>
	              <input class='form-control' name='etnome' type='text' >
	            </td>
          	</tr>
          	<tr>
	            <th>
	              Ação
	            </th>
	        </tr>  
          	<tr>
          		<td>
          			<input type='submit' class='btn btn-success' value='Buscar'>
              		<a href='menupaciente.php' class='btn btn-danger' role='button'>Cancelar</a>
          		</td>
          	</tr>
      	</tbody>
  	</table>

	</form>
	<!--
	<iframe scrolling="no"  height="100%" width="100%" src="listarpaciente.php"></iframe>
	-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>