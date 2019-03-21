//synthetiser
	var musicPlayer = 
	{
		 keysEntry :[] ,

		 //Play sound 
		keyPlayer:  function(key,player){
			const note= new Audio();
			switch(key) {
			case 'do':
				note.src='public/sound/key/'+player+'/do.mp3';
			break;
			case 'do-d' :
				note.src='public/sound/key/'+player+'/do-d.mp3';
			break;
			case 're':
				note.src='public/sound/key/'+player+'/re.mp3';
			break;
			case 're-d' :
				note.src='public/sound/key/'+player+'/re-d.mp3';
			break;
			case 'mi' :
				note.src='public/sound/key/'+player+'/mi.mp3';
			break;
			case 'fa' :
				note.src='public/sound/key/'+player+'/fa.mp3';
			break;
			case 'fa-d' :
				note.src='public/sound/key/'+player+'/fa-d.mp3';
			break;
			case 'sol' :
				note.src='public/sound/key/'+player+'/sol.mp3';
			break;
			case 'sol-d' :
				note.src='public/sound/key/'+player+'/sol-d.mp3';
			break;
			case 'la' :
				note.src='public/sound/key/'+player+'/la.mp3';
			break;
			case 'la-d' :
				note.src='public/sound/key/'+player+'/la-d.mp3';
			break;
			case 'si' :
				note.src='public/sound/key/'+player+'/si.mp3';
			break;
			}
            note.play();
		},
		//Convert key code in music note 
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
		// Select player and sounds instrument
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
		},
		// Select random riff in the list and return array notes
		riffSelector: function (ret){
			var riff = riffs[getRandomInt(riffs.length-1)];
			var notes = riff.music_note.split(',');
			console.log(notes);
			var music = new Audio();
			music.src = riff.sound;
			music.play();
			const dataKeys = notes; //Liste des notes 
			sessionStorage['keys'] = notes;
			sessionStorage['nb_note'] = dataKeys.length; 
		
	
		},
		//compare played notes with real notes 
		noteCompare : function() {
			if(nbPlay == sessionStorage['nb_note']) {
			
				notes = sessionStorage['keys'];
				dataKeys = notes.split(',');
				nbPlay=0;
				success = 0 ;
				for( let i = 0 ; i < sessionStorage['nb_note'] ; i++) {
					if( musicPlayer.keysEntry[i] == dataKeys[i]) {
						console.log('ok');
						success++;
					} 
			};
			//compare if all notes are find
			if(success == sessionStorage['nb_note']) {
				player1.health = player1.health-10;
				setTimeout( musicPlayer.riffSelector, 2000);
			} else {
				player2.health = player2.health-10;
				setTimeout( musicPlayer.riffSelector, 2000);
			}
			// send next riff			
			

			//Réinitialise le tableau saisie
			musicPlayer.keysEntry = [];

			console.log('life player 1 : '+player1.health);
			console.log('life player 2 : '+player2.health);		
			}
		}
		

	}
