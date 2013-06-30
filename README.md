DBPizz
======

<!---
Cos'è DBPizz?
-------------

DBPizz è un portale che permette una più rapida e trasparente comunicazione tra cliente e pizzeria.
Il cliente avrà la possibilità di poter scorrere i menù delle pizzerie iscritte, egli avrà la possibilità di creare un'ordinazione solo dopo una registrazione che ne accuri l'identità, onde evitare scherzi e prevenire gli interessi e la professionalità della pizzeria in questione.
Il cliente si troverà nella condizione di scegliere se andare a ritirare il prodotto o farselo reperire a domicilio.
Il cliente in ognuno dei casi pagherà di persona alla pizzeria. Dunque il sistema non prevede la gestione dei pagamenti.

La pizzeria avrà la possibilità di usufruire dei servizi solo tramite iscrizione. La pizzerià potrà riferirsi al portale come un proprio sito.
Essa esporrà i suoi prodotti tra cibo e bibite con i rispettivi prezzi e descrizione degli ingredienti.
DBPizz provvederà in fase di richiesta del cliente di aggiungere o togliere ingredienti da uno specifico prodotto, in modo da semplificare la lettura dell'ordinazione alla pizzeria.
La pizzeria avrà la possibilità di disiscriversi dal portale in qualunque momento voglia.

Quali sviluppi si prospettano per DBPizz?
-----------------------------------------

Per il portale si prevede l'implementazione della comunicazione tramite smartphone con applicazione Android.
-->

DBPizz è uno scheletro di ciò che un giorno potrà essere un portale per facilitare l'interazione tra cliente e pizzeria.
Questo lavoro, puramente didattico, punta a dimostrare le nostre capacità nell'interfacciamento con i database e non ha nessuna finalità attuale per un ambiente produttivo.


Progettazione
-------------

La progettazione può essere visionata nella [cartella progettazione](https://github.com/JCPP/DBPizz/tree/master/progettazione).


Come provare il progetto
------------------------

Per poter testare il progetto sulla propria macchina, è necessario avere installato [PHP](http://php.net/) e [Composer](http://getcomposer.org/).
Una volta aver scaricato questi software, si deve effettuare il download del progetto da [github](https://github.com/JCPP/DBPizz/archive/master.zip) e posizionarlo nella propria cartella (*htdocs* per Apache) del web server.
Dopo aver scompattato l'archivio, si deve aprire la console, entrare nella cartella in cui abbiamo il progetto e digitare:
```shell
composer update
```
Composer effettuerà il download delle dipendenze di cui ha bisogno il progetto.
Per verificare che tutto funzioni come si deve, bisogna attivare il server e visitare la pagina [localhost/DBPizz-master](http://localhost/DBPizz-master).

### Visualizzare grafica ###
I passaggi precedenti portano a visualizzare il portale web senza la grafica (file CSS), dato che i riferimenti sono relativi alla root del web server.
Per renderla visibile si può eseguire uno dei seguenti passi:

* spostare il contenuto della cartella DBPizz-master nella cartella root del web server (*htdocs* nel caso di Apache).
* cambiare la configurazione del Document Root del server e nel caso di Apache si deve:
    - aprire il file *httpd.conf* presente nella cartella *conf*;
    - cercare la stringa *DocumentRoot* e sostituire il percorso che le sta accanto (esso dovrebbe contenere la cartella *htdocs*) con *localhost/DBPizz-master*;
    - cercare la stringa *Directory* e sostituire il percorso che le sta accanto (esso dovrebbe contenere la cartella *htdocs*) con *localhost/DBPizz-master*.


Interfaccia Web
---------------

L'interfaccia Web risulta essere molto intuitiva ed è costituita da 8 parti principali:

* [Home Page](#home-page)
* [Cliente](#cliente)
* [Prodotto](#prodotto)
* [Ordine](#ordine)
* [Ingrediente](#ingrediente)
* [Composto Da](#composto-da)
* [Pizzeria](#pizzeria)
* [Appartiene](#appartiene)

### Home Page ###
Questa pagina è vuota e contiene solo un semplice menu con tutte le varie sezioni del sito.

### Cliente ###
Questa pagina contiene la lista dei Clienti aggiunti al database e il link per il form di aggiunta.

#### Aggiungi cliente ####
Tramite il bottone apposito si possono aggiungere nuovi clienti, indicandone il nome e il cognome.
Nel caso in cui uno dei due campi non venga inserito, il sistema riporta l'errore.

### Prodotto ###
Questa pagina contiene la lista dei Prodotti aggiunti al database, il link per il form di aggiunta e un form per la ricerca personalizzata.

#### Aggiungi prodotto ####
Tramite il bottone apposito si possono aggiungere nuovi prodotti, indicandone il nome, il prezzo e gli ingredienti di cui è composto.
Nel caso in cui uno dei campi (a parte l'ingrediente) non venga inserito, il sistema riporta l'errore.

#### Ricerca prodotto ####
La ricerca può avvenire in base ai tre campi indicati nel paragrafo precedente.
Il sistema supporta la ricerca dei prodotti anche in base a più ingredienti.

### Ordine ###
Questa pagina contiene la lista dei Ordini aggiunti al database, il link per il form di aggiunta e un form per la ricerca personalizzata.

#### Aggiungi ordine ####
Tramite il bottone apposito si possono aggiungere nuovi ordini, indicandone il cliente, il prodotto e la data (nel formato [ISO 8601](http://it.wikipedia.org/wiki/ISO_8601)).
Nel caso in cui uno dei campi non venga inserito, il sistema riporta l'errore.

#### Ricerca ordine ####
La ricerca può avvenire in base ai tre campi indicati nel paragrafo precedente.

### Ingrediente ###
Questa pagina contiene la lista degli ingredienti aggiunti al database e il link per il form di aggiunta.

#### Aggiungi ingrediente ####
Tramite il bottone apposito si possono aggiungere nuovi ingredienti, indicandone il nome.
Nel caso in cui il campo non venga inserito, il sistema riporta l'errore.

### Composto da ###
Questa pagina contiene la lista delle associazioni tra Prodotti e Ingredienti e il link per il form di aggiunta.

#### Aggiungi composto da ####
Tramite il bottone apposito si possono aggiungere nuovi composto da, indicandone il Prodotto e l'Ingrediente.
Nel caso in cui uno dei due campi non venga inserito, il sistema riporta l'errore.

### Pizzeria ###
Questa pagina contiene la lista delle Pizzerie aggiunte al database, il link per il form di aggiunta e un form per la ricerca personalizzata.

#### Aggiungi pizzeria ####
Tramite il bottone apposito si possono aggiungere nuove pizzerie, indicandone il nome, il numero di telefono, il CAP, il Paese, la via, il numero civico e se supporta l'asporto.
Nel caso in cui uno dei campi non venga inserito, il sistema riporta l'errore.

#### Ricerca pizzeria ####
La ricerca può avvenire in base ai sette campi indicati nel paragrafo precedente.

### Appartiene ###
Questa pagina contiene la lista delle associazioni tra Prodotti e Pizzerie e il link per il form di aggiunta.

#### Aggiungi appartiene ####
Tramite il bottone apposito si possono aggiungere nuovi appartiene, indicandone il prodotto e la pizzeria.
Nel caso in cui uno dei campi non venga inserito, il sistema riporta l'errore.


Bug conosciuti
--------------

Il sistema ha alcuni bug presenti che sono indipendenti dal progetto e sono dovuti principalmente alla piattaforma di sviluppo scelta (PHP).

### Maximum execution time ###
L'errore riportato è il seguente: "Maximum execution time of 30 seconds exceeded". Questo viene mostrato durante il primo avvio dell'applicazione ed è dovuto principalmente
alle query che vengono effettuate per salvare i dati di SQLite.
Probabilmente questo comportamento è dovuto non tanto al numero di inserimenti effettuati, ma al fatto che la versione di PHP utilizzata per lo sviluppo del portale web (5.3.26) non
ha al suo interno una versione aggiornata di SQLite che permette l'inserimento multiplo di dati, nella forma:
```sql
INSERT INTO tbl_name (a,b,c)
VALUES
	(1,2,3),
	(4,5,6),
	(7,8,9);
```
### Lettere accentate ###
La descrizione del problema è riportata [qui](https://github.com/JCPP/DBPizz/issues/6).