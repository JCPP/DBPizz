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
	$request = $app->request();
	$postVars = $request->post();
	$url = $request->getUrl() . $app->urlFor("APIPizzerieAdd");
	
	$response = \Httpful\Request::post($url)    // Build a POST request...
	->sendsJson()                               // tell it we're sending (Content-Type) JSON...
	->body(json_encode($postVars))             	// attach a body/payload...
	->send();                                   // and finally, fire that thing off!
	
	$body = $response->body;
	
	$risposta = json_decode($body);
	
	if(property_exists($risposta, "errore")){
		$app->render('errore.twig', array(
				'app' => $app,
				'errore' => $risposta->errore
		));
	}
	else if(property_exists($risposta, "successo")){
		$app->redirect($app->urlFor("Pizzerie"));
	}
})->name("PizzerieAddPost");


//Cerca una pizzeria (POST)
$app->post('/pizzerie/cerca/', function () use($app){
	$postVars = $app->request()->post();

	$pizzerie = Model::factory('Pizzeria');

	foreach($postVars as $key => $postVar){
		if(!empty($postVar)){
			$pizzerie->where($key, $postVar);
		}
	}

	$pizzerie = $pizzerie->find_many();

	$app->render('pizzerieRicerca.twig', array(
			'app' => $app,
			'pizzerie' => $pizzerie
	));

})->name("PizzerieRicerca");

//Pizzeria
$app->get('/pizzerie/:id', function ($id) use($app){
	$pizzeria = Model::factory('Pizzeria')->find_one($id);
	if (! $pizzeria instanceof Pizzeria) {
		$app->render('errore.twig', array(
				'app' => $app,
				'errore' => 'Pizzeria con id ' . $id . 'non esistente.'
		));
	}
	
	$prodottiQuery = $pizzeria->prodotti();

	$prodotti = $prodottiQuery->find_many();
	
	$ordiniQuery = $prodottiQuery->join('Ordine', array(
						'Prodotto.IDProdotto', '=', 'Ordine.IDProdotto'
					))
					->join('Cliente', array(
						'Ordine.IDCliente', '=', 'Cliente.IDCliente'
					));
	
	$ordini = $ordiniQuery->find_many();

	$app->render('pizzeria.twig', array(
			'app' => $app,
			'pizzeria' => $pizzeria,
			'prodotti' => $prodotti,
			'ordini' => $ordini
	));
})->name("Pizzeria");

//Pizzeria
$app->post('/pizzeria/:id/calcolaincasso/', function ($id) use($app){
	$postVars = $app->request()->post();
	
	$dataOrdine = null;
	
	$pizzeria = Model::factory('Pizzeria');

	$pizzeria->join('Appartiene', array(
			'Pizzeria.IDPizzeria', '=', 'Appartiene.IDPizzeria'
		))
		->join('Ordine', array(
			'Appartiene.IDProdotto', '=', 'Ordine.IDProdotto'
		))
		->join('Prodotto', array(
			'Ordine.IDProdotto', '=', 'Prodotto.IDProdotto'
		));
	
	foreach($postVars as $key => $postVar){
		if(!empty($postVar)){
			if($key == "DataOrdine"){
				$pizzeria->where_gte('Ordine.' . $key, $postVar . " 00:00:00");
				$pizzeria->where_lte('Ordine.' . $key, $postVar . " 23:59:59");
				$dataOrdine = $postVar;
			}
			else{
				$pizzeria->where($key, $postVar);
			}
		}
	}
	
	$pizzeria->where('Pizzeria.IDPizzeria', $id);
	
	$incasso = $pizzeria->sum('Prodotto.Prezzo_Pr');

	$app->render('pizzeriaCalcolaIncasso.twig', array(
			'app' => $app,
			'incasso' => $incasso,
			'dataOrdine' => $dataOrdine
	));
})->name("PizzeriaCalcolaIncasso");