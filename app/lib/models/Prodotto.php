<?php

/**
 * Rappresentazione della tabella Prodotto.
 * @author <a href="https://github.com/DavidePastore">Davide Pastore</a>
 *
 */
class Prodotto extends Model{
	public static $_id_column = 'IDProdotto';
	
	/**
	 * Restituisce tutti gli ingredienti di un prodotto.
	 */
	public function ingredienti(){
		return $this->has_many_through('Ingrediente', 'CompostoDa', 'IDProdotto', 'IDIngrediente');
	}
}