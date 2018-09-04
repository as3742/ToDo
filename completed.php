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

require_once 'db_connect.php'; ?>

<html>
<head>
	<title>Project ToDo List</title>
</head>
<body>
	<h1>Project Completed</h1>
	<hr>

<?php

if(isset($_GET['id'])){

	$id = $_GET['id']; //Get projectID and assign it to local varialbe id
	
	//establish connection to db
	db();
	global $link;

	//Get data from todo list pertaining to projectID stored in local variable id
	$query1 = "SELECT projectTitle, projectDescription, date FROM ToDo WHERE projectID = '$id'";
	$selectProj = mysqli_query($link, $query1);
	//Check that there is only 1 row
	if(mysqli_num_rows($selectProj)== 1)
	{
		//While there is data, assign it to local variables
		while($row = mysqli_fetch_array($selectProj)){
			$title = $row['projectTitle'];
			$description = $row['projectDescription'];
			$startDate = $row['date'];
		}
	}
	else{
		echo mysqli_error($link);
	}
	

	//Insert into ToDoCompleted Table the project that was just queried in query1
	$query2 = "INSERT INTO ToDoCompleted(projectTitle, projectDescription, startDate, date) VALUES ('$title', '$description', '$startDate', now() )";
	$insertToDo = mysqli_query($link, $query2);
	if($insertToDo){
		echo "Project has been Completed";
	}
	else{
		echo mysqli_error($link);
	}

	//Delete from Table ToDo the project that was just queried in query1
	$query3 = "DELETE FROM ToDo WHERE projectID ='$id'";
	$deleteProj = mysqli_query($link, $query3);
	if(!$deleteProj){
		echo "Project was NOT REMOVED from ToDo List";
	}
	
}

?>
<br>
<button><a href="index.php">View To Do List</a></button>