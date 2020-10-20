<?php
namespace Classes;

use Models\ClassRegister;
use Models\ClassLogin;
use ZxcvbnPhp\Zxcvbn;
use Classes\ClassPassword;

class ClassValidate {

    private $err = [];
    private $register;
    private $password;
    private $login;
    private $attempts;

    public function __construct()
    {
        $this->register = new ClassRegister();
        $this->password = new ClassPassword();
        $this->login = new ClassLogin();
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

    public function validateIssetEmail($email, $action = null)
    {
        $b = $this->register->getIssetEmail($email);

        if ($action == null) {
            if ($b > 0) {
                $this->setErr("Email já cadastrado");
                return false;
            } else {
                return true;
            }
        } else {
            if ($b > 0) {
                return true;
            } else {
                $this->setErr("Email não cadastrado");
                return false;
            }
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

    #check if passwords are equal
    public function validateConfPass($senha, $senhaConf)
    {
        if ($senha === $senhaConf) {
            return true;
        } else {
            $this->setErr("Senhas não conferem");
            return false;
        }
    }

    #check if it is a goos password
    public function validateStrongPass($senha, $par = null)
    {
        $zxcvbn = new Zxcvbn();
        $strong = $zxcvbn->passwordStrength($senha);
        
        if ($par == null) {
            if ($strong['score'] >= 3) {
                return true;
            } else {
                $this->setErr("Use uma senha mais forte");
                return false;
            }
        } else {
            # login
        }        
    }

    #check aginst DB
    public function validatePass($email, $senha)
    {
        if ($this->password->verifyHash($email, $senha)) {
            return true;
        } else {
            $this->setErr("Usuário ou senha inválida");
            return false;
        }
    }

    public function finalValidate($arrUsers)
    {
        if (count($this->getErr()) > 0) {
            $arrResponse = [
                "return" => "err",
                "errs" => $this->getErr()
            ];
        } else {
            $arrResponse = [
                "return" => "success",
                "errs" => null
            ];
            $this->register->insertUser($arrUsers);
        }
        
        return json_encode($arrResponse);
    }

    #check attempt
    public function checkLoginAttempt()
    {
        if ($this->login->countAttempt() >= 5) {
            $this->setErr("Você fez 5 ou mais tentativas");
            $this->attempts = true;
            return false;
        } else {
            $this->attempts = false;
            return true;
        }
    }

    #email confirmation
    public function validateUserActivation()
    {
        
    }

    #return attempt
    public function finalValidateLogin($email)
    {
        if (count($this->getErr()) > 0) {
            $this->login->insertAttempt();
        } else {
            $this->login->deleteAttempt();
        }
    }
}
