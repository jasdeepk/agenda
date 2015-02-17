<?php
header('Location: index.php');
	$eventname = $_GET['event_name'];
	$type = $_GET['selectinput']; // from open("GET", "thisFileName.php?q=" + meetingType+"&t_hout"+hourTime, true);
	$date = $_GET["date"];
	$start_time = $_GET["start_time"];
	$end_time = $_GET["end_time"];
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
		$result = $con->query("INSERT INTO Event (StartDate, StartTime, EndTime, TypeE, Text, Id, Title) VALUES ('$date', '$start_time', '$end_time', '$type', '$description', '100', '$eventname')");
				//echo $result;
	}
	// add if no text description
	else if(empty($description)){
		$result = $con->query("INSERT INTO Event(StartDate, StartTime, EndTime, TypeE, Text, Id) VALUES ('$date', 'start_time', '$end_time', '$type', NULL, '100', '$eventname')");
				//echo $result;
	}
	else echo "Error adding the Event";
?>