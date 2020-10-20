<?php
$validate = new Classes\ClassValidate();

$validate->validateFields($_POST);
$validate->validateEmail($email);
$validate->validateIssetEmail($email);
$validate->validateDate($dataNascimento);
$validate->validateCpf($cpf);
$validate->validateConfPass($senha, $senhaConf);
$validate->validateStrongPass($senha);
echo $validate->finalValidate($arrUsers);
