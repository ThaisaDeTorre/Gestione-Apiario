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

![use case](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/use_case.PNG)


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
 
  
  La gestione dell'apiario sarà una web app, per cui sarà accessibile da qualsiasi dispositivo con connessione ad internet. Non è necessario avere un hardware potente.


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

- HTML + JS
  - btn on click
    - loginValidation() 
       - controllo i dati
       - return isValid ? true : false
 
- PHP
  - login()
    - controllo dati
    - if userExists && password corrisponde
      - session_start
      - reindirizzo su selezione arnia  

#### Registrazione

- HTML + JS
  - btn on click
    - loginValidation() 
      - controllo i dati
      - return isValid ? true : false

- PHP:
  - login()
    - if !userExists
      -  controllo dati
        - insert user in db

#### Selezione Arnia
- mostrare arnie:
  - getUserId()
    - select * from arnia where user_id = ?
    
- selezione:
  - click arnia
  - click btn select
    - getBeehiveId
      - set session var beeId
      - header(home.php)

- eliminazione:
  - click arnia
  - click btn delete
    - getBeehiveId
      - delete arnia where id=?
      - refresh page

- aggiunta:
  - click arnia
  - click btn add
    - beehiveValidation() -> controllo input
      - passo a php -> registerBeehive()
        - if !exixts
        - controllo dati
        - insert into beehive (valori)
        - refresh pagina per ricaricare dati  
    
    
#### Home
- Meteo
  preso codice open weather per mostrare meteo
  
- Calendario
    - show
      - getEvent()
        - select * from event where bee_id = ?
  - preso codice evo-calendar
  - add event
    - eventValidation() -> controllo input
      - passo a php -> registerEvent()
        - controllo dati
        - insert into event (valori)
        - refresh pagina per ricaricare dati  
        
#### Trattamenti
  - show
      - getTreat()
        - select * from treat where bee_id = ?
  - add
    - treatmentValidation() -> controllo input
      - passo a php -> registerTreatment()
        - controllo se non ne esiste gia uno con la stessa data 
        - controllo dati
        - insert into event (valori)
        - refresh pagina per ricaricare dati
    
#### Dati
  - getUserId
  - select * from user where id = ?

## Implementazione

Questo progetto necessita di un web server su cui mettere il sito, per cui ho cominciato con il creare una macchina virtuale Windows 10 per poter installare WAMP (Windows, Apache, MySQL, Php). Una volta creata ho scaricato e installato WAMP sulla VM per poter lavorare.
In seguito la scuola mi ha messo a disposizione il servizio di Infomaniak (FTP e PhpMyAdmin) per lavorare.

### Database
Una volta che il web server funziona si inizia a creare il database basandosi sugli schemi fatti in precedenza. Il file sql contenente tutta la struttura del database è molto semplice, contiene le cinque tabelle necessarie e basta, i dati verranno inseriti quando l'utente ne aggiungerà usando il sito.
La connessione al database avviene nella classe `DataSource.php`, per connettersi al database si deve definire l'utente, la password, l'host e il nome del database proprio come se ci si dovesse connettere dal cmd. 
In questo caso si deve inserire il valore alle costanti: 
```php
const HOST = 'localhost';
const USERNAME = 'username';
const PASSWORD = 'password';
const DATABASENAME = 'db_name';
```

### Login
Per il form del login e la registrazione dell'utente ho usato del codice preso online da phppot, l'ho studiato e adattato alle mie necessità. 
Quando l'utente inserisce i dati nel form per il login e preme il pulsante, il form va a richiamare la funzione `loginValidation()` che va a controllare la validità dei dati passati dall'utente. Se i dati sono validi ritorna `true`, altrimenti ritorna `false`. 
Con php controllo se il `$_POST` del bottone è vuoto, se non lo è significa che i valori di input sono validi quindi il form passa a php i valori di input. A questo punto richiamo la funzione `loginMember()` per loggare l'utente; il metodo ritorna lo stato del login, se è andato a buon fine o meno.

Controllo se esiste un utente con lo stesso username, ricontrollo i dati anche dal lato server e se sono validi ridirigo l'utente alla pagina di selezione arnia dopo aver iniziato la sessione e settato le variabili da utilizzare in quest'ultima.
```php
public function loginMember()
{
    // select the user based on the username
    $memberRecord = $this->getMember($_POST["username"]);
    $loginPassword = false;

    // check if there is a user with that username
    if (! empty($memberRecord)) {
        // check if the password is not null or empty
        if (! empty($_POST["login-password"]) && ! is_null($_POST["login-password"])) {
            $password = $_POST["login-password"];
        }
        $hashedPassword = $memberRecord[0]["password"];
        $loginPassword = false;
        
        if (password_verify($password, $hashedPassword)) {
            $loginPassword = true;
        }
    } else {
        $loginPassword = false;
    }
    
    // if the password is right redirect the user to the select-beehive page
    if ($loginPassword) {
        // login sucess so store the member's username in the session
        session_start();
        $_SESSION["username"] = $memberRecord[0]["username"];
        session_write_close();
        $url = "./select-beehive.php";
        header("Location: $url");
    } else if (!$loginPassword) {
        $loginStatus = "Username o password errata.";
        return $loginStatus;
    }
}
```
### Sicurezza login
Per le pagine del sito che si possono visualizzare solamente se si è loggati, come prima cosa nel file devo controllare che la variabile `$_SESSION['username']` sia settata, in questo modo controllo se chi sta vedendo quella determinata pagina è loggato o meno. Se non è loggato lo reindirizzo al `login.php`.
```php
// start the session
session_start();
use Phppot\Member;

// check if the username is set in the session
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
    // code ...
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

```

### Registrazone / aggiunta dati
Per la registrazione utente, per l'aggiunta di una nuova arnia, per l'aggiunga di trattamenti o eventi la logica è la stessa. C'è un form nel quale l'utente inserisce i dati che vengono controllati tramite un metodo che ne verifichi la validità lato client. Se i dati passano il primo controllo, viene controllato da php se il bottone non sia vuoto e viene chiamato il metodo per la registrazione del dato della classe `Member.php`. 

Questo è il metodo per registrare l'utente, ma le differenze tra questo metodo e la registrazione degli altri dati sono minime.
In tutti i casi devo controllare se esiste già un record uguale a quello che voglio aggiungere, se non esiste controllo la validità dei dati di nuovo per poi fare la query ed eseguirla sul database. Come sempre il metodo ritorna se l'azione è andata a buon fine o meno in modo da stamparne lo stato sulla pagina per l'utente.
```php
public function registerMember()
{
    $isUsernameExists = $this->isUsernameExists($_POST["username"]);
    $isEmailExists = $this->isEmailExists($_POST["email"]);
  
    // check if username or email already exist in the database
    if ($isUsernameExists) {
        $response = array(
            "status" => "error",
            "message" => "Username already exists."
        );
    } else if ($isEmailExists) {
        $response = array(
            "status" => "error",
            "message" => "Email already exists."
        );
    } else {
        // hashes the password if it's not empty
        if (! empty($_POST["signup-password"])) {
            $hashedPassword = password_hash($_POST["signup-password"], PASSWORD_DEFAULT);
        }
        // insert values in the database
        $query = 'INSERT INTO user (username, password, email) VALUES (?, ?, ?)';
        $paramType = 'sss';
        $paramValue = array(
            $_POST["username"],
            $hashedPassword,
            $_POST["email"]
        );
        $memberId = $this->ds->insert($query, $paramType, $paramValue);
        if (! empty($memberId)) {
            $response = array(
                "status" => "success",
                "message" => "You have registered successfully."
            );
        }
    }
    return $response;
}
```


### Selezionare i dati 
Come per la registrazione, la logica si ripete dato che nel sito vengono mostrati sempre i dati relativi alle arnie per cui bisogna prenderli dal database e, tramite php, mostrarli a schermo all'utente. Prendendo ad esempio nella pagina `select-beehive.php` la lista di arnie dell'utente: la query è molto semplice, sarebbe `SELECT * FROM beehive WHERE user_id = ?` dove '?' è l'id dell'utente di cui dobbiamo stampare le arnie.
Dobbiamo prendere `user_id` per stampare solo le arnie dell'utente loggato, usiamo quindi `getUserId($username)` che ritorna l'id basandosi sul nome utente e usarlo in `getBeeData($beeId)`:
    
```php
public function getUserId($username)
{
    $query = 'SELECT id FROM user where username = ?';
    $paramType = 's';
    $paramValue = array(
        $username
    );
    $userId = $this->ds->select($query, $paramType, $paramValue);
    $id = $userId[0];
    return $id['id'];
}

public function getBeeData($beehiveId)
{
    $query = 'SELECT name AS "Nome", queen_bee_birth AS "Anno nascita ape regina" FROM beehive where beehive.id = ?';

    $paramType = 's';
    $paramValue = array(
        $beehiveId
    );
    $memberRecord = $this->ds->select($query, $paramType, $paramValue);

    return $memberRecord;
}
```

Non mi resta che richiamare nel mio file `select-beehive.php` il risultato della query e stamparlo con un ciclo:
Seleziono i dati
```php
// import Member.php
require_once './Model/Member.php';
$member = new Member();

// get all the beehives of the user logged
$beehiveResult = $member->getBeehive($username);
```
Stampo i dati
```php
<?php
    if(! empty($beehiveResult)) {
        foreach ($beehiveResult as $arnie) {
            foreach ($arnie as $nomeArnia) {
            ?>
            <input id="<?php echo $nomeArnia;?>" type="radio" value="<?php echo $nomeArnia;?>" name="beehive"> 

            <label for="<?php echo $nomeArnia;?>"><?php echo $nomeArnia;?></label><br>

            <?php
            }
        }
        ?>
        <input id="delete-beehive" class="btn btn-primary" type="submit" value="Elimina" name="delete-beehive"><br><br>

        <input id="selected-beehive" class="btn btn-primary" type="submit" value="Seleziona" name="selected-beehive">
        <?php
    }
?>
```

### Cancellare i dati
Anche qui ho spesso bisogno di cancellare i dati che inserisco, prendendo d'esempio le arnie: seleziono l'arnia che voglio eliminare tramite il radio button e premo sul bottone 'Elimina'. In quel momento tramite php controllo se il bottone 'elimina' è stato premuto, se è stato premuto salvo il risultato dell'azione nella variabile `$deleteResponse` che stamperò per l'utente come feedback. Viene richiamato il metodo `deleteBeehive($param)` a cui passo `$_POST["beehive"]` in modo da cancellare solo l'aria selezionata.
```php
public function deleteBeehive($name)
{
    $beeId = $this->getBeehiveId($name);
    // delete also the treatment of the deleted beehive
    $query = 'DELETE FROM treatment WHERE beehive_id = ?';
    $paramType = 's';
    $paramValue = array(
        $beeId
    );
    $treatId = $this->ds->insert($query, $paramType, $paramValue);
    // delete the beehive
    $query = 'DELETE FROM beehive WHERE id = ?';
    $memberId = $this->ds->insert($query, $paramType, $paramValue);

    if (! empty($memberId) && ! empty($treatId)) {
            $response = array(
                "status" => "success",
                "message" => "Arnia eliminata."
            );
        } else {
            $response = array(
                "status" => "error",
                "message" => "Errore eliminazione arnia."
            );
        }

    // Refresh the page to show the updated beehive list.
    $url = "./select-beehive.php";
    header("Location: $url");
    return $response;
}   
```
### Diario
Il diario è un semplice campio di testo nel quale posso scrivere liberamente, il contenuto del diario dell'apiario corrente lo posso prendere semplicemente inserendo il risultato di `getDiary($beeId)` che funziona come gli altri get *(spiegati in [Selezionare i dati](#Selezionare-i-dati))*.

Una volta modificato però dobbiamo salvare i cambiamenti apportati, in questo caso prendiamo il contenuto del diario e facciamo un `UPDATE` al database. Prendendo spunto dall'[aggiunta dati](#Registrazone-/-aggiunta dati) sfuttiamo un bottone per confermare le modifiche e passarle al database. Sta volta però richiamiamo il metodo `setDiary($id)`:
```php
public function setDiary($id)
{
    $txt = $_POST['diary'];
    $query = "update beehive set diary = '".$txt."' where id = ?";
    $paramType = 's';
    $paramValue = array(
        $id
    );
    $diaryResponse = $this->ds->insert($query, $paramType, $paramValue);

    if (isset($diaryResponse)) {
        $response = array(
            "status" => "success",
            "message" => "Salvataggio riuscito."
        );
    } else {
        $response = array(
            "status" => "error",
            "message" => "Errore salvataggio non riuscito."
        );
    }

    // Refresh della pagina cosi vedo nella lista la nuova arnia creata.
    $url = "./home.php";
    header("Location: $url");
    return $response;
}
```

### Meteo
La meteo la prendo grazie all'API Open Weather, per poter stampare i dati del meteo devo creare un account openweather per poter mettere le mie credenziali nel codice e prendere i dati. L'apiKey viene data una volta creato l'account, per il resto basta mettere nel codice questo pezzo:
```html
<!-- Open Weather Map code --> 
<?php
    $apiKey = "key";
    $cityId = "2657896"; // Zurigo
    $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apiKey;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    curl_close($ch);
    $data = json_decode($response);
    $currentTime = time();
?>
<div class="report-container">
  <div class="time">
    <div><?php echo date("l g:i a", $currentTime); ?></div>
    <div><?php echo date("jS F, Y",$currentTime); ?></div>
    <div><?php echo ucwords($data->weather[0]->description); ?></div>
  </div>
  <div class="weather-forecast">
    <span> <?php echo $data->main->temp_max; ?>°C (max)</span>
    <span><?php echo $data->main->temp_min; ?>°C (min)</span>
  </div>
  <div class="time">
    <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
    <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
  </div>
</div>
```

### Calendario
Anche il calendario l'ho trovato già fatto, mi è bastato integrarlo nel codice e cambiarne il css per adattarlo alla grafica del sito dell'apiario.

## Test
Dopo ogni aggiunta nel codice ne testavo il funzionamento, per esempio dopo aver finito di scrivere il form per l'aggiunta delle arnie e messo i controlli testavo se mi prendeva comunque i campi vuoti o inserivo testo nella data di nascita della regina. 

## Consuntivo
![gantt consuntivo](https://github.com/ThaisaDeTorre/Gestione-Apiario/blob/master/Documenti/gantt_consuntivo.png)
Consuntivo del tempo di lavoro effettivo e considerazioni riguardo le
differenze rispetto alla pianificazione (cap 1.7) 

## Conclusioni

Questo progetto è abbastanza funzionale, ci sono ancora dei dettagli da mettere a posto ma trovo che faccia quello che deve fare.
Sono abbastanza soddisfatta di come sia andato il progetto, a parte qualche problema che mi ha preso piu tempo del previsto sono riuscita a fare gran parte del lavoro e ne sono abbastanza felice. 
Ho avuto dei problemi soprattutto all'inizio perché ero un po' spaesata, non conoscendo molto bene php e non avendo mai fatto nessun progetto prima non sapevo da dove cominciare infatti partire è stata dura, ma una volta partita sono andata sempre piu decisa.

### Sviluppi futuri
  Migliorie o estensioni che possono essere sviluppate sul prodotto.

### Considerazioni personali
  Mi è piaciuto molto questo progetto, a parte i problemi iniziali il resto è andato piuttosto bene. Mi è stato molto utile per capire meglio php e per imparare come sfuttare i database nei siti web.

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
