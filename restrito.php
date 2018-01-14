<?php
session_start();
if (isset($_SESSION['nomeUsuario'])){
    session_destroy();
    header("Location:index.php");
    exit;
}