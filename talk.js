$(function(){
		//quando clicar no botao #datasend
		$('#datasend').click( function() {
			//pegou digitado em #data
			var message = $('#data').val();
			//apaga o que tem em #data
			$('#data').val('');
			//enviando para servidor no canal sendchat a mensagem digitada
			socket.emit('sendchat', message);
		});
		$('#data').keypress(function(e) {
			if(e.which == 13) {
				$(this).blur();
				$('#datasend').focus().click();
			}
		});
	});