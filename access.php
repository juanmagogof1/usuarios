<?php 

	include 'conection.php';
	
	$user =  $_POST['nickname'];
	$pass = md5($_POST['password']);
	//$pass = $_POST['password'];
/*
1-Super Administrador
2-Administrador Biblioteca
3-Administrativo
4-Docente
5-Alumno
6-Externo

UPDATE `catusers` SET userPass = md5(userPass) WHERE 1;
*/
	$dbUserData = getUser($mysqli,$user,$pass);
	if(isset($dbUserData['uId'])){
		$userData = userData($mysqli,$dbUserData['uId']);
		if(isset($userData['userTypeId'])){
			session_start();
			$_SESSION['userData'] = $userData;
			print_r($userData);
			$userType = $userData['userType'];
			switch ($userData['userTypeId']) {
				case 1:
					//echo "<h1> Bienvenido Super Administrador";
					header('Location: dashboardUser.php');
					die();				
					//break;
				case 2:
					header('Location: dashboardUser.php');
					die();
					//echo "<h1> Bienvenido Administrador Biblioteca";
					//break;
				case 3:
					header('Location: dashboardUser.php');
					die();
					//echo "<h1> Bienvenido Administrativo";
					//break;
				case 4:
					header('Location: dashboardUser.php');
					die();
					//echo "<h1> Bienvenido Docente";
					//break;
				case 5:
					header('Location: dashboardUser.php');
					die();
					//echo "<h1> Bienvenido Alumno";
					//break;
				case 6:
					header('Location: dashboardUser.php');
					die();
					//echo "<h1> Bienvenido Externo";
					//break;
				
				default:
					echo "No existes como usuario";
					break;
			}
			
		}else{
			$error = ['msg' => 'No existe el tipo de usuario en el sistema...'];
			return $error;
		}
	}
	

	function getUser($con,$user,$pass){
	    $query = "SELECT * FROM usersactive where userCode = '$user' AND Pass = '$pass'";
	    $result = $con->query($query);
	    if($result->num_rows > 0){
	    	$row = $result->fetch_assoc();
	    	return $row;
	    }else{
	        $error = ['msg' => 'No se encuentra el usuario'];
	        return $error;
	    }
	}

	function userData($con,$id){
		$query = "SELECT * FROM vwallusersdata WHERE user_id = $id";
		$result = $con->query($query);
		if($result->num_rows > 0){
			$row = $result->fetch_assoc();
			return $row;
		}else{
		    $error = ['msg' => 'No hay datos del usuario'];
		    return $error;
		}

	}

?>