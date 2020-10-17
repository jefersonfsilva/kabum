<?= \Classes\ClassLayout::setHeader('Login'); ?>

    <div class="bg"></div>
    <form namespace="formLogin" id="formLogin" action="<?= DIRPAGE.'controllers/controllerLogin'; ?>" method="post">
        <div class="login">
            <div class="loginLogo float w100 txal">
                <img src="<?= DIRPAGE.'/img/logo_kabum_.png'; ?>" alt="Logo Kabum">
            </div>

            <div class="loginFormulario float w100">
                <input class="float w100 h40" type="email" id="email" name="email" placeholder="Email" required>
                <input class="float w100 h40" type="password" id="senha" name="senha" placeholder="Senha" required>
                <input class="float h40 txal" type="submit" value="Entrar">
                <div class="loginTextos float txal">
                    <a href="<?= DIRPAGE.'esqueci-minha-senha'; ?>">Esqueci minha senha</a>
                </div>
            </div>            
        </div>
    </form>

<?= \Classes\ClassLayout::setFooter(); ?>