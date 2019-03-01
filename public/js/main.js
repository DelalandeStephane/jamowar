$(function() {


	$('.key').on('click', function(e) {
		var key= $(e.target).attr('id');

		musicPlayer.keyPlayer(key);
		musicPlayer.keysEntry.push(key);

	});
		//Action touche clavier
		$(document).on('keydown', function(e){
			musicPlayer.keyPlayer(musicPlayer.keyConvert(e.which));
			musicPlayer.keysEntry.push(musicPlayer.keyConvert(e.which));//Complete le tableau
	});



});		