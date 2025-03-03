<?php
// root to server folder
define('PROJET_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('CLASSES_ROOT', PROJET_ROOT.'/classes');
define('ADMIN_ROOT', PROJET_ROOT.'/admin');
define('INCLUDES_ROOT', PROJET_ROOT.'/includes');
define('VENDOR_ROOT', PROJET_ROOT.'/vendor');

require_once(VENDOR_ROOT.'/autoload.php');

$session = new Classes\Session;

if(!$session->isLoggedIn() && strpos($_SERVER['REQUEST_URI'], 'login.php') === false) header('Location: /../admin/login.php');
if($session->isLoggedIn() && strpos($_SERVER['REQUEST_URI'], 'login.php') !== false) header('Location: /../admin/users/show.php');