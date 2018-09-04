<?php

/**
*	Chris Del Duco
*	As3742
*	CSC4996
*	
*	Project: ToDo List
*	Function: Create, Add, Update, and Delete New Projects as well as,
*		View Completed Projects.
*/


require_once "db_connect.php";
if(isset($_GET['id'])){
	
	$id = $_GET['id']; //Get projectID and assign it to local variable id

	//Establish connection to db
	db();
	global $link;

	//Get data from todoCompleted table pertaining to projectID stored in local variable id
	$query = "SELECT projectTitle, projectDescription, startDate, date FROM todoCompleted WHERE projectID = '$id'";
	$selectProj = mysqli_query($link, $query);
	//If there is only 1 row...
	if(mysqli_num_rows($selectProj)==1) {
		//...assign data to local variable row...
		$row = mysqli_fetch_array($selectProj);
		//...if row is valid, store data in local variables to be displayed.
		if($row){
			$title = $row['projectTitle'];
			$description = $row['projectDescription'];
			$startDate = $row['startDate'];
			$date = $row['date'];
		}
	}
	else{
		echo 'No Project Details';
	}
}
?>


<html>
<head>
	<title>Completed Project Details</title>
</head>
<body>
	<h1>Completed Project Details</h1>
	<hr>
	<!-- Display Data -->
	<h2><?php echo $title ?></h2>
	<p><b>Description:</b><?php echo $description ?></p>
	<p><small><?php echo "<b>Start Date: </b> $startDate"; ?></small></p>
	<p><small><?php echo "<b>Finished Date: </b> $date"; ?></small></p>
	<br>
	<button><a href="index.php">View To Do List</a></button>
</body>
</html>
