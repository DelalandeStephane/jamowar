$(function() {
// SEND DATA PLAYER	
	$('.player-selected').on('click', function(e){ // STORY MODE
		e.preventDefault();
		tool.ajaxGet('http://localhost/Jamowar/controller/riff.php?player='+ $(this).attr('value'), function(rep){
	 		sessionStorage['riff'] = rep;
		});

		musicPlayer.soundSelector($(this).attr('id'));

		$('#confirm').html('');//si déja cliqué
	 	var send = document.createElement('a');
			send.textContent = 'Confirmer';	
			send.href='?action=stage&player='+sessionStorage['player'];
			send.classList.add('btn-game');
		$('#confirm').append(send);
	});

	//Sécurité bouton admin
	$('.update-btn').on('click', function(e) {
		var r = confirm("Etes vous sûr de vouloir modifier l'image ?");
		if (r == false) { e.preventDefault(); }
	});
	$('.delete-btn').on('click', function(e) {
		var r = confirm("Etes vous sûr de vouloir banir l'utilisateur ?");
		if (r == false) { e.preventDefault(); }
	});

});		
