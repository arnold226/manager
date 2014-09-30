<?php

//flag to check if functions.php has already been called
if(!isset($_SESSION['session_include'])){

include 'functions.php';

}

check_in_session();

//flag to check if functions.php has already been called
if(!isset($_SESSION['session_include'])){

	$_SESSION['session_include']= 1;

}

//create sessions variables
$_SESSION['task_name'] = $_POST['task_name'];
$_SESSION['date_start'] = $_POST['date_start'];
$_SESSION['time_start'] = $_POST['time_start'];
$_SESSION['date_due'] = $_POST['date_due'];
$_SESSION['time_due'] = $_POST['time_due'];
$_SESSION['street_address'] = $_POST['street_address'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['country'] = $_POST['country'];
$_SESSION['participant'] = $_POST['participant'];
$_SESSION['reminder_date'] = $_POST['reminder_date'];
$_SESSION['reminder_time'] = $_POST['reminder_time'];
$_SESSION['reminder_repetition'] = $_POST['reminder_repetition'];


//store data into tables if inputs fields are not empty, otherwise display an error message
if(empty($_SESSION['task_name'])  || empty($_SESSION['date_start'])  || empty($_SESSION['time_start'])  || empty($_SESSION['date_due'])  || empty($_SESSION['time_due'])  || empty($_SESSION['street_address']) || empty($_SESSION['city']) || empty($_SESSION['country']) || empty($_SESSION['participant']) || empty($_SESSION['reminder_date']) || empty($_SESSION['reminder_time']) || empty($_SESSION['reminder_repetition']) ){


	activity_error();


}
else{


	// get count of activities in table in order to determine the activityid
	$sql_count_activity = "SELECT DISTINCT count(*) as total_activities from activities";

	$result_activity = mysqli_query(sql_connect(), $sql_count_activity);
 
	$data_activity = mysqli_fetch_assoc($result_activity);
 
	$count_activity = $data_activity['total_activities'];
 
	if($count_activity == 0){
 
		$_SESSION['activity_id']="A"."0";
 
	}
	else{
 
		$_SESSION['activity_id']="A"."$count_activity";
 
	}

	$activity_id = $_SESSION['activity_id'];
	
	
	// get count of locations in table in order to determine the locationid
	$sql_count_location = "SELECT DISTINCT count(*) as total_locations from locations";

	$result_location = mysqli_query(sql_connect(), $sql_count_location);
 
	$data_location = mysqli_fetch_assoc($result_location);
 
	$count_location = $data_location['total_locations'];
 
	if($count_location == 0){
 
		$_SESSION['location_id']="L"."0";
 
	}
	else{
 
		$_SESSION['location_id']="L"."$count_location";
 
	}

	$location_id = $_SESSION['location_id'];
	
	
	// get count of reminder in table in order to determine the reminderid
//	$sql_count_reminder = "SELECT DISTINCT count(*) as total_reminder from reminder";

//	$result_reminder = mysqli_query(sql_connect(), $sql_count_reminder);
 
	//$data_reminder = mysqli_fetch_assoc($result_reminder);
 
	//$count_reminder = $data_reminder['total_reminder'];
 
//	if($count_reminder == 0){
 
		//$_SESSION['reminder_id']="R"."0";
 
//	}
	//else{
 
//		$_SESSION['reminder_id']="R"."$count_reminder";
 
//	}

	//$reminder_id = $_SESSION['reminder_id'];
	
	$username = $_SESSION['username'];
	
	//get userid
	$sql_user_id = "SELECT userid  from users where username = '$username'";
	
	$result_user_id = mysqli_query(sql_connect(), $sql_user_id);
 
	$data_user_id = mysqli_fetch_assoc($result_user_id);
 
	$user_id = $data_user_id['userid'];


	//add data to tables.
	$sql_start_transaction = "START TRANSACTION";
	
	$sql_activities = " INSERT INTO activities(activityid, activityname, startdate, starttime, duedate, duetime, stakeholder, activity_status)
			VALUES('$activity_id', '$_POST[task_name]', '$_POST[date_start]', '$_POST[time_start]', '$_POST[date_due]', '$_POST[time_due]', '$_POST[participant]', 'active') ";
			
	$sql_locations = " INSERT INTO locations(locationid, streetaddress, city, country)
			VALUES('$location_id', '$_POST[street_address]', '$_POST[city]', '$_POST[country]') ";
			
	$sql_reminder = " INSERT INTO reminder(targetdate, targettime, repetition, userid, activityid, locationid)
			VALUES('$_POST[reminder_date]', '$_POST[reminder_time]', '$_POST[reminder_repetition]', '$user_id', '$activity_id', '$location_id') ";
			
	$sql_commit_transaction = "COMMIT";
			
			//$sql = " INSERT INTO Users(userid, username, firstname, lastname, email, passw)
			//VALUES(2, 'arnocboc', 'Acrnold', 'Zouncdi', 'ar@yahcoo.fr', 'pacpa') ";
			
	//mysqli_query(sql_connect(), $sql);

	if(!mysqli_query(sql_connect(), $sql_start_transaction) || !mysqli_query(sql_connect(), $sql_activities) || !mysqli_query(sql_connect(), $sql_locations) || !mysqli_query(sql_connect(), $sql_reminder) || !mysqli_query(sql_connect(), $sql_commit_transaction)){

	$sql_commit_transaction = "COMMIT";
	
	$sql_rollback_transaction = "ROLLBACK";
	mysqli_query(sql_connect(), $sql_rollback_transaction);
	die ('Could not connect to the database server' . mysqli_connect_error());
	
}

//include 'account.php';
//include 'registrationsuccess.php';

row_addition_success();



}

mysqli_close(sql_connect());


?>