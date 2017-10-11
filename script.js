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
