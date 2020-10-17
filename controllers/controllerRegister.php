<?php
$validate = new Classes\ClassValidate();
/* 
$validate->validateFields($_POST);
$validate->validateEmail($email);
$validate->validateDate($dataNascimento);
$validate->validateCpf($cpf);

var_dump($validate->getErr()); */
$validate->finalValidate($arrUsers);