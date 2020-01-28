<?php
    session_start();
    if(empty($_SESSION['user'])){
        header('location:index.php');
    }
?>
<?php require_once "view/superior.php"?>

<div>
    <?php
        echo "Bienvido $_SESSION[user]";
    ?>
    <form action="admin.php" method="post">

    <button name="txtSalir">salir</button>
    </form>
    
</div>

<?php
    $salir=$_POST['txtSalir'];
    if(isset($salir)){
        session_destroy();
        header('location:index.php');
    }
?>
<?php require_once "view/inferior.php"?>
