<?php

/**
 * Rappresentazione della tabella Cliente.
 * @author <a href="https://github.com/DavidePastore">Davide Pastore</a>
 *
 */
class Cliente extends Model{
	public static $_id_column = 'IDCliente';
	
	/**
	 * Restituisce tutti gli ordini di un Cliente.
	 */
	public function ordini(){
		return $this->has_many('Ordine', 'IDCliente');
	}
}
