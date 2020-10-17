<?php
namespace Classes;

class ClassLayout {

    # set head tags
    public static function setHeader($title)
    {
        $html = "<!DOCTYPE html>\n";
        $html .= "<html lang='pt-br'>\n";
        $html .= "<head>\n";
        $html .= " <meta charset='UTF-8'>\n";
        $html .= " <meta name='viewport' content='width=device-width, initial-scale=1.0'>\n";
        $html .= " <title>$title</title>\n";
        $html .= " <link rel='stylesheet' href='".DIRPAGE."lib/css/style.css'>\n";
        $html .= "</head>\n";
        $html .= "<body>\n";
        echo $html;
    }

    # set footer tags
    public static function setFooter()
    {
        $html = "</body>\n";
        $html .= "</html>";
        echo $html;
    }
}
