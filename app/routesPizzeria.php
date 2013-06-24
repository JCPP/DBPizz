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