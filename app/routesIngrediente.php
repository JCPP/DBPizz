<?php
//Ingredienti
$app->get('/ingredienti/', function () use($app){
	$app->render('ingredienti.twig', array(
			'app' => $app,
			'ingredienti' => Model::factory('Ingrediente')->find_many()
	));
})->name("Ingredienti");


//Aggiungi un ingrediente (GET)
$app->get('/ingredienti/add/', function () use($app){

	$app->render('formIngredienti.twig', array(
			'app' => $app
	));
})->name("IngredientiAdd");

//Aggiungi un ingrediente (POST)
$app->post('/ingredienti/add/', function () use($app){
	$request = $app->request();
	$postVars = $request->post();
	$url = $request->getUrl() . $app->urlFor("APIIngredientiAdd");

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
		$app->redirect($app->urlFor("Ingredienti"));
	}
})->name("IngredientiAddPost");