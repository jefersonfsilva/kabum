<?= \Classes\ClassLayout::setHeaderRestrict(); ?>

<?= \Classes\ClassLayout::setHeader('Cadastro de Clientes'); ?>

<?= \Classes\ClassLayout::setBody(); ?>

<?php
if (!isset($_GET['editar'])) {
?>
    <h3>Cadastro de Clientes</h3>

    <div name="returnCad" id="returnCad"></div>

    <form name="formClient" id="formClient" action="<?= DIRPAGE.'controllers/controllerClient'; ?>" method="post" class="mt-5">
        <div class="form-row">
            <div class="form-group col-md-8">
                <label class="float-left" for="nome">Nome</label>
                <input class="form-control" type="text" id="nome" name="nome" placeholder="Jeferson Ferreira" required>
            </div>
            <div class="form-group col-md-4">
                <label class="float-left" for="dataNascimento">Data Nascimento</label>
                <input class="form-control" type="text" id="dataNascimento" name="dataNascimento" placeholder="02/04/1977" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label class="float-left" for="cpf">CPF</label>
                <input class="form-control" type="text" id="cpf" name="cpf" placeholder="510.283.160-70" required>
            </div>
            <div class="form-group col-md-4">
                <label class="float-left" for="rg">RG</label>
                <input class="form-control" type="text" id="rg" name="rg" placeholder="36.163.212-5" required>
            </div>
            <div class="form-group col-md-4">
                <label class="float-left" for="telefone">Telefone</label>
                <input class="form-control" type="text" id="telefone" name="telefone" placeholder="(19) 99685-7030" required>
            </div>
        </div>
        <div class="form-group">
            <label class="float-left" for="logradouro">Logradouro</label>
            <input class="form-control" type="text" id="logradouro" name="logradouro" placeholder="Rua Campos Salles, 2035" required>
        </div>
        <div class="form-group form-row">
            <div class="form-group col-md-6">
                <label class="float-left" for="municipio">Município</label>
                <input class="form-control" type="text" id="municipio" name="municipio" placeholder="Valinhos" required>
            </div>
            <div class="form-group col-md-2">
                <label class="float-left" for="uf">UF</label>
                <input class="form-control" type="text" id="uf" name="uf" placeholder="SP" required>
            </div>
            <div class="form-group col-md-4">
                <label class="float-left" for="tipo">Tipo</label>
                <select class="form-control" id="tipo" name="tipo">
                    <option selected>Residencial</option>
                    <option>Comercial</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-left" value="Cadastrar">Cadastrar</button>
    </form>
<?php
} else {
?>
    <h3>Edição do Cadastro do Cliente</h3>

    <div name="returnCad" id="returnCad"></div>

    <?php
    $cli = new \Models\ClassClient;
    $arr = $cli->getClientById($_GET['editar'], true);
    foreach($arr as $row){
    ?>
        <form name="formClient" id="formClient" action="<?= DIRPAGE.'controllers/controllerClient'; ?>" method="post" class="mt-5">
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $row['id']; ?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label class="float-left" for="nome">Nome</label>
                    <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome" value="<?= $row['nome']; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label class="float-left" for="dataNascimento">Data Nascimento</label>
                    <input class="form-control" type="text" id="dataNascimento" name="dataNascimento" placeholder="Data de nascimento" value="<?= $row['dataNascimento']; ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="float-left" for="cpf">CPF</label>
                    <input class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF" value="<?= $row['cpf']; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label class="float-left" for="rg">RG</label>
                    <input class="form-control" type="text" id="rg" name="rg" placeholder="RG" value="<?= $row['rg']; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label class="float-left" for="telefone">Telefone</label>
                    <input class="form-control" type="text" id="telefone" name="telefone" placeholder="Telefone" value="<?= $row['telefone']; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="float-left" for="logradouro">Logradouro</label>
                <input class="form-control" type="text" id="logradouro" name="logradouro" placeholder="Logradouro" value="<?= $row['logradouro']; ?>" required>
            </div>
            <div class="form-group form-row">
                <div class="form-group col-md-6">
                    <label class="float-left" for="municipio">Município</label>
                    <input class="form-control" type="text" id="municipio" name="municipio" placeholder="Município" value="<?= $row['municipio']; ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label class="float-left" for="uf">UF</label>
                    <input class="form-control" type="text" id="uf" name="uf" placeholder="UF" value="<?= $row['uf']; ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label class="float-left" for="tipo">Tipo</label>
                    <select class="form-control" id="tipo" name="tipo">
                        <option <?= $row['tipo'] == "Residencial" ? 'selected' : ''; ?>>Residencial</option>
                        <option <?= $row['tipo'] == "Comercial" ? 'selected' : ''; ?>>Comercial</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-left" value="Atualizar">Atualizar</button>
        </form>
    <?php 
    }
}
?>

<?= \Classes\ClassLayout::setFooter(); ?>
