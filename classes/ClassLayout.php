<?php
namespace Classes;

class ClassLayout {

    public static function setHeaderRestrict()
    {
        $session = new ClassSession();
        $session->verifySession();
    }

    # set head tags
    public static function setHeader($title)
    {
        $html = "<!DOCTYPE html>\n";
        $html .= "<html lang='pt-br'>\n";
        $html .= "<head>\n";
        $html .= " <meta charset='UTF-8'>\n";
        $html .= " <meta name='viewport' content='width=device-width, initial-scale=1.0'>\n";
        $html .= " <title>KaBuM! - ".$title."</title>\n";
        $html .= " <meta name='description' content='Encontre os seus clientes aqui no KaBuM!'>\n";
        $html .= " <link rel='stylesheet' href='".DIRPAGE."lib/css/style.css'>\n";
        $html .= " <link rel='stylesheet' href='https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>\n";
        $html .= " <link rel='stylesheet' href='https://getbootstrap.com/docs/4.5/examples/starter-template/starter-template.css'>\n";
        $html .= "</head>\n";
        echo $html;
    }

    public static function setBody()
    {
        
        $html = "<body>\n";
        $html .= "<nav class='navbar navbar-expand-md navbar-dark bg-dark fixed-top'>
        <a class='navbar-brand' href='".DIRPAGE."'>KaBuM!</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarsExampleDefault' aria-controls='navbarsExampleDefault' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>     
        <div class='collapse navbar-collapse' id='navbarsExampleDefault'>
          <ul class='navbar-nav mr-auto'>
            <li class='nav-item active'>
              <a class='nav-link' href='".DIRPAGE."areaRestrita'>Clientes </a>
            </li>
            <li class='nav-item active'>
              <a class='nav-link' href='".DIRPAGE."cadastro'>Usuários</a>
            </li>
            <li class='nav-item active'>
              <a class='nav-link' href='".DIRPAGE."controllers/controllerLogout'>Sair</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>\n";
      $html .= "<main role='main' class='container'>\n";
      $html .= "<div class='starter-template'>\n";
      echo $html;
    }

    # set footer tags
    public static function setFooter()
    {
        $html = "</div>\n</main>\n";
        $html .= "<script src='".DIRPAGE."lib/js/zepto.min.js'></script>\n";
        $html .= "<script src='".DIRPAGE."lib/js/javascript.js'></script>\n";
        $html .= "</body>\n";
        $html .= "</html>";
        echo $html;
    }
}
