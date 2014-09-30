<?php 

include 'functions.php';

//function sql_error($sqlConnection,$file,$line)
//{
//	echo "MySQL Connection Problem at: ".$file." line:".$line;
//}

session_start();


//save username as the flag to show that restrict the access of certain pages if the person has not logged in yet
//if(!isset($_SESSION['username'])){

	$_SESSION['username']= $_POST['username'];
	//echo "Hi, ". "$username";
//}


//flag to check if functions.php has already been called
if(!isset($_SESSION['session_include'])){

	$_SESSION['session_include']= 1;

}


//save username in a php variable and use for queries
$username = $_SESSION['username'];


if(empty($_POST['username'])  || empty($_POST['password'])){



	modal_error();



}
else{

	//get user infromation
	$sql = " SELECT * FROM users Where username = '$_POST[username]' ";
	//$sql = " SELECT * FROM users Where username = '".$username."'";


	$result = mysqli_query(sql_connect(), $sql);
	
	//$row = mysqli_fetch_array($result)

	if(empty($result)){

		modal_error_username();



	}
	else {

		while($row = mysqli_fetch_array($result)){

			if($row['passw'] === $_POST['password']){
	
				include 'account.php';
		
				break;
		
	
			}
			else{
		
			include 'index.php';
			//echo "<div id = \"error_mess\">Wrong password! </div>";
	
		}

	
	}


}




}


mysqli_close(sql_connect());

//session_destroy();


?>