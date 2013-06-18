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
	Nome_Pr VARCHAR(30) NOT NULL
);

/**
 * Creazione tabella Ordine (associazione tra Cliente e Prodotto).
 */
CREATE TABLE IF NOT EXISTS Ordine(
	IDCliente INTEGER,
	IDProdotto INTEGER,
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
	IDIngrendiente INTEGER,
	PRIMARY KEY(IDProdotto, IDIngrendiente)
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

