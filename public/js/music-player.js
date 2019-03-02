//synthetiser

	var musicPlayer = 
	{
		 keysEntry :[] ,
		 //keysData : ['do','do'],

		keyPlayer:  function(key,player){
			switch(key) {
			case 'do':
				$('#playerAudio').attr('src','public/sound/key/'+player+'/do.mp3');
			break;
			case 'do-d' :
				$('#playerAudio').attr('src','public/sound/key/'+player+'/do-d.mp3');
			break;
			case 're':
				$('#playerAudio').attr('src','public/sound/key/'+player+'/re.mp3');
			break;
			case 're-d' :
				$('#playerAudio').attr('src','public/sound/key/'+player+'/re-d.mp3');
			break;
			case 'mi' :
				$('#playerAudio').attr('src','public/sound/key/'+player+'/mi.mp3');
			break;
			case 'fa' :
				$('#playerAudio').attr('src','public/sound/key/'+player+'/fa.mp3');
			break;
			case 'fa-d' :
				$('#playerAudio').attr('src','public/sound/key/'+player+'/fa-d.mp3');
			break;
			case 'sol' :
				$('#playerAudio').attr('src','public/sound/key/'+player+'/sol.mp3');
			break;
			case 'sol-d' :
				$('#playerAudio').attr('src','public/sound/key/'+player+'/sol-d.mp3');
			break;
			case 'la' :
				$('#playerAudio').attr('src','public/sound/key/'+player+'/la.mp3');
			break;
			case 'la-d' :
				$('#playerAudio').attr('src','public/sound/key/'+player+'/la-d.mp3');
			break;
			case 'si' :
				$('#playerAudio').attr('src','public/sound/key/'+player+'/si.mp3');
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
		},
		soundSelector: function(player) {
			switch(player) {
			case 'player-1':
				sessionStorage.setItem("player", 'p1');
			break;
			case 'player-2':
				sessionStorage.setItem("player", 'p2');
			break;
			case 'player-3':
			sessionStorage.setItem("player", 'p2');
			break;
		}
		}

	}
