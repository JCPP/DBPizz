<?php
//Creare un nuovo compostoda
$app->post('/api/compostoda/add', function () use($app){
	$json = $app->request()->getBody();
	$compostoda = json_decode($json);

	//Controlli
	foreach($compostoda as $key=>$value){
		if(empty($value)){
			exit('{"errore": "campo ' . $key . ' non inserito"}');
		}
	}

	//Aggiungo l'ordine al database
	$compostodaDB = Model::factory('CompostoDa')->create();
	$compostodaDB->IDProdotto = $compostoda->idProdotto;
	$compostodaDB->IDIngrediente = $compostoda->idIngrediente;
	$compostodaDB->save();

	exit('{"successo": "true"}');

})->name("APICompostodaAdd");