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

require_once("db_connect.php"); ?>

<html>
<head>
	<title>Project ToDo List</title>
</head>
<body>
	<h1>List of Open Projects</h1>
	<hr>
	<p><a href="addProject.php">Add Project</a></p>
	<p><a href="completedProjects.php"> View Completed Projects</a></p>
	<h3>ToDo:</h3>

	<?php
		db();
		global $link;  //establish connection with db_connect.php $link
	
		$query = "SELECT projectID, projectTitle, projectDescription, date FROM ToDo"; //query for mySQL
		$selectProj = mysqli_query($link, $query);	//submit query using (mySQL connection, mySQL query)
	
		//If there is at least 1 record found...
		if(mysqli_num_rows($selectProj) >= 1){
			//...and while there are records remaining...
			while($row = mysqli_fetch_array($selectProj)){
				//...store the data in local variables.
				$id = $row['projectID'];
				$title = $row['projectTitle'];
				$description = $row['projectDescription'];
				$date = $row['date'];
	?>
	
	<!-- List all Open ToDo Projects and the Date they were created -->
	<ul>
		<li><a href="projectDetails.php?id=<?php echo $id?>"><?php echo $title ?></a></li>
		<?php echo "-$date"; ?>
	</ul>
	<?php
		}
	}
	?> <!-- Close php if and while loops -->
</body>
</html>