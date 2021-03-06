<?php
//Composto da
$app->get('/compostoda/', function () use($app){
	$compostoDa = Model::factory('CompostoDa')
		->join('Prodotto', array(
			'CompostoDa.IDProdotto', '=', 'Prodotto.IDProdotto'
		))
		->join('Ingrediente', array(
			'CompostoDa.IDIngrediente', '=', 'Ingrediente.IDIngrediente'
		))
		->group_by('IDProdotto')
		->find_many();
	$app->render('compostoda.twig', array(
			'app' => $app,
			'compostoda' => $compostoDa,
			'prodotti' => Model::factory('Prodotto')->find_many()
	));
})->name("Compostoda");


//Aggiungi un compostoda (GET)
$app->get('/compostoda/add/', function () use($app){

	$app->render('formcompostoda.twig', array(
			'app' => $app,
			'prodotti' => Model::factory('Prodotto')->find_many(),
			'ingredienti' => Model::factory('Ingrediente')->find_many()
	));
})->name("CompostodaAdd");

//Aggiungi un compostoda (POST)
$app->post('/compostoda/add/', function () use($app){
	$request = $app->request();
	$postVars = $request->post();
	$url = $request->getUrl() . $app->urlFor("APICompostodaAdd");

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
		$app->redirect($app->urlFor("Compostoda"));
	}
})->name("CompostodaAddPost");