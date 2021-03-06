<?php
//Creare un nuovo ingrediente
$app->post('/api/ingredienti/add', function () use($app){
	$json = $app->request()->getBody();
	$ingrediente = json_decode($json);
	
	array_walk_recursive($ingrediente, function(&$value, $key){
		$value = utf8_decode($value);
	});
	
	//Controlli
	foreach($ingrediente as $key=>$value){
		if(empty($value)){
			exit('{"errore": "campo ' . $key . ' non inserito"}');
		}
	}

	//Aggiungo l'ingrediente al database
	$ingredienteDB = Model::factory('Ingrediente')->create();
	$ingredienteDB->Nome_Ing = $ingrediente->nome;
	$ingredienteDB->save();

	exit('{"successo": "true"}');

})->name("APIIngredientiAdd");