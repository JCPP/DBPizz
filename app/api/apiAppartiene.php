<?php
//Creare un nuovo appartiene
$app->post('/api/appartiene/add', function () use($app){
	$json = $app->request()->getBody();
	$appartiene = json_decode($json);

	//Controlli
	foreach($appartiene as $key=>$value){
		if(empty($value)){
			exit('{"errore": "campo ' . $key . ' non inserito"}');
		}
	}

	//Aggiungo l'ordine al database
	$appartieneDB = Model::factory('Appartiene')->create();
	$appartieneDB->IDProdotto = $appartiene->idProdotto;
	$appartieneDB->IDPizzeria = $appartiene->idPizzeria;
	$appartieneDB->save();

	exit('{"successo": "true"}');

})->name("APIAppartieneAdd");