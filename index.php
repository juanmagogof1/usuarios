<?php 
    include   "conection.php";

    $allUsers = getAllUsers($mysqli);

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>
        Usuarios
    </title>
</head>
<body>

    <main>
        <nav class="navbar navbar-expand-sm bg-light navbar-light">
          <div class="container-fluid">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="login.php">Iniciar Sesión</a>
              </li>
            </ul>
          </div>
        </nav>
    </main>

    <section class="d-flex justify-content-center">
        <div id="contenido" class="m-2 container-fluid border border-1 border-success  bg-light">
            <div class="d-flex flex-column justify-content-center">
                <div id="titulo">
                    <h2 class="text-center">Listado de usuarios <hr></h2>
                </div>
                <div class="ms-auto">
                    <button type="button" class="btn btn-md btn-success" data-bs-toggle="modal" data-bs-target="#newUser">Nuevo Usuario</button>
                </div>
                    <div class="container mt-3 table-responsive">
                                  
                      <table class="table table-dark table-hover">
                        <thead >
                            <tr class="text-center">
                              <th>#</th>
                              <th>Código</th>
                              <th>Nombre Completo</th>
                              <th>Email</th>
                              <th>Tipo Usuario</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                        <tbody class="text-center">
                            <?php 
                                foreach ($allUsers as $user) {
                                    echo "<tr>";
                                    echo "<td>".$user[0]."</td>";
                                    echo "<td>".$user[1]."</td>";
                                    echo "<td>".$user[7]."</td>";
                                    echo " <td>".$user[9]."</td>";
                                    echo " <td>".$user[12]."</td>";
                                    echo '<td class="d-flex justify-content-between">
                                <div>
                                   <button class="btn btn-sm btn-outline-info">Editar</button> 
                                </div>';
                                echo '<div>';
                                if($user[6]== 1){
                                  echo '<button class="btn btn-sm btn-outline-danger">Inactivar</button>';
                                }else{
                                  echo '<button class="btn btn-sm btn-outline-success">Activar</button>';
                                }
                                
                                echo '</div>';
                                
                            echo "</td>";
                            echo "</tr>";
                                }
                            ?>                          
                        </tbody>
                      </table>
                    </div>

                
            </div>
        </div>
    </section>

    <footer>
        
    </footer>

</body>

<div class="modal " id="newUser">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Nuevo Usuario</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body ">
        <form action="inserts.php" method="POST">
            <input type="hidden" name="option" value="1">
            <div class="d-flex flex-column" id="datosGenerales">
                
                <h5 class="text-center">Datos generales <hr></h5>
                <div class="input-group mb-3">
                  <span class="input-group-text">Nombre Completo</span>
                  <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                  <input type="text" class="form-control" placeholder="Apellidos" name="apellidos">
                </div>

                <div>
                    <div class="input-group">
                        <span class="input-group-text">Email:</span>
                        <input type="text" class="form-control" placeholder="email" name="email">
                        <span class="input-group-text">Teléfono:</span>
                        <input type="text" class="form-control" placeholder="ej. 3141234567" name="phone">
                    </div>    
                </div>
            </div>
            <hr>    
            <div class="mt-1 d-flex flex-column" id="datosUsuario">
                    <h5 class="text-center">Datos de usuario <hr></h5>
                    <div class="d-flex justify-content-between">
                        <div class="input-group mb-3">
                          <span class="input-group-text">Nickname</span>
                          <input type="text" class="form-control" placeholder="Nombre de Usuario" name="nickname">
                        </div>
                        <div class="input-group mb-3">
                          <span class="input-group-text">Password</span>
                          <input type="password" class="form-control" placeholder="Contraseña" name="pass">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="input-group mb-3 w-50">
                          <span class="input-group-text ">Tipo de usuario:</span>
                          <select name="userType" class="form-control">
                              <?php 
                              $allTypes = getAllTypes($mysqli);

                              echo "<option value='0'>Selecciona una opción</option>";

                              foreach($allTypes as $type){
                                echo "<option value='".$type['userTypeId']."' title='".$type['userTypeId']."'>".$type['userType']."</option>";

                              }

                              /*
                                EXPLICACIÓN PASO A PASO

                                Mostrar la Opción por Defecto:

                                -> echo "<option value='0'>Selecciona una opción</option>";
                                    Esta línea de código genera una opción por defecto en un elemento <select> de HTML.
                                    La opción tiene un valor de 0 y el texto mostrado es "Selecciona una opción".
                                
                                Iterar sobre un Array con foreach:

                                -> foreach($allTypes as $type){ ... }
                                    Este bucle foreach recorre cada elemento del array $allTypes.
                                    Cada elemento del array se almacena temporalmente en la variable $type en cada iteración.
                               
                                Generar Opciones Dinámicamente:

                                -> echo "<option value='".$type['userTypeId']."' title='".$type['userTypeId']."'>".$type['userType']."</option>";
                                    Esta línea genera dinámicamente una opción (<option>) para un elemento <select> de HTML.
                                
                                -> value='".$type['userTypeId']."': El atributo value de la opción se establece 
                                   en el valor de userTypeId del array $type.
                                -> title='".$type['userTypeId']."': El atributo title de la opción se establece 
                                   en el valor de userTypeId del array $type. Esto suele usarse para proporcionar información adicional cuando el usuario pasa el cursor sobre la opción.
                                -> ".$type['userType'].": El texto mostrado de la opción es el valor de 
                                   userType del array $type.

                              */

                              ?>
                          </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Departamento:</span>
                            <input type="text" class="form-control" placeholder="Ej. Sistemas" name="departamento">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Grupo:</span>
                            <input type="text" class="form-control" placeholder="Ej. 3TID1" name="grupo">
                        </div>    
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="input-group mb-3">
                            <span class="input-group-text">Carrera:</span>
                            <input type="text" class="form-control" placeholder="Ej. TSU en TID" name="carrera">
                        </div>
                           
                    </div>
                </div>
            </div>
        

      <!-- Modal footer -->
      <div class="modal-footer d-flex justify-content-between">
        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Enviar</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

</html>