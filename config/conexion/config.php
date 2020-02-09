<?php

    class conectar{
        private $host = "localhost";
        private $user =  "root";
        private $pass = "";
        private $db = "restaurante";

        public function conexion(){
            $ejecutar = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
            return $ejecutar;
        }
    }
    $obj = new conectar();
    if($obj->conexion()){
        echo "exito";
    }else{
        echo "no conectado";
    }
?>