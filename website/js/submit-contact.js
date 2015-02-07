function submitContactFormValidated() {
	var name = $id("contact_name");
	var sub = $id("contact_subject");
	var message = $id("contact_message");

	if(String(name.value).trim() == "") 
		name.style.borderColor = "#cc5555";

	if(String(sub.value).trim() == "") 
		sub.style.borderColor = "#cc5555";
	
	if(String(message.value).trim() == "") 
		message.style.borderColor = "#cc5555";
	

	if(String(name.value).trim() != "" && String(sub.value).trim() != "" && String(message.value).trim() != "")
		return true;
	return false;
}

function clearContactValidationErrors(obj) {
	obj.style.borderColor = "#fff";
}

function clearContactForm() {
	$id("contact_name").value="";
	$id("contact_subject").value="";
	$id("contact_message").value="";
}

function submitContactForm() {
	if(submitContactFormValidated()) {
		var name = $id("contact_name").value;
		var sub = $id("contact_subject").value;
		var message = $id("contact_message").value;

		var xmlhttp;
		if (window.XMLHttpRequest) {
		    xmlhttp = new XMLHttpRequest()
		} else {
		    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
		}

		xmlhttp.onreadystatechange = function () {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            	clearContactForm();
        	}
    	};

	    xmlhttp.open("POST", "/data/submit.php", true);
	    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("type=contact&name=" + encodeURIComponent(name) + "&subject=" + encodeURIComponent(sub) + "&message=" + encodeURIComponent(message));
	}


}