<?= \Classes\ClassLayout::setHeaderRestrict(); ?>

<?= \Classes\ClassLayout::setHeader('Área Restrita'); ?>

<?= \Classes\ClassLayout::setBody(); ?>

<h2 class="mb-5">Listagem de Clientes</h2>

<div name="returnCad" id="returnCad"></div>

<p class="float-right">
  <a class="btn btn-success btn-sm" href="<?= DIRPAGE.'cadastroCliente'; ?>" role="button">Novo Cliente</a>
</p>
<div class="table-responsive">
<table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Nascimento</th>
      <th scope="col">CPF</th>
      <th scope="col">RG</th>
      <th scope="col">Telefone</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $cli = new \Models\ClassClient;
        $arr = $cli->getAllClient();
        foreach($arr['data'] as $row){
            $id = $row['id'];
            echo "<tr>";
            echo "<th scope='row'>$id</th>";
            echo "<td>".$row['nome']."</td>";
            echo "<td>".$row['dataNascimento']."</td>";
            echo "<td>".$row['cpf']."</td>";
            echo "<td>".$row['rg']."</td>";
            echo "<td>".$row['telefone']."</td>";
            echo "<td class='btn-group' role='group'>
                    <a class='btn btn-primary btn-sm' href='"
                    .DIRPAGE."controllers/controllerClient?editar=$id' role='button'>Editar</a>
                    <a class='btn btn-danger btn-sm' href='"
                    .DIRPAGE."controllers/controllerClient?apagar=$id' role='button'>Apagar</a>
                  </td>";
            echo "</tr>";
        }
    ?>
  </tbody>
</table>
</div>

<?= \Classes\ClassLayout::setFooter(); ?>
