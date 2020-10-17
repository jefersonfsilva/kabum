<?php
namespace Classes;

use Models\ClassRegister;

class ClassValidate {

    private $err = [];
    private $register;

    public function __construct()
    {
        $this->register = new ClassRegister();
    }

    public function getErr()
    {
        return $this->err;
    }

    public function setErr($err)
    {
        array_push($this->err, $err);
    }

    #validate required fields
    public function validateFields($par)
    {
        $i = 0;
        foreach ($par as $key => $value) {
            if (empty($value)) {
                $i++;
            }
        }

        if ($i == 0) {
            return true;
        } else {
            $this->setErr("Preencha todos os campos");
            return false;
        }
    }

    #validate email
    public function validateEmail($par)
    {
        if (filter_var($par, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $this->setErr("Email inválido");
            return false;
        }
    }

    #validate date
    public function validateDate($par)
    {
        $date = \DateTime::createFromFormat("d/m/Y", $par);
        if (($date) && ($date->format("d/m/Y") === $par)) {
            return true;
        } else {
            $this->setErr("Data inválida");
            return false;
        }
    }

    #validate CPF
    public function validateCpf($cpf)
    {
        /* Github
        *  guisehn/gist:3276015
        *  Validar CPF (PHP)
        */
        $cpf = preg_replace('/[^0-9]/', '', (string) $cpf);

        // Valida tamanho
        if (strlen($cpf) != 11) {
            $this->setErr("CPF inválido");
            return false;
        }

        /* Github
        *  eduardokraus
        *  valida números repetidos
        */
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            $this->setErr("CPF inválido");
            return false;
        }

        // Calcula e confere primeiro dígito verificador
        for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
            $soma += $cpf{$i} * $j;

        $resto = $soma % 11;

        if ($cpf{9} != ($resto < 2 ? 0 : 11 - $resto)) {
            $this->setErr("CPF inválido");
            return false;
        }

        // Calcula e confere segundo dígito verificador
        for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
            $soma += $cpf{$i} * $j;

        $resto = $soma % 11;

        return $cpf{10} == ($resto < 2 ? 0 : 11 - $resto);
    }

    public function finalValidate($arrUsers)
    {
        $this->register->insertUser($arrUsers);
    }
}
