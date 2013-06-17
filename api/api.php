<?php
/**
 * API per la pizzeria.
 */


//Creare una nuova pizzeria
$app->post('/api/pizzerie/add', function () use($app){
	$richiesta = $app->request();
	//echo $richiesta;
})->name("APIPizzerieAdd");