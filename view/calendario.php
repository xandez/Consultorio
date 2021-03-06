<?php 
error_reporting(0);

session_start();

if($_SESSION['nome'] == null){
  header("Location:../view/index.php");
}

require_once '../control/agenda.controller.php';
require_once '../control/funcionario.controller.php';
require_once '../control/paciente.controller.php';

//gera as agendas de acordo com o dentista selecionado.
$agenda = new AgendaController();

$inicio = date('Y-m-d', strtotime('-15 days'));
$fim = date('Y-m-d', strtotime('+15 days'));
//filtra a agenda para 15 dias apos e antes do dia atual.
$listaagenda = $agenda->listarDadosAgenda($_REQUEST['etfunc'],$inicio." 08:00:00",$fim." 23:59:59");

//pegar o nome do dentista selecionado;
$dentista = $_REQUEST['etfunc'];

//listar nome dos pacientes cadastrados.
$paciente = new PacienteController();
$listapaciente = $paciente->listarDadosPaciente("","");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Menu</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css' rel='stylesheet' />
	<link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/locales-all.min.js"></script>
	<link rel="stylesheet" href="./css/calendario.css">
	

	<script type="text/javascript">
		var data = new Date();
		var dia = String(data.getDate()).padStart(2, '0');
		var mes = String(data.getMonth() + 1).padStart(2, '0');
		var ano = data.getFullYear();
		dataAtual = ano + '-' + mes + '-' + dia;

			 document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
        	aspectRatio: 2.14,
        	slotMinTime: '08:00:00',
          slotMaxTime: '20:00:00',
          hiddenDays: [0],
          firstDay: 1,
        	themeSystem: 'bootstrap',
        	locale: 'pt-br',
        	selectable: true,
          initialView: 'timeGridWeek',          
          initialDate: dataAtual,
          slotDuration: '00:30:00',
          scrollTime: '08:00:00',
          nowIndicator: true,
					allDaySlot: false,
					height: 693,
		      headerToolbar: {
		        left: 'prev,next today',
		        center: 'title',
		        right: 'dayGridMonth,timeGridWeek,timeGridDay'
		      },
		      dateClick: function(info) {
				    alert('Date: ' + info.dateStr);
				  },
				  select: function(info) {
				    alert('Selecionado: ' + info.startStr + ' at?? ' + info.endStr);
				  },
					eventClick: function(info) {
						info.jsEvent.preventDefault();
						if (info.event.url) {
      				window.open(info.event.url);
    				}
					},
				  <?php 
				  	echo 'events: [';
				  		foreach($listaagenda as $dados){
				  			echo"{
				  				title: 'Paciente: ".$dados->nome."',
		          		start: '".$dados->inicio."',
		          		end: '".$dados->fim."',
									url: 'listaragenda.php?id=".$dados->id."&cpf=".$dados->paciente."'";
		          		if ($dados->tipo == "CONSULTA") {
		          			echo ",color: 'silver'";
		          		}
		        		echo '},';
				  		}
				  		echo ']';
					?>
			 	});
        calendar.render();
      });

		</script>
</head>
<body>
	<table>
		<tbody>
			<tr>
				<th >Paciente*</th>
				<th style='width:1%'></th>
				<th>In??cio</th>
				<th style='width:1%'></th>
				<th>Fim</th>
				<th style='width:1%'></th>
				<th>Tipo</th>
				<th style='width:1%'></th>
				<th>A????es</th>
			</tr>
			<tr>
				<td>
					<select required id="etpaciente" class ='form-control  select btn-sm' name ='etpaciente'>
						<option selected disabled value="">Selecione o paciente</option>
						<?php 
						foreach ($listapaciente as $dados2){
							echo '<option value ="'.$dados2->cpf.'">'.$dados2->nome.'</option>';
						}

						?>
					</select>
				</td>
				<td style='width:1%'></td>
				<td >
					<input required id="etinicio" class='form-control btn-sm' name='etinicio' required type='datetime-local' >
				</td>
				<td style='width:1%'></td>
				<td >
					<input required id="etfim" class='form-control btn-sm' name='etfim' required type='datetime-local' >
				</td>
				<td style='width:1%'></td>
				<td>
					<select id="ettipo" class ='form-control select btn-sm' name ='ettipo'>
						<option value ='Atendimento'>Atendimento</option>
						<option value ='Consulta'>Consulta</option>
					</select>
				</td>
				<td style='width:1%'></td>
				<td>
					<button id="btagendar" class='btn btn-success btn-sm'>Agendar</button>
					<a href='selecaoDentista.php' class='btn btn-danger btn-sm' role='button'>Voltar</a>
					<button id="btAtualizarAgenda" class='btn btn-primary btn-sm'>At. Agenda</button>
				</td>
				<td style='width:1%'></td>
				<td>
					<input class='form-control btn-sm' name='situacao' type='hidden' >
					<input id="etfuncionario" type="hidden" name="etfuncionario"<?php echo "value='".$dentista."'"; ?> >
					<input id="etusuario" type="hidden" name="etusuario"<?php echo "value='".$_SESSION["nome"]."'"; ?> >
					<input type="hidden" name="etprotocolo" value="0" >
				</td>
			</tr>
		</tbody>
	</table>
  <br>
		<div id='calendar'></div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
		<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>

		<script>
			//cadastrar nova agenda
			$("#btagendar").click(function(){
				var funcionario = $("#etfuncionario").val();
				var paciente = $("#etpaciente option:selected").val();
				var inicio = $("#etinicio").val();
				var fim = $("#etfim").val();
				var tipo = $("#ettipo option:selected").val();		
				var usuario = $("#etusuario").val();		
				if(verificarDatas()){
					$.ajax({
						method: "POST",
						url: "../control/agenda.controller.php?evento=cadastrar",
						data: {
							etfuncionario: funcionario,
							etinicio: inicio,
							etfim: fim,
							ettipo: tipo,
							etpaciente: paciente,
							etprotocolo: '0',
							etstatus:'Ativo',
							etusuario: usuario
						},
						success: function(retorno){
							alert('Agendado!');
							window.location = 'calendario.php?etfunc='+funcionario;
						},
						fail: function(){
							alert('Erro ao agendar!');
							window.location = 'calendario.php?etfunc='+funcionario;
						}
					});
				}else{
					alert("Data fim n??o pode ser igual a Inicial");
				}														
			});
			//botao de atualizar o frame
			$("#btAtualizarAgenda").click(function(){
				var nomefuncionario = $("#etfuncionario").val();
				window.location = 'calendario.php?etfunc='+nomefuncionario;
			});
			//ajusta campo data fim igual ao inicio
			$("#etinicio").change(function(){
				$("#etfim").val($("#etinicio").val());
			});
			//verificar datas
			function verificarDatas(){
				if($("#etfim").val() <= $("#etinicio").val()){
					return false;
				}else{
					return true;
				}
			}
		</script>
</body>
</html>