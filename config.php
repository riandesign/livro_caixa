<?php

//Configura��o do Banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$d_b = "livro_caixa";

//Titulo do seu livro Caixa, geralmente seu nome
$lc_titulo="Seu nome";

//Autentica��o simples
$usuario="admin";
$senha="123";

//////////////////////////////////////
//N�o altere a partir daqui!
//////////////////////////////////////

$conn = mysqli_connect($host, $user, $pass) or die("Erro na conexгo com a base de dados");
$db = mysqli_select_db($conn,$d_b) or die("Erro na seleзгo da base de dados");

if (isset($_SESSION['logado']))
    $logado = $_SESSION['logado'];
else
    $logado = "";

$senha_ = md5($senha);

if (isset($_POST['login']) && $_POST['login'] != '') {

    if ($_POST['login'] == $usuario && $_POST['senha'] == $senha) {
        $logado = $_SESSION['logado'] = md5($_POST['senha']);
        header("Location: ./");
        exit();
    }
}

if ($logado != $senha_ && !isset($pagina_login)) {

    header("Location: login.php");

    exit();
}
?>
