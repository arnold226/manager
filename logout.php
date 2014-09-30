<?php
//include 'login.php';
include 'functions.php';
check_in_session();
session_unset();
session_destroy();


?>

<!DOCTYPE html>

	<!-- INFX1606 - Starter kit -->

<html>
    <head>

        <meta charset="utf-8">
        <meta name="author" content="REPLACE WITH YOUR NAME, LEAVE THE QUOTES">
        <meta name="description" content="REPLACE WITH A DESCRIPTION OF THE ASSIGNMENT, LEAVE THE QUOTES">

        <title>Home</title>

 		<link href="css/custom.css" rel="stylesheet" type="text/css" />
		<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
		
		

 		<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script> 		
 		<script type="text/javascript" src="js/custom.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script> <!-- JQueryui -->

    </head>
    <body>
	
	<div id = "main_wrap">
	
	<div id = "title_bar"> 
	
		<h1>Task Manager</p>
	
	</div>
	
	<div id = "login">
	
		
		<h2>Log in</h2>
	
		<form action = "login.php" method = "post">
	
			<table id = "table_login">
		
				<tr>
				
						<td><input type = "text" placeholder = "username" class = "username" name = "username"></td>
				
				</tr>
			
				<tr>
				
						<td><input type = "password" placeholder = "password" class = "password" name = "password"></td>
				
				</tr>
			
				<tr>
				
						<td><input type = "submit" value = "Log in" class = "submit_button"></td>
				
				</tr>
				
				<tr>
				
						<td><a href = "#" class = "forgot" >Forgot your login information?</td>
				
				</tr>
		
		
		
			</table>
		</form>
		
	
	</div>
	
	<div id = "about"> 
	
		<h2>About</h2>
		
		<p>This is a free online task manager designed for you. It can be used by anybody for different purposes. Whether you would like to keep track
		of your appointments or regular tasks that are difficult to remember, this application is here to help. Task manager was designed as an end of semester
		project for Dalhousie faculty of Computer Science database course (CSCI2141). Sign up and Enjoy!</p>
	
	
	</div>

	<div id="sign_up">
		
		<?php
		echo "You have successfully logged out! Thank you for your visit!";
		?>

	</div>
	
	
	<div id = "footer">
	
		<p>© 2013 Arnold Zoundi</p>
	
	</div>
	
	</div>

    </body>
</html>
