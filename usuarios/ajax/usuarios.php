<?php
/*include_once ("../../server/conexao.php");

    $query = "SELECT * FROM `usuarios` ORDER BY  'nome' ASC " ;

    if ($result = $mysqli->query($query)):
          while ($row = $result ->fetch_assoc()):
      ?>
      <tr class="tb-usr" data-ref="<?php echo $row["id"]; ?>">
          <td class="text-center"><?php echo $row["nome"]; ?></td>
          <td class="text-center"><?php echo $row["usuario"]; ?></td>
      </tr>
      <?php
          endwhile;
        $result ->close();
    endif;
    $mysqli->close();
*/?>


<?php
header('Content-Type: application/json');
$data = 0;

require_once "../../server/conexao.php";

$result = $mysqli->query("SELECT id, nome, usuario FROM usuarios ORDER BY 'nome' ASC");

$usuarios = array();

while ($row = $result ->fetch_assoc()) {
  $usuarios[] = $row;
}

$result->close();
$mysqli->close();

json_encode($usuarios);
echo json_encode($usuarios);

?>
