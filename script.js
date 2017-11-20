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
<<<<<<< HEAD
	console.log(SceneX);
=======
>>>>>>> b340691fa6fc029d20f842bc01a0abe0816724eb
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
<<<<<<< HEAD

var monhist={
	"title": "Mad_Maxi-Jack",
	"scenes": [{
			"id": 0,
			"urlimag": "img/0.png",
			"text": "Maxi-Jack coule des jours heureux une fois de plus, mais une soudaine intuition le pousse à penser qu'il ne profitera pas de ces moments bénis trop longtemps.",
			"choices": [{
				"text": "suivant",
				"output": 1
			}],
			"Fin": 0
		},

		{
			"id": 1,
			"urlimag": "img/1.png",
			"text": "Car, suite à une négligence humaine, la planète subit des dommages irréversibles au niveau écologique et en terme d'organisation de la société également.",
			"choices": [{
				"text": "suivant",
				"output": 2
			}],
			"Fin": 0
		},
		{
			"id": 2,
			"urlimag": "img/2.png",
			"text": "Car, suite à une négligence humaine, la planète subit des dommages irréversibles au niveau écologique et en terme d'organisation de la société également.",
			"choices": [{
				"text": "suivant",
				"output": 3
			}],
			"Fin": 0
		}
	]
};

function creerHistoire (objet)
{
	histoire = document.createElement("div");
	histoire.id = objet.title;
	
	var i = 0
	for (var i = 0; i in objet.scenes; i++) {
		vignette = document.createElement("div");
		vignette.className = "Scene";
		vignette.id = i;
		
		monimg = document.createElement("img");
		monimg.setAttribute("src", objet.scenes[i].urlimag);
		
		montxt = document.createElement("p");
		t = document.createTextNode(objet.scenes[i].text);
		montxt.appendChild(t);
		
		vignette.appendChild(monimg);
		vignette.appendChild(montxt);
		
		for (var j = 0; j in objet.scenes[i].choices; j++) {
			choix = document.createElement("BUTTON");
			choix.className = "bouton";
			t = document.createTextNode(objet.scenes[i].choices[j].text);
			choix.setAttribute("name", objet.scenes[i].choices[j].output);
			choix.appendChild(t)
			choix.onclick = function(){scene(this.getAttribute("name"))};
			
			vignette.appendChild(choix);
		}
		histoire.appendChild(vignette);
		document.body.appendChild(histoire);
	}
}

function initialiser()
{
	creerHistoire(monhist);
	scene(0);
}
=======
>>>>>>> b340691fa6fc029d20f842bc01a0abe0816724eb
