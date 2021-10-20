<?php
    session_start();

    //Eliminando os índices das super globais para que se encerre a sessão
    unset($_SESSION['usuario']);
    unset($_SESSION['email']);

    header('location: index.php?logout=1');

?>