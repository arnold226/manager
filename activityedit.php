<?php 



include 'account.php';

$_SESSION['task_id'] = $_POST['task_id'];
$task_id = $_SESSION['task_id'];


$sql_location_reminder_id = "select locationid, userid
										from tables_ids
										where activityid = '$_SESSION[task_id]'";
	

$result_loc_re_id = mysqli_query(sql_connect(), $sql_location_reminder_id);
 
								$data_loc_re_id = mysqli_fetch_assoc($result_loc_re_id);
								
	
								$location_id = 	$data_loc_re_id ['locationid'];	
								$user_id = 	$data_loc_re_id ['userid'];
								
								
								//echo "<script type = \"text/javascript\" >console.log(\"".$location_id."\");console.log(\"".$reminder_id."\");</script>";
								//echo "$location_id";
								//echo "$reminder_id";
							

$sql_activity_delete = "delete from activities
								where activityid = '$_SESSION[task_id]'";
								
$sql_location_delete = "delete from locations
								where locationid = '$location_id'";
								
$sql_reminder_delete = "delete from reminder
								where userid = '$user_id' AND locationid = '$location_id' AND activityid = '$_SESSION[task_id]'";		

if(!mysqli_query(sql_connect(), $sql_activity_delete)){

		die ('Could not connect to the database serverc' . mysqli_connect_error());
	
}


if(!mysqli_query(sql_connect(), $sql_location_delete)){

	die ('Could not connect to the database serverd' . mysqli_connect_error());
	
}

if(!mysqli_query(sql_connect(), $sql_reminder_delete)){

		die ('Could not connect to the database serverg' . mysqli_connect_error());
	
}

echo "<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">Task deletion notification&#9787;</h4>
      </div>
      <div class=\"modal-body\">
		<p> You have just deleted one task! You will be able to see the changes after a page refresh!</p>
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