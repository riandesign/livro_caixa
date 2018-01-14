<?php
    include_once ('conexao.php');

    $login = $_POST['login'];
    $senha = $_POST['senha'];

    echo $login,$senha;

    $query = "select * from  usuarios WHERE usuario='".$login."' and senha='".sha1($senha)."'";
    $resultados = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    $res = mysqli_fetch_array($resultados);
    if (@mysqli_num_rows($resultados) == 0){
        echo 0;
    }else {
        echo 1;
        if (isset($_SESSION)) ;
        session_start();
        $_SESSION['usuarioID']=$res['id'];
        $_SESSION['nomeUsuario']=$res['usuario'];
        exit;
    }