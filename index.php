<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Iniciar Sesion</title>
  <link rel="icon" href="img/favicon-96x96.png" type="image/png">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login.css">

</head>

<body>
  <header>
    <div class="container-header">
      <div class="container-logo-title">
        <a><img src="img/logoTransparente.png" alt=""></a>

      </div>
    </div>
  </header>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-6 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- form login -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4 text-title">Bienvenido</h1>
                  </div>
                  <form class="user" method="post" action="index.php">
                    <div class="form-group">
                      <input type="text" name="txtusario" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                      <input type="password" name="txtpassword" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contaseña">
                    </div>
                    <button name="btniniciar" class="btn btn-primary btn-user btn-block">Iniciar Sesion</button>
                  </form>
                  <hr>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div aria-live="polite" aria-atomic="true">
    <div class="toast" id="toast" data-delay="2000" style="background-color:red; position: absolute; top: 100px; right: 50px; border-radius:10rem; color:white;">
      <div class="toast-body">
        Complete los campos vacios.
      </div>
    </div>
  </div>

  <div aria-live="polite" aria-atomic="true">
    <div class="toast" id="toastError" data-delay="2000" style="background-color:red; position: absolute; top: 100px; right: 50px; border-radius:10rem; color:white;">
      <div class="toast-body">
        Usuario o Contraseña incorrecta.
      </div>
    </div>
  </div>
</body>

</html>
<?php
include('config/config.php');
session_start();
$user = $_POST['txtusario'];
$pass = $_POST['txtpassword'];
$iniciar = $_POST['btniniciar'];

if (isset($iniciar)) {
  $sql = "SELECT * FROM usuarios WHERE User = '$user' AND Pass = '$pass'";
  $ejecutar = $conexion->query($sql);
  $fila = $ejecutar->fetch_row();

  if (empty($user) || empty($pass)) {
    echo "<script>$('#toast').toast('show');</script>";
  } else if ($fila[0] == $user && $fila[1] == $pass && $fila[2] == "Administrador") {
    $_SESSION['user']=$user;
    header('location:admin.php');
  } elseif ($fila[0] == $user && $fila[1] == $pass && $fila[2] == "Cajero") {
    $_SESSION['user']=$user;
    header('location:cajero.php');
  } elseif ($fila[0] == $user && $fila[1] == $pass && $fila[2] == "Contador") {
    $_SESSION['user']=$user;
    header('location:contador.php');
  } else {
    echo "<script>('#toastError').toast('show');</script>";
  }
}
?>