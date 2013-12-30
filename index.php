<?php

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(array(
    'templates.path' => './views'    
));

$app->get('/', function() use ($app) {
    $app->render('page.php');
});

$app->run();

?>
