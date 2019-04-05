$(function() {
// SEND DATA PLAYER	
$('.player-selected').on('click', function(e){ // STORY MODE
			e.preventDefault();

			tool.ajaxGet('http://localhost/Jamowar/controller/riff.php?player='+ $(this).attr('value'), function(rep){ //recupere la value du liens (permet de selectionner le joueur)
 			sessionStorage['riff'] = rep;
		 	});

		musicPlayer.soundSelector($(this).attr('id'));

			document.getElementById('confirm').innerHTML='';//si déja cliqué
 			var send = document.createElement('a');
			send.textContent = 'Confirmer';
			document.getElementById('confirm').appendChild(send);
			send.href='?action=stage&player='+sessionStorage['player'];
			send.classList.add('btn-game');

	});

	$('.free-player-selected').on('click', function(e){// FREE MODE
		e.preventDefault();
		musicPlayer.soundSelector($(this).attr('id'));
		
	});

		$('.send-point').on('click', function(e){
			e.preventDefault();
			$('.form-point').submit();
	});

});		