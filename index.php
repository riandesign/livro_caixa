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
                          <input type="text" name="username" class="form-control form-control-lg flat-input" id="login" placeholder="username">
                      </div>
                      <div class="col-md-12">
                          <input type="password" name="password" class="form-control form-control-lg flat-input" id="senha" placeholder="password">
                      </div>
                      <button type="submit" class="btn btn-lg btn-block btn-login">Login</button>
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
          $('#log_erro').hide();//Mostra log de erro se a senha ou usuário estiverem errado;
          $('#form_login').submit(function () {
              var login = $('#login').val();
              var senha = $('#senha').val();
              $.ajax({
                  url:"login.php",
                  type:"post",
                  data: "login="+login+"senha="+senha
              }).done(function (result) {
                  if(result===1){
                      location.href='restrito.php'
                  } else {
                      $('#log_erro').show();

                  }
              });
              return false;
          })
      })
  </script>
  </body>
</html>
