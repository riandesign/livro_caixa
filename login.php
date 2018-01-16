<?php
    require_once "conexao.php";

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $query="SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
    $result = mysqli_query($mysqli,$query);
    if (!$result) {
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
}
    $row = mysqli_fetch_array($result);

    if(mysqli_num_rows($result)==0){
        echo 0;
    }else{
        echo 1;	                 //Responde sucesso
        if(!isset($_SESSION))   //verifica se há sessão aberta
            session_start();   //Inicia seção
        //Abrindo seções
        $_SESSION['usuarioID']=$row['id'];
        $_SESSION['nomeUsuario']=$row['nome'];
        exit;
    }

