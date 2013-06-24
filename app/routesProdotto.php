<?php
//Prodotti
$app->get('/prodotti/', function () use($app){
	$app->render('prodotti.twig', array(
			'app' => $app,
			'prodotti' => Model::factory('Prodotto')->find_many(),
			'ingredienti' => Model::factory('Ingrediente')->find_many()
	));
})->name("Prodotti");


//Aggiungi un prodotto (GET)
$app->get('/prodotti/add/', function () use($app){

	$app->render('formProdotti.twig', array(
			'app' => $app,
			'ingredienti' => Model::factory('Ingrediente')->find_many()
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

//Cerca un Prodotto (POST)
$app->post('/prodotti/cerca/', function () use($app){
	$postVars = $app->request()->post();

	$prodotti = Model::factory('Prodotto');

	//Creo una query personalizzata
	foreach($postVars as $key => $postVar){
		if(!empty($postVar)){
			if($key == "IDIngrediente"){
				$prodotti->join('CompostoDa', array(
						'Prodotto.IDProdotto', '=', 'CompostoDa.IDProdotto'
					))
					->join('Ingrediente', array(
							'CompostoDa.IDIngrediente', '=', 'Ingrediente.IDIngrediente'
					));
				$prodotti->having_raw("count(*) = " . count($postVar));
				$prodotti->where_in('Ingrediente.IDIngrediente', $postVar);
			}
			else{
				$prodotti->where($key, $postVar);
			}
		}
	}

	$prodotti = $prodotti->group_by('Prodotto.IDProdotto')->find_many();
	
	//echo "Query creata: ".ORM::get_last_query();

	$app->render('prodottiRicerca.twig', array(
			'app' => $app,
			'prodotti' => $prodotti
	));

})->name("ProdottiRicerca");