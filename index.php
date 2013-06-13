<?php
require 'vendor/autoload.php';

// Setta il view Twig personalizzato
$twigView = new \Slim\Extras\Views\Twig();

// Instanzia l'applicazione
$app = new \Slim\Slim(array(
		'view' => $twigView
));


//Configurazione del database
ORM::configure('sqlite:./database/db.sqlite');

//Query logging
ORM::configure('logging', true);

$db = ORM::get_db();

require 'app/createDatabase.php';


require 'api/api.php';

//Home page
$app->get('/', function () use($app){
	$app->render('base.html', array(
		'app' => $app
	));
})->name("HomePage");


//Pizzerie
$app->get('/pizzerie/', function () use($app){
	$pizzerie = getPizzerie();
	$app->render('base.html', array(
			'app' => $app
	));
})->name("Pizzerie");



$app->run();