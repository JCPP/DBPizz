<?php

//Home page
$app->get('/', function () use($app){
	$app->render('base.twig', array(
			'app' => $app
	));
})->name("HomePage");


//I percorsi per le API
require 'api/api.php';

//I percorsi per la sezione Cliente
require 'routesCliente.php';

//I percorsi per la sezione Prodotto
require 'routesProdotto.php';

//I percorsi per la sezione Pizzeria
require 'routesPizzeria.php';