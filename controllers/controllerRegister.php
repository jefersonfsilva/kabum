<?php
//unset($_SESSION['msgErr']);
$validate = new Classes\ClassValidate();

$validate->validateFields($_POST);
$validate->validateEmail($email);
$validate->validateIssetEmail($email);
$validate->validateDate($dataNascimento);
$validate->validateCpf($cpf);
$validate->validateConfPass($senha, $senhaConf);
$validate->validateStrongPass($senha);
$arrErr = $validate->finalValidate($arrUsers);

/* foreach ($arrErr as $err) {
    $erros .= $err['errs'];
}
$_SESSION['msgErr'] = $erros;
var_dump($_SESSION['msgErr']); */
