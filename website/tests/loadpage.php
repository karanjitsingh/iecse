<?php

	if(isset($_REQUEST['page']))
	{ 
		$page = $_REQUEST['page'];
		if(file_exists("./php-data/".$page.".php"))
		{
			$file="./php-data/".$page.".php";
			//include($file);
			ob_start();
			include $file;
			$out = ob_get_contents();
			ob_end_clean();
			echo $out;

		}
	}
?>