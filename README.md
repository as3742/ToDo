# ToDo
To Do List - PHP MySQL

Add New Project :: Allows user to create new Project
Edit Project :: Allows user to change the Title and Description of the Project
Complete Project :: Will Remove the Project from the ToDo Table and create an entry in ToDoCompleted table
Delete Project :: Will Remove the project from the ToDo Table

Project Details :: Shows the user details pertaining to the project (Title, Description, Creation Date)
Completed Project Details :: Shows the user the same details as ProjDetails, with the added Finished Date information.

mySQL Databases (required) ::
(2) Tables
Todo Table
  - projectID
  - projectTitle
  - projectDescription
  - date
  
ToDoCompleted Table
  - projectID
  - projectTitle
  - projectDescription
  - startDate
  - date
