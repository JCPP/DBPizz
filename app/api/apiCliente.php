<?php
//Creare un nuovo cliente
$app->post('/api/clienti/add', function () use($app){
	$json = $app->request()->getBody();
	$cliente = json_decode($json);

	//Controlli
	foreach($cliente as $key=>$value){
		if(empty($value)){
			exit('{"errore": "campo ' . $key . ' non inserito"}');
		}
	}

	//Aggiungo il cliente al database
	$clienteDB = Model::factory('Cliente')->create();
	$clienteDB->Nome_Cl = $cliente->nome;
	$clienteDB->Cognome_Cl = $cliente->cognome;
	$clienteDB->save();

	exit('{"successo": "true"}');

})->name("APIClientiAdd");