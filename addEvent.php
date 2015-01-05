<?php
	$type = $_GET['q']; // from open("GET", "thisFileName.php?q=" + meetingType+"&t_hout"+hourTime, true);
	$t_hour = $_GET["t_hour"];
	$t_min = $_GET["t_min"];
	$user = $_GET["user"];
	$date = $_GET["date"];
	$text = $_GET["text"];
	// assume hour and minute must be given together
	
	
	/*
	//$con = mysqli_connect( );
	if(mysqli_connect_errno($con)){
		echo "Failed to connect to DataBase: " .mysqli_connect_error();
	}
	*/
	
	if (empty($t_user)){
		// error, need a user to lookup
	}
	
	// add if text description
	if(!empty($text)){
		if($result = $con->query("INSERT INTO Event(dateE, typeE, text, thour, tmin, id) VALUES ('$date', '$type', '$text', '$t_hour', '$t_min', '$user'")){
				echo $result;
		}
	}
	// add if no text description
	else if(empty($text)){
		if($result = $con->query("INSERT INTO Event(dateE, typeE, text, thour, tmin, id) VALUES ('$date', NULL, '$text', '$t_hour', '$t_min', '$user'")){
				echo $result;
		}
	}
	else die "Error adding the Event";
?>