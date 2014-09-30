<?php 

//include 'settingsmodal.php';
include 'account.php';

//firstname = '$_POST[first_name]', lastname = '$_POST[last_name]', email = '$_POST[email]', passw = '$_POST[password]')

//echo "$_SESSION[useridsettings]";

if(!empty($_POST['password'])){

$sql_edit_users = "update users
								set firstname = '$_POST[first_name]', lastname = '$_POST[last_name]', email = '$_POST[email]', passw = '$_POST[password]'
								where userid = '$_SESSION[useridsettings]'";

}
else{

$sql_edit_users = "update users
								set firstname = '$_POST[first_name]', lastname = '$_POST[last_name]', email = '$_POST[email]'
								where userid = '$_SESSION[useridsettings]'";


}

//$sql_edit_users = "update users
		//						set firstname = '$_POST[first_name]', lastname = '$_POST[last_name]', email = '$_POST[email]'
						//		where userid = '$_SESSION[useridsettings]'";
								
								//$sql_user_id = "SELECT userid  from users where username = 'arnoldbocor'";
								
								//mysqli_query(sql_connect(), $sql_edit_users);
	if(!mysqli_query(sql_connect(), $sql_edit_users)){

		die ('Could not connect to the database server' . mysqli_connect_error());
	
	}
	
	
	//echo "<script type = \"text/javascript\" > window.location = window.location.account.php;</script>";
	
	echo "<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">Settings updates notification&#9787;</h4>
      </div>
      <div class=\"modal-body\">
		<p> Your information has just been updated! You will be able to see the changes after a page refresh!</p>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
      </div>
    </div>
  </div>
</div>

";

echo "<script type = \"text/javascript\" > $('#myModal').modal('show')</script>";

	//include 'account.php';
	
	mysqli_close(sql_connect());
	
	//include 'account.php';
	

 ?>