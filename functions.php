<?php 

//function sql_error($sqlConnection,$file,$line)
//{
//	echo "MySQL Connection Problem at: ".$file." line:".$line;
//}

function sql_connect(){
	$host="127.0.0.1";
	$port=3306;
	$socket="";
	$user="";
	$password="";
	$dbname="";

	$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());
	return $con;
}


function check_in_session(){

if(!isset($_SESSION)){


	session_start();
	if(!isset($_SESSION['username'])){
	session_unset();
	session_destroy();
	include 'index.php';
	exit;

	}

}
else{

	if(!isset($_SESSION['username'])){
	session_unset();
	session_destroy();
	include 'index.php';
	exit;

	}


}


}


function modal_error(){

	include 'index.php';

echo "<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">Something has gone wrong! &#9787;</h4>
      </div>
      <div class=\"modal-body\">
		<p> All the fields must be filled! </p>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
      </div>
    </div>
  </div>
</div>
<script type = \"text/javascript\" > $('#myModal').modal('show')</script>";

echo "<script type = \"text/javascript\" > $('#myModal').modal('show')</script>";

}


function modal_error_username(){

	include 'index.php';

echo "<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">Something has gone wrong! &#9787;</h4>
      </div>
      <div class=\"modal-body\">
		<p> The username is not correct. Please log in again! </p>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
      </div>
    </div>
  </div>
</div>
<script type = \"text/javascript\" > $('#myModal').modal('show')</script>";

echo "<script type = \"text/javascript\" > $('#myModal').modal('show')</script>";

}


function row_addition_success(){

	include 'account.php';

echo "<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">Hooray! &#9787;</h4>
      </div>
      <div class=\"modal-body\">
		<p>You have successfully added one activity to your list.</p>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
      </div>
    </div>
  </div>
</div>
<script type = \"text/javascript\" > $('#myModal').modal('show')</script>";

echo "<script type = \"text/javascript\" > $('#myModal').modal('show')</script>";

}


function activity_error(){

	include 'account.php';

echo "<div class=\"modal fade\" id=\"myModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
  <div class=\"modal-dialog\">
    <div class=\"modal-content\">
      <div class=\"modal-header\">
        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
        <h4 class=\"modal-title\" id=\"myModalLabel\">Something has gone wrong! &#9787;</h4>
      </div>
      <div class=\"modal-body\">
		<p> All the fields must be filled! </p>
      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>
      </div>
    </div>
  </div>
</div>
<script type = \"text/javascript\" > $('#myModal').modal('show')</script>";

echo "<script type = \"text/javascript\" > $('#myModal').modal('show')</script>";

}



?>