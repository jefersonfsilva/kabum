<?php
namespace Traits;

trait TraitParseUrl {
    
    # url array
    public static function parseUrl($par = null)
    {
        $url = explode("/", rtrim($_GET['url'], FILTER_SANITIZE_URL));
        return ($par == null) ? $url : $url[$par];
    }
}
