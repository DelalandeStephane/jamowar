class Player {
	constructor(health , name) {
		this.playerName = name;
		this.health = health;
	}
}
 var player1 = new Player(100,sessionStorage['player']);
 var player2 = new Player(100,sessionStorage['player']);
function getRandomInt(max) {
  	return Math.floor(Math.random() * Math.floor(max));
	};

 ajaxGet('http://localhost/Jamowar/controller/riff.php', function(rep){
		sessionStorage['riff'] = rep;

});

var riffs = JSON.parse(sessionStorage['riff']);

//  GAMEPLAY
musicPlayer.riffSelector();
var notes = sessionStorage['keys'];
var dataKeys = notes.split(',');
var nbPlay = 0;
console.log(dataKeys);
$('.key').on('click', function(e) {
	var key= $(e.target).attr('id');
	musicPlayer.keyPlayer(key,sessionStorage.getItem("player"));
	musicPlayer.keysEntry.push(key);
	nbPlay++;

	musicPlayer.noteCompare();

});
//Action touche clavier
$(document).on('keydown', function(e){
	musicPlayer.keyPlayer(musicPlayer.keyConvert(e.which),sessionStorage.getItem("player"));
	musicPlayer.keysEntry.push(musicPlayer.keyConvert(e.which));//Complete le tableau
		nbPlay++;
		musicPlayer.noteCompare();

});
