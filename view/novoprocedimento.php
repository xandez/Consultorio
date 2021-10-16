<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Novo Procedimento</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>

	<form method="post" action="../control/procedimento.controller.php?evento=cadastrar">
      <table>
        <tbody>
          <tr>
            <th>Especialidade*</th>
            <th style='width:1%'></th>
            <th>Nome do Procedimento*</th>
          </tr>
          <tr>
            <td>
            	<select class ='form-control select' name ='etespec'>
		        	<option value ='Cirurgia e Implante'>Cirurgia e Implante</option>
		        	<option value ='Dentística'>Dentística</option>
		        	<option value ='Endodontia'>Endodontia</option>
		        	<option value ='Harmonização Facial'>Harmonização Facial</option>
		        	<option value ='Implantodontia'>Implantodontia</option>
		        	<option value ='Ortodontia'>Ortodontia</option>
		        	<option value ='Periodontia'>Periodontia</option>
		        	<option value ='Prevenção'>Prevenção</option>
		        	<option value ='Prótese Dentário'>Prótese Dentário</option>
		        	<option value ='Radiologia'>Radiologia</option>
		        	<option value ='Serviços Gerais'>Serviços Gerais</option>
		        </select>
            </td>
            <td style='width:1%'></td>
            <td colspan='5'>
              <input class='form-control' name='etnome' required type='text' >
            </td>
          </tr>
          <tr>
            <th>Valor Padão*</th>
            <th style='width:1%'></th>
            <th>Valor Mínimo*</th>
            <th style='width:1%'></th>
            <th>Valor Máximo*</th>
            <th style='width:1%'></th>
            <th>Custo</th>
          </tr>
          <tr>
            <td>
              <input class='form-control' name='etvalor' required type='text'  onkeypress="$(this).mask('00.000,00', {reverse: true});">
            </td>
            <td style='width: 1%'></td>
            <td>
              <input class='form-control' name='etvalmin' required type='text' value = '' onkeypress="$(this).mask('00.000,00', {reverse: true});">
            </td>
            <td style='width:1%'></td>
            <td>
              <input class='form-control' name='etvalmax' required type='text' onkeypress="$(this).mask(' 00.000,00', {reverse: true});">
            </td>
            <td style='width:1%'></td>
            <td>
              <input class='form-control' name = 'etcusto' required type='text' onkeypress="$(this).mask(' 00.000,00', {reverse: true});">
            </td>
          </tr>
          <tr>
            <th>
              Ação
            </th>
          </tr>      
          <tr>
            <td>
              <input type='submit' class='btn btn-success' value='Salvar'>
              <a href='menuprocedimento.php' class='btn btn-danger' role='button'>Cancelar</a>
            </td>
            <td style='width:1%'></td>
            <td>
              <input class='form-control' name='situacao' type='hidden' >
            </td>            
          </tr>
        </tbody>
      </table>
    </form>


	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>
</html>