1. [Introduzione](#introduzione)

  - [Informazioni sul progetto](#informazioni-sul-progetto)

  - [Abstract](#abstract)

  - [Scopo](#scopo)

1. [Analisi](#analisi)

  - [Analisi del dominio](#analisi-del-dominio)
  
  - [Analisi dei mezzi](#analisi-dei-mezzi)

  - [Analisi e specifica dei requisiti](#analisi-e-specifica-dei-requisiti)

  - [Use case](#use-case)

  - [Pianificazione](#pianificazione)

1. [Progettazione](#progettazione)

  - [Design dell’architettura del sistema](#design-dell’architettura-del-sistema)

  - [Design dei dati e database](#design-dei-dati-e-database)

1. [Implementazione](#implementazione)

1. [Test](#test)

  - [Protocollo di test](#protocollo-di-test)

  - [Risultati test](#risultati-test)

  - [Mancanze/limitazioni conosciute](#mancanze/limitazioni-conosciute)

1. [Consuntivo](#consuntivo)

1. [Conclusioni](#conclusioni)

  - [Sviluppi futuri](#sviluppi-futuri)

  - [Considerazioni personali](#considerazioni-personali)

1. [Sitografia](#sitografia)

1. [Allegati](#allegati)


## Introduzione

### Informazioni sul progetto

  **Responsabile progetto:** Luca Muggiasca

  **Autore:** Thaisa De Torre

  **Inizio:** 03.09.2020

  **Consegna:** 17.12.2020


### Abstract

  Un apicoltore ha bisogno di tenere organizzati i dati sulle proprie arnie, grazie a questo progetto l'apicoltore potrà gestire facilmente le sue arnie tramite una pagina web. Potrà avere memorizzate quante arnie vorrà, ogniuna con i suoi dati specifici come ad esempio l'anno di nascita dell'ape regina, il luogo e il nome dell'arnia. L'utente avrà a disposizione un calendario nel quale potrà aggiungere eventi, ogni arnia avrà il suo diario nel quale segnare delle note e una tabella nella quale salvare i trattamenti necessari. Questa web app ha anche a disposizione un servizio meteo in tempo reale, i cui dati vengono salvati anche nel database.
  Si possono trovare molti software simili con cui risolvere il problema.  
  
  > A apiarist needs to keep organized the data about his hives, thanks to this project the beekeeper will be able to easily manage his hives through a web page. He will be able to have as many hives stored as he wants, each one with its specific data such as the year of birth of the queen bee, the place and the name of the hive. The user will have a calendar in which he can add events, each hive will have its own diary in which to write notes and a table in which to save the necessary treatments. This web app also has a real-time weather service, whose data is also saved in the database.
  > Obviously, you can find many similar software with which to solve the problem.  
  
### Scopo

  Questo è un progetto didattico che serve a gestire degli apiari. E' fatto in modo da poterci accedere tramite computer, tablet o smartphone per poter gestire in modo semplice i propri apiari, ci sono funzionalità utili come un diario nel quale scrivere annotazioni per ogni arnia, un calendario in cui inserire gli eventi con notifiche, una tabella in cui salvare i trattamenti fatti e viene mostrata sempre anche la meteo della zona in cui è l'arnia. 


## Analisi

### Analisi del dominio

  Per un apicoltore è importante tenere organizzate le informazioni sulle proprie arnie, e finché il numero di arnie è basso la loro gestione è abbastanza semplice. Se però questo apicoltore decidesse di aquistare piu arnie, gestirle potrebbe diventare complicato, ed è qui che potrebbe servire questa applicaizione di gestione per le api.
  L'apicoltore potrà gestire facilmente le arnie tramite una pagina web. Si possono trovare molti software simili con cui risolvere il problema.  


### Analisi e specifica dei requisiti
  
  La gestione dell'apiario avverrà tramite web, l'utente dovrà loggarsi con il suo utente e per poter gestire le sue arnie utilizzerà una pagina web come interfaccia grafica. Il sito sarà sempre raggiungibile da qualsiasi dispositivo con una connessione internet.



  |**ID** |**Nome** |**Descrizione**|**Priorità**|
  |----|------------|--------|----|
  |1|Web Server funzionante|Avere un web server|1|
  |2|Interfaccia grafica|Pagina HTML|1|
  |3|Diario|Ogni arnia avrà a disposizione un diario nel quale si possono inserire e salvare eventuali annotazioni|1|
  |4|Calendario|Tutte le attività registrate dovranno essere visibili sul calendario con indicata la durata dell'attività|1|
  |5|Notifiche|Alla scadenza di ogni attività verrà inviata una notifica (tramite pop-up oppure email)|1|
  |6|Inserimento numero arnie |L’apicoltore dovrà poter inserire il numero desiderato di arnie|1|
  |7|Ape regina|Ogni arnia avrà salvata la data dell'anno di nascita dell'ape regina|1|
  |8|Maschera di login|Dovrà esserci una maschera dove l'utente si logga|1|
  |9|Trattamenti sanitari|Per ogni arnia sarà possibile indicare quando sono stati fatti i trattamenti sanitari e per quanti giorni|1|
  |10|Meteo|Nel diario/calendario verranno registrate le info meteo della zona, sfruttando qualche servizio meteo geografico|2|

  
  



**Spiegazione elementi tabella dei requisiti:**

**ID**: identificativo univoco del requisito

**Nome**: breve descrizione del requisito

**Descrizione**: descrizione del requisito

**Priorità**: indica l’importanza di un requisito nell’insieme del
progetto, definita assieme al committente. Ad esempio poter disporre di
report con colonne di colori diversi ha priorità minore rispetto al
fatto di avere un database con gli elementi al suo interno.


### Use case

![use case](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/use_case.png)


### Pianificazione

![Gantt_preventivo](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/gantt_preventivo.png)
Secondo la pianificazione le prime lezioni saranno dedicate all'analisi e alla progettazione, si dovranno comprendere bene tutti i requisiti e la situazione per poi passare agli schemi e alla gestione del tempo. Praticamente tutto il resto del tempo sarà dedicato all'implementazione, cioé a tutta la realizzazione del codice. Le ultime lezioni invece serviranno a sistemare la documentazione e a svolgere gli ultimi test.

### Analisi dei mezzi

  - Oracle Virtual Box 6.0: 
  - iso usata per vm
  - Gantt project: 2.8.11: per il diagramma di Gantt
  - WAMP 7.4.10 windows x64: per la fase iniziale e per tutti i test
  - brackets **<ver>**: per scrivere il codice 
  - hosting infomaniak (con phpmyadmin per gestire il db): hosting fornito dalla scuola
  librerie: 
    -bootstrap, jQuery, plug-in calendario
  
  
  La gestione dell'apiario sarà una web app, percui sarà accessibile da qualsiasi dispositivo con connessione ad internet.


## Progettazione

Questo capitolo descrive esaustivamente come deve essere realizzato il
prodotto fin nei suoi dettagli. Una buona progettazione permette
all’esecutore di evitare fraintendimenti e imprecisioni
nell’implementazione del prodotto.

### Design dell’architettura del sistema

Descrive:

-   La struttura del programma/sistema lo schema di rete...

-   Gli oggetti/moduli/componenti che lo compongono.

-   I flussi di informazione in ingresso ed in uscita e le
    relative elaborazioni. Può utilizzare *diagrammi di flusso dei
    dati* (DFD).

-   Eventuale sitemap

### Design dei dati e database

Descrizione delle strutture di dati utilizzate dal programma in base
agli attributi e le relazioni degli oggetti in uso.

### Schema E-R, schema logico e descrizione.

![schema ER](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/schema_ER_db.png)
Se il diagramma E-R viene modificato, sulla doc dovrà apparire l’ultima
versione, mentre le vecchie saranno sui diari.

![schema logico](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/schema_logico_db.png)

### Design delle interfacce

Descrizione delle interfacce interne ed esterne del sistema e
dell’interfaccia utente. La progettazione delle interfacce è basata
sulle informazioni ricavate durante la fase di analisi e realizzata
tramite mockups.

### Design procedurale

Descrive i concetti dettagliati dell’architettura/sviluppo utilizzando
ad esempio:

-   Diagrammi di flusso e Nassi.

-   Tabelle.

-   Classi e metodi.

-   Tabelle di routing

-   Diritti di accesso a condivisioni …

Questi documenti permetteranno di rappresentare i dettagli procedurali
per la realizzazione del prodotto.

## Implementazione

In questo capitolo dovrà essere mostrato come è stato realizzato il
lavoro. Questa parte può differenziarsi dalla progettazione in quanto il
risultato ottenuto non per forza può essere come era stato progettato.

Sulla base di queste informazioni il lavoro svolto dovrà essere
riproducibile.

In questa parte è richiesto l’inserimento di codice sorgente/print
screen di maschere solamente per quei passaggi particolarmente
significativi e/o critici.

Inoltre dovranno essere descritte eventuali varianti di soluzione o
scelte di prodotti con motivazione delle scelte.

Non deve apparire nessuna forma di guida d’uso di librerie o di
componenti utilizzati. Eventualmente questa va allegata.

Per eventuali dettagli si possono inserire riferimenti ai diari.

## Test

### Protocollo di test

Definire in modo accurato tutti i test che devono essere realizzati per
garantire l’adempimento delle richieste formulate nei requisiti. I test
fungono da garanzia di qualità del prodotto. Ogni test deve essere
ripetibile alle stesse condizioni.


|Test Case      | TC-001                               |
|---------------|--------------------------------------|
|**Nome**       |Import a card, but not shown with the GUI |
|**Riferimento**|REQ-012                               |
|**Descrizione**|Import a card with KIC, KID and KIK keys with no obfuscation, but not shown with the GUI |
|**Prerequisiti**|Store on local PC: Profile\_1.2.001.xml (appendix n\_n) and Cards\_1.2.001.txt (appendix n\_n) |
|**Procedura**     | - Go to “Cards manager” menu, in main page click “Import Profiles” link, Select the “1.2.001.xml” file, Import the Profile - Go to “Cards manager” menu, in main page click “Import Cards” link, Select the “1.2.001.txt” file, Delete the cards, Select the “1.2.001.txt” file, Import the cards |
|**Risultati attesi** |Keys visible in the DB (OtaCardKey) but not visible in the GUI (Card details) |


### Risultati test

Tabella riassuntiva in cui si inseriscono i test riusciti e non del
prodotto finale. Se un test non riesce e viene corretto l’errore, questo
dovrà risultare nel documento finale come riuscito (la procedura della
correzione apparirà nel diario), altrimenti dovrà essere descritto
l’errore con eventuali ipotesi di correzione.

### Mancanze/limitazioni conosciute

Descrizione con motivazione di eventuali elementi mancanti o non
completamente implementati, al di fuori dei test case. Non devono essere
riportati gli errori e i problemi riscontrati e poi risolti durante il
progetto.

## Consuntivo
![gantt consuntivo](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/gantt_consuntivo.png)
Consuntivo del tempo di lavoro effettivo e considerazioni riguardo le
differenze rispetto alla pianificazione (cap 1.7) (ad esempio Gannt
consuntivo).

## Conclusioni

Quali sono le implicazioni della mia soluzione? Che impatto avrà?
Cambierà il mondo? È un successo importante? È solo un’aggiunta
marginale o è semplicemente servita per scoprire che questo percorso è
stato una perdita di tempo? I risultati ottenuti sono generali,
facilmente generalizzabili o sono specifici di un caso particolare? ecc

### Sviluppi futuri
  Migliorie o estensioni che possono essere sviluppate sul prodotto.

### Considerazioni personali
  Cosa ho imparato in questo progetto? ecc

## Sitografia

1.  URL del sito (se troppo lungo solo dominio, evt completo nel
    diario),

2.  Eventuale titolo della pagina (in italico),

3.  Data di consultazione (GG-MM-AAAA).

**Esempio:**

-   http://standards.ieee.org/guides/style/section7.html, *IEEE
    Standards Style Manual*, 07-06-2008.

## Allegati

Elenco degli allegati, esempio:

-   Diari di lavoro

-   Codici sorgente/documentazione macchine virtuali

-   Istruzioni di installazione del prodotto (con credenziali
    di accesso) e/o di eventuali prodotti terzi

-   Documentazione di prodotti di terzi

-   Eventuali guide utente / Manuali di utilizzo

-   Mandato e/o Qdc

-   [Apiario](http://samtinfo.ch/i18dettha/Apiario/index.php)

-   …
