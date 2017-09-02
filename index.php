<?php
require_once 'config.php';
require_once ABSPATH.'/library/routing/route.php';
require_once ABSPATH.'/library/routing/page-router.php';
require_once ABSPATH.'/library/forms/process-form.php';


$router = new PageRouter();
$router->addRoute('', 'Home', 'home', true, 'Home', true)
       ->addRoute('dashboard', 'Dashboard', 'dashboard', true, 'Dashboard', true)
       ->addRoute('login', 'Login', 'login', false, '', false, true);

ProcessForm::process();

$target = $router->route($_SERVER['REQUEST_URI']);
$router->loadPage($target);



