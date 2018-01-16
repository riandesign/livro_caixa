<?php
session_start();

if(isset($_SESSION['logado']) &&  $_SESSION['logado'] == 'SIM'):
header("Location: home.php");
endif;
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
  <!-- Container -->
  <div class="container">
      <div class="row justify-content-md-center">
          <div class="col-md-6 col-md-auto login-box">
              <h1 class="text-center wdi-bordo">Login</h1>
              <hr>
              <form method="post" id="form_login">
                  <div class="form-row">
                      <div class="col-md-12">
                          <input type="text" name="usuario" class="form-control form-control-lg flat-input" id="username" placeholder="Nome de Usuário" required>
                      </div>
                      <div class="col-md-12">
                          <input type="password" name="senha" class="form-control form-control-lg flat-input" id="password" placeholder="Senha" required>
                      </div>
                      <input type="submit" value="Entrar" class="btn btn-lg btn-block btn-login" id="btn_login">
                  </div>
              </form>
              <h3 class="text-center wdi-red" id="log_erro">Usuário ou senha incorretos.</h3>
          </div>
      </div>
  </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <script>
      $(document).ready(function () {
          $('#log_erro').hide();//Esconde log de erros;

          $('#form_login').submit(function (event) {
              var $form = $(this);
              var serializedData = $form.serialize();

              $.ajax({
                  type: 'post',
                  url: 'login.php',
                  data: serializedData,
                  dataType: 'jason',
                  encode: true
              }).done(function (data) {
                  console.log(data);
                });
              event.preventDefault();
          })
      })
  </script>
  </body>
</html>
