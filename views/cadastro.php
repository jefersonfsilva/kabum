<?= \Classes\ClassLayout::setHeader('Cadastro'); ?>

    <div class="float w100 center">
        Cadastro de Usuários
    </div>

    <div class="returnCad"></div>

    <form namespace="formRegister" id="formRegister" action="<?= DIRPAGE.'controllers/controllerRegister'; ?>" method="post">
        <div class="register float center">
            <input class="float w100 h40" type="text" id="nome" name="nome" placeholder="Nome" required>
            <input class="float w100 h40" type="email" id="email" name="email" placeholder="Email" required>
            <input class="float w100 h40" type="text" id="cpf" name="cpf" placeholder="CPF" required>
            <input class="float w100 h40" type="text" id="dataNascimento" name="dataNascimento" placeholder="Data de nascimento" required>
            <input class="float w100 h40" type="password" id="senha" name="senha" placeholder="Senha" required>
            <input class="float w100 h40" type="password" id="senhaConf" name="senhaConf" placeholder="Confirmação de Senha" required>
            <input class="h40" type="submit" value="Cadastrar">
        </div>
    </form>

<?= \Classes\ClassLayout::setFooter(); ?>
