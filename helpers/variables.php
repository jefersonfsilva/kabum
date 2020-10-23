<?php
$objPass = new \Classes\ClassPassword();

if (isset($_POST['id'])){
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $id = null;
}
if (isset($_POST['nome'])){
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $nome = null;
}
if (isset($_POST['email'])){
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
} else {
    $email = null;
}
if (isset($_POST['cpf'])){
    $cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $cpf = null;
}
if (isset($_POST['rg'])){
    $rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $rg = null;
}
if (isset($_POST['telefone'])){
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $telefone = null;
}
if (isset($_POST['dataNascimento'])){
    $dataNascimento = filter_input(INPUT_POST, 'dataNascimento', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $dataNascimento = null;
}
if (isset($_POST['clienteId'])){
    $clienteId = filter_input(INPUT_POST, 'clienteId', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $clienteId = null;
}
if (isset($_POST['logradouro'])){
    $logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $logradouro = null;
}
if (isset($_POST['municipio'])){
    $municipio = filter_input(INPUT_POST, 'municipio', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $municipio = null;
}
if (isset($_POST['uf'])){
    $uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $uf = null;
}
if (isset($_POST['tipo'])){
    $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
} else {
    $tipo = null;
}


if (isset($_POST['senha'])){
    $senha = $_POST['senha'];
    $hashSenha = $objPass->passwordHash($senha);
} else {
    $senha = null;
    $hashSenha = null;
}
if (isset($_POST['senhaConf'])){
    $senhaConf = $_POST['senhaConf'];
} else {
    $senhaConf = null;
}

$dataCriacao = date("Y-m-d H:i:s");
$token = bin2hex(random_bytes(64));

$arrUsers = [
    "nome" => $nome,
    "email" => $email,
    "cpf" => $cpf,
    "dataNascimento" => $dataNascimento,
    "senha" => $senha,
    "hashSenha" => $hashSenha,
    "dataCriacao" => $dataCriacao,
    "token" => $token,
];

$arrClients = [
    "id" => $id,
    "nome" => $nome,
    "dataNascimento" => $dataNascimento,
    "cpf" => $cpf,
    "rg" => $rg,
    "telefone" => $telefone,
    "clienteId" => $clienteId,
    "logradouro" => $logradouro,
    "municipio" => $municipio,
    "uf" => $uf,
    "tipo" => $tipo
];
