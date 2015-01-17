<style>

div.text_container {
	box-sizing: border-box;
	padding-right:5px;
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
<div style="position:absolute; left:125px; bottom:30px; height:55%; width:50%;">
<table style="height:100%; width:100%;">
<tr><td style="font-size:35px; text-align:left; padding-bottom:20px;">IE CSE</td></tr>
<tr><td style="font-size:24px !important; height:100%; text-align:left;">
<div style="height:100%; width:100%;  overflow-y:auto;" class="text_container">
<?php
	$data = fread(fopen("about.txt","r"),filesize("about.txt"));
	echo "$data<br /><br/>$data";  //testing purposes

?>
</div>	
</td></tr>

</table>
</div>