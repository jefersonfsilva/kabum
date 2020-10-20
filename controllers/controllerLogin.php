<?php
$validate = new Classes\ClassValidate();

$validate->validateFields($_POST);
$validate->validateEmail($email);
$validate->validateIssetEmail($email, "login");
$validate->validateStrongPass($senha);
$validate->validatePass($email, $senha);
$validate->checkLoginAttempt();
$validate->finalValidateLogin($email);

var_dump($validate->getErr());
