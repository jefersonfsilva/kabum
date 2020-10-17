<?php
namespace Classes;

use Traits\TraitParseUrl;

class ClassDispatch {

    private $init;
    private $url;
    private $dir = null;
    private $count;
    private $file;
    private $page;

    # initialize
    public function __construct()
    {
        $this->url = TraitParseUrl::parseUrl();
        $this->count=count($this->url);
        $this->checkParameters();
    }

    # check user parameters
    private function checkParameters()
    {
        if ($this->count == 1 && empty($this->url[0])) {
            $this->page = DIRREQ.'views/index.php';
        } else {
            $this->checkDir();
        }
    }

    # check index for directories or files
    private function checkDir()
    {
        $this->init = $this->url[0].'/';

        for ($i=0; $i < $this->count; $i++) { 
            if (is_dir($this->init)) {
                if ($i == 0) {
                    $this->dir .= $this->init;
                } elseif (is_dir($this->dir.$this->url[$i])) {
                    $this->dir .= $this->url[$i].'/';
                } else {
                    $this->file = $this->url[$i];
                    break;
                }
            } else {
                if ($i == 0) {
                    $this->dir .= 'views/';
                }
                
                if (is_dir($this->dir.$this->url[$i])) {
                    $this->dir .= $this->url[$i].'/';
                } else {
                    $this->file = $this->url[$i];
                    break;
                }
                
            }
        }

        $this->dir = str_replace("//", "/", $this->dir);
        $this->checkFile();
    }

    # check if file exists, if not call index.php, otherwise call 404 page
    private function checkFile()
    {
        $absDir = DIRREQ.$this->dir;
        if (file_exists($absDir.$this->file.'.php')) {
            $this->page = $absDir.$this->file.'.php';
        } elseif (file_exists($absDir.'index.php')) {
            $this->page = $absDir.'index.php';
        } else {
            $this->page = DIRREQ.'views/404.php';    
        }
    }

    # return page
    public function getInclude()
    {
        return $this->page;
    }
}
