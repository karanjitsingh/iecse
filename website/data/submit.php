<?php
	if(isset($_POST['type']))
	{
		$type = $_POST['type'];
		switch ($type) {
			case 'contact':
				if(isset($_POST['name']) && isset($_POST['subject']) && isset($_POST['message']))
				if($_POST['name']!="" && $_POST['subject']!="" && $_POST['message']!="")
					echo $_POST['name']."<br/>".$_POST['subject']."<br/>".$_POST['message'];
				
				break;
		}
	}

?>