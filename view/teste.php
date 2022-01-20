<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
</head>

<script>
  jQuery(window).ready(function () {
      $(".loader").delay(1500).fadeOut("slow"); //retire o delay quando for copiar!
    $("#tudo_page").delay(1500).toggle("fast");
});
</script>


<body>
  <div id="loader" class="loader"> Carregando...</div>
  <div style="display:none" id="tudo_page"> CONTEUDO DA PÁGINA <div>
</body>
<style>
  .loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
}
</style>
</html>