<?php
	// http://www.w3schools.com/Ajax/ajax_php.asp

	// get requests meeting type, time, date, user
	$type = $_GET['q']; // from open("GET", "thisFileName.php?q=" + meetingType+"&t_hout"+hourTime, true);
	$user = $_GET["user"];
	$date = $_GET["date"];
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
	if($result = $con->query("SELECT * FROM Event WHERE id = '$user'")){
		echo $result;
	}
	else die "Error retrieving the Events";
	/*// query if all items
	else if(!empty($type) && !empty($date)){
		$result = $con->query("SELECT * FROM Event 
		WHERE 
		id = '$user' AND 
		typeE = $type AND 
		dateE = $date AND );
	}
	else //error
	*/
?>
