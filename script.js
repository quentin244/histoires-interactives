var IdBlocChoix = 0;
var titreHist = document.cookie.replace("titreHist=", '');

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

function initialiserHistoire ()
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
				monimg.setAttribute("src", JSONhistoire.scenes[i].urlimage);
				vignette.appendChild(monimg);
								
				var montxt = document.createElement("p");
				var monspan = document.createElement("span");
				monspan.className = "montext";
				var t = document.createTextNode(JSONhistoire.scenes[i].text);
				monspan.appendChild(t);
				montxt.appendChild(monspan);
				
				vignette.appendChild(montxt);
				if(JSONhistoire.scenes[i].fin == 1){
					var choix = document.createElement("BUTTON");
					choix.className = "bouton";
					var txt = document.createTextNode("Retour");
					choix.appendChild(txt)

					choix.href = "index.php";
					choix.onclick = function(){document.location.href="index.php"; };
					vignette.appendChild(choix);
				}
				else{
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
				}

				histoire.appendChild(vignette);
				document.body.appendChild(histoire);
		
				if(xmlhttp.readyState == 4) { 
					scene(0);
				}
			}
		}
	};
	xmlhttp.open("GET", "RecupHistoire.php?titreHist=" + titreHist, true);
	xmlhttp.send();
}

function Choix(num){
	var coucou = document.getElementsByClassName("coucou");
	coucou[num].style.display="block";
}

function ClickBouton(id){
	document.cookie = "titreHist=" + id;
	window.location = "histoire.html";
}

var id=0;

function farm(){
		id++;
		var Nform = document.createElement("div");
		Nform.id=id;
		var text="Scene"+id;
		var textN=document.createTextNode(text);
		document.getElementById("container").appendChild(textN);
		document.getElementById("container").appendChild(Nform);
		document.getElementById(id).innerHTML='Choisissez un fond: <input type="file" name="background"><br>Choisissez une image: <input type="file" name="img"><br><br><br>Placer du texte: <textarea type="message" name="text" rows="3" cols="30"> </textarea><br><br><div class=choix><input type="text" name="choix[]" value="Choix 1">Numero scene<input type="number" name="direction[]" min="2"><br><input type="text" name="choix[]" value="Choix 2">Numero scene<input type="number" name="direction[]" min="2"><br><input type="text" name="choix[]" value="Choix 3">Numero scene<input type="number" name="direction[]" min="2"><br><input type="text" name="choix[]" value="Choix 4">Numero scene<input type="number" name="direction[]" min="2"><br><input type="text" name="choix[]" value="Choix 5">Numero scene<input type="number" name="direction[]" min="2"></div>Fin?: <input type="checkbox" name="fin[]"><br><br>';
		//Choisissez un fond: <input type="file" name="background"><br>
		//Choisissez une image: <input type="file" name="img"><br><br><br>
		//Placer du texte: <textarea type="message" name="text" rows="3" cols="30"> </textarea><br><br>
		//<div class=choix><input type="text" name="choix[]" value="Choix 1">Numero scene<input type="number" name="direction[]" min="2"><br>
		//<input type="text" name="choix[]" value="Choix 2">Numero scene<input type="number" name="direction[]" min="2"><br>
		//<input type="text" name="choix[]" value="Choix 3">Numero scene<input type="number" name="direction[]" min="2"><br>
		//<input type="text" name="choix[]" value="Choix 4">Numero scene<input type="number" name="direction[]" min="2"><br>
		//<input type="text" name="choix[]" value="Choix 5">Numero scene<input type="number" name="direction[]" min="2"></div>
		//Fin?: <input type="checkbox" name="fin[]"><br><br>
}

function FIN(){
	alert("FIN!!!");
}
