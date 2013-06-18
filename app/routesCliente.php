<?php
/**
 * @todo mostrare tutti gli ordini effettuati da un cliente.
 */
//Clienti
$app->get('/clienti/', function () use($app){
	$app->render('clienti.twig', array(
			'app' => $app,
			'clienti' => Model::factory('Cliente')->find_many()
	));
})->name("Clienti");


//Aggiungi un cliente (GET)
$app->get('/clienti/add/', function () use($app){

	$app->render('formClienti.twig', array(
			'app' => $app
	));
})->name("ClientiAdd");

//Aggiungi un cliente (POST)
$app->post('/clienti/add/', function () use($app){
	$request = $app->request();
	$postVars = $request->post();
	$url = $request->getUrl() . $app->urlFor("APIClientiAdd");

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
		$app->redirect($app->urlFor("Clienti"));
	}
})->name("ClientiAddPost");