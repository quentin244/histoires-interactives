function AfficherContact()
{
	document.getElementById("contact").style.display = "block";
	lienContact = document.getElementById("LienContact");
	lienContact.text = "Cacher";
	lienContact.onclick = CacherContact;
}

function CacherContact()
{
	document.getElementById("contact").style.display = "none";
	lienContact = document.getElementById("LienContact");
	lienContact.text = "Contactez-Nous";
	lienContact.onclick = AfficherContact;
}

function scene(SceneX){
	Cacher();
	Afficher(SceneX);
}


function Cacher()
{
	var listScene = document.getElementsByClassName("Scene");
	for (var i=0; i<listScene.length; i++){
		listScene[i].style.display = "none";
	}
	
}

function Afficher(SceneX)
{
	document.getElementById(String(SceneX)).style.display = "block";
}

function Choix(num){
	var coucou = document.getElementsByClassName("coucou");
	coucou[num].style.display="block";
}
