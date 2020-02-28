<?php
require_once('conexion/config.php');
require_once('login/configLogin.php');
session_start();

$c = new Logeo();


if (isset($_POST['btniniciar'])) {
  $user = $_POST['txtusario'];
  $pass = $_POST['txtpassword'];
  
  $sql = "SELECT * FROM usuarios WHERE User = '$user' AND Pass = '$pass'";
  $dato = $c->iniciarSesion($sql);
//   $ejecutar = $conexion->query($sql);
//   $fila = $ejecutar->fetch_row();

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