<?php 



//if(!isset($_SESSION['session_include'])){

include 'functions.php';

//}

//function sql_error($sqlConnection,$file,$line)
//{
//	echo "MySQL Connection Problem at: ".$file." line:".$line;
//}

session_start();

//flag to check if functions.php has already been called
if(!isset($_SESSION['session_include'])){

	$_SESSION['session_include']= 1;

}

$_SESSION['username']= $_POST['username'];
$_SESSION['first_name']= $_POST['first_name'];
$_SESSION['last_name']= $_POST['last_name'];
$_SESSION['email']= $_POST['email'];
$_SESSION['password']= $_POST['password'];
$_SESSION['cpassword']= $_POST['cpassword'];

$username = $_SESSION['username'];


if(empty($_SESSION['username'])  || empty($_SESSION['first_name'])  || empty($_SESSION['last_name'])  || empty($_SESSION['email'])  || empty($_SESSION['password'])  || empty($_SESSION['cpassword']) ){


modal_error();



//$fill['username'] = $_SESSION['password'];
//$fill['username'] = $_SESSION['cpassword'];



//echo "<script type = \"text/javascript\"> alert (\"Please fill all the fields.\")</script>";

}
else {

			// get count of users in table in order to determine the userid
$sql_count = "SELECT DISTINCT count(*) as total from users";

 $result = mysqli_query(sql_connect(), $sql_count);
 
 $data = mysqli_fetch_assoc($result);
 
 $count = $data['total'];
 
 if($count == 0){
 
	$_SESSION['userid']="U"."0";
 
 }
 else{
 
	$_SESSION['userid']="U"."$count";
 
 }

$userid = $_SESSION['userid'];



//add user data to table.
$sql = " INSERT INTO users(userid, username, firstname, lastname, email, passw)
			VALUES('$userid', '$_POST[username]', '$_POST[first_name]', '$_POST[last_name]', '$_POST[email]', '$_POST[password]') ";
			
			//$sql = " INSERT INTO Users(userid, username, firstname, lastname, email, passw)
			//VALUES(2, 'arnocboc', 'Acrnold', 'Zouncdi', 'ar@yahcoo.fr', 'pacpa') ";
			
//mysqli_query(sql_connect(), $sql);

if(!mysqli_query(sql_connect(), $sql)){

	die ('Could not connect to the database server' . mysqli_connect_error());
	
}

//include 'account.php';

include 'registrationsuccess.php';



}




mysqli_close(sql_connect());


session_destroy();


?>