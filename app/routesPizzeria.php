<?php
//Pizzerie
$app->get('/pizzerie/', function () use($app){

	$app->render('pizzerie.twig', array(
			'app' => $app,
			'pizzerie' => Model::factory('Pizzeria')->find_many()
	));
})->name("Pizzerie");


//Aggiungi una pizzeria (GET)
$app->get('/pizzerie/add/', function () use($app){
	
	$app->render('formPizzerie.twig', array(
			'app' => $app
	));
})->name("PizzerieAdd");

//Aggiungi una pizzeria (POST)
$app->post('/pizzerie/add/', function () use($app){
	$postVars = $app->request()->post();
	
	$context = stream_context_create(array(
			'http' => array(
					'method' => 'POST',
					'header' => 'Content-Type: application/xml',
					'content' => $postVars
			)
	));
	
	$result = file_get_contents($app->urlFor("APIPizzerieAdd"), false, $context);
	
	
	
})->name("PizzerieAddPost");