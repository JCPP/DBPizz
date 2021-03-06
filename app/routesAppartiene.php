<?php
//Appartiene
$app->get('/appartiene/', function () use($app){
	
	$appartiene = Model::factory('Appartiene');
	$appartiene->join('Prodotto', array(
			'Appartiene.IDProdotto', '=', 'Prodotto.IDProdotto'	
		))
		->join('Pizzeria', array(
			'Appartiene.IDPizzeria', '=', 'Pizzeria.IDPizzeria'	
		));
	
	$app->render('appartiene.twig', array(
			'app' => $app,
			'appartiene' => $appartiene->find_many()
	));
})->name("Appartiene");


//Aggiungi un appartiene (GET)
$app->get('/appartiene/add/', function () use($app){

	$app->render('formAppartiene.twig', array(
			'app' => $app,
			'pizzerie' => Model::factory('Pizzeria')->find_many(),
			'prodotti' => Model::factory('Prodotto')->find_many()
	));
})->name("AppartieneAdd");

//Aggiungi un appartiene (POST)
$app->post('/appartiene/add/', function () use($app){
	$request = $app->request();
	$postVars = $request->post();
	$url = $request->getUrl() . $app->urlFor("APIAppartieneAdd");

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
		$app->redirect($app->urlFor("Appartiene"));
	}
})->name("AppartieneAddPost");