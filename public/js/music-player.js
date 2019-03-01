//synthetiser

	var musicPlayer = 
	{
		 keysEntry :[] ,
		 //keysData : ['do','do'],

		keyPlayer:  function(key){
			switch(key) {
			case 'do':
				$('#playerAudio').attr('src','public/sound/key/p1/do.mp3');
			break;
			case 'do-d' :
				$('#playerAudio').attr('src','public/sound/key/p1/do-d.mp3');
			break;
			case 're':
				$('#playerAudio').attr('src','public/sound/key/p1/re.mp3');
			break;
			case 're-d' :
				$('#playerAudio').attr('src','public/sound/key/p1/re-d.mp3');
			break;
			case 'mi' :
				$('#playerAudio').attr('src','public/sound/key/p1/mi.mp3');
			break;
			case 'fa' :
				$('#playerAudio').attr('src','public/sound/key/p1/fa.mp3');
			break;
			case 'fa-d' :
				$('#playerAudio').attr('src','public/sound/key/p1/fa-d.mp3');
			break;
			case 'sol' :
				$('#playerAudio').attr('src','public/sound/key/p1/sol.mp3');
			break;
			case 'sol-d' :
				$('#playerAudio').attr('src','public/sound/key/p1/sol-d.mp3');
			break;
			case 'la' :
				$('#playerAudio').attr('src','public/sound/key/p1/la.mp3');
			break;
			case 'la-d' :
				$('#playerAudio').attr('src','public/sound/key/p1/la-d.mp3');
			break;
			case 'si' :
				$('#playerAudio').attr('src','public/sound/key/p1/si.mp3');
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

