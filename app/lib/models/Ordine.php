<?php

/**
 * Rappresentazione della tabella Ordine.
* @author <a href="https://github.com/DavidePastore">Davide Pastore</a>
*
*/
class Ordine extends Model{
	public static $_id_column = 'IDOrdine';
	
	/**
	 * Restituisce il prodotto di un ordine.
	 */
	public function prodotto(){
		return $this->belongs_to('Prodotto', 'IDProdotto');
	}
	

}