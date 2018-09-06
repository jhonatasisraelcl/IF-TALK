<!DOCTYPE html>
<html>
    <head>
        <title>Contatos</title>
        <link rel='stylesheet' type='text/css' href='CSS/Contatos.css'/>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
		<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<link href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/css/base/jquery.ui.all.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.2/css/lightness/jquery-ui-1.10.2.custom.min.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>
    </head>
    <body>
	
        <div>
            <h2> Contatos </h2>
        </div>
	<img id="img" style="height:200px; width:150px; position:absolute; top:200px;right:20px;" src="IMG/lixo.png">
        <ol>
            <?php
			include_once "includes.php";
            		$Obj = new DaoUsuario();
                        @session_start();
			$var = $Obj->ListarContato($_SESSION["Mat"]);



			for ($i=0; $i < count($var); $i++) { 
				$pk = $var[$i]['PK_usuario'];

            }
			
			$var = $Obj->Auxi($pk);
			
			for ($i=0; $i < count($var); $i++) { 
				$fk[] = $var[$i]['FK_grupo'];
            }
			
			$objG = new DaoGrupo();
			
			for ($i=0; $i < count($fk); $i++) { 
				$vari = $objG->Contatos($fk[$i]);
				
				for ($j=0; $j < count($vari); $j++) {
				
					echo"<div id='drag' style='background:#F5F5F5'><a href='?X=BP&id=".$vari[$j]['PK_grupo']."'>"; 
					echo "<li> <img id='cont' src= 'http://bolshoipub.com.br/images/interface/bg-user-icon.png'>";
					echo $vari[$j]['nome'];
					//$_SESSION["idGru"] = $vari[$j]['PK_grupo'];
					echo "</li>";
					echo"</a></div>";
					
				}
				
            }


	/*		
            for ($i=0; $i < count($var); $i++) { 
                echo "<li> <img src= 'http://bolshoipub.com.br/images/interface/bg-user-icon.png'>";
				echo $var[$i]['nome'];
				echo "</li>";
            }*/
       
        ?>
        </ol>   
   
       
       <script>
         $(function() {
          $( "#drag" ).draggable();
        });
       
        </script>  
    </body>
</html>
