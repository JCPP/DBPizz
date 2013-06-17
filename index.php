<?php
/**
 * /Si registra l'autoloader di Twig,
 * questo metodo è usato quando si installa Twig tramite Composer
 */
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

require 'app/routes.php';

$app->run();