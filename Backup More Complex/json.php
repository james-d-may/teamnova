<?php

	$json = file_get_contents('https://choicecall.herokuapp.com/twilio?number=01566232012');
	$obj = (json_decode($json, true));
	
	// var_dump($json);
	var_dump($obj);

	


?>