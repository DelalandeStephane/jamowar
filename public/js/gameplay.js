//Instanciations des deux joueurs.
var riffs = JSON.parse(sessionStorage['riff']);
console.log(riffs);
var player1 = new Player(100,sessionStorage['player']);
var player2 = new Player(100,sessionStorage['player']);

//nombre de notes jouées
var nbPlay = 0;

//  GAMEPLAY

//Lance le riff de debut de partie
setTimeout(function(){
	musicPlayer.riffSelector();
},1000);


$('.key').on('click', function(e) {
	var key = $(e.target).attr('id');
	musicPlayer.keyPlayer(key,sessionStorage.getItem("player"));//joue la note
	musicPlayer.keysEntry.push(key);
	nbPlay++;
	musicPlayer.noteCompare();
});
//Action touche clavier
$(document).on('keydown', function(e){
	musicPlayer.keyPlayer(musicPlayer.keyConvert(e.which),sessionStorage.getItem("player"));// converti key code et joue la note
	musicPlayer.keysEntry.push(musicPlayer.keyConvert(e.which));//Complete le tableau
	nbPlay++;
	musicPlayer.noteCompare();
});
