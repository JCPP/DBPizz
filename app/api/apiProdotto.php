<?php
//Creare un nuovo prodotto
$app->post('/api/prodotti/add', function () use($app){
	$json = $app->request()->getBody();
	$prodotto = json_decode($json);

	//Controlli
	foreach($prodotto as $key=>$value){
		if(empty($value)){
			exit('{"errore": "campo ' . $key . ' non inserito"}');
		}
	}

	//Aggiungo il prodotto al database
	$prodottoDB = Model::factory('Prodotto')->create();
	$prodottoDB->Nome_Pr = $prodotto->nome;
	$prodottoDB->Prezzo_Pr = $prodotto->prezzo;
	$prodottoDB->save();

	exit('{"successo": "true"}');

})->name("APIProdottiAdd");