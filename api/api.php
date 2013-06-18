<?php
/**
 * API per la pizzeria.
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