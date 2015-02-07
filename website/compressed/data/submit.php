<?php
	if(isset($_POST['type']))
	{
		$type = $_POST['type'];
		switch ($type) {
			case 'contact':
				if(isset($_POST['name']) && isset($_POST['subject']) && isset($_POST['message']))
				if($_POST['name']!="" && $_POST['subject']!="" && $_POST['message']!="") {
					$m = str_replace("\n", "<br/>", $_POST['message']);

					$to="contact@iecsemanipal.com";
					$message = "Name: ".$_POST['name']."<br/><br/>Subject:".$_POST['subject']."<br/><br/>Message:<br/>".$m;

					$subject = "Contact Form - $name";

					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

					mail($to,$subject,$message,$headers);
				}

				break;
		}
	}

?>