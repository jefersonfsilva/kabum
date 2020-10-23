<?= \Classes\ClassLayout::setHeaderRestrict(); ?>

<?= \Classes\ClassLayout::setHeader('Cadastro de Usuários'); ?>

<?= \Classes\ClassLayout::setBody(); ?>

    <h3>Cadastro de Usuários</h3>

    <?php
    if (isset($_SESSION['msgErr'])) {
    ?>
        <div class="alert alert-danger" role="alert">
            <?= $_SESSION['msgErr']; ?>
        </div>
    <?php
    }
    ?>

    <form name="formRegister" id="formRegister" action="<?= DIRPAGE.'controllers/controllerRegister'; ?>" method="post" class="mt-5">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="float-left" for="nome">Nome</label>
                <input class="form-control" type="text" id="nome" name="nome" placeholder="Nome" required>
            </div>
            <div class="form-group col-md-6">
                <label class="float-left" for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="float-left" for="cpf">CPF</label>
                <input class="form-control" type="text" id="cpf" name="cpf" placeholder="CPF" required>
            </div>
            <div class="form-group col-md-6">
                <label class="float-left" for="dataNascimento">Data Nascimento</label>
                <input class="form-control" type="text" id="dataNascimento" name="dataNascimento" placeholder="Data de nascimento" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="float-left" for="senha">Senha</label>
                <input class="form-control" type="password" id="senha" name="senha" placeholder="Senha" required>
            </div>
            <div class="form-group col-md-6">
                <label class="float-left" for="senha">Confirmação de Senha</label>
                <input class="form-control" type="password" id="senhaConf" name="senhaConf" placeholder="Confirmação de Senha" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-left">Cadastrar</button>
    </form>

<?= \Classes\ClassLayout::setFooter(); ?>
