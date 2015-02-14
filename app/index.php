<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
<p> INPUT </p>
  <script src="js/scripts.js"></script>
  <script src="js/jquery.min.js"></script>
  <!-- <form name="input" action="Script URL" method="GET|POST"> 	-->
  <form name="input" action="addEvent.php" method="GET">
  	Event Name:  <input type="text" name="event_name" />
	<p>
    Category: 
            <!--drop down box-->
       <select name="selectinput">              
          <option value="work">work</option>
          <option value="play">play</option>
       </select>
    </p>
	Description: <textarea name="description" id="desc" cols="30" rows="3"> </textarea>
<br>
	Start Date:  <input type="datetime-local" id="start" name="start_date" onchange="displayStart()"/>
<br>
	End Date:    <input type="datetime-local" id="end" name="end_date" onchange="displayEnd()"/>
    <!-- form elements like input, textarea etc. -->
<br>
	<input type="submit" value="Submit">
</form>

<br>
<hr>

<p> OUTPUT </p>
<br>
<?php 
	echo "something";
	// print out stuff to page
	$con = new mysqli("localhost", "root", "", "example"); 
	if(mysqli_connect_errno($con)){
		echo "Failed to connect to DataBase: " .mysqli_connect_error();
	}
	
	//if ($_SERVER["REQUEST_METHOD"] == "POST") { //if coming from another page          
    
   //if hit output
		echo "inside the tiing";
			$sqlQuery = "SELECT * FROM Event";
			$result = mysqli_query($con, $sqlQuery);
			if(!$result){
				echo "ya goofed";
			}
			$row = mysqli_fetch_row($result);
			$num_results = $row[0];
			if($num_results < 0){
				echo "ya goofed somewhere in the query");
			}
	
			for( $i=0; $i < $num_results; $i++) {
					$row = mysqli_fetch_assoc ($result);
					//print_r($row);
					echo "LOOK: " .$row[$i];
			}
    //}
?>
<form  action="index.php" method="post">

        <p>
            <input type="submit" name="fromIndex" value="Show Output" />
        </p>

</form>


<!-- <script> 
function displayStart() {
var start = document.getElementById("start");
window.alert(start.value);
}
function displayEnd() {
var end = document.getElementById("end");
window.alert(end.value);
}
</script> -->
</body>
</html>