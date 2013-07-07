<?php
/**
 * @todo inserire gli ingredienti con la chiamata alle API.
 */
//Creare un nuovo prodotto
$app->post('/api/prodotti/add', function () use($app){
	$json = $app->request()->getBody();
	$prodotto = json_decode($json);
	
	array_walk_recursive($prodotto, function(&$value, $key){
		if($key != "ingredienti"){
			$value = utf8_decode($value);
		}
	});

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
	
	if(property_exists($prodotto, "ingredienti")){
		//Aggiungo gli ingredienti al prodotto
		foreach($prodotto->ingredienti as $compostoda){
			$compostodaDB = Model::factory('CompostoDa')->create();
			$compostodaDB->IDProdotto = $prodottoDB->id();
			$compostodaDB->IDIngrediente = $compostoda;
			$compostodaDB->save();
		}
	}
	
	exit('{"successo": "true"}');
})->name("APIProdottiAdd");