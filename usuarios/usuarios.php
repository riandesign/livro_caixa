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

    </div>
    <input type="button" name="novo_usuario" value="Cadastrar">
</div>

<script>
    $(document).ready(function(){
        $('#container-list tr').click(function () {
            $('.tb-usr').removeClass('ativo');
            $(this).addClass('ativo');
        })
    });
</script>
