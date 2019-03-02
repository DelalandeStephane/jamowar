$(function() {

	$('.key').on('click', function(e) {
		var key= $(e.target).attr('id');
		musicPlayer.keyPlayer(key,sessionStorage.getItem("player"));
		musicPlayer.keysEntry.push(key);
	});
	//Action touche clavier
	$(document).on('keydown', function(e){
		musicPlayer.keyPlayer(musicPlayer.keyConvert(e.which),sessionStorage.getItem("player"));
		musicPlayer.keysEntry.push(musicPlayer.keyConvert(e.which));//Complete le tableau
	});
		
	const dataKeys = ['do','do']; //Liste des notes 
	//Fonction de comparaison valeur saisie / valeur stockée
	$('#test').on('click', function(){
		for( let i = 0 ; i < dataKeys.length ; i++) {
			if( musicPlayer.keysEntry[i] == dataKeys[i]) {
				console.log('ok');
			} else {
				console.log('faux');
			}
		}
		//Réinitialise le tableau saisie
		musicPlayer.keysEntry.length= 0;
	})

	$('.player-selected').on('click', function(e){
		musicPlayer.soundSelector($(this).attr('id'));
	});

	$('.free-player-selected').on('click', function(e){
		e.preventDefault();
		musicPlayer.soundSelector($(this).attr('id'));
		
	});

});		