<?php
session_start();
if(!isset($_SESSION) || !isset($_SESSION['nomeUsuario'])) {
  header('location: ./');
}
?>

<h1>Home</h1>
<p>Acesso restrito.</p>
