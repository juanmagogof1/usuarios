<?php 

	include 'conection.php';
	

	print_r($_POST);

	$user =  $_POST['nickname'];
	//$pass = md5($_POST['password']);
	$pass = $_POST['password'];

	$dbUserData = getUser($mysqli);

	if($user == $dbUserData['userCode']){
		if($pass == $dbUserData['Pass']){
			$userData = userData($dbUser['uId']);
		}
	}

	function getUser($con){
	    $query = "SELECT * FROM usersactive";
	    $result = $con->query($query);
	    $row = $result->fetch_assoc();
	    return $row;
	}

	function userData($id){
		echo $id;
		$query = "SELECT * FROM vwallusersdata WHERE user_id = $id";
		echo $query;
		/*$result = $con->query($query);
		$row = $result->fetch_assoc();
		return $row;*/

	}

?>