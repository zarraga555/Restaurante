<?php require_once "view/superior.php"?>

<div class="">
    <div class="title-container">
    <h1>Usuarios</h1>
    </div>
</div>

<?php
    $salir=$_POST['txtSalir'];
    if(isset($salir)){
        session_destroy();
        header('location:index.php');
    }
?>
<?php require_once "view/inferior.php"?>