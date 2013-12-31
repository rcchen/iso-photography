<?php

require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

$app = new \Slim\Slim(array(
    'templates.path' => './views'    
));

/**
 * Main route. 
 */
$app->get('/', function() use ($app) {
    $app->redirect('/hitting-the-road');
});

/**
 * Permanent route for sample story
 */
$app->get('/hitting-the-road', function() use ($app) {
	$app->render('page.php');
});

/**
 * Email notification route for sample story
 */
$app->post('/hitting-the-road', function() use ($app) {
	$email = $app->request->post('email');
	$file = 'emails';
	$current = file_get_contents($file);
	$current .= $email;
	$current .= PHP_EOL;
	file_put_contents($file, $current);
	echo "We'll let you know when it is ready at $email";
});

/**
 * Block the public from viewing the email list
 */
$app->get('/emails', function() use ($app) {
    $app->redirect('/hitting-the-road');
});

$app->run();

?>
