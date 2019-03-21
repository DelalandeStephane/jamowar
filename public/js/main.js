$(function() {
// SEND DATA PLAYER	
$('.player-selected').on('click', function(e){ // STORY MODE
		musicPlayer.soundSelector($(this).attr('id'));
	});

	$('.free-player-selected').on('click', function(e){// FREE MODE
		e.preventDefault();
		musicPlayer.soundSelector($(this).attr('id'));
		
	});

	
});		