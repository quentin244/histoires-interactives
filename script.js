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

function Titre()
{
	
}

function scene(SceneX)
{
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

function initialiserHistoire (LienJSON)
{
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var JSONhistoire = JSON.parse(this.responseText);
			var histoire = document.createElement("div");
			histoire.id = JSONhistoire.title;
			
			for (var i = 0; i in JSONhistoire.scenes; i++) {
				var vignette = document.createElement("div");
				vignette.className = "Scene";
				vignette.id = i;
				var monimg = document.createElement("img");
				monimg.setAttribute("src", JSONhistoire.scenes[i].urlimag);
				
				vignette.appendChild(monimg);
								
				var montxt = document.createElement("p");
				var monspan = document.createElement("span");
				monspan.className = "montext";
				var t = document.createTextNode(JSONhistoire.scenes[i].text);
				monspan.appendChild(t);
				montxt.appendChild(monspan);
				
				vignette.appendChild(montxt);
				
				IdBlocChoix = 0
				var choix = document.createElement("BUTTON");
				choix.className = "bouton";
				var txt = document.createTextNode("Suivant");
				choix.appendChild(txt)
				
				if(JSONhistoire.scenes[i].choices == undefined){
					choix.setAttribute("name", (i + 1));
					choix.onclick = function(){scene(this.getAttribute("name"))};
					vignette.appendChild(choix);
				}
				else{
					choix.setAttribute("name", IdBlocChoix);
					choix.onclick = function(){Choix(this.getAttribute("name"))};
					vignette.appendChild(choix);
					var DivCoucou = document.createElement("div");
					DivCoucou.className = "coucou";
					for (var j = 0; j in JSONhistoire.scenes[i].choices; j++) {
						var choix = document.createElement("BUTTON");
						choix.className = "bouton";
						var txt = document.createTextNode(JSONhistoire.scenes[i].choices[j].text);
						choix.setAttribute("name", JSONhistoire.scenes[i].choices[j].output);
						choix.appendChild(txt)
						choix.onclick = function(){scene(this.getAttribute("name"))};
						DivCoucou.appendChild(choix);
					}
					vignette.appendChild(DivCoucou);
					IdBlocChoix++;
				}

				histoire.appendChild(vignette);
				document.body.appendChild(histoire);
		
				if(xmlhttp.readyState == 4) { 
					scene(0);
				}
			}
		}
	};
	xmlhttp.open("GET", LienJSON, true);
	xmlhttp.send();
}

function Choix(num){
	var coucou = document.getElementsByClassName("coucou");
	coucou[num].style.display="block";
}
