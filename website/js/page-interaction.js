function toggleLights(e) {
	if($id("onoffswitch").checked == true){
		$id("night_cover").style.display = "block";
		$id("top_container").className = "night";
	}
	else{
		$id("top_container").removeAttribute("class");
		$id("night_cover").style.display = "none";
	}
}

function initiatePlayer() {
	window.player = document.getElementById('audio_player');
	context = new AudioContext();
	source = context.createMediaElementSource(player);
	analyser = context.createAnalyser();
	source.connect(analyser);
	analyser.connect(context.destination);
	frequencyData = new Uint8Array(analyser.frequencyBinCount);
}

window.AudioContext = window.AudioContext || window.webkitAudioContext || window.mozAudioContext;
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
    document.title = frequencyData.length;
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

