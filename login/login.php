<?php

  require_once "../server/conexao.php";

  if(isset($_POST['usuario'])){

    $usuario = utf8_decode($_POST['usuario']);
    $senha = sha1($_POST['senha']);

    $query="SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";
    $result = mysqli_query($mysqli,$query);

    $row = mysqli_fetch_array($result);

    $retorno = array();

    if(mysqli_num_rows($result)==0){
        $retorno["login"]=0;
    }else{
      $retorno["login"]=1;  //Responde sucesso
      if(!isset($_SESSION)) {   //verifica se há sessão aberta
        session_start();   //Inicia seção
        //Abrindo seções
        $_SESSION['usuarioID'] = $row['id'];
        $_SESSION['nomeUsuario'] = $row['usuario'];
        $_SESSION['logado'] = true;
    }
    }
    echo json_encode($retorno);
  }
