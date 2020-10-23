<?= \Classes\ClassLayout::setHeader('Login'); ?>

<div class="bg"></div>
<form name="formLogin" id="formLogin" action="<?= DIRPAGE.'controllers/controllerLogin'; ?>" method="post">
    <div class="login">
        <div class="w-100 p-3 mb-3">
            <img src="<?= DIRPAGE.'/img/logo_kabum_.png'; ?>" alt="Logo Kabum">
        </div>

        <div class="form-group">
            <input class="form-control" type="email" id="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-group">
            <input class="form-control" type="password" id="senha" name="senha" placeholder="Senha" required>
        </div>

        <button type="submit" class="btn btn-primary float-left" value="Entrar">Entrar</button>
        
        <div class="float-right">
            <a href="<?= DIRPAGE.'esqueci-minha-senha'; ?>">Esqueci minha senha</a>
        </div>        
    </div>
</form>

<?= \Classes\ClassLayout::setFooter(); ?>