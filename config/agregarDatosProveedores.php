<?php

    include('config.php');

    $ci = $_POST['ci'];
    $n = $_POST['nombre'];
    $d = $_POST['direccion'];
    $t = $_POST['telefono'];

    $sql = "INSERT INTO proveedores (ciNit,nombre,direccion,telefono) values ('$ci','$n','$d','$t')";
    echo $result = $conexion->query($sql);
?>