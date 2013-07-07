<?php
//Creare un nuovo prodotto
$app->post('/api/prodotti/add', function () use($app){
	$request = $app->request();
	$json = $request->getBody();
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
		$url = $request->getUrl() . $app->urlFor("APICompostodaAdd");
		
		//Aggiungo gli ingredienti al prodotto
		foreach($prodotto->ingredienti as $ingrediente){
			
			$postVars = array(
				"idProdotto" => $prodottoDB->id(),
				"idIngrediente" => $ingrediente
			);
			
			$response = \Httpful\Request::post($url)    // Build a POST request...
			->sendsJson()                               // tell it we're sending (Content-Type) JSON...
			->body(json_encode($postVars))             	// attach a body/payload...
			->send();                                   // and finally, fire that thing off!
			
			$body = $response->body;
			
			$risposta = json_decode($body);
			
			if(property_exists($risposta, "errore")){
				exit('{"errore": "campo ' . $key . ' non inserito"}');
			}
			
			/*
			$compostodaDB = Model::factory('CompostoDa')->create();
			$compostodaDB->IDProdotto = $prodottoDB->id();
			$compostodaDB->IDIngrediente = $ingrediente;
			$compostodaDB->save();
			*/
		}
	}
	
	exit('{"successo": "true"}');
})->name("APIProdottiAdd");