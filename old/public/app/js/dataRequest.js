function dataRequest (type, timestamp) {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			debugger;
			return this;
		}
	};

	let URL = 'localhost:8080' + type;
	xhttp.open('GET',  URL, true);
	xhttp.send();
}