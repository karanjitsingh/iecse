function toggleLights(e) {
	if($id("lamp").getAttribute("state") == "off"){
		$id("night_cover").style.display = "block";
		$id("night_cover").style.zIndex = "10";
		$id("top_container").className = "night";

		if($id("logo").className == "")
			$id("logo").className = "night";
		else if($id("logo").className == "small")
			$id("logo").className = "small night";

		$id("lamp").setAttribute("state","on");

	}
	else{
		if($id("logo").className == "night")
			$id("logo").className = "";
		else if($id("logo").className == "small night")
			$id("logo").className = "small";

		$id("top_container").removeAttribute("class");
		$id("night_cover").style.zIndex = "initial";
		$id("night_cover").style.display = "none";

		$id("lamp").setAttribute("state","off");
	}
}

var context, analyser,source;

function initiatePlayer() {

	if(!AudioContext)
		return;
	window.player = document.getElementById('audio_player');
	context = new AudioContext();
	source = context.createMediaElementSource(player);
	analyser = context.createAnalyser();
	source.connect(analyser);
	analyser.connect(context.destination);
	frequencyData = new Uint8Array(analyser.frequencyBinCount);
	
}

window.AudioContext = window.AudioContext || window.webkitAudioContext || window.mozAudioContext || window.msAudioContext || 0;

var frequencyData, speakerTimer; var soundToggle = false;

function toggleSound() {
	soundToggle=!soundToggle;
	if(soundToggle){
		speakerTimer=setInterval(renderFrame,30);
		player.play();
	}
	else {
		clearTimeout(speakerTimer);
		player.pause();
		$id("ls1").setAttribute("r", 110);
		$id("ls2").setAttribute("r", 70 );
		$id("ls3").setAttribute("r", 30 );
		$id("rs1").setAttribute("r", 110 );
		$id("rs2").setAttribute("r", 70 );
		$id("rs3").setAttribute("r", 30 );
	}
}

function renderFrame() {

    analyser.getByteFrequencyData(frequencyData);

    //var data = "";

    var sum=0, sum2=0;

	var n = 300;
	var n2= frequencyData.length - n;
    for(var i =0 ;i<frequencyData.length;i++) {
    	//data+=frequencyData[i] + "<br />";
    	if(i+1 <= 50)
    	{
    		sum += frequencyData[i];
    		if(frequencyData[i]==0)
    			n--;
    	}
    	else
    	{
    		sum2 += frequencyData[i];
    		if(frequencyData[i]==0)
    			n2--;
    	}


	}


	var r1=frequencyData[1]/255*30;
	var r2=frequencyData[300]/255*30;

	$id("ls1").setAttribute("r", 110 + r1);
	$id("ls2").setAttribute("r", 70 + r1);
	$id("ls3").setAttribute("r", 30 + r2);
	$id("rs1").setAttribute("r", 110 + r1);
	$id("rs2").setAttribute("r", 70 + r1);
	$id("rs3").setAttribute("r", 30 + r2);
}

function updateClock() {
	var d = new Date();
	var h = d.getHours();
	var m = d.getMinutes();

	var angleH = (h%12) * 30 + (m%60) * (30) / 60;
	var angleM = (m%60) * 6;

	$id("clock").getElementsByTagName("line")[0].style.transform = "rotate("+ angleM +"deg)";
	$id("clock").getElementsByTagName("line")[1].style.transform = "rotate("+ angleH +"deg)";	

}

function zoomInEventPage(obj) {
	if(obj.getAttribute("selected")=="true")
	{
		$id("zoom_container").style.zIndex="1";
		$id("zoom_container").getElementsByTagName("div")[0].className = "zoom";
		setTimeout(function() {$id("poster_page").className="visible";},200);
	}
}

function zoomOutEventPage() {
	setTimeout(function() {
   	
   	$id("zoom_container").style.zIndex="initial";
   	},400);
	$id("zoom_container").getElementsByTagName("div")[0].removeAttribute("class");
	
	$id("poster_page").removeAttribute("class");
}

function nextPoster() {
	var posters = $id("poster_container");

	posters=getElementsByClassName(posters,"poster");

	var selected = 0;
	var next=0;
	for(var i=0;i<posters.length;i++) {
		if(posters[i].style.opacity=="1") {
			selected = i;
			break;
		}
	}

	if(selected == posters.length-1)
		next = 0;
	else
		next=selected+1;

	posters[selected].className="poster animate";
	posters[selected].style.opacity = 0;
	posters[selected].style.zIndex = "initial";
	posters[selected].style.transform ="translate(-50%,0%) rotate(0deg)";
	posters[selected].style.cursor = "default";
	posters[selected].setAttribute("selected","false");


	posters[next].setAttribute("selected","true");
	posters[next].className="poster";
	posters[next].style.opacity = 0;
	posters[next].style.transform ="scale(0.8,0.8) rotate(0deg)";
	posters[next].style.cursor="pointer";
	setTimeout(function() {
		posters[next].className="poster animate";
		posters[next].style.transform ="scale(1,1)" + " rotate(" + (5*Math.pow(-1,selected+1)) + "deg)";
		posters[next].style.opacity = 1;
		posters[next].style.zIndex = "1";
	},100);

	showPosterPage(selected,next);
}

function getElementsByClassName(posters,className) {
	if (posters.getElementsByClassName)
    {
        posters = posters.getElementsByClassName(className);
    }
    else
    {
        var elArray = [];
        var tmp = posters.getElementsByTagName("div");  
        var regex = new RegExp("(^|\\s)" + className + "(\\s|$)");
        for ( var i = 0; i < tmp.length; i++ ) {

            if ( regex.test(tmp[i].className) ) {
                elArray.push(tmp[i]);
            }
        }

        posters = elArray;
    }

    return posters;
}

function prevPoster() {
	var posters = $id("poster_container");

	posters = getElementsByClassName(posters,"poster");

	var selected = 0;
	var next=0;
	for(var i=0;i<posters.length;i++) {
		if(posters[i].style.opacity=="1") {
			selected = i;
			break;
		}
	}

	if(selected == 0)
		next = posters.length-1;
	else
		next=selected-1;


	posters[selected].className="poster animate";
	posters[selected].style.opacity = 0;
	posters[selected].style.zIndex = "initial";
	posters[selected].style.transform ="translate(50%,0%) rotate(0deg)";
	posters[selected].style.cursor = "default";
	posters[selected].setAttribute("selected","false");


	posters[next].setAttribute("selected","true");
	posters[next].className="poster";
	posters[next].style.opacity = 0;
	posters[next].style.transform ="scale(0.8,0.8) rotate(0deg)";
	posters[next].style.cursor="pointer";
	setTimeout(function() {
		posters[next].className="poster animate";
		posters[next].style.transform ="scale(1,1)" + " rotate(" + (5*Math.pow(-1,selected+1)) + "deg)";
		posters[next].style.opacity = 1;
		posters[next].style.zIndex = "1";
	},100);

	showPosterPage(selected,next);
}

function showPosterPage(selected,next) {
	var posters = $id("poster_page");
	posters = getElementsByClassName(posters,"poster_table");
	posters[selected].style.display="none";
	posters[next].style.display="table";

}