var tool = {
	ajaxGet : function (url, callback) {
    var req = new XMLHttpRequest();
    req.open("GET", url);
    req.addEventListener("load", function () {
        if (req.status >= 200 && req.status < 400) {
            callback(req.responseText);
        } else {
            console.error(req.status + " " + req.statusText + " " + url);
        }
    });
    req.addEventListener("error", function () {
        console.error("Erreur réseau avec l'URL " + url);
    });
    req.send();
	} ,

	getRandomInt : function (max) {
  	return Math.floor(Math.random() * Math.floor(max));
	}
}



tool.ajaxGet('http://localhost/Jamowar/controller/riff.php?player=1', function(rep){
 	sessionStorage['riff'] = rep;
 });