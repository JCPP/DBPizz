<?php
//Creare un nuovo ordine
$app->post('/api/ordini/add', function () use($app){
	$json = $app->request()->getBody();
	$ordine = json_decode($json);

	//Controlli
	foreach($ordine as $key=>$value){
		if(empty($value)){
			exit('{"errore": "campo ' . $key . ' non inserito"}');
		}
	}

	//Aggiungo l'ordine al database
	$ordineDB = Model::factory('Ordine')->create();
	$ordineDB->IDCliente = $ordine->idCliente;
	$ordineDB->IDProdotto = $ordine->idProdotto;
	$ordineDB->save();

	exit('{"successo": "true"}');

})->name("APIOrdiniAdd");