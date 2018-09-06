<?php //function BP($id){ ?>
<?php
//$id = 3;
$id = $_GET['pag'];
include_once "includes.php";
/*$mensagem = $_POST['mensagem'];

$adc = new DaoMensagem();
$batata = $adc->InseMensagem($mensagem);*/
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Chat</title>
		<Meta charset="UTF-8"/>
		<script type="text/javascript" src="jquery-1.11.3.min.js"></script>
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
		<link rel="stylesheet" type="text/css" href="CSS/PaginaChat.css"/>
	</head>
	<body>
		<div class="menu" id="menuA">
		<ul class="menu"> <!-- Esse é o 1 nivel ou o nivel principal -->
    <li style="font-size:40px;"><a href="#" style="height:90px; width:90px;">Menu</a></li>
    <li><a href="#"style="height: 90px;width: 90px;"><img id="arquivo" src="IMG/anexo1.png"></a>
       <ul class="submenu-1" style="display: block;width:520px; color:blue;"> <!-- Esse é o 2 nivel ou o primeiro Drop Down -->
            
<table>
<tr><td colspan="2" align="right"><a href="#"><img  id="fechar" src="IMG/fechar.png" style="position:absolute; top:05px; left:500px;"></a></td></tr>
<tr>
<td><div class="circle" id="advanced" style="text-align:center; height:150px; width:150px; margin-right:20px;"><img height="140px" width="120px" src="IMG/foto1.png"></div></td>
<td><div class="circle" id="advanced" style="text-align:center; height:150px; width:150px; margin-right:20px;"><img height="100px" width="100px" src="IMG/video1.png" style=" position:absolute; top:70px; left:245px;"></div></td>
<td><div class="circle" id="advanced" style="text-align:center; height:150px; width:150px; margin-right:20px;"><img height="120px" width="120px" src="IMG/musica1.png" style="position:absolute; top:70px;left:400px;"></div></td>
</tr>
</table>
        </ul>
    </li>
</ul>
</div>
		<div class='rolagem' id='CaixaChat'>
			<?php
			
			include "CONTROLADOR/VerMensagem.php";
			VM($id);

		?>
		</div>
		<form id="chat_form" action="index.php?X=BP&pag=<?=$id?>" method="POST">
    		<input type="text"  id='CInput' name="mensagem"/>
    		<input type="submit" value='OK' name="OK" id='send'/>
		</form>
	<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
    <script>
      var socket = io.connect('http://tira.ifrn.edu.br:3000');
      $('form').submit(function(){
        socket.emit('canal', {id: <?=$id?>, mensa: $('#CInput').val()});
        $('#CInput').val('');
		//Parte Ajax
		
		$.ajax({
        url: "paginaSubmit.php",
        type: "POST",
        par: { id: <?=$id?>, mensa: $('#CInput').val() },
        success: function(par) {
        }
		});
		
		
        return false;
      });
      socket.on('canal', function(par){
	  if(par.id == <?=$id?>){
        $('.rolagem').append($('<li>').text(par.mensa));
      }
	  }
	  );
    </script>
	</body>
</html>
<?php //} ?>
