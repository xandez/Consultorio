<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();

if ($_SESSION['nome'] == null) {
  header("Location:../view/index.php");
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

<style>
  .cpf {
    border: 1px solid #ff0000;
  }
</style>

<body>

  <form method="post" action="../control/paciente.controller.php?evento=cadastrar">
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
            <input class='form-control btn-sm' name='etcpf' required minlength="14" maxlength="14" type='text' onkeypress="$(this).mask('000.000.000-00');">
          </td>
          <td style='width:1%'></td>
          <td>
            <input class='form-control btn-sm' required name='etrg' minlength="17" maxlength="17" type='text' onkeypress="$(this).mask('999.999.999.999-9');">
          </td>
          <td style='width:1%'></td>
          <td colspan="3">
            <input class='form-control btn-sm' name='etnome' required type='text'>
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
            <input class='form-control btn-sm' name='etfone' required minlength="14" maxlength="14" type='text' onkeypress="$(this).mask('(00)00000-0000')">
          </td>
          <td style='width: 1%'></td>
          <td>
            <input class='form-control btn-sm' required name='etidade' type='number'>
          </td>
          <td style='width: 1%'></td>
          <td>
            <input class='form-control btn-sm' name='etdatanasc' required type='date'>
          </td>
          <td style='width: 1%'></td>
          <td style='width: 25%'>
            <select class='form-control select btn-sm' name='etsexo' required>
              <option value=''>Selecionar...</option>
              <option value='Masculino'>Masculino</option>
              <option value='Feminino'>Feminino</option>
              <option value='Outros'>Outros</option>
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
            <input class='form-control btn-sm' name='etendereco' required type='text'>
          </td>
          <td style='width: 1%'></td>
          <td>
            <input class='form-control btn-sm' name='etbairro' required type="text">
          </td>
          <td style='width:1%'></td>
          <td>
            <input class='form-control btn-sm' name='etcidade' required type='text'>
          </td>
          <td style='width:1%' colspan=""></td>
          <td>
            <select class='form-control select btn-sm' name='etestado'>
              <option value='AC'>AC</option>
              <option value='AL'>AL</option>
              <option value='AM'>AM</option>
              <option value='AP'>AP</option>
              <option value='BA'>BA</option>
              <option value='CE'>CE</option>
              <option value='DF'>DF</option>
              <option value='ES'>ES</option>
              <option value='GO'>GO</option>
              <option value='MA'>MA</option>
              <option value='MG'>MG</option>
              <option value='MS'>MS</option>
              <option value='MT'>MT</option>
              <option value='PA'>PA</option>
              <option value='PB'>PB</option>
              <option value='PE'>PE</option>
              <option value='PI'>PI</option>
              <option value='PR'>PR</option>
              <option value='RJ'>RJ</option>
              <option value='RN'>RN</option>
              <option value='RO'>RO</option>
              <option value='RR'>RR</option>
              <option value='RS'>RS</option>
              <option value='SC'>SC</option>
              <option value='SE'>SE</option>
              <option value='SP'>SP</option>
              <option value='TO'>TO</option>
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
            <select class='form-control select btn-sm' name='etcivil'>
              <option value="solteiro">Solteiro</option>
              <option value="casado">Casado</option>
            </select>
          </td>
          <td style='width:1%' colspan=""></td>
          <td>
            <input class='form-control btn-sm' name='etprofissao' type='text'>
          </td>
          <td style='width:1%' colspan=""></td>
          <td>
            <input class='form-control btn-sm' name='etemail' required type='text'>
          </td>
          <td style='width:1%' colspan=""></td>
          <td>
            <input class='form-control btn-sm' name='etindicacao' type='text'>
          </td>
        </tr>
        <tr>
          <th>
            Observação
          </th>
        </tr>
        <tr>
          <td colspan="7">
            <textarea class='form-control btn-sm' name='etobs' rows="3"></textarea>
          </td>
          <td>
            <input type="hidden" name="etdatacadastro" <?php echo "value='" . date('Y-m-d') . "'"; ?>>
            <input type="hidden" name="etusuariocad" <?php echo "value='" . $_SESSION['nome'] . "'"; ?>>
          </td>
        </tr>
        <tr>
          <th>
            Ações
          </th>
        </tr>
        <tr>
          <td>
            <input type='submit' id="btsalvar" class='btn btn-success btn-sm' value='Salvar'>
            <a href='buscarpaciente.php' class='btn btn-danger btn-sm' role='button'>Cancelar</a>
          </td>
          <td style='width:1%'></td>
          <td>
            <input class='form-control' name='situacao' type='hidden'>
          </td>
        </tr>
      </tbody>
    </table>
  </form>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

  <script>
    //validar cpf já cadastrado.
    $("[name='etcpf']").focusout(function() {
      var cpf = $("[name='etcpf']");
      var body = $("form");

      if (cpf.val() == '000.000.000-00') {
        alert("Preencher com CPF valido!")
        cpf.val("");
        cpf.focus();
      } else {
        if (cpf.val() !== '') {
          $.ajax({
            method: "POST",
            url: "../control/paciente.controller.php?evento=validarCpf",
            data: {
              cpfinfo: cpf.val()
            }
          }).done(function(data) {
            //alert(data);
            if (data == 'Tem') {
              cpf.addClass('cpf');
              alert("CPF já cadastrado!");
              cpf.val("");
              cpf.focus();
            } else {
              cpf.removeClass('cpf');
            }
          });
        }
      }
    });
  </script>

</body>

</html>