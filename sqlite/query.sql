/**
 * Creazione tabella Cliente
 */
CREATE TABLE Cliente IF NOT EXISTS(
	IDCliente INTEGER(11) PRIMARY KEY,
	Nome VARCHAR(50) NOT NULL,
	Cognome VARCHAR(30) NOT NULL
);

/**
 * Creazione tabella Prodotto.
 */
CREATE TABLE Prodotto IF NOT EXISTS(
	IDProdotto INTEGER(11) PRIMARY KEY,
	Nome VARCHAR(30) NOT NULL
);

/**
 * Creazione tabella Ordine (associazione tra Cliente e Prodotto).
 */
CREATE TABLE Ordine IF NOT EXISTS(
	IDCliente INTEGER(11),
	IDProdotto INTEGER(11),
	PRIMARY KEY(IDCliente, IDProdotto)
);


/**
 * Creazione tabella Ingrediente.
 */
CREATE TABLE Ingrediente IF NOT EXISTS(
	IDIngrediente INTEGER(11) PRIMARY KEY,
	Nome VARCHAR(30) NOT NULL
);

/**
 * Creazione tabella CompostoDa (associazione tra Prodotto e Ingrediente).
 */
CREATE TABLE CompostoDa IF NOT EXISTS(
	IDProdotto INTEGER(11),
	IDIngrendiente INTEGER(11),
	PRIMARY KEY(IDProdotto, IDIngrendiente)
);

/**
 * Creazione tabella Pizzeria.
 */
CREATE TABLE Pizzeria IF NOT EXISTS(
	IDPizzeria INTEGER(11) PRIMARY KEY,
	Nome VARCHAR(40) NOT NULL,
	NumeroTelefono VARCHAR(30) NOT NULL,
	CAP VARCHAR(5) NOT NULL,
	Paese VARCHAR(40) NOT NULL,
	Via VARCHAR(50) NOT NULL,
	NumeroCivico INTEGER(5) NOT NULL,
	Asporto BOOLEAN NOT NULL
);

/**
 * Creazione tabella Appartiene (associazione tra Prodotto e Pizzeria).
 */
CREATE TABLE Appartiene IF NOT EXISTS(
	IDProdotto INTEGER(11),
	IDPizzeria INTEGER(11),
	PRIMARY KEY(IDProdotto, IDPizzeria)
);

