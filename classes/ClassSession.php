<?php
namespace Classes;

use Models;
use Traits\TraitGetIp;

class ClassSession{

    private $login;
    private $timeSession = 1200;//20min
    private $timeCanary = 300;  // 5min

    public function __construct()
    {
        if (session_id() == '') {
            ini_set("session.save_handler", "files");
            ini_set("session.use_cookies", 1);
            ini_set("session.use_only_cookies", 1);
            ini_set("session.cookie_domain", DOMAIN);
            ini_set("session.cookie_httponly", 1);
            if (DOMAIN != "localhost") {
                ini_set("session.cookie_secure", 1);
            }
            ini_set("session.entropy_length", 512);
            ini_set("session.entropy_file", '/dev/urandom');
            ini_set("session.hash_function", 'sha256');
            ini_set("session.hash_bits_per_character", 5);

            session_start();
        }
        $this->login = new Models\ClassLogin();
    }

    #protect aginst session steal
    public function setSessionCanary($par = null)
    {
        session_regenerate_id(true);
        if ($par == null) {
            $_SESSION['canary'] = [
                "birth" => time(),
                "ip" => TraitGetIp::getUserIp()
            ];
        } else {
            $_SESSION['canary']['birth'] = time();
        }
    }

    #check session integrity
    public function verifySessionId()
    {
        if (!isset($_SESSION['canary'])) {
            $this->setSessionCanary();
        }

        if ($_SESSION['canary']['ip'] !== TraitGetIp::getUserIp()) {
            $this->destructSession();
            $this->setSessionCanary();
        }

        if ($_SESSION['canary']['birth'] < time() - $this->timeCanary) {
            $this->setSessionCanary("time");
        }
    }

    #set session
    public function setSession($email)
    {
        $this->verifySessionId();
        $_SESSION["login"] = true;
        $_SESSION["time"] = time();
        $_SESSION["name"] = $this->login->getUserData($email)['data']['nome'];
        $_SESSION["email"] = $this->login->getUserData($email)['data']['email'];
        $_SESSION["permition"] = $this->login->getUserData($email)['data']['permissoes'];
    }

    #check session
    public function verifySession()
    {
        $this->verifySessionId();
        if (!isset($_SESSION['login']) || !isset($_SESSION['permition']) || !isset($_SESSION['canary'])) {
            $this->destructSession();
            echo "<script>
                    alert('Você não está logado');
                    window.location.href='".DIRPAGE."login';
                  </script>
            ";
        } else {
            if ($_SESSION['time'] >= time() - $this->timeSession) {
                $_SESSION['time'] = time();
            } else {
                $this->destructSession();
                echo "<script>
                        alert('Sua sessão expirou. Faça um novo login');
                        window.location.href='".DIRPAGE."login';
                      </script>
                ";
            }
        }
    }

    #destroy session
    public function destructSession()
    {
        foreach (array_keys($_SESSION) as $key) {
            unset($_SESSION[$key]);
        }
    }
}
