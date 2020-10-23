<?php

# absolute paths
$internalFolder = "kabum/";
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$internalFolder}");
//avoid possible slash bug
(substr($_SERVER['DOCUMENT_ROOT'], -1) == '/') ? $slash = "" : $slash = "/";
define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$slash}{$internalFolder}");

# shortcuts
define('DIRIMG', DIRPAGE.'img/');
define('DIRCSS', DIRPAGE.'lib/css/');
define('DIRJS', DIRPAGE.'lib/js/');

# DB access
define('HOST', "localhost");
define('DB', "kabum");
define('USER', "root");
define('PASS', "@iphone#xr");

# Others
define("DOMAIN", $_SERVER["HTTP_HOST"]);