<?php 



include 'account.php';

$_SESSION['useridsettings'] = $_SESSION['userid'];


echo "<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">Settings</h4>
      </div>
      <div class=\"modal-body\">
			
			<form action=\"settingsedit.php\" method= \"post\">
			<table id = \"table_modification\">
			
				<tr>
						
						<td>Username</td>
						<td><input type = \"text\" id = \"username\" name = \"username\" value = \"".$_SESSION['username']."\" disabled></td>
				
				</tr>
				
				<tr>
						
						<td>First Name</td>
						<td><input type = \"text\" id = \"first_name\" name = \"first_name\" value = \"".$_SESSION['first_name']."\"></td>
				
				</tr>
				
				<tr>
						
						<td>Last Name</td>
						<td><input type = \"text\"  id = \"last_name\" name = \"last_name\" value = \"".$_SESSION['last_name']."\"></td>
				
				</tr>
				
				<tr>
						
						<td>Email</td>
						<td><input type = \"email\" id = \"email\" name = \"email\" value = \"".$_SESSION['email']."\"></td>
				
				</tr>
			
				<tr>
						
						<td>New Password</td>
						<td><input type = \"password\" name = \"password\" id = \"password\" name = \"password\" placeholder = \"*******\"></td>
				
				</tr>
				
				<tr>
						
						<td>Comfirm Password</td>
						<td><input type = \"password\"  id = \"cpassword\" placeholder = \"*******\"></td>
				
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










 ?>