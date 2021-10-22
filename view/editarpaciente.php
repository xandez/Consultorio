<?php 
error_reporting(0);

require_once '../control/paciente.controller.php';

$cpf = $_GET['cpf'];

$pac = new PacienteController();
$lista = $pac->listarDadosPaciente("",$cpf);


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar Paciente</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
	
	<?php 
	foreach ($lista as $dados){

   }
   ?>
  <form method="post" action="../control/paciente.controller.php?evento=editarPaciente">
    <table>
      <tbody>
        <tr>
          <th>Cpf*</th>
          <th style='width:1%'></th>
          <th>RG*</th>
          <th style='width:1%'></th>
          <th>Nome Completo*</th>
        </tr>
        <tr>
          <td>
            <input readonly class='form-control' name='etcpf' required minlength="14" maxlength="14" type='text'  onkeypress="$(this).mask('000.000.000-00');" <?php echo "value='".$dados->cpf."'"; ?>>
          </td>
          <td style='width:1%'></td>
          <td>
            <input readonly class='form-control' name='etrg' minlength="12" maxlength="12" type='text'  onkeypress="$(this).mask('99.999.999-9');" <?php echo "value='".$dados->rg."'"; ?>>
          </td>
          <td style='width:1%'></td>
          <td  colspan="3">
            <input class='form-control' name='etnome' required type='text' <?php echo "value='".$dados->nome."'"; ?>>
          </td>
        </tr>
        <tr>
          <th>Fone*</th>
          <th style='width:1%'></th>
          <th>Idade*</th>
          <th style='width:1%'></th>
          <th>Nascimento*</th>
          <th style='width:1%'></th>
          <th>Sexo*</th>
        </tr>
        <tr>
          <td>
            <input class='form-control' name='etfone' required minlength="15" maxlength="15" type='text' onkeypress="$(this).mask('(00)00000-0000')" <?php echo "value='".$dados->fone."'"; ?>>
          </td>
          <td style='width: 1%'></td>
          <td >
            <input class='form-control' name = 'etidade' type='number' <?php echo "value='".$dados->idade."'"; ?>>
          </td>
          <td style='width: 1%'></td>
          <td>
            <input class='form-control' name = 'etdatanasc' type='date' <?php echo "value='".$dados->datanasc."'"; ?>>
          </td>
          <td style='width: 1%'></td>
          <td style='width: 25%'>
            <select class ='form-control select' name ='etsexo'>
  <?php echo "<option value = '".$dados->sexo."'>".$dados->sexo."</option>"; ?>
              <option value = '-'>Selecionar...</option>
              <option value = 'Masculino'>Masculino</option>
              <option value = 'Feminino'>Feminino</option>
              <option value = 'Outros'>Outros</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>Endereço*</th>
          <th style='width:1%'></th>
          <th>Bairro*</th>
          <th style='width:1%'></th>
          <th>Cidade*</th>
          <th style='width:1%'></th>
          <th>Estado</th>
        </tr>
        <tr>
          <td>
            <input class='form-control' name = 'etendereco' type='text' <?php echo "value='".$dados->endereco."'"; ?>>
          </td>
          <td style='width: 1%'></td>
          <td>
            <input class='form-control' name='etbairro' required type="text" <?php echo "value='".$dados->bairro."'"; ?>>
          </td>
          <td style='width:1%'></td>
          <td>
            <input class='form-control' name='etcidade' required type='text' <?php echo "value='".$dados->cidade."'"; ?>>
          </td>
          <td style='width:1%' colspan=""></td>
          <td>
            <select class ='form-control select' name ='etestado'>
  <?php echo "<option value = '".$dados->estado."'>".$dados->estado."</option>"; ?>
              <option value = 'AC'>AC</option>
              <option value = 'AL'>AL</option>
              <option value = 'AM'>AM</option>
              <option value = 'AP'>AP</option>
              <option value = 'BA'>BA</option>
              <option value = 'CE'>CE</option>
              <option value = 'DF'>DF</option>
              <option value = 'ES'>ES</option>
              <option value = 'GO'>GO</option>
              <option value = 'MA'>MA</option>
              <option value = 'MG'>MG</option>
              <option value = 'MS'>MS</option>
              <option value = 'MT'>MT</option>
              <option value = 'PA'>PA</option>
              <option value = 'PB'>PB</option>
              <option value = 'PE'>PE</option>
              <option value = 'PI'>PI</option>
              <option value = 'PR'>PR</option>
              <option value = 'RJ'>RJ</option>
              <option value = 'RN'>RN</option>
              <option value = 'RO'>RO</option>
              <option value = 'RR'>RR</option>
              <option value = 'RS'>RS</option>
              <option value = 'SC'>SC</option>
              <option value = 'SE'>SE</option>
              <option value = 'SP'>SP</option>
              <option value = 'TO'>TO</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>Estado Civil*</th>
          <th style='width:1%'></th>
          <th>Profissão*</th>
          <th style='width:1%'></th>
          <th>E-mail*</th>
          <th style='width:1%'></th>
          <th>Indicação</th>
        </tr>
        <tr>
          <td>
            <select class ='form-control select' name ='etcivil'>
  <?php echo "<option value='".$dados->civil."'>".$dados->civil."</option>"; ?>
              <option value='solteiro'>Solteiro</option>
              <option value='casado'>Casado</option>
            </select>
          </td>
          <td style='width:1%' colspan=""></td>
          <td>
            <input class='form-control' name='etprofissao' required type='text' <?php echo "value='".$dados->profissao."'"; ?>>
          </td>
          <td style='width:1%' colspan=""></td>
          <td>
            <input class='form-control' name='etemail' required type='text' <?php echo "value='".$dados->email."'"; ?>>
          </td>
          <td style='width:1%' colspan=""></td>
          <td>
            <input class='form-control' name='etindicacao' required type='text' <?php echo "value='".$dados->indicacao."'"; ?>>
          </td>
        </tr>
        <tr>
          <th>
            Observação
          </th>
        </tr>
        <tr>
          <td colspan="7">
            <textarea class='form-control' name='etobs' required rows="3"><?php echo $dados->obs; ?></textarea>
          </td>
          <td>
            <input type="hidden" name="etdatacadastro"<?php echo "value='".date('Y-m-d')."'"; ?> >
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
            <a href='buscarpaciente.php' class='btn btn-danger' role='button'>Cancelar</a>
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