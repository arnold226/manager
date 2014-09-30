<?php 


include 'account.php';

$_SESSION['task_id'] = $_POST['task_id2'];
$task_id = $_SESSION['task_id'];


//$sql_location_user_id = "select l.locationid, u.userid
								//	from locations as l, reminder as r, activities  as a, users as u
								//	where  a.activityid = '$_SESSION[task_id]' AND l.locationid = r.locationid AND a.activityid = r.activityid AND u.userid = r.userid";
										
$sql_location_user_id = "select locationid, userid
										from tables_ids
										where activityid = '$_SESSION[task_id]'";


$result_loc_re_id = mysqli_query(sql_connect(), $sql_location_user_id);
 
								$data_loc_re_id = mysqli_fetch_assoc($result_loc_re_id);
								
	
								$location_id = 	$data_loc_re_id ['locationid'];	
								$user_id = 	$data_loc_re_id ['userid'];
								
								//echo "$location_id";
								
								
$sql_update_activities = "update activities
										set activityname = '$_POST[task_name]', startdate = '$_POST[start_date]', starttime = '$_POST[start_time]', duedate = '$_POST[due_date]', duetime = '$_POST[due_time]', stakeholder = '$_POST[participant]'
										where activityid = '$_SESSION[task_id]'";
								
								
$sql_update_locations = "update locations
										set streetaddress = '$_POST[street_address]', city = '$_POST[city]', country = '$_POST[country]'
										where locationid = '$location_id'";
							

$sql_update_reminder = "update reminder
										set targetdate = '$_POST[reminder_date]', targettime = '$_POST[reminder_time]', repetition = '$_POST[reminder_repetition]'
										where userid = '$user_id' AND locationid = '$location_id' AND activityid = '$_SESSION[task_id]'";


										
								

if(!mysqli_query(sql_connect(), $sql_update_activities)){

		die ('Could not connect to the database serverc' . mysqli_connect_error());
	
}


if(!mysqli_query(sql_connect(), $sql_update_locations)){

	die ('Could not connect to the database serverd' . mysqli_connect_error());
	
}

if(!mysqli_query(sql_connect(), $sql_update_reminder)){

		die ('Could not connect to the database serverg' . mysqli_connect_error());
	
}



echo "<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">Task Update notification&#9787;</h4>
      </div>
      <div class=\"modal-body\">
		<p> You have just updated one task! You will be able to see the changes after a page refresh!</p>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
      </div>
    </div>
  </div>
</div>

";

echo "<script type = \"text/javascript\" > $('#myModal').modal('show')</script>";


mysqli_close(sql_connect());




 ?>