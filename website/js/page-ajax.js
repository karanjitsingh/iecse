var loadingBar = '<table class="loading"><tr><td><div></div><div></div><div></div></td></tr></table>';

function loadPage(page) {
    if(page=="home")
    {
        hidePage(true);
        return;
    }

    hidePage(false);

    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest()
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            displayPage(xmlhttp.responseText)
        }
    };

    xmlhttp.open("POST", "/data/" + page + ".php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}

var loadTimer;

function hidePage(noload) {
    clearTimeout(loadTimer);
    var div=$id("ajax_content");
    var div2 = $id("ajax_content_2")
    div.style.opacity=0;
    div2.style.opacity=0;

    loadTimer = setTimeout(function() {
            div.innerHTML = "";
            div2.innerHTML = "";
    },300);

    if(!noload)
        $id("page_title_container").className="loading";
    else
        $id("page_title_container").removeAttribute("class");
}

function displayPage(msg) {
    clearTimeout(loadTimer);
    var div=$id("ajax_content");
    var div2 = $id("ajax_content_2")

    loadTimer = setTimeout(function() {
        $id("page_title_container").removeAttribute("class");
        if(msg.indexOf("##")==-1){
            div.innerHTML = msg;
            div.style.opacity=1;
            div2.innerHTML="";
        }
        else {
            div.innerHTML = msg.split("##")[0];
            div.style.opacity=1
            div2.innerHTML = msg.split("##")[1];
            div2.style.opacity=1
        }
    },300);


};