<?php require_once "view/superior.php" ?>

<div class="">
    <div class="title-container">
        <h1>Proveedores</h1>
    </div>
    <div class="buton-container">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Agregar Proveedor
        </button>

        <!-- Modal Agregar datos-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Proveedor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="proveedores.php" method="post">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="ci">C.I / NIT</label>
                                <input type="text" class="form-control" name="ci">
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <input type="text" class="form-control" name="direccion">
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono</label>
                                <input type="number" class="form-control" name="telefono">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" name="btnGuardar">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Modificar datos-->
    <div class="modal fade" id="exampleModalM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="proveedores.php" method="post">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="ci">C.I / NIT</label>
                            <input type="text" class="form-control" name="ciM" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombreM">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" name="direccionM">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" name="telefonoM">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btnAcciones btn-success" name="btnActualizar">Guardar</button>
                    </div>
                </form>
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
                Datos ya ingresados.
            </div>
        </div>
    </div>

    <div aria-live="polite" aria-atomic="true">
        <div class="toast" id="toastCorrecto" data-delay="2000" style="background-color:green; position: absolute; top: 100px; right: 50px; border-radius:10rem; color:white;">
            <div class="toast-body">
                Datos ingresados correctamente.
            </div>
        </div>
    </div>

    <?php
    include('config/config.php');
    $ci = $_POST['ci'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $btnGuardar = $_POST['btnGuardar'];

    if(isset($btnGuardar)){
        $sql = "INSERT INTO  proveedores VALUES ('$ci','$nombre','$direccion','$telefono')";
        
        if (empty($ci) || empty($nombre) || empty($direccion) || empty($telefono)){
            echo "<script>$('#toast').toast('show');</script>";
        }else{
            if($ejecutar = $conexion->query($sql)){
                echo "<script>('#toastCorrecto').toast('show');</script>";
            }else{
                echo "<script>('#toastError').toast('show');</script>";
            }
        }
    }
    
  
    ?>
    <div>
        <table id="tabla" class="table  table-condensed">
            <tr>
                <td>CI / NIT</td>
                <td>Nombre</td>
                <td>Direccion</td>
                <td>Telefono</td>
                <td>Acciones</td>
            </tr>
            <?php
            include('config/config.php');
            $sql = "SELECT ciNit, nombre, direccion, telefono FROM proveedores";
            $ejecutar = $conexion->query($sql);
            while ($ver = mysqli_fetch_row($ejecutar)) {


            ?>
                <tr>
                    <td><?php echo $ver[0] ?></td>
                    <td><?php echo $ver[1] ?></td>
                    <td><?php echo $ver[2] ?></td>
                    <td><?php echo $ver[3] ?></td>
                    <td>
                        <button type="button" class="btnAcciones btn-success" data-toggle="modal" data-target="#exampleModalM">Editar</button>
                        <button type="button" class="btnAcciones btn-danger">Eliminar</button>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>

<?php
$salir = $_POST['txtSalir'];
if (isset($salir)) {
    session_destroy();
    header('location:index.php');
}
?>
<?php require_once "view/inferior.php" ?>