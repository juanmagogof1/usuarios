<?php 

	session_start();
	if(!isset($_SESSION['userData'])){
		echo "No tienes acceso a esta vista!...";
		header("location:login.php");

	}else{

		$userData = $_SESSION['userData'];
		print_r($userData);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>BiblioTech: 
 		<?php 
			echo $userData['userType'];
	 	?>
	 	
	 </title>
	 <!-- Latest compiled and minified CSS -->
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

	 
 </head>
 <body>
 	<section id="menu">
 		<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
 		  <div class="container-fluid">
 		    <a class="navbar-brand" href="#"><?php echo $userData['first_name'] . " ". $userData['last_name']; ?></a>
 		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
 		      <span class="navbar-toggler-icon"></span>
 		    </button>
 		    <div class="collapse navbar-collapse" id="mynavbar">
 		      <ul class="navbar-nav me-auto">
 		        <!--<li class="nav-item">
 		          <a class="nav-link" href="#">Link</a>
 		        </li>-->
 		      </ul>
 		      <form class="d-flex" action="logoff.php" method="POST">
 		        <button class="btn btn-dark" type="submit">Cerrar Sesión</button>
 		      </form>
 		    </div>
 		  </div>
 		</nav>
 	</section>
 	<section id="principal">
 		<div id="titleUser" class="d-flex justify-content-center">
 			<div class="p-2 border border-1 border-secondary">
 		
 		<?php 

 			switch($userData['userTypeId']){
 				case 1:
 					echo "<h1> Bienvenido Super Administrador  <hr></h1>";
 					break;
 				case 2:
 					echo "<h1> Bienvenido Administrador Biblioteca  <hr></h1>";
 					break;
 				case 3:
 					echo "<h1> Bienvenido Administrativo  <hr></h1>";
 					break;
 				case 4:
 					echo "<h1> Bienvenido Docente  <hr></h1>";
 					break;
 				case 5:
 					echo "<h1> Bienvenido Alumno  <hr></h1>";
 					break;
 				case 6:
 					echo "<h1> Bienvenido Externo  <hr></h1>";
 					break;
 			} 
 		?>
 			</div>
 		</div>
 	</section>
 	<footer>
 		
 	</footer>
 </body>
 <!-- Latest compiled JavaScript -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 </html>
 <?php 
 	}
  ?>