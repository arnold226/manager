<?php 

include 'account.php';

//echo "<script text =\"javascript\"> alert($('#task_id2').val());</script>";

//$yeah = print "<script text =\"javascript\">
//$('#yes').click(function(){
//console.log($('#task_id2').val());

//});
//</script>";

//$haha = $_POST['task_id'];
//$ya = count($haha);
//echo "$ya---$haha[1]";

//if (is_array($haha)){
//foreach( $haha as $v ) {
//    echo $v;
//}
//}



$_SESSION['task_id'] = $_POST['task_id'];
$task_id = $_SESSION['task_id'];


$sql_activity_info = "SELECT *
								FROM activity_info
								WHERE activityid = '$task_id'";
								
//$sql_activity_info = "SELECT *
								//FROM activities as a, reminder as r , locations as l
							//	WHERE r.activityid = a.activityid AND r.locationid = l.locationid AND a.activityid = '$task_id'";

								$result_activity_info = mysqli_query(sql_connect(), $sql_activity_info);
 
								$data_activity_info = mysqli_fetch_assoc($result_activity_info);
 
								//$count_activity_attended = $data_activity_attended['total_activities_attended'];
								
								
								$_SESSION['activityname'] = $data_activity_info['activityname'];
								$_SESSION['startdate'] = $data_activity_info['startdate'];
								$_SESSION['starttime'] = $data_activity_info['starttime'];
								$_SESSION['duedate'] = $data_activity_info['duedate'];
								$_SESSION['duetime'] = $data_activity_info['duetime'];
								$_SESSION['participant'] = $data_activity_info['stakeholder'];
								$_SESSION['activity_status'] = $data_activity_info['activity_status'];
								$_SESSION['street_address'] = $data_activity_info['streetaddress'];
								$_SESSION['city'] = $data_activity_info['city'];
								$_SESSION['country'] = $data_activity_info['country'];
								$_SESSION['reminder_date'] = $data_activity_info['targetdate'];
								$_SESSION['reminder_time'] = $data_activity_info['targettime'];
								$_SESSION['reminder_repetition'] = $data_activity_info['repetition'];
								
								$startdate = date ($_SESSION['startdate']);
								
								//echo "$_SESSION[startdate]";


echo "<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">Task Information</h4>
      </div>
      <div class=\"modal-body\">
			
			<form action=\"activityupdate.php\" method = \"post\">
			<table id = \"table_modification\">
			
				<tr>
						
						<td>Task ID</td>
						<td><input type = \"hidden\" id = \"task_id\" name = 'task_id2' value = \"".$_SESSION['task_id']."\"><input type = \"text\" id = \"tak_name\" name = \"task_id\" value = \"".$_SESSION['task_id']."\"disabled></td>
				
				</tr>
				
				<tr>
						
						<td>Task Name</td>
						<td><input type = \"text\" id = \"task_name\" name = \"task_name\" value = \"".$_SESSION['activityname']."\"></td>
				
				</tr>
				
				<tr>
						
						<td>Task Start Date</td>
						<td><input type = \"text\"  id = \"datepicker3\" name = \"start_date\" value = \"".$_SESSION['startdate']."\" class = \"date3\" ></td>
				
				</tr>
				
				<tr>
						
						<td>Task Start TIme</td>
						<td>
						
							<select name=\"start_time\" id=\"time_picker\">
										<option value='' selected=\"selected\">".$_SESSION['starttime']."</option>
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
				
				</tr>
			
				<tr>
						
						<td>Task Due Date</td>
						<td><input type = \"text\" id = \"datepicker4\" name = \"due_date\" value = \"".$_SESSION['duedate']. " \"class = \"date2\"></td>
				
				</tr>
				
				<tr>
						
						<td>Task Due Time</td>
						<td>
						
							<select name=\"due_time\" id=\"time_picker\">
										<option value='  ' selected=\"selected\">".$_SESSION['duetime']."</option>
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
				
				</tr>
				
				<tr>
						
						<td>Street Address</td>
						<td><input type = \"text\"  id = \"street_address\" name = \"street_address\" value = \"".$_SESSION['street_address']."\"></td>
				
				</tr>
				
				<tr>
						
						<td>City</td>
						<td><input type = \"text\"  id = \"city\" name = \"city\" value = \"".$_SESSION['city']."\"></td>
				
				</tr>
				
				<tr>
						
						<td>Country</td>
						<td><input type = \"text\"  id = \"country\" name = \"country\" value = \"".$_SESSION['country']."\"></td>
				
				</tr>
				
				<tr>
						
						<td>Participants</td>
						<td><input type = \"text\"  id = \"participant\" name = \"participant\" value = \"".$_SESSION['participant']."\"></td>
				
				</tr>
				
				<tr>
						
						<td>Reminder Date</td>
						<td><input type = \"text\"  id = \"datepicker5\" name = \"reminder_date\" value = \"".$_SESSION['reminder_date']."\" class = \"date1\"></td>
						
				
				</tr>
				
				<td>Reminder Time</td>
						<td>
						
							<select name=\"reminder_time\" id=\"time_picker\">
										<option value=' ' selected=\"selected\">".$_SESSION['reminder_time']. "</option>
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
						
				<tr>
						
						<td>Reminder Repetition</td>
						<td><input type = \"number\"  id = \"reminder_repetition\" name = \"reminder_repetition\" value = \"".$_SESSION['reminder_repetition']."\"></td>
				
				</tr>
				
				<tr id =\"hid\">
						
						<td>Task Status</td>
						<td><input type = \"text\"  id = \"task_status\" name = \"task_status\" value = \"".$_SESSION['activity_status']."\" disabled></td>
				
				</tr>
			
		
			</table>
			

      </div>
      <div class=\"modal-footer\">
		<input type = \"submit\" value = \"Save changes\" id = \"submit_button2\">
      </div>
	  </form>
    </div>
  </div>
</div>
<script type = \"text/javascript\" > $('#myModal').modal('show')</script>";

echo "<script type = \"text/javascript\" > $('#myModal').modal('show')</script>";




mysqli_close(sql_connect());


 ?>