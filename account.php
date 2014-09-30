<?php
//include 'login.php';
//session_start();
//include 'login.php';



//flag to check if functions.php has already been called
if(!isset($_SESSION['session_include'])){

include 'functions.php';

}
check_in_session();
//if(!isset($_SESSION['username'])){
//	session_unset();
//	session_destroy();
//	include 'index.php';
//	exit;

//}

?>

<!DOCTYPE html>

	<!-- INFX1606 - Starter kit -->

<html>
    <head>

        <meta charset="utf-8">
        <meta name="author" content="REPLACE WITH YOUR NAME, LEAVE THE QUOTES">
        <meta name="description" content="REPLACE WITH A DESCRIPTION OF THE ASSIGNMENT, LEAVE THE QUOTES">
		<!--<meta http-equiv="refresh" content="0"; url="account.php">-->

        <title>Account</title>

 		<link href="css/custom.css" rel="stylesheet" type="text/css" />
		
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
		<link href="css/jquery-ui.custom.css" rel="stylesheet" type="text/css" />
		
		
		

 		<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script> 		
 		<script type="text/javascript" src="js/custom.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script> 
		
		<script type="text/javascript" src="js/bootstrap.js"></script><!-- JQueryui -->
		
		


    </head>
    <body>
	
	<div id = "main_wrap">
	
	<div id = "title_bar"> 
	
		<h1>Task Manager</p>
	
	</div>
	
	<div id = "login">
	
		
		<?php 
		
		
		
		
			echo "Hi, ". "$_SESSION[username]";
		
		
		?>
		
		<div id= "activities_info">
			<?php 
			
				$username = $_SESSION['username'];
			
				//get userid
								$sql_user_id = "SELECT userid  from users where username = '$username'";
	
								$result_user_id = mysqli_query(sql_connect(), $sql_user_id);
 
								$data_user_id = mysqli_fetch_array($result_user_id);
	
								$user_id = $data_user_id['userid'];
								
								//make session varibale for user id
								$_SESSION['userid'] = $user_id;
								
		
		
				// get count of activities in table in order to determine the activityid
				$sql_count_activity = "SELECT DISTINCT count(*) as total_activities from activities as a, reminder as r where r.activityid = a.activityid AND r.userid = '$user_id'";

				$result_activity = mysqli_query(sql_connect(), $sql_count_activity);
 
				$data_activity = mysqli_fetch_array($result_activity);
 
				$count_activity = $data_activity['total_activities'];
				
				
				//echo "<p>Total activities: ".$count_activity."</p>";
				
				
				$sql_count_activity_active = "SELECT DISTINCT count(*) as total_activities_active from activities as a, reminder as r where r.activityid = a.activityid AND r.userid = '$user_id' AND activity_status = 'active'";

				$result_activity_active = mysqli_query(sql_connect(), $sql_count_activity_active);
 
				$data_activity_active = mysqli_fetch_array($result_activity_active);
 
				$count_activity_active = $data_activity_active['total_activities_active'];
				
				//echo "<p>Active activities: ".$count_activity_active."</p>";
				
				
				$sql_count_activity_attended = "SELECT DISTINCT count(*) as total_activities_attended from activities as a, reminder as r where r.activityid = a.activityid AND r.userid = '$user_id' AND activity_status = 'attended'";

				$result_activity_attended = mysqli_query(sql_connect(), $sql_count_activity_attended);
 
				$data_activity_attended = mysqli_fetch_array($result_activity_attended);
 
				$count_activity_attended = $data_activity_attended['total_activities_attended'];
				
				//echo "<p>Attended activities: ".$count_activity_attended."</p>";
				
				
				//$sql_count_activity_ = "SELECT DISTINCT count(*) as total_activities_attended from activities as a, reminder as r where r.activityid = a.activityid AND r.userid = '$user_id' AND activity_status = 'attended'";

				//$result_activity_attended = mysqli_query(sql_connect(), $sql_count_activity_attended);
 
				//$data_activity_attended = mysqli_fetch_assoc($result_activity_attended);
 
				//$count_activity_attended = $data_activity_attended['total_activities_attended'];
				
				//echo "<p>Attended activities: ". "$count_activity_attended</p>";
				
				
				echo "<table id = \"settings\">
				
								<tr id = \"blue\">
								
									<td>Total activities</td>
									<td>".$count_activity."</td>
								
								</tr>
								
								<tr id = \"grey\">
								
									<td>Active activities</td>
									<td>".$count_activity_active."</td>
								
								</tr>
								
								<tr id = \"blue\">
								
									<td>Attended activities</td>
									<td>".$count_activity_attended."</td>
								
								</tr>
				
						</table>";
 
		
		
			?>
		</div>
		
		<form action = "logout.php" method =  "post"> 
		
			<input type = "submit" value = "Log out" class = "logout_button" id = "logout">
			
		
		</form>
	
		<!--<div id = "nav_bar">
		
			<nav>
			<ul>
			
				<li><a href="#">Add a task</a></li>
				<li><a href="#">View tasks</a></li>
				<li><a href="#">Account settings</a></li>
				<li><a href="#">Log out</a></li>
			
			</ul>
			</nav>
		
		
		</div>-->
		
	
	</div>
	
	<div id = "about2"> 
	
		
		
		
	
	
	</div>

	<div id="sign_up">
		
			<div id="tabs">
				<ul>
					<li><a href="#tabs-1">New Task</a></li>
					<li><a href="#tabs-2">View Tasks</a></li>
					<li><a href="#tabs-3">Settings</a></li>
				</ul>
				<div id="tabs-1">
					
					<form action = "addtask.php" method = "post">
					
						<table id = "activity_1">
			
							<tr>
				
								<td><input type = "text" placeholder = "Task name" id = "task_name" name = "task_name"></td>
								<td><input type = "text" placeholder = "Start date" id = "datepicker"  class = "date_start" name = "date_start"></td>
				
							</tr>
							
							<tr>
				
								<td>
								
									<select name="time_start" id="time_picker">
										<option value='' selected="selected">Select task start time</option>
										<option value='00:00:00'>00:00:00</option>
										<option value='01:00:00'>01:00:00</option>	
										<option value='02:00:00'>02:00:00</option>
										<option value='03:00:00'>03:00:00</option>
										<option value='04:00:00'>04:00:00</option>
										<option value='05:00:00'>05:00:00</option>
										<option value='06:00:00'>06:00:00</option>
										<option value='07:00:00'>07:00:00</option>
										<option value='08:00:00'>08:00:00</option>
										<option value='09:00:00'>09:00:00</option>
										<option value='10:00:00'>10:00:00</option>
										<option value='11:00:00'>11:00:00</option>
										<option value='12:00:00'>12:00:00</option>
										<option value='13:00:00'>13:00:00</option>
										<option value='14:00:00'>14:00:00</option>
										<option value='15:00:00'>15:00:00</option>
										<option value='16:00:00'>16:00:00</option>
										<option value='17:00:00'>17:00:00</option>
										<option value='18:00:00'>18:00:00</option>
										<option value='19:00:00'>19:00:00</option>
										<option value='20:00:00'>20:00:00</option>
										<option value='21:00:00'>21:00:00</option>
										<option value='22:00:00'>22:00:00</option>
										<option value='23:00:00'>23:00:00</option>
										
									</select>     
								
								</td>
								<td><input type = "text" placeholder = "Due date" id = "datepicker1"  class = "date_due" name = "date_due"></td>
				
							</tr>
							
							
							<tr>
				
								<td>
								
									<select name="time_due" id="time_picker">
										<option value='' selected="selected">Select task due time</option>
										<option value='00:00:00'>00:00:00</option>
										<option value='01:00:00'>01:00:00</option>	
										<option value='02:00:00'>02:00:00</option>
										<option value='03:00:00'>03:00:00</option>
										<option value='04:00:00'>04:00:00</option>
										<option value='05:00:00'>05:00:00</option>
										<option value='06:00:00'>06:00:00</option>
										<option value='07:00:00'>07:00:00</option>
										<option value='08:00:00'>08:00:00</option>
										<option value='09:00:00'>09:00:00</option>
										<option value='10:00:00'>10:00:00</option>
										<option value='11:00:00'>11:00:00</option>
										<option value='12:00:00'>12:00:00</option>
										<option value='13:00:00'>13:00:00</option>
										<option value='14:00:00'>14:00:00</option>
										<option value='15:00:00'>15:00:00</option>
										<option value='16:00:00'>16:00:00</option>
										<option value='17:00:00'>17:00:00</option>
										<option value='18:00:00'>18:00:00</option>
										<option value='19:00:00'>19:00:00</option>
										<option value='20:00:00'>20:00:00</option>
										<option value='21:00:00'>21:00:00</option>
										<option value='22:00:00'>22:00:00</option>
										<option value='23:00:00'>23:00:00</option>
										
									</select>     
								
								</td>
								<td><input type = "text" placeholder = "Street address" id = "street_address" name = "street_address"></td>
				
							</tr>
							
							<tr>
				
								<td><input type = "text" placeholder = "City" id = "city" name = "city"></td>
								<td><input type = "text" placeholder = "Country" id = "country" name = "country"></td>
				
							</tr>
							
							<tr>
				
								<td><input type = "text" placeholder = "Participant" id = "participant" name = "participant"></td>
								<td><input type = "text" placeholder = "Reminder date" id = "datepicker2"  class = "reminder_date" name = "reminder_date"></td>
				
							</tr>
							
							<tr>
								
								
								<td>
								
									<select name="reminder_time" id="time_picker">
										<option value='' selected="selected">Select reminder time</option>
										<option value='00:00:00'>00:00:00</option>
										<option value='01:00:00'>01:00:00</option>	
										<option value='02:00:00'>02:00:00</option>
										<option value='03:00:00'>03:00:00</option>
										<option value='04:00:00'>04:00:00</option>
										<option value='05:00:00'>05:00:00</option>
										<option value='06:00:00'>06:00:00</option>
										<option value='07:00:00'>07:00:00</option>
										<option value='08:00:00'>08:00:00</option>
										<option value='09:00:00'>09:00:00</option>
										<option value='10:00:00'>10:00:00</option>
										<option value='11:00:00'>11:00:00</option>
										<option value='12:00:00'>12:00:00</option>
										<option value='13:00:00'>13:00:00</option>
										<option value='14:00:00'>14:00:00</option>
										<option value='15:00:00'>15:00:00</option>
										<option value='16:00:00'>16:00:00</option>
										<option value='17:00:00'>17:00:00</option>
										<option value='18:00:00'>18:00:00</option>
										<option value='19:00:00'>19:00:00</option>
										<option value='20:00:00'>20:00:00</option>
										<option value='21:00:00'>21:00:00</option>
										<option value='22:00:00'>22:00:00</option>
										<option value='23:00:00'>23:00:00</option>
										
									</select>     
								
								</td>
								<td><input type = "number" placeholder = "Reminder repetition" id = "reminder_repetition" name = "reminder_repetition"></td>
				
							</tr>
				
		
						</table>
						
						<div id = "modify_button"><input type = "submit" value = "Add" id = "modify"></div>

					</form>
					
				</div>
				<div id="tabs-2">
					
					
					
					<table id = "settings" class = "settingsplug">
						<!--	<thead>
							
								<th>Task name</th>
								
								
								<th>Edit</th>
								<th>Delete</th>
								
							
							</thead> -->
							
							
							<?php 
							
								$counter = 1;
								$counter2 = 0;
							
								$username = $_SESSION['username'];
							
								//get userid
								$sql_user_id = "SELECT userid  from users where username = '$username'";
	
								$result_user_id = mysqli_query(sql_connect(), $sql_user_id);
 
								$data_user_id = mysqli_fetch_assoc($result_user_id);
	
								$user_id = $data_user_id['userid'];
								
		
		
								$sql_activity_name = "SELECT a.activityname, a.activityid, a.startdate
																FROM activities as a, reminder as r 
																WHERE r.activityid = a.activityid AND r.userid = '$user_id'
																ORDER BY a.startdate ASC";

								$result_activity_name = mysqli_query(sql_connect(), $sql_activity_name);
 
								//$data_activity_attended = mysqli_fetch_assoc($result_activity_attended);
 
								//$count_activity_attended = $data_activity_attended['total_activities_attended'];
								
								$arrayac = array ();
								
								//fetch and display result
								while($row = mysqli_fetch_array($result_activity_name)){
								
									$name = $row['activityname'];
									$activity_id = $row['activityid'];
									//echo "$activity_id";
									$arrayac [$counter2] = $activity_id;
									//print $activity_id;
									
									if($counter % 2 === 0){
										//$arrayac [$counter2] = $activity_id;
									
										echo "<form action=\"activitymodal.php\" method = \"post\">
										
										<tr id = \"blue\"> 
										
												<form action=\"activitymodal.php\" method = \"post\">
													<td><input type = \"hidden\" id = \"task_id2\" name = 'task_id' value='$activity_id'>".$name."</td>
													<td><input type = \"image\" id = \"edit\" src = \"media/edit.png\" alt = \"submit\"></td>
												</form>
												<form action=\"activityedit.php\" method = \"post\">
													<td><input type = \"hidden\" id = \"task_id2\" name = 'task_id' value='$activity_id'><input type = \"image\" id = \"delete\" name=\"delete\" src = \"media/delete.png\" alt = \"submit\"> </td>
												</form>
												</tr>
												
												";
		
									}
									else{
										//$arrayac [$counter2] = $activity_id;
										echo "<form action=\"activitymodal.php\" method = \"post\" id = \"activity_modal\">
									
										<tr id = \"grey\"> 
										
												<form action=\"activitymodal.php\" method = \"post\">
													<td><input type = \"hidden\" id = \"task_id2\" name = 'task_id' value='$activity_id'>".$name."</td>
													<td><input type = \"image\" id = \"edit\" src = \"media/edit.png\" alt = \"submit\"></td>
												</form>
												<form action=\"activityedit.php\" method = \"post\">
													<td><input type = \"hidden\" id = \"task_id2\" name = 'task_id' value='$activity_id'><input type = \"image\" id = \"delete\" name=\"delete\" src = \"media/delete.png\" alt = \"submit\"> </td>
												</form>
												</tr>
												
												";
									
									}
									
									
									
									$counter++;                            
									$counter2++;
									
								}
								
								
								//echo "<p>Attended activities: ". "$count_activity_attended</p>";
		
		
							?>
							
		
						</table>
						
						
					
				</div>
				
				<form action="settingsmodal.php" method = "post">
				<div id="tabs-3">
				
					
					<table id = "settings">
					
					
						<?php 
							
								$username = $_SESSION['username'];
							
								//get userid
								$sql_user_id = "SELECT userid  from users where username = '$username'";
	
								$result_user_id = mysqli_query(sql_connect(), $sql_user_id);
 
								$data_user_id = mysqli_fetch_assoc($result_user_id);
	
								$user_id = $data_user_id['userid'];
		
		
								$sql_user = "SELECT *
													FROM users
													WHERE userid = '$user_id'";

								$result_user = mysqli_query(sql_connect(), $sql_user);
 
								//$data_activity_attended = mysqli_fetch_assoc($result_activity_attended);
 
								//$count_activity_attended = $data_activity_attended['total_activities_attended'];
								
								$counter2 = 1;
								
								//fetch and display result
								$row = mysqli_fetch_assoc($result_user);
								$username = $row['username'];
								$first_name = $row['firstname'];
								$last_name = $row['lastname'];
								$email = $row['email'];
								$password = $row['passw'];
								
								
								//save session variable
								$_SESSION['username'] = $username;
								$_SESSION['first_name'] = $first_name;
								$_SESSION['last_name'] = $last_name;
								$_SESSION['email'] = $email;
								$_SESSION['password'] = $password;
								
								echo "<tr id = \"blue\"> 
													
													<td>Username</td>
													<td>".$username."</td>
										
										</tr>
										<tr id = \"grey\"> 
													
													<td>First Name</td>
													<td>".$first_name."</td>
										
										</tr>
										<tr id = \"blue\"> 
													
													<td>Last Name</td>
													<td>".$last_name."</td>
										
										</tr>
										<tr id = \"grey\"> 
													
													<td>Email</td>
													<td>".$email."</td>
										
										</tr>
										<tr id = \"blue\"> 
													
													<td>Password</td>
													<td>***********</td>
										
										</tr>";
								
				
								//echo "<p>Attended activities: ". "$count_activity_attended</p>";
		
		
							?>
				
		
					</table>
						
						
					<div id = "modify_button"><input type = "submit" value = "Modify" id = "modify"></div>
					
					
					
				</div>
			
			</div>
			</form>
		

	</div>
	
	
	<div id = "footer">
	
		<p>© 2013 Arnold Zoundi</p>
	
	</div>
	
	</div>

    </body>
</html>
