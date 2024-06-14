<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title id="titulo"></title>


  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


</head>

<style type="text/css">
  #acceso{
    margin-top: 5%;
  }
  .logo{
    width: 350px;
    height: 200px;
  }
  #principal{
    border-radius: 2%;
    height: 80vh;
    min-height: 40vh;
  }
  body, footer{
    position: absolute;
    width : 100%;

  }
  footer{
    bottom: 0;
  }
</style>

<body class="container-fluid bg-light">
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
  <div  id="principal" >
    <div class="d-flex bg-light flex-column text-center mb-3" id="acceso" >
      <div class="d-flex justify-content-center ">
        <h2 class="p-2" title=" Bienvenido a Usuarios"></h2>
      </div>
      

      <hr>
        <div class="d-flex flex-wrap justify-content-center">
            <div class="login-panel panel panel-primary">
                  
                <div class="panel-body ">
                    <form method="POST" action="access.php">
                          <div class="d-flex flex-wrap flex-column justify-content-center align-items-center align-content-center">
                              <div class="form-group text-center">
                                  <input class="form-control" placeholder="Usuario" type="text" name="nickname" required>
                              </div>
                              <div class="form-group text-center">
                                  <input class="form-control" placeholder="Contraseña" type="password" name="password" required>
                              </div>
                              <button type="submit" class="btn btn-md btn-primary btn-block text-center"><span class="fa fa-log-in"></span> Login</button>
                          </div>
                            
                    </form>
                </div>
                
              </div>
            
        </div>
      </div>
    </div>
  <footer class="d-flex justify-content-center">
    <div class="p-2">
      <p>
        <strong>UTeM </strong><br>
        <u>Derechos Reservados &copy; 2023</u>
      </p>
    </div>
  </footer>
</body>
</html>
