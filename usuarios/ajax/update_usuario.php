<?php
  $retorno = array();
if (!isset($_GET['id'])) {
}else{
  require_once "../../server/conexao.php";

  $nome = $_POST['modal_nome'];
  $usuario = $_POST['modal_usuario'];
  $senha = sha1($_POST['modal_senha']);
  $id = $_GET['id'];

  $query = "UPDATE usuarios SET nome = '$nome', usuario = '$usuario', senha = '$senha' WHERE id = '$id'";

    if ($result = $mysqli->query($query)) {
      $retorno["atualiza"] = 1;
    } else {
      $retorno["atualiza"] = 0;
    }
    echo json_encode($retorno);
    $mysqli->close();
}
