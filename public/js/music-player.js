//Player model
class Player {
	constructor(health , name) {
		this.playerName = name;
		this.health = health;
	}
}
// game
var musicPlayer = {
		 keysEntry :[] ,
		 //Play sound 
		keyPlayer:  function(key,player){
			const note= new Audio();
			switch(key) {
			case 'do' :
				note.src='public/sound/key/p'+player+'/do.mp3';
			break;
			case 'do-d' :
				note.src='public/sound/key/p'+player+'/do-d.mp3';
			break;
			case 're':
				note.src='public/sound/key/p'+player+'/re.mp3';
			break;
			case 're-d' :
				note.src='public/sound/key/p'+player+'/re-d.mp3';
			break;
			case 'mi' :
				note.src='public/sound/key/p'+player+'/mi.mp3';
			break;
			case 'fa' :
				note.src='public/sound/key/p'+player+'/fa.mp3';
			break;
			case 'fa-d' :
				note.src='public/sound/key/p'+player+'/fa-d.mp3';
			break;
			case 'sol' :
				note.src='public/sound/key/p'+player+'/sol.mp3';
			break;
			case 'sol-d' :
				note.src='public/sound/key/p'+player+'/sol-d.mp3';
			break;
			case 'la' :
				note.src='public/sound/key/p'+player+'/la.mp3';
			break;
			case 'la-d' :
				note.src='public/sound/key/p'+player+'/la-d.mp3';
			break;
			case 'si' :
				note.src='public/sound/key/p'+player+'/si.mp3';
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
				sessionStorage.setItem("player", 1);
			break;
			case 'player-2':
				sessionStorage.setItem("player", 2);
			break;
			case 'player-3':
			sessionStorage.setItem("player", 2);
			break;
			}
		},
		// Select random riff in the list and return array notes
		riffSelector: function (ret){
			var riff = riffs[tool.getRandomInt(riffs.length-1)];
			var notes = riff.music_note.split(',');
			console.log(notes);

			var music = new Audio();
			music.src = riff.sound;
			music.play();

			const dataKeys = notes; //Liste des notes
			sessionStorage['sound'] = riff.sound;
			sessionStorage['keys'] = notes;
			sessionStorage['nb_note'] = dataKeys.length; 
		},
		riffRepeat : function () {
			var music = new Audio();
			music.src = sessionStorage['sound'];
			music.play();
		},
		//compare played notes with real notes 
		noteCompare : function() {
					
			if(nbPlay == sessionStorage['nb_note']) {	
				notes = sessionStorage['keys'];
				dataKeys = notes.split(',');
				success = 0 ;
				for( let i = 0 ; i < sessionStorage['nb_note'] ; i++) {
					if( musicPlayer.keysEntry[i] == dataKeys[i]) {
						success++;
					} 
				};
			//compare if all notes are find
			if(success == sessionStorage['nb_note']) {
				var music = new Audio();
				music.src = 'public/sound/alert/good1.mp3';
				music.play();
				player1.health = player1.health-10;
				 $("#player1 .health-progress").css('width', player1.health+'%');
				 if(player1.health > 0 ){
				 	setTimeout(function(){
				 		nbPlay=0;
				 		musicPlayer.riffSelector();
				 		musicPlayer.keysEntry = [];
				 	},2000);
				 } else {
				 	//game ending
				 	document.getElementById('synth').remove();
				 	this.endMessage('win');
				 }
			} else {
				var music = new Audio();
				music.src = 'public/sound/alert/error2.mp3';
				music.play();
				player2.health = player2.health-10;
				 $("#player2 .health-progress").css('width', player2.health+'%');
				 if(player2.health > 0 ){
				 	setTimeout(function(){
				 		nbPlay=0;
				 		musicPlayer.riffRepeat();
				 		musicPlayer.keysEntry = [];
				 	},2000);
				 } else {
				 	//game ending
				 	this.endMessage('lose');
				 	document.getElementById('synth').remove();	 		
				 }
			}
		}		
	},
	endMessage: function (statut) {
		if(statut == "win")
		{
			var statutMessage = 'Vous avez gagné !';
		} else if(statut == "lose")
		{
			var statutMessage = 'Vous avez perdu ...';
		}
		var container = document.createElement('div');
		container.id ="game-ending";
		document.getElementById('fight-scene').after(container);

		var message =document.createElement('h2');
		message.textContent = statutMessage ;
		document.getElementById('game-ending').appendChild(message);

		var retry = document.createElement('a');
		retry.textContent = 'rejouer';
		document.getElementById('game-ending').appendChild(retry);
		retry.href='index.php?action=playerchoice';
		retry.classList.add('btn-game');

		var exit = document.createElement('a');
		exit.href='index.php';
		exit.textContent = 'sortir';
		exit.classList.add('btn-game');
		document.getElementById('game-ending').appendChild(exit);
	
	},		
}
