<?php
$validate = new Classes\ClassValidate();

$validate->validateFields($_POST);
$validate->validateEmail($email);
$validate->validateIssetEmail($email, "login");
$validate->validateStrongPass($senha);
$validate->validatePass($email, $senha);
$validate->validateUserActivation($email);
$validate->checkLoginAttempt();
$validate->finalValidateLogin($email);
echo "<script>window.location.href='".DIRPAGE."areaRestrita';</script>";
