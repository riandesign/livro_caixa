<?php
session_start(); 	//A seção deve ser iniciada em todas as páginas
if (!isset($_SESSION) || !isset($_SESSION['usuarioID'])) {		//Verifica se há seções
    session_destroy();						//Destroi a seção por segurança
    header("Location: index.php"); //Redireciona o visitante para login
    exit;
}
?>