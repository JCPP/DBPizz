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
Questo lavoro, puramente didattico, punta a dimostrare le nostre capacità nell'interfacciamento con i database e non ha nessuna finalità per un ambiente produttivo.


Progettazione
-------------

La progettazione può essere visionata nella [cartella progettazione](https://github.com/JCPP/DBPizz/tree/master/progettazione).


Come provare il progetto
------------------------

Per poter testare il progetto sulla propria macchina, è necessario avere installato [PHP](http://php.net/) e [Composer](http://getcomposer.org/).
Una volta aver scaricato questi software, si deve effettuare il download del progetto da [github](https://github.com/JCPP/DBPizz/archive/master.zip) e posizionarlo nella propria cartella del root server.
Dopo aver scompattato l'archivio, si deve aprire la console, entrare nella cartella in cui abbiamo il progetto e digitare:

    composer update

Composer effettuerà il download delle dipendenze di cui ha bisogno il progetto.
Per verificare che tutto funzioni come si deve, bisogna attivare il server e visitare la pagina [localhost](http://localhost).


Interfaccia Web
---------------

L'interfaccia Web risulta essere molto intuitiva ed è costituita da 8 parti principali:

* [Home Page](#home-page)
* Cliente
* Prodotto
* Ordine
* Ingrediente
* Composto Da
* Pizzerie
* Appartenere

### Home Page ###
Questa pagina è vuota e contiene solo un semplice menu con tutte le varie sezioni del sito.