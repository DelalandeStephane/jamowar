//synthetiser

$(function() {

	const musicPlayer = 
	{
		 keysEntry :[] ,
		 keysData : ['do','do'],

		keyPlayer:  function(key){
			switch(key) {
			case 'do':
				$('#playerAudio').attr('src','key/do.wav');
			break;
			case 'do-d' :
				$('#playerAudio').attr('src','key/do-d.wav');
			break;
			case 're':
				$('#playerAudio').attr('src','key/re.wav');
			break;
			case 're-d' :
				$('#playerAudio').attr('src','key/re-d.wav');
			break;
			case 'mi' :
				$('#playerAudio').attr('src','key/mi.wav');
			break;
			case 'fa' :
				$('#playerAudio').attr('src','key/fa.wav');
			break;
			case 'fa-d' :
				$('#playerAudio').attr('src','key/fa-d.wav');
			break;
			case 'sol' :
				$('#playerAudio').attr('src','key/sol.wav');
			break;
			case 'sol-d' :
				$('#playerAudio').attr('src','key/sol-d.wav');
			break;
			case 'la' :
				$('#playerAudio').attr('src','key/la.wav');
			break;
			case 'la-d' :
				$('#playerAudio').attr('src','key/la-d.wav');
			break;
			case 'si' :
				$('#playerAudio').attr('src','key/si.wav');
			break;
			}
		},

		keyConvert: function(key){

			let playedKey ;
			switch(key) {
				case 81 :
					playedKey = 'do' ;
				break;
				case 90:
					playedKey = 'do-d' ;
				break;
				case 83 :
					playedKey = 're' ;
				break;
				case 69:
					playedKey = 're-d' ;
				break;
				case 68:
					playedKey = 'mi' ;
				break;
				case 70:
					playedKey = 'fa' ;
				break;
				case 84:
					playedKey = 'fa-d' ;
				break;
				case 71:
					playedKey = 'sol' ;
				break;
				case 89:
					playedKey = 'sol-d' ;
				break;
				case 72:
					playedKey = 'la' ;
				break;
				case 85:
					playedKey = 'la-d' ;
				break;
				case 74:
					playedKey = 'si' ;
				break;
			}
			return playedKey;		
		}

	}

})