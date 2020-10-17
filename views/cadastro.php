<?= \Classes\ClassLayout::setHeader('Cadastro'); ?>

    <form namespace="formRegister" id="formRegister" action="<?= DIRPAGE.'controllers/controllerRegister'; ?>" method="post">
        <div class="register">
            <input type="text" id="nome" name="nome" placeholder="Nome" required>
            <input type="text" id="email" name="email" placeholder="Email" required>
            <input type="text" id="cpf" name="cpf" placeholder="CPF" required>
            <input type="text" id="dataNascimento" name="dataNascimento" placeholder="Data de nascimento" required>
            <input type="password" id="senha" name="senha" placeholder="Senha" required>
            <input type="password" id="senhaConf" name="senhaConf" placeholder="Confirmação de Senha" required>
            <input type="submit" value="Cadastrar">
        </div>
    </form>

<?= \Classes\ClassLayout::setFooter(); ?>