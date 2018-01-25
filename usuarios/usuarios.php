<?php
include_once ("../server/conexao.php");
?>

<div class="container">
  <div class="col-md-6 offset-3">


    <table class="table table-hover" id="table">
        <thead>
        <tr>
            <th colspan="2" class="text-center">USUÁRIOS</th>
        </tr>
        <tr>
            <th class="text-center">Nome</th>
            <th class="text-center">Nome de Usuário</th>
        </tr>
        </thead>
        <tbody id="container-list"></tbody>
    </table>



    <div class="col-md-6 offset-4">
      <input class="btn btn-sm btn-primary" type="button" name="novo_usuario" value="Novo Usuário" data-toggle="modal" data-target="#myModal">
    </div>
    <div class="aviso-loading">
      <img src="../img/loading.gif" />
      Carregando...
    </div>
  </div>

  <!-- Modal altera usuário-->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Alteração de Usuário</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="form-modal-altera-cadastro">
            <div class="form-row">
              <div class="col-md-12">
                <input type="text" name="modal_nome" class="form-control form-control-lg flat-input" id="modal-nome" placeholder="Nome Completo" required>
              </div>
              <div class="col-md-12">
                <input type="text" name="modal_usuario" class="form-control form-control-lg flat-input" id="modal-username" placeholder="Nome de Usuário" required>
              </div>
              <div class="col-md-12">
                <input type="password" name="modal_senha" class="form-control form-control-lg flat-input" id="modal-password" placeholder="Senha" required>
              </div>
            </div>
            <div class="modal-footer">
              <div class="aviso-sucesso">
                Ação efetuada com sucesso
              </div>
              <input type="submit" value="Alterar" class="btn btn-primary" />
              <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-cancelar">Cancelar</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Excluir</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>

  $(document).ready(function(){

//Marcando e deixando selecionada a linha que se clicou
    $('.aviso-loading').hide();
    $('.aviso-sucesso').hide();

    var usuario_id;
    var usuario_data;

    //$('#container-list tr').click(function () { // Deste jeito não funciona após carregar construir tabela via ajax
    $('#container-list').on('click', 'tr', function () {

        $('.tb-usr').removeClass('ativo'); //Interface
        $(this).addClass('ativo');        //Interface

        usuario_id = $(this).attr('data-ref');//Pegando ID

        ajax_load_cliente(usuario_id);

        $('#myModal').modal('show');//Mostrando o modal de alteração de cadastro
    })

    function ajax_load_cliente(usuario_id){
      $('.aviso-loading').show();

      $.ajax({
        url:"../usuarios/ajax/usuario.php?id=" + usuario_id,
        beforeSend: function(xhr){
          xhr.overrideMimeType( "text/plain; charset=x-user-defined" );
        }
      })
      .done(function(data){
        if(console && console.log){
          $('.aviso-loading').hide();

          usuario_data = JSON.parse(data);

          $('#modal-nome').val(usuario_data.nome);
          $('#modal-username').val(usuario_data.usuario);
          $('#modal-password').val(usuario_data.senha);
        }
      })
      .fail(function(){
        alert("Erro ao carregar dados");
      });
    }


    $('#form-modal-altera-cadastro').submit(function(e){

      e.preventDefault();

      var formulario = $(this);
      var retorno = alteraCadastro(formulario);
      return false;
    });


    function alteraCadastro(dados){
      $.ajax({
        type: 'POST',
        data: dados.serialize(),
        url: "../usuarios/ajax/update_usuario.php?id=" + usuario_id,
        beforeSend: function(){
          $('.aviso-loading').show();
        }
      }).done(function(data){
        var atualiza = JSON.parse(data)['atualiza']
        if(atualiza==1){
          $('.aviso-loading').hide();
          mostra_sucesso('Salvo com sucesso');
          $('#myModal').modal('hide');
          ajax_load_usuarios();
        }else{
          alert("Erro ao atualizar dados.");
        }
      }).fail(function(){
        alert('Falha no sistema, tente novamente mais tarde.')
      })
    }

    function mostra_sucesso(texto) {
      $('.aviso-sucesso').html(texto).show();
      setTimeout(function() {
        $('.aviso-sucesso').fadeOut();
      }, 1500);
    }

    // $("#modal-cancelar").click(function(){
    //   $("#table").load(" #table");
    // });



    ajax_load_usuarios();

    function ajax_load_usuarios() {
      $('.aviso-loading').show();

      $.ajax({
        url:"../usuarios/ajax/usuarios.php",
      })
      .done(function(data){
        $('.aviso-loading').hide();
        //alert(JSON.stringify(data));
        constroi_tabela(data);
      })
      .fail(function(){
        alert("Erro ao carregar dados");
      });
    }


    function constroi_tabela(json_obj) {
      var content = $('#container-list');
      content.html('');

      $.each(json_obj, function(key, value) {
        content.append('<tr class="tb-usr" data-ref="' + value.id + '"><td class="text-center">' + value.nome + '</td><td class="text-center">' + value.usuario + '</td></tr>');
      });
    }



  });
</script>
