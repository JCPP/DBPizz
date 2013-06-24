<?php

/**
 * Rappresentazione della tabella Pizzeria.
 * @author <a href="https://github.com/DavidePastore">Davide Pastore</a>
 *
 */
class Pizzeria extends Model{
	public static $_id_column = 'IDPizzeria';
	
	/**
	 * Restituisce tutti i prodotti di una Pizzeria.
	 */
	public function prodotti(){
		return $this->has_many_through('Prodotto', 'Appartiene', 'IDPizzeria', 'IDProdotto');
	}
}
