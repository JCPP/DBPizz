<?php
//Prodotti
$app->get('/prodotti/', function () use($app){
	$app->render('prodotti.twig', array(
			'app' => $app,
			'prodotti' => Model::factory('Prodotto')->find_many()
	));
})->name("Prodotti");


//Aggiungi un prodotto (GET)
$app->get('/prodotti/add/', function () use($app){

	$app->render('formProdotti.twig', array(
			'app' => $app
	));
})->name("ProdottiAdd");

//Aggiungi un prodotto (POST)
$app->post('/prodotti/add/', function () use($app){
	$request = $app->request();
	$postVars = $request->post();
	$url = $request->getUrl() . $app->urlFor("APIProdottiAdd");

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
		$app->redirect($app->urlFor("Prodotti"));
	}
})->name("ProdottiAddPost");