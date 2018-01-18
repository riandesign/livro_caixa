<?php
include_once('../login/verifica_acesso.php');
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="../css/estilo.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>

    <header>
        <nav>
            <ul class="nav">
                <li class="active-item"><a href="?pagina=principal" class="nav-link active">Início</a></li>
                <li class="active-item"><a href="#" class="nav-link active">Lançamentos</a>
                    <ul>
                        <li class="active-item"><a href="?pagina=entradas" class="nav-link active">Entradas</a></li>
                        <li class="active-item"><a href="#" class="nav-link active">Saídas</a></li>
                    </ul>
                </li>
                <li class="active-item"><a href="#" class="nav-link active">Relatórios</a></li>
                <li class="active-item"><a href="?pagina=usuarios"  class="nav-link active">Usuários</a></li>
                <li class="active-item sair"><a href="../login/logout.php" class="nav-link active">X</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <?php
        $pagina = isset($_GET['pagina'])? $_GET['pagina']:null;
        switch ($pagina) {

            case "entradas":
                include "entradas.php";
                break;
            case "usuarios":
                include "../usuarios/usuarios.php";
                break;
            default:
                include "principal.php";
                break;
        }
        ?>
    </section>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </body>
</html>
