<?php
//Ordini
$app->get('/ordini/', function () use($app){
	
	$ordini = Model::factory('Ordine')->join('Cliente', array(
			'Ordine.IDCliente', '=', 'Cliente.IDCliente'
		))
		->join('Prodotto', array(
				'Ordine.IDProdotto', '=', 'Prodotto.IDProdotto'
		))
		->group_by('IDProdotto')
		->group_by('IDCliente')
		->order_by_desc('Ordine.DataOrdine');
	
	$app->render('ordini.twig', array(
			'app' => $app,
			'ordini' => $ordini->find_many(),
			'prodotti' => Model::factory('Prodotto')->find_many(),
			'clienti' => Model::factory('Cliente')->find_many()
	));
})->name("Ordini");


//Aggiungi un ordine (GET)
$app->get('/ordini/add/', function () use($app){

	$app->render('formOrdini.twig', array(
			'app' => $app,
			'prodotti' => Model::factory('Prodotto')->find_many(),
			'clienti' => Model::factory('Cliente')->find_many()
	));
})->name("OrdiniAdd");

//Aggiungi un ordine (POST)
$app->post('/ordini/add/', function () use($app){
	$request = $app->request();
	$postVars = $request->post();
	$url = $request->getUrl() . $app->urlFor("APIOrdiniAdd");

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
		$app->redirect($app->urlFor("Ordini"));
	}
})->name("OrdiniAddPost");

//Cerca un ordine (POST)
$app->post('/ordini/cerca/', function () use($app){
	$postVars = $app->request()->post();
	
	$ordini = Model::factory('Ordine');
	
	foreach($postVars as $key => $postVar){
		if(!empty($postVar)){
			switch ($key){
				case "DataOrdine":
					$ordini->where_gte($key, $postVar . " 00:00:00");
					$ordini->where_lte($key, $postVar . " 23:59:59");
					break;
				case "IDCliente":
					$ordini->where('Cliente.' . $key, $postVar);
					break;
				case "IDProdotto":
					$ordini->where('Prodotto.' . $key, $postVar);
					break;
				default:
					$ordini->where($key, $postVar);
					break;
			}
		}
	}
	
	$ordini->join('Cliente', array(
			'Ordine.IDCliente', '=', 'Cliente.IDCliente'
		))
		->join('Prodotto', array(
				'Ordine.IDProdotto', '=', 'Prodotto.IDProdotto'
		))
		->group_by('IDProdotto')
		->group_by('IDCliente');
	
	$ordini = $ordini->find_many();
	
	$app->render('ordiniRicerca.twig', array(
			'app' => $app,
			'ordini' => $ordini
	));
	
})->name("OrdiniRicerca");