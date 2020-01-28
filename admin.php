
<?php require_once "view/superior.php"?>

<div>
    
hola
    
</div>

<?php
    $salir=$_POST['txtSalir'];
    if(isset($salir)){
        session_destroy();
        header('location:index.php');
    }
?>
<?php require_once "view/inferior.php"?>
