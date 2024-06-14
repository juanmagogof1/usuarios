<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dblogin";

// Crear una conexión a la base de datos
$mysqli = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Establecer el juego de caracteres a UTF-8 (opcional)
$mysqli->set_charset("utf8");

function getAllUsers($con){
    $query = "SELECT * FROM vwallusersdata"; //String de consulta a BD
    $result = $con->query($query); 
    /*
        $result.-     Variable que va a almacenar el array de resultado de la consulta
                      datos generales, cantidad de columnas y de registros, en esta variable 
                      se almacena la respuesta completa del servidor MySQL
        $con.-        Variable que almacena los datos de la conexión para entablar comunicación
                      con el servidor de Bases de Datos.
        $con->query.- Función de mysqli para enviar una consulta el gestor de BD
                      (https://www.php.net/manual/es/function.mysql-query.php), se 
                      requiere enviar como parámetro la cadena con la consulta a enviar
    */
    $row = $result->fetch_all();
    /*
        $row.-                  Variable que va a almacenar el array de resultado de registros y datos 
                                de respuesta de la BD
        $result->fetch_all().-  Función de mysqli para Obtener todas las filas en un array 
                                asociativo, numérico, o en ambos
                                (https://www.php.net/manual/es/mysqli-result.fetch-all.php), se 
        */
    return $row;
}


function getAllTypes($con){
    $query = "SELECT * FROM catusertypes";
    $result = $con->query($query);
       $rows = array();//Array que almacena los registros

       // Verifica si la consulta devuelve resultados
       if ($result->num_rows > 0) {
           // Recorre cada fila del resultado y añádela al array $rows
           while($row = $result->fetch_assoc()) {
               $rows[] = $row;
           }
       }
       
       return $rows;
}

function getAllUsers2($con){
    $query = "SELECT * FROM vwallusersdata";
    $result = $con->query($query);
    $row = $result->fetch_assoc();
    return $row;
}
function getAllUsers3($con){
    $query = "SELECT * FROM vwallusersdata";
    $result = $con->query($query);
    $row = $result->fetch_row();
    return $row;
}
function getAllUsers4($con){
    $query = "SELECT * FROM vwallusersdata";
    $result = $con->query($query);
    $row = $result->fetch_array();
    return $row;
}

?>