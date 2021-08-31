<?php
    session_start();
    if(!isset($_SESSION['id_usuario']))
    {
        header("location: index.php");
        exit;
    }
?>


<h1 style="text-align: center">SEJA BEM VINDO</h1>