<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Buscar Procedimento</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
	<form method="post" action="listarprocedimento.php">
		<table>
	    	<tbody>
	          	<tr>
	          		<th>Código</th>
	          		<th style='width:1%'></th>
	          		<th class="col-sm-9">Nome do Procedimento</th>
	          	</tr>
	          	<tr>
	          		<td>
	          			<input class='form-control' name='etid' maxlength="14" type='text'>
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
	              		<a href='menuprocedimento.php' class='btn btn-danger' role='button'>Cancelar</a>
	          		</td>
	          	</tr>
	      	</tbody>
	  	</table>
	</form>
</body>
</html>