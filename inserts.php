<?php 
	include 'conection.php';
	print_r($_POST);

	$option =  $_POST['option'];

	if($option == 1){
		$query = "INSERT INTO catpersons(personName, personLName, personEmail, personPhone) VALUES ('".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['email']."','".$_POST['phone']."')";
		/*
			EXPLICACIÓN PASO A PASO
			
			Inserción en la Base de Datos:

			-> INSERT INTO catpersons es una instrucción SQL que indica que queremos agregar (insertar) un nuevo 
			   registro en la tabla llamada catpersons.
			
			Especificar las Columnas:
			-> (personName, personLName, personEmail, personPhone) especifica las columnas en las que vamos a 
			   insertar los datos. Estas son las columnas de la tabla catpersons donde queremos guardar la información.

			Valores a Insertar:
			->VALUES indica que vamos a proporcionar los valores para estas columnas.
			
			Concatenación de Variables PHP:

				-> '".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['email']."','".$_POST['phone']."' es 
					una manera de concatenar los valores enviados desde un formulario HTML usando el método POST.
				
				-> $_POST['nombre'] accede al valor ingresado en el formulario en el campo llamado nombre.
				
				-> Similarmente, $_POST['apellidos'], $_POST['email'], y $_POST['phone'] acceden a los valores de 
				   los campos apellidos, email, y phone, respectivamente.
			
			Nota: Los valores se concatenan en una cadena de texto que forma parte de la instrucción SQL.
		*/
			$result = $mysqli->query($query);
			if($result){
				$p = 1;
			}else{
				$p = 0;
			}
		$id = $mysqli->insert_id; //Esta línea obtiene el ID generado automáticamente 
								  //por la base de datos para la última fila que se ha insertado.
		echo "ID insertada:" . $id;
		$query2 = "INSERT INTO catusers(fk_personId, fk_UserTypeId, cveUser, userPass, departament, groupStdnt, career, dependence) VALUES ('".$id."','".$_POST['userType']."','".$_POST['nickname']."',md5('".$_POST['pass']."'),'".$_POST['departamento']."','".$_POST['grupo']."','".$_POST['carrera']."','UTeM')";

		/*
			Uso de Variables:
				->'".$id."' usa el ID del último registro insertado en la tabla catpersons, almacenado 
				   previamente en la variable $id.
				->'".$_POST['userType']."','".$_POST['nickname']."','".$_POST['pass']."','".$_POST['departamento'
				  ]."','".$_POST['grupo']."','".$_POST['carrera']."','UTeM' usa los valores enviados desde un formulario HTML utilizando el método POST para llenar las otras columnas.
		*/
		$result2 = $mysqli->query($query2);
		if($result2 && $p){
			echo "<br>Datos enviados correctamente<hr><br>";
			header("Location:index.php");

		}


	}

 ?>