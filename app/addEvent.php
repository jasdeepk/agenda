<?php
header('Location: index.php');
	$eventname = $_GET['event_name'];
	$type = $_GET['selectinput']; // from open("GET", "thisFileName.php?q=" + meetingType+"&t_hout"+hourTime, true);
	$startdate = $_GET["start_date"];
	$enddate = $_GET["end_date"];
	$description = $_GET["description"];
	// assume hour and minute must be given together
	
	
	
	$con = new mysqli("localhost", "root", "", "example"); 
	if(mysqli_connect_errno($con)){
		echo "Failed to connect to DataBase: " .mysqli_connect_error();
	}
	
	
	/*if (empty($t_user)){
		// error, need a user to lookup
	}
	*/
	// add if text description
	if(!empty($description)){
		$result = $con->query("INSERT INTO Event (StartDate, EndDate, TypeE, Text, Id, Title) VALUES ('$startdate', '$enddate', '$type', '$description', '100', '$eventname')");
				//echo $result;
	}
	// add if no text description
	else if(empty($description)){
		$result = $con->query("INSERT INTO Event(StartDate, EndDate, TypeE, Text, Id) VALUES ('$startdate', '$enddate', '$type', NULL, '100', '$eventname')");
				//echo $result;
	}
	else echo "Error adding the Event";
?>