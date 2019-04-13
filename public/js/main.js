$(function() {
// SEND DATA PLAYER	


	$('.player-definition').on('click', function(e){ // STORY MODE
		musicPlayer.playerSelect($(this).attr('id'));
		tool.ajaxGet('http://localhost/Jamowar/api/riff.php?player='+ sessionStorage['player'], function(rep){
	 		sessionStorage['riff'] = rep;
		});

		$('#confirm').html('');//si déja cliqué
	 	var send = document.createElement('a');
			send.textContent = 'Confirmer';	
			send.href='?action=stage&player='+sessionStorage['player'];
			send.classList.add('btn-game');
		$('#confirm').append(send);
			//scroll vers bouton confirm
              var cible = $('#confirm');
              var hauteur = $(cible).offset().top;
              $('html, body').animate({scrollTop: hauteur}, 1000);
	});

	//Sécurité bouton admin
	$('.update-btn').on('click', function(e) {
		var r = confirm("Etes vous sûr de vouloir modifier l'image ?");
		if (r == false) { e.preventDefault(); }
	});
	$('.delete-btn').on('click', function(e) {
		var r = confirm("Etes vous sûr de vouloir bannir l'utilisateur ?");
		if (r == false) { e.preventDefault(); }
	});

// Clic sur menu
	$('#menu').on('click', function(){	
			$('.secondary-nav').toggle('fast');
	});

	if($(window).width() < 570) {
		$(document.body).click(function(e) {
	  		if( !$(e.target).is($('#menu')) && !$.contains($('#menu'),e.target) ) {
	    		$('.secondary-nav').hide('fast');
	  		}
		});
	}
});		
