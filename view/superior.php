<?php
session_start();
if (empty($_SESSION['user'])) {
  header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lepetit - Dashboard</title>
  <link rel="icon" href="img/favicon-96x96.png" type="image/png">
  <link href="css/style.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

</head>

<body>



  <div class="wrapper">
    <div class="slid">
      <img src="img/favicon-96x96.png" alt="">
      <ul class="sidebar">

        <li><a href="#"><i class="fas fa-home"></i>Dashboard</a></li>
        <li><a href="#"><i class="fas fa-user"></i>Usuarios</a></li>
        <li><a href="#"><i class="fas fa-address-card"></i>Empleados</a></li>
        <li><a href="#"><i class="fas fa-boxes"></i>Almacen</a></li>
        <li><a href="#"><i class="fas fa-parachute-box"></i>Proveedores</a></li>
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
      <div class="info">

      </div>
