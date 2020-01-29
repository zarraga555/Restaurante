<?php
session_start();
if (empty($_SESSION['user'])) {
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lepetit - Dashboard</title>
  <link rel="icon" href="img/favicon-96x96.png" type="image/png">
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="js/funciones.js"></script>
 
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="css/estilos.css" rel="stylesheet">

</head>

<body>



  <div class="wrapper">
    <div class="slid">
      <img src="img/favicon-96x96.png" alt="">
      <ul class="sidebar">

        <li><a href="admin.php"><i class="fas fa-home"></i>Dashboard</a></li>
        <li><a href="user.php"><i class="fas fa-user"></i>Usuarios</a></li>
        <li><a href="#"><i class="fas fa-address-card"></i>Clientes</a></li>
        <li><a href="#"><i class="fas fa-boxes"></i>Almacen</a></li>
        <li><a href="proveedores.php"><i class="fas fa-parachute-box"></i>Proveedores</a></li>
      </ul>
    </div>
    <div class="main_content">
      <nav class="header">
        <ul class="navTop">
          <li><span><?php
                    echo " $_SESSION[user]";
                    ?></span></li>
          <div class="separador"></div>
          <li>
            <form action="admin.php" method="post">
              <button name="txtSalir" class="btn btn-primary btn-user btn-block" >Cerrar Session</button>
            </form>
          </li>
        </ul>
      </nav>
      <!--Esta etiqueta es posible que me la lleve a otro lado-->
      <div class="info">

      
