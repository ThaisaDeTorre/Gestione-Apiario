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
La gestione dell'apiario avverrà tramite web, l'utente dovrà loggarsi con il suo utente e per poter gestire le sue arnie utilizzerà una pagina web come interfaccia grafica. Il sito sarà sempre raggiungibile da qualsiasi dispositivo con una connessione internet.

### Analisi e specifica dei requisiti
  
  La tabella dei requisiti decisi dopo aver analizzato le specifiche con il professore:

  |**ID** |**Nome** |**Descrizione**|**Priorità**|
  |----|------------|--------|----|
  |1|Web Server o servizio hosting |Avere un web server o un servizio di hosting con il quale gestire il sito web|1|
  |2|Interfaccia grafica|Pagina HTML|1|
  |3|Diario|Ogni arnia avrà a disposizione un diario nel quale si possono inserire e salvare eventuali annotazioni|1|
  |4|Calendario|Tutte le attività registrate dovranno essere visibili sul calendario con indicata la durata dell'attività|1|
  |5|Notifiche|Alla scadenza di ogni attività verrà inviata una notifica|1|
  |6|Numero arnie |L’apicoltore ha a disposizione un numero indeterminato di arnie|1|
  |7|Ape regina|Ogni arnia avrà salvata la data dell'anno di nascita dell'ape regina|1|
  |8|Login e registrazione|Dovrà esserci una maschera dove l'utente avrà la possibilità di loggarsi o di registrarsi|1|
  |9|Trattamenti sanitari|Per ogni arnia sarà possibile indicare quando sono stati fatti i trattamenti sanitari e per quanti giorni|1|
  |10|Meteo|Nel diario/calendario verranno registrate le info meteo della zona, sfruttando qualche servizio meteo geografico|1|

  
  



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

  - Oracle Virtual Box 6.0: Software per la virtual machine
  - VM con windows 10 - 1903: VM per avere un web server sul quale lavorare e testare tutto in attesa del servizio hosting
  - Gantt project 2.8.11: Software per il diagramma di Gantt
  - WAMP 7.4.10 windows x64: per il web server
  - brackets: Editor per scrivere il codice 
  - hosting infomaniak (con phpmyadmin per gestire il db): Servizio hosting fornito dalla scuola per il sito
  - jQuery 3.5.1: libreria javascript
  - Open weather API: API per prendere i dati meteo in tempo reale
 
  
  La gestione dell'apiario sarà una web app, percui sarà accessibile da qualsiasi dispositivo con connessione ad internet. Non è necessario avere un hardware potente.


## Progettazione

Questo capitolo descrive esaustivamente come deve essere realizzato il
prodotto fin nei suoi dettagli. Una buona progettazione permette
all’esecutore di evitare fraintendimenti e imprecisioni
nell’implementazione del prodotto.

### Design dell’architettura del sistema

![design architettura](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/design_architettura.PNG)
Il sito web comunica con php richiedendo i dati da stampare, php comunica con il database di MySQL mandando i dati che prende dal sito e mandando i dati dal database al sito.


### Schema E-R, schema logico e descrizione.

![schema ER](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/schema_ER_db.PNG)

In questo schema E-R sono rappresentate tutte le entità necessarie al progetto: 

- Ogni utente è identificato da un id, ha nome, una password e un'email.
- Ogni arnia è identificata da un id, ha nome, un luogo, un diario e la data di nascita dell'ape regina.
- Ogni trattamento è identificato da un id, ha una data d'inizio e una data di fine.
- Ogni evento è identificato da un id, ha una data d'inizio, una data di fine, un nome, un tipo (evento, festività e compleanno) e una eventuale descrizione.
- La meteo viene salvata ogni giorno ed è identificata dalla data del giorno, ha una descrizione che indica lo stato (ad esempio 'nuvoloso'), una temperatura minima e una massima. Dopo aver trovato l'API di open weather ho aggiunto anche i campi per il vento e l'umidità.

Un utente gestisce da 0 a n arnie, un'arnia a sua volta può aver fatto da 0 a n trattamenti; può avere da 0 a n eventi ma ha sempre la meteo di almeno 1 giorno salvata, fino a n giorni.


![schema_logico](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/schema_logico_db.PNG)

In questo schema sono segnati tutti i campi con il tipo, le primary key e le foreign keys.

### Design delle interfacce

![schema login registrazione](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/schema_login_registrazione.PNG)

La prima pagina che appare quando si entra sul sito è quella del login **(schema a sinistra)**, se non si ha un account basta cliccare sul link sotto al pulsante 'conferma' per essere reindirizzati sulla pagina per la registrazione dell'account **(schema a destra)**. Una volta registrati appare un messaggio con il risultato della registrazione (se è andato a buon fine o meno) e si può tornare alla pagina di login cliccando sul link sotto al pulsante ed accedere con le proprie credenziali. 

![selezione arnia page](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/gui_select-beehive.png)

Una volta loggati si viene reindirizzati sulla pagina per la selezione dell'arnia, dove c'è la lista delle arnie dell'utente. In questa pagina c'è il form per registrare una nuova arnia, si può eliminare un'arnia selezionata oppure si può selezionare un'arnia per andare sulla home per la gestione.

![schema home page](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/schema_home.PNG)

Dopo aver selezionato l'arnia si arriva nella pagina per la sua gestione, a sinistra c'è un navbar per navigare facilmente nella pagina. Nella home vi sarà visualizzata la meteo, il calendario, i trattamenti e i dati dell'arnia. 

### Design procedurale
Per la logica del sito ho scritto metacodice. Per il login e la registrazione dell'utente avendoli scaricati online ho guardato e capito il codice per riadattato e commentarlo quindi non ho metacodice.

#### Login

HTML + JS
---------
btn on click
  loginValidation() 
    |-> controllo i dati
    return isValid
 
 PHP
 ----------
 login()
   controllo dati
   if userExists && password corrisponde
   session_start
   reindirizzo su selezione arnia  
 
#### Registrazione

HTML + JS
---------
btn on click
  loginValidation() 
    |-> controllo i dati
    return isValid
 
 PHP
 ----------
 login()
   if !userExists
    controllo dati
    -> insert user in db

#### Selezione Arnia
- mostrare arnie:
  getUserId()
    select * from arnia where user_id = ?
    
- selezione:
  click arnia
  click btn select
    |-> getBeehiveId
      set session var beeId
      header(home.php)

- eliminazione:
  click arnia
  click btn delete
    |-> getBeehiveId
      delete arnia where id=?
    refresh page

- aggiunta:
  click arnia
  click btn add
    beehiveValidation() -> controllo input
      passo a php -> registerBeehive()
        if !exixts
        controllo dati
        insert into beehive (valori)
        refresh pagina per ricaricare dati  
    
    
#### Home
- Meteo
  preso codice open weather per mostrare meteo
  
- Calendario
  preso codice evo-calendar
  - add event
    eventValidation() -> controllo input
      passo a php -> registerEvent()
        controllo dati
        insert into event (valori)
        refresh pagina per ricaricare dati  
        
- Trattamenti
  mostro
  - add
    treatmentValidation() -> controllo input
      passo a php -> registerTreatment()
        controllo se non ne esiste gia uno con la stessa data 
        controllo dati
        insert into event (valori)
        refresh pagina per ricaricare dati
    

- Dati
  getUserId
  select * from user where id = ?

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
Dopo ogni aggiunta nel codice ne testavo il funzionamento, per esempio dopo aver finito di scrivere il form per l'aggiunta delle arnie e messo i controlli testavo se mi prendeva comunque i campi vuoti o inserivo testo nella data di nascita della regina. 

### Mancanze/limitazioni conosciute

Descrizione con motivazione di eventuali elementi mancanti o non
completamente implementati, al di fuori dei test case. Non devono essere
riportati gli errori e i problemi riscontrati e poi risolti durante il
progetto.

## Consuntivo
![gantt consuntivo](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/gantt_consuntivo.png)
Consuntivo del tempo di lavoro effettivo e considerazioni riguardo le
differenze rispetto alla pianificazione (cap 1.7) 

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

-   https://colorlib.com/etc/bootstrap-sidebar/sidebar-01/, *Bootstrap template*, 24.09.2020.

-   https://www.wampserver.com/en/, *WAMP server*, 10.10.2020.

-   https://phppot.com/php/user-registration-in-php-with-login-form-with-mysql-and-code-download/, *Form login e registrazione*, 08.10.2020.

-   https://openweathermap.org/api/one-call-api?gclid=EAIaIQobChMIwt6n_Mqk7AIVkN4YCh3K4AHZEAAYASAAEgKQUfD_BwE, *Open weather API*, 08.10.2020.

-   https://www.jqueryscript.net/demo/event-calendar-evo/, *Evo-calendar*, 10.12.2020.




## Allegati

-   [Diari di lavoro](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Diari/)

-   [Codice sorgente](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/src/)

-   [Documentazione evo-calendar](https://github.com/edlynvillegas/evo-calendar)

-   [Documentazione login e registrazione](https://phppot.com/php/user-registration-in-php-with-login-form-with-mysql-and-code-download/)

-   [Mandato](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/QdC_Primo_Semestre_GestioneApiario.docx)
