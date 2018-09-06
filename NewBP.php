<?php //function BP($id){ ?>
<?php
//$id = 3;
$id = $_GET['id'];

@session_start();
$nome = $_SESSION["NomeUsu"];

include_once "includes.php";
/*$mensagem = $_POST['mensagem'];

$adc = new DaoMensagem();
$batata = $adc->InseMensagem($mensagem);*/
?>
<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width">
		<title> Chat </title>
		<Meta charset="UTF-8"/>
		<link href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/css/base/jquery.ui.all.css" rel="stylesheet">
		<link href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.2/css/lightness/jquery-ui-1.10.2.custom.min.css" rel="stylesheet">
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function (){
			//abrir arquivos
			$("#arquivo").click(function(){
				$(".submenu-1").show();
			});
			//imagem p fechar pegar o nome
			$("#fechar").click(function(){
				$(".submenu-1").hide();
			});

		});
		</script>
		<!--
		<link rel="stylesheet" type="text/css" href="NBP.css"/>
		<link rel="stylesheet" type="text/css" href="CSS/PaginaChat.css"/>
		-->
	</head>
<body>
  <div id="header">
  <img style="border-radius:100%; position: absolute; left:15px; top:15px; height:50px; width:45px;" src="mario.png">
  <h2 style="position:absolute; left:70px;color:white;">Baladeiros</h2>
 <div class="circle" id="advanced" style="text-align:center; height:40px; width:40px; position:absolute; right:15px; top:15px;"><a href="camera"><img style="position: absolute;top:5px; right:10px; height:30px; width:20px;" src="foto1.png"></a></div>
 <div class="circle" id="advanced" style="text-align:center; height:40px; width:40px; position:absolute; right:60px; top:15px;"><a href="video"><img style="position: absolute;right:10px; top:10px; height:20px; width:20px;" src="video1.png"></a></div>
 <div class="circle" id="advanced" style="text-align:center; height:40px; width:40px; position:absolute; right:105px; top:15px;"><a href="music"><img style="position: absolute;right:10px; top:8px;; height:25px; width:20px;" src="musica1.png"></a></div>
  </div>
  <div id="content">
		<?php
			
			$objj = new Controlador();
			$objj->VM($id);

		?>
  </div>
  <form id="chat_form">
    		<input type="text"  id='CInput' name="mensagem"/>
    		<input type="button" value='Enviar' name="ENVIAR" id='send'/>
    		
		</form>
		<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
    <script>var socket = io.connect('http://tira.ifrn.edu.br:3000');
      $('form #send').click(function(){
		$.ajax({
			url: "paginaSubmit.php",
			method: "POST",
			data: {id: <?=$id?>, mensa: $('#CInput').val()},
			success: function(par) {
				$('#CInput').val('');
				socket.emit('canal', {id: <?=$id?>, mensa: par});
			}
		});
        	return false;
	});
	socket.on('canal', function(par){
		if(par.id == <?=$id?>){
			$('#content').append(par.mensa);
		}
	});
    </script>
</body>
</html>
<?php //}?>