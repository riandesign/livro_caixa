<?php
include_once ("../server/conexao.php");
?>

<div class="container">
  <div class="col-md-6 offset-3">
    <?php
        $query = "SELECT * FROM `usuarios` ORDER BY  'nome' ASC " ;

        if ($result = $mysqli->query($query)):
    ?>
        <table class="table table-hover">
            <thead>
            <tr>
                <th colspan="2" class="text-center">USUÁRIOS</th>
            </tr>
            <tr>
                <th class="text-center">Nome</th>
                <th class="text-center">Nome de Usuário</th>
            </tr>
            </thead>
            <tbody id="container-list">
                <?php
                    while ($row = $result ->fetch_assoc()):
                ?>
                <tr class="tb-usr">
                    <td class="text-center"><?php echo $row["nome"]; ?></td>
                    <td class="text-center"><?php echo $row["usuario"]; ?></td>
                </tr>
                <?php
                    endwhile;
                ?>
            </tbody>
        </table>
    <?php
            $result ->close();
        endif;
        $mysqli->close();
    ?>
    <div class="col-md-6 offset-4">
      <input class="btn btn-sm btn-primary" type="button" name="novo_usuario" value="Novo Usuário" data-toggle="modal" data-target="#myModal">
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
    $('#container-list tr').click(function () {
        $('.tb-usr').removeClass('ativo');
        $(this).addClass('ativo');
        $('#myModal').modal('show')
    })
  });
</script>
