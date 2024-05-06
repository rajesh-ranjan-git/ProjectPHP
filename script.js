
function showInputForm() {
	document.getElementById("input-form").style.display = "block";
}

function searchIdd() {
	document.getElementById("search-idd").style.display = "block";
	document.getElementById("search-name").style.display = "none";
	document.getElementById("search-email").style.display = "none";
	document.getElementById("search-phone").style.display = "none";
	document.getElementById("search-button").style.display = "block";
}
function searchName() {
	document.getElementById("search-idd").style.display = "none";
	document.getElementById("search-name").style.display = "block";
	document.getElementById("search-email").style.display = "none";
	document.getElementById("search-phone").style.display = "none";
	document.getElementById("search-button").style.display = "block";
}
function searchEmail() {
	document.getElementById("search-idd").style.display = "none";
	document.getElementById("search-name").style.display = "none";
	document.getElementById("search-email").style.display = "block";
	document.getElementById("search-phone").style.display = "none";
	document.getElementById("search-button").style.display = "block";
}
function searchPhone() {
	document.getElementById("search-idd").style.display = "none";
	document.getElementById("search-name").style.display = "none";
	document.getElementById("search-email").style.display = "none";
	document.getElementById("search-phone").style.display = "block";
	document.getElementById("search-button").style.display = "block";
}

function editRecords() {
	document.getElementById("record").style.display = "none";
}
