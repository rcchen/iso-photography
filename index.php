<?php

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(array(
    'templates.path' => './views'    
));

$app->get('/', function() use ($app) {
    $app->redirect('/hitting-the-road');
});

$app->get('/hitting-the-road', function() use ($app) {
	$app->render('page.php');
});

$app->post('/notify', function() {

});

$app->run();

?>
