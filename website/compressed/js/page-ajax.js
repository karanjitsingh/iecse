var NProgressTimer;

function loadPage(page) {
    if(page=="home")
    {
        hidePage();
        return;
    }

    hidePage();

    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest()
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP")
    }

    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            displayPage(xmlhttp.responseText)
            clearInterval(NProgressTimer);
            NProgress.done();
        }
    };

    xmlhttp.open("POST", "/data/" + page + ".php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
    NProgress.start();
    clearInterval(NProgressTimer);
    NProgressTimer = setInterval(function(){NProgress.inc()},500);

}

var loadTimer;

function hidePage() {
    clearTimeout(loadTimer);
    var div=$id("ajax_content");
    var div2 = $id("ajax_content_2")
    div.style.opacity=0;
    div2.style.opacity=0;

    loadTimer = setTimeout(function() {
            div.innerHTML = "";
            div2.innerHTML = "";
    },3000);

}

function displayPage(msg) {
    clearTimeout(loadTimer);
    var div=$id("ajax_content");
    var div2 = $id("ajax_content_2")

    loadTimer = setTimeout(function() {
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
    },3000);


};