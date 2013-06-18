<?php
/**
 * API per l'applicazione.
 */


//Creare una nuova pizzeria
$app->post('/api/pizzerie/add', function () use($app){
	$json = $app->request()->getBody();
	$pizzeria = json_decode($json);
	
	//Controlli
	foreach($pizzeria as $key=>$value){
		if(empty($value)){
			exit('{"errore": "campo ' . $key . ' non inserito"}');
		}
	}
	
	//Aggiungo la pizzeria al database
	$pizzeriaDB = Model::factory('Pizzeria')->create();
	$pizzeriaDB->Nome_Pizz = $pizzeria->nome;
	$pizzeriaDB->Numero_Tel = $pizzeria->tel;
	$pizzeriaDB->CAP = $pizzeria->cap;
	$pizzeriaDB->Paese = $pizzeria->paese;
	$pizzeriaDB->Via = $pizzeria->via;
	$pizzeriaDB->Civico = $pizzeria->civico;
	$pizzeriaDB->Asporto = $pizzeria->asporto;
	$pizzeriaDB->save();
	
	exit('{"successo": "true"}');
	
})->name("APIPizzerieAdd");


//Creare un nuovo cliente
$app->post('/api/clienti/add', function () use($app){
	$json = $app->request()->getBody();
	$cliente = json_decode($json);

	//Controlli
	foreach($cliente as $key=>$value){
		if(empty($value)){
			exit('{"errore": "campo ' . $key . ' non inserito"}');
		}
	}

	//Aggiungo il cliente al database
	$clienteDB = Model::factory('Cliente')->create();
	$clienteDB->Nome_Cl = $cliente->nome;
	$clienteDB->Cognome_Cl = $cliente->cognome;
	$clienteDB->save();

	exit('{"successo": "true"}');

})->name("APIClientiAdd");


//Creare un nuovo prodotto
$app->post('/api/prodotti/add', function () use($app){
	$json = $app->request()->getBody();
	$prodotto = json_decode($json);

	//Controlli
	foreach($prodotto as $key=>$value){
		if(empty($value)){
			exit('{"errore": "campo ' . $key . ' non inserito"}');
		}
	}

	//Aggiungo il prodotto al database
	$prodottoDB = Model::factory('Prodotto')->create();
	$prodottoDB->Nome_Pr = $prodotto->nome;
	$prodottoDB->Prezzo_Pr = $prodotto->prezzo;
	$prodottoDB->save();

	exit('{"successo": "true"}');

})->name("APIProdottiAdd");


//Creare un nuovo ordine
$app->post('/api/ordini/add', function () use($app){
	$json = $app->request()->getBody();
	$ordine = json_decode($json);

	//Controlli
	foreach($ordine as $key=>$value){
		if(empty($value)){
			exit('{"errore": "campo ' . $key . ' non inserito"}');
		}
	}

	//Aggiungo l'ordine al database
	$ordineDB = Model::factory('Ordine')->create();
	$ordineDB->IDCliente = $ordine->idCliente;
	$ordineDB->IDProdotto = $ordine->idProdotto;
	$ordineDB->save();

	exit('{"successo": "true"}');

})->name("APIOrdiniAdd");


//Creare un nuovo ingrediente
$app->post('/api/ingredienti/add', function () use($app){
	$json = $app->request()->getBody();
	$ingrediente = json_decode($json);

	//Controlli
	foreach($ingrediente as $key=>$value){
		if(empty($value)){
			exit('{"errore": "campo ' . $key . ' non inserito"}');
		}
	}

	//Aggiungo l'ordine al database
	$ingredienteDB = Model::factory('Ingrediente')->create();
	$ingredienteDB->Nome_Ing = $ingrediente->nome;
	$ingredienteDB->save();

	exit('{"successo": "true"}');

})->name("APIIngredientiAdd");


//Creare un nuovo compostoda
$app->post('/api/compostoda/add', function () use($app){
	$json = $app->request()->getBody();
	$compostoda = json_decode($json);

	//Controlli
	foreach($compostoda as $key=>$value){
		if(empty($value)){
			exit('{"errore": "campo ' . $key . ' non inserito"}');
		}
	}

	//Aggiungo l'ordine al database
	$compostodaDB = Model::factory('CompostoDa')->create();
	$compostodaDB->IDProdotto = $compostoda->idProdotto;
	$compostodaDB->IDIngrediente = $compostoda->idIngrediente;
	$compostodaDB->save();

	exit('{"successo": "true"}');

})->name("APICompostodaAdd");


//Creare un nuovo appartiene
$app->post('/api/appartiene/add', function () use($app){
	$json = $app->request()->getBody();
	$appartiene = json_decode($json);

	//Controlli
	foreach($appartiene as $key=>$value){
		if(empty($value)){
			exit('{"errore": "campo ' . $key . ' non inserito"}');
		}
	}

	//Aggiungo l'ordine al database
	$appartieneDB = Model::factory('Appartiene')->create();
	$appartieneDB->IDProdotto = $appartiene->idProdotto;
	$appartieneDB->IDPizzeria = $appartiene->idPizzeria;
	$appartieneDB->save();

	exit('{"successo": "true"}');

})->name("APIAppartieneAdd");