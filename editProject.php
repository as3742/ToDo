<?php

/**
*   Chris Del Duco
*   As3742
*   CSC4996
*   
*   Project: ToDo List
*   Function: Create, Add, Update, and Delete New Projects as well as,
*       View Completed Projects.
*/


require_once 'db_connect.php';
if(isset($_GET['id'])){
    
    $id = $_GET['id']; //Get projectID and assign it to local varialbe id

    //establish db connection
    db();
    global $link;
    
    //Get and populate project data from ToDo db (ie. current information)
    $query1 = "SELECT projectTitle, projectDescription FROM ToDo WHERE projectID = '$id'";
    $selectProj = mysqli_query($link, $query1);
    $row=mysqli_fetch_array($selectProj); //store data record in local variable row
       if($row){
        //assign project data of record to local variables
        $title1 = $row['projectTitle'];
        $description1 = $row['projectDescription'];

        //utilize echo to display project data
    echo " 
        <h2>Edit Project</h2>
        <hr>
        <form action='editProject.php?id=$id' method='post'>
        <p>Title: </p>
        <input type='text' name='title' value='$title1'>
        <p>Description: </p>
        <input type='text' name='description' value='$description1'>
        <br>
        <input type='submit' name='submit' value='Submit Edits'>
        </form>
    ";

    }
    else{
        echo mysqli_error($link);
    }


    //if submit button is pressed...
    if(isset($_POST['submit'])){

        //...assign data on page to local variables (ie. updated form data)...
        $title = $_POST['title'];
        $description = $_POST['description'];
    
        //... and Update project data in ToDo Table with new user input.
        $query2 = "UPDATE ToDo SET projectTitle = '$title', projectDescription = '$description' WHERE projectID = '$id'";
        $editProj = mysqli_query($link, $query2);
        if($editProj){
            echo "Project has been updated";
        }
        else{
            echo mysqli_error($link);
        }

        //Refresh data on page and redirect to HomePage
        header("Refresh:0; url=index.php");
    }
} 
?>



<!DOCTYPE html>
<html>
<head>
    <title>Edit ToDo</title>
</head>
<body>
    <br>
    <a href="completed.php?id=<?php echo $id ?>">Complete Project</a>
    <a href="deleteProject.php?id=<?php echo $id ?>">Delete Project</a>
    <br>
    <button><a href="index.php">View To Do List</a></button>
</body>
</html>