<?php
    class Logeo {
        public function iniciarSesion($sql){
            $c = new conectar();
            $con = $c -> conexion();

            $result = mysqli_query($con, $sql);
            return mysqli_fetch_row($result);
        }
    }
?>