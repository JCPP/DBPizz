<?php
/**
 * Si registra l'autoloader per i componenti installati.
 */
require 'vendor/autoload.php';

// Setta il view Twig personalizzato
$twigView = new \Slim\Extras\Views\Twig();

//Estensioni attive per debug
$twigView::$twigExtensions = array(new Twig_Extension_Debug());
$twigView::$twigOptions = array('debug' => true);

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

require 'app/routes.php';

$app->run();