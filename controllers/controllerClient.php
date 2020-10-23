<?php
$validate = new Classes\ClassValidate();

$validate->validateFields($_POST);
$validate->validateDate($dataNascimento);
$validate->validateCpf($cpf);

if (isset($_GET['apagar'])) {
    $validate->validateDeleteClient($_GET['apagar']);

} elseif (isset($_GET['editar'])) {
    header('Location: '.DIRPAGE.'cadastroCliente?editar='.$_GET['editar']);

} elseif (isset($_POST['id'])) {
    $validate->validateUpdateClient($_POST);
    
} else {
    $validate->finalValidateClient($arrClients);
}
