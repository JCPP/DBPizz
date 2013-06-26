/**
 *  Le date sono da considerare nel formato ISO8601 ("YYYY-MM-DD HH:MM:SS").
 */



/**
 * CREAZIONE STRUTTURA TABELLE
 */


/**
 * Creazione tabella Cliente
 */
CREATE TABLE IF NOT EXISTS Cliente(
	IDCliente INTEGER PRIMARY KEY,
	Nome_Cl VARCHAR(50) NOT NULL,
	Cognome_Cl VARCHAR(30) NOT NULL
);

/**
 * Creazione tabella Prodotto.
 */
CREATE TABLE IF NOT EXISTS Prodotto(
	IDProdotto INTEGER PRIMARY KEY,
	Nome_Pr VARCHAR(30) NOT NULL,
	Prezzo_Pr FLOAT(5) NOT NULL
);

/**
 * Creazione tabella Ordine (associazione tra Cliente e Prodotto).
 */
CREATE TABLE IF NOT EXISTS Ordine(
	IDCliente INTEGER,
	IDProdotto INTEGER,
	DataOrdine VARCHAR(18) NOT NULL,
	PRIMARY KEY(IDCliente, IDProdotto)
);


/**
 * Creazione tabella Ingrediente.
 */
CREATE TABLE IF NOT EXISTS Ingrediente(
	IDIngrediente INTEGER PRIMARY KEY,
	Nome_Ing VARCHAR(30) NOT NULL
);

/**
 * Creazione tabella CompostoDa (associazione tra Prodotto e Ingrediente).
 */
CREATE TABLE IF NOT EXISTS CompostoDa(
	IDProdotto INTEGER,
	IDIngrediente INTEGER,
	PRIMARY KEY(IDProdotto, IDIngrediente)
);

/**
 * Creazione tabella Pizzeria.
 */
CREATE TABLE IF NOT EXISTS Pizzeria(
	IDPizzeria INTEGER PRIMARY KEY,
	Nome_Pizz VARCHAR(40) NOT NULL,
	Numero_Tel VARCHAR(30) NOT NULL,
	CAP VARCHAR(5) NOT NULL,
	Paese VARCHAR(40) NOT NULL,
	Via VARCHAR(50) NOT NULL,
	Civico INTEGER(5) NOT NULL,
	Asporto BOOLEAN NOT NULL
);

/**
 * Creazione tabella Appartiene (associazione tra Prodotto e Pizzeria).
 */
CREATE TABLE IF NOT EXISTS Appartiene(
	IDProdotto INTEGER,
	IDPizzeria INTEGER,
	PRIMARY KEY(IDProdotto, IDPizzeria)
);




/**
 * INSERIMENTO DATI
 */


/**
 * Inserimento dei clienti.
 */

INSERT OR IGNORE INTO 'Cliente' 
	('IDCliente', 'Nome_Cl', 'Cognome_Cl')
VALUES
	(1, 'Matteo', 'Calo''');

INSERT OR IGNORE INTO 'Cliente' 
	('IDCliente', 'Nome_Cl', 'Cognome_Cl')
VALUES
	(2, 'Davide', 'Pastore');
	
INSERT OR IGNORE INTO 'Cliente' 
	('IDCliente', 'Nome_Cl', 'Cognome_Cl')
VALUES
	(3, 'Alessandro', 'Pendinelli');

INSERT OR IGNORE INTO 'Cliente' 
	('IDCliente', 'Nome_Cl', 'Cognome_Cl')
VALUES
	(4, 'Nicola', 'Fiore');

INSERT OR IGNORE INTO 'Cliente' 
	('IDCliente', 'Nome_Cl', 'Cognome_Cl')
VALUES
	(5, 'Antonio', 'Barone');

INSERT OR IGNORE INTO 'Cliente' 
	('IDCliente', 'Nome_Cl', 'Cognome_Cl')
VALUES
	(6, 'Giuseppe', 'Polimeno');


/**
 * Inserimento dei prodotti.
 */

INSERT OR IGNORE INTO 'Prodotto' 
	('IDProdotto', 'Nome_Pr', 'Prezzo_Pr')
VALUES
	(1, 'Pizza Margherita', '3.00');

INSERT OR IGNORE INTO 'Prodotto' 
	('IDProdotto', 'Nome_Pr', 'Prezzo_Pr')
VALUES
	(2, 'Pizza 4 stagioni', '4.00');

INSERT OR IGNORE INTO 'Prodotto' 
	('IDProdotto', 'Nome_Pr', 'Prezzo_Pr')
VALUES
	(3, 'Pizza tonno e cipolle', '4.00');

INSERT OR IGNORE INTO 'Prodotto' 
	('IDProdotto', 'Nome_Pr', 'Prezzo_Pr')
VALUES
	(4, 'Pizza marinara', '2.80');

INSERT OR IGNORE INTO 'Prodotto' 
	('IDProdotto', 'Nome_Pr', 'Prezzo_Pr')
VALUES
	(5, 'Pizza prosciutto e funghi', '4.00');

INSERT OR IGNORE INTO 'Prodotto' 
	('IDProdotto', 'Nome_Pr', 'Prezzo_Pr')
VALUES
	(6, 'Pizza 4 formaggi', '4.30');

INSERT OR IGNORE INTO 'Prodotto' 
	('IDProdotto', 'Nome_Pr', 'Prezzo_Pr')
VALUES
	(7, 'Calzone', '1.30');

INSERT OR IGNORE INTO 'Prodotto' 
	('IDProdotto', 'Nome_Pr', 'Prezzo_Pr')
VALUES
	(8, 'Rustico', '1.20');


/**
 * Inserimento degli ordini.
 */

INSERT OR IGNORE INTO 'Ordine' 
	('IDCliente', 'IDProdotto', 'DataOrdine')
VALUES
	(1, 1, '2013-06-28 20:45:00');

INSERT OR IGNORE INTO 'Ordine' 
	('IDCliente', 'IDProdotto', 'DataOrdine')
VALUES
	(1, 2, '2013-06-28 22:45:00');

INSERT OR IGNORE INTO 'Ordine' 
	('IDCliente', 'IDProdotto', 'DataOrdine')
VALUES
	(2, 5, '2013-06-29 22:45:00');

INSERT OR IGNORE INTO 'Ordine' 
	('IDCliente', 'IDProdotto', 'DataOrdine')
VALUES
	(2, 6, '2013-06-30 21:50:00');

INSERT OR IGNORE INTO 'Ordine' 
	('IDCliente', 'IDProdotto', 'DataOrdine')
VALUES
	(3, 3, '2012-06-30 21:50:00');

INSERT OR IGNORE INTO 'Ordine' 
	('IDCliente', 'IDProdotto', 'DataOrdine')
VALUES
	(4, 1, '2013-03-30 21:50:00');

INSERT OR IGNORE INTO 'Ordine' 
	('IDCliente', 'IDProdotto', 'DataOrdine')
VALUES
	(4, 3, '2013-02-20 20:30:00');

INSERT OR IGNORE INTO 'Ordine' 
	('IDCliente', 'IDProdotto', 'DataOrdine')
VALUES
	(4, 7, '2013-02-22 21:30:00');

INSERT OR IGNORE INTO 'Ordine' 
	('IDCliente', 'IDProdotto', 'DataOrdine')
VALUES
	(4, 8, '2013-02-22 21:30:00');


/**
 * Inserimento degli ingredienti.
 */
INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(1, 'Pomodoro');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(2, 'Mozzarella');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(3, 'Basilico');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(4, 'Sale');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(5, 'Olio');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(6, 'Aglio');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(7, 'Origano');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(8, 'Olive nere');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(9, 'Prosciutto');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(10, 'Funghi champignon');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(11, 'Carciofi');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(12, 'Tonno');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(13, 'Cipolle');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(14, 'Formaggio Emmental');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(15, 'Formaggio Fontina');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(16, 'Formaggio Gorgonzola');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(17, 'Formaggio Provola');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(18, 'Besciamella');

INSERT OR IGNORE INTO 'Ingrediente' 
	('IDIngrediente', 'Nome_Ing')
VALUES
	(19, 'Prezzemolo');


/**
 * Inserimento dei compostoda (associazione tra Prodotto e Ingrediente).
 */

/**
 * Pizza Margherita.
 */
INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(1, 1);
	
INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(1, 2);
	
INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(1, 3);
	
INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(1, 4);
	
INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(1, 5);
	
/**
 * Pizza 4 Stagioni.
 */
INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(2, 1);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(2, 2);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(2, 8);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(2, 9);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(2, 10);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(2, 11);

/**
 * Pizza Tonno e Cipolle.
 */
INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(3, 1);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(3, 2);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(3, 12);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(3, 13);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(3, 6);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(3, 19);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(3, 6);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(3, 4);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(3, 5);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(3, 7);

/**
 * Pizza Marinara.
 */
INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(4, 1);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(4, 6);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(4, 4);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(4, 5);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(4, 7);

/**
 * Pizza Prosciutto e Funghi.
 */
INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(5, 1);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(5, 2);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(5, 9);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(5, 10);

/**
 * Pizza 4 Formaggi.
 */
INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(6, 1);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(6, 2);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(6, 14);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(6, 15);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(6, 16);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(6, 17);

/**
 * Calzone.
 */
INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(7, 1);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(7, 2);

/**
 * Rustico.
 */
INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(8, 1);

INSERT OR IGNORE INTO 'CompostoDa' 
	('IDProdotto', 'IDIngrediente')
VALUES
	(8, 18);


/**
 * Inserimento delle pizzerie.
 */
INSERT OR IGNORE INTO 'Pizzeria' 
	('IDPizzeria', 'Nome_Pizz', 'Numero_Tel', 'CAP', 'Paese', 'Via', 'Civico', 'Asporto')
VALUES
	(1, 'Ragno', '0833 231561', '73017', 'Sannicola', 'Via Grassi', '32', 1);

INSERT OR IGNORE INTO 'Pizzeria' 
	('IDPizzeria', 'Nome_Pizz', 'Numero_Tel', 'CAP', 'Paese', 'Via', 'Civico', 'Asporto')
VALUES
	(2, 'Villa Excelsa', '+39 0833 233209', '73017', 'Sannicola', 'Via delle Viole', '12', 0);

INSERT OR IGNORE INTO 'Pizzeria' 
	('IDPizzeria', 'Nome_Pizz', 'Numero_Tel', 'CAP', 'Paese', 'Via', 'Civico', 'Asporto')
VALUES
	(3, 'Waikiki', '+39 329 5625024', '73014', 'Gallipoli', 'Litoranea Gallipoli', '322', 0);

INSERT OR IGNORE INTO 'Pizzeria' 
	('IDPizzeria', 'Nome_Pizz', 'Numero_Tel', 'CAP', 'Paese', 'Via', 'Civico', 'Asporto')
VALUES
	(4, 'Angolo Blu', '+39 0833 261500', '73014', 'Gallipoli', 'Via Carlo Muzio', '45', 0);

INSERT OR IGNORE INTO 'Pizzeria' 
	('IDPizzeria', 'Nome_Pizz', 'Numero_Tel', 'CAP', 'Paese', 'Via', 'Civico', 'Asporto')
VALUES
	(5, 'Capricci DI Pizza Da Michele', '+39 347 7654565', '73056', 'Taurisano', 'Via Lecce', '72', 0);

/**
 * Inserimento dei Appartiene (associazione tra Prodotto e Pizzeria).
 */

INSERT OR IGNORE INTO 'Appartiene' 
	('IDProdotto', 'IDPizzeria')
VALUES
	(1, 1);

INSERT OR IGNORE INTO 'Appartiene' 
	('IDProdotto', 'IDPizzeria')
VALUES
	(1, 3);

INSERT OR IGNORE INTO 'Appartiene' 
	('IDProdotto', 'IDPizzeria')
VALUES
	(2, 2);

INSERT OR IGNORE INTO 'Appartiene' 
	('IDProdotto', 'IDPizzeria')
VALUES
	(3, 4);

INSERT OR IGNORE INTO 'Appartiene' 
	('IDProdotto', 'IDPizzeria')
VALUES
	(4, 5);

INSERT OR IGNORE INTO 'Appartiene' 
	('IDProdotto', 'IDPizzeria')
VALUES
	(5, 6);

INSERT OR IGNORE INTO 'Appartiene' 
	('IDProdotto', 'IDPizzeria')
VALUES
	(5, 7);

INSERT OR IGNORE INTO 'Appartiene' 
	('IDProdotto', 'IDPizzeria')
VALUES
	(5, 8);