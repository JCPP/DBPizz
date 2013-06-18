<?php
//Ordini
$app->get('/ordini/', function () use($app){
	$app->render('ordini.twig', array(
			'app' => $app,
			'ordini' => Model::factory('Ordine')->find_many()
	));
})->name("Ordini");


//Aggiungi un ordine (GET)
$app->get('/ordini/add/', function () use($app){

	$app->render('formOrdini.twig', array(
			'app' => $app
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