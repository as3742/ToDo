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

	$id = $_GET['id']; //Get projectID and assign it to local varialbe id
	
	//establish connection to db
	db();
	global $link;

	//Get data from todo list pertaining to projectID stored in local variable id
	$query = "SELECT projectTitle, projectDescription, date FROM ToDo WHERE projectID = '$id'";
	$selectProj = mysqli_query($link, $query);
	//Check that there is only 1 row
	if(mysqli_num_rows($selectProj)==1) {
		//assign record data to local variable row
		$row = mysqli_fetch_array($selectProj);
		if($row){
			//assign array data to local variables
			$title = $row['projectTitle'];
			$description = $row['projectDescription'];
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
	<title>Project Details</title>
</head>
<body>
	<h1> Project Details</h1>
	<hr>
	<!-- Display Data -->
	<h2><?php echo $title ?></h2>
	<p><b>Description: </b><?php echo $description ?></p>
	<small><?php echo "<b>Start Date: </b> $date" ?></small>
	<br>
	<br>
	<a href="editProject.php?id=<?php echo $id ?>">Edit</a>
	<a href="completed.php?id=<?php echo $id ?>">Complete Project</a>
	<a href="deleteProject.php?id=<?php echo $id ?>">Delete Project</a>
	<br>
	<button><a href="index.php">View To Do List</a></button>
</body>
</html>
