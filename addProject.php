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


	require_once 'db_connect.php';

	//if submit button is pressed...
	if(isset($_POST['submit'])){
		//...assign project data to local variables...
		$title = $_POST['projectTitle'];
		$description =$_POST['projectDescription'];

		//...establish connection to mySQL db...
		db();
		global $link;

		//...submit Insert query to db and create a new Project
		$query = "INSERT INTO ToDo(projectTitle, projectDescription, date) VALUES ('$title', '$description', now())";
		$addProj = mysqli_query($link, $query); //use local variable to check if communication with the server was successful.
		if($addProj){
			echo "New project has been Added.";
		}
		else{
			echo mysqli_error($link);
		}
	}
?>


<html>
<head>
	<title>Add Project</title>
</head>
<body>
	<h1>Add Project:</h1>
	<hr>
	<!-- Get Project informatoin from user -->
	<form method="post" action="addProject.php">
		<p>Project Title: </p>
		<input type="text" name="projectTitle">
		<p>Project Description: </p>
		<input type="text" name="projectDescription">
		<br>
		<input type="submit" name="submit" value="Add Project">
	</form>
	<br>
	<button><a href="index.php">View To Do List</a></button>
</body>
</html>
