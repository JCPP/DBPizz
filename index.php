<?php
/**
 * Si registra l'autoloader per i componenti installati.
 * @todo possibilit� di vedere tutti gli ordini di un utente.
 * @todo possibilit� di vedere tutti gli ordini di un determinato giorno.
 * @todo cerca pizzeria versatile.
 * @todo cerca prodotto versatile.
 * @todo incasso giornaliero di una pizzeria tramite portale.
 * @todo 
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