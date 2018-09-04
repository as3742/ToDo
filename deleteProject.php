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
if(isset($_GET['id'])){

	$id = $_GET['id']; //Get projectID and assign it to local variable id
	
	//Establish connection to db
	db();
	global $link;
	
	//Delete record from ToDo table where projectId is the id we obtained earlier
	$query = "DELETE FROM ToDo WHERE projectID = '$id'";
	$deleteProj = mysqli_query($link, $query);
	if($deleteProj)
	{
		echo "Project Deleted Successfully";
	}
	else{
		echo mysqli_error($link);
	}
	}
?>

<br>
<br>
<button><a href="index.php"> Return to ToDo List</a></button>