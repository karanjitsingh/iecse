<style>

div.text_container {
	box-sizing: border-box;
	padding-right:5px;
	font-size:24px !important; height:100%; text-align:left;height:100%; width:100%;  overflow-y:auto;
}
div.text_container::-webkit-scrollbar {
    width: 8px;
}
 
div.text_container::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 8px rgba(0,0,0,0.3);
    border-radius:100px;
}
 
div.text_container::-webkit-scrollbar-thumb {
  background-color: rgba(0,0,0,0.5);
  border-radius:100px;
}
</style>
<div style="position:absolute; left:125px; bottom:30px; height:55%; width:50%; color:#fff">
	<div style="font-size:35px; text-align:left; padding-bottom:20px; height:40px;">IE CSE</div>
    <div style="height:100%; padding-bottom:60px; box-sizing:border-box">
      	<div class="text_container">
       		<?php
				$stream = fopen("about.txt","r");
				$data = fread($stream,filesize("about.txt"));
				echo "$data<br /><br/>$data";  //testing purposes
				fclose($stream);
			?>
     	</div>
    </div>
</div>