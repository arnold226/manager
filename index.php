<!DOCTYPE html>

<html>
    <head>

        <meta charset="utf-8">
        <meta name="author" content="Arnold Zoundi">
        <meta name="description" content="Here is the best task manager ready to help you improve your performance.">

        <title>Home</title>

 		<link href="css/custom.css" rel="stylesheet" type="text/css" />
		
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="css/jquery-ui.custom.css" rel="stylesheet" type="text/css" />
		
		

 		<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script> 		
 		<script type="text/javascript" src="js/custom.js"></script>
		
		<script type="text/javascript" src="js/bootstrap.js"></script><!-- JQueryui -->
		<script type="text/javascript" src="js/jquery-ui.js"></script> 

    </head>
    <body>
	
	<div id = "main_wrap">
	
	<div id = "title_bar"> 
	
		<h1>Task Manager</p>
	
	</div>
	
	<div id = "login">
	
	
	
		<!--<form class="form-signin" role="form">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="email" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>-->
	  
	 
	
		
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
	
		<h2>Welcome to your online task manager!</h2>
	
		<h2>Sign up</h2>
	
		<form action = "registration.php" method = "post">
	
			<table id = "table_register">
			
				<tr>
				
						<td><input type = "text" placeholder = "Username" id = "username" name = "username"></td>
				
				</tr>
				
				<tr>
				
						<td><input type = "text" placeholder = "First Name" id = "first_name" name= "first_name"></td>
				
				</tr>
				
				<tr>
				
						<td><input type = "text" placeholder = "Last Name" id = "last_name" name = "last_name"></td>
				
				</tr>
				
				<tr>
				
						<td><input type = "email" placeholder = "Email Address" id = "email" name = "email"></td>
				
				</tr>
			
				<tr>
				
						<td><input type = "password" placeholder = "Password" id = "password" name = "password"></td>
				
				</tr>
				
				<tr>
				
						<td><input type = "password" placeholder = "Confirm Password" id = "cpassword" name = "cpassword"></td>
				
				</tr>
			
				<tr>
				
						<td><input type = "submit" value = "Sign up" id = "submit_button"></td>
				
				</tr>
		
		
		
			</table>

		</form>

	</div>
	
	
	<div id = "footer">
	
		<p>© 2014 Arnold Zoundi</p>
	
	</div>
	
	</div>

    </body>
</html>
