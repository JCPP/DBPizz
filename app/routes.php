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

//I percorsi per la sezione Ordine
require 'routesOrdine.php';

//I percorsi per la sezione Ingrediente
require 'routesIngrediente.php';

//I percorsi per la sezione Composto da
require 'routesCompostoDa.php';

//I percorsi per la sezione Pizzeria
require 'routesPizzeria.php';

//I percorsi per la sezione Appartiene
require 'routesAppartiene.php';