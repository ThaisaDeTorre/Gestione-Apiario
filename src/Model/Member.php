<?php
namespace Phppot;

class Member
{

    private $ds;

    function __construct()
    {
        require_once __DIR__ . '/../lib/DataSource.php';
        $this->ds = new DataSource();
    }   
    
    /**
     * to check if the username already exists
     *
     * @param string $username
     * @return boolean
     */
    public function isUsernameExists($username)
    {
        $query = 'SELECT * FROM user where username = ?';
        $paramType = 's';
        $paramValue = array(
            $username
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * to check if the email already exists
     *
     * @param string $email
     * @return boolean
     */
    public function isEmailExists($email)
    {
        $query = 'SELECT * FROM user where email = ?';
        $paramType = 's';
        $paramValue = array(
            $email
        );
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }

    /**
     * to signup / register a user
     *
     * @return string[] registration status message
     */
    public function registerMember()
    {
        $isUsernameExists = $this->isUsernameExists($_POST["username"]);
        $isEmailExists = $this->isEmailExists($_POST["email"]);
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
            if (! empty($_POST["signup-password"])) {

                // PHP's password_hash is the best choice to use to store passwords
                // do not attempt to do your own encryption, it is not safe
                $hashedPassword = password_hash($_POST["signup-password"], PASSWORD_DEFAULT);
            }
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

    /**
     * Ritorna gli utenti registrati.
     * @return string[] con gli utenti registrati
     */
    public function getMember($username)
    {
        $query = 'SELECT * FROM user where username = ?';
        $paramType = 's';
        $paramValue = array(
            $username
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        return $memberRecord;
    }

    /**
     * to login a user
     *
     * @return string
     */
    public function loginMember()
    {
        $memberRecord = $this->getMember($_POST["username"]);
        $loginPassword = 0;
        if (! empty($memberRecord)) {
            if (! empty($_POST["login-password"]) && ! is_null($_POST["login-password"])) {
                $password = $_POST["login-password"];
            }
            $hashedPassword = $memberRecord[0]["password"];
            $loginPassword = 0;
            
            if (password_verify($password, $hashedPassword)) {
                $loginPassword = 1;
            }
            var_dump(password_verify($password, $hashedPassword));
        } else {
            $loginPassword = 0;
        }
        
        if ($loginPassword == 1) {
            // login sucess so store the member's username in
            // the session
            session_start();
            $_SESSION["username"] = $memberRecord[0]["username"];
            session_write_close();
            $url = "./select-beehive.php";
            header("Location: $url");
        } else if ($loginPassword == 0) {
            $loginStatus = "Invalid username or password.";
            return $loginStatus;
        }
    }
    
    /**
     * Trova l'id dell'utente.
     * @return l'id dell'utente
     */
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

    /**
     * per registrare un'arnia
     *
     * @return string[] registration status message
     */
    public function registerBeehive($username)
    {
        // controlli luogo?
        
        $isBeehiveExists = $this->isBeehiveExists($_POST["beehiveName"]);
        if ($isBeehiveExists) {
            $response = array(
                "status" => "error",
                "message" => "Arnia già esistente."
            );
        } else {
            $userId = $this->getUserId($username);
            $query = 'INSERT INTO beehive (name, queen_bee_birth, diary, user_id) VALUES (?, ?, "", ?)';
            $paramType = 'sss';
            $paramValue = array(
                $_POST["beehiveName"],
                $_POST["queenBee"],
                $userId
            );

            $memberId = $this->ds->insert($query, $paramType, $paramValue);
        
            if (! empty($memberId)) {
                $response = array(
                    "status" => "success",
                    "message" => "Arnia creata."
                );
            } else {
                $response = array(
                    "status" => "error",
                    "message" => "Errore creazione arnia."
                );
            }
        }
        // Refresh della pagina cosi vedo nella lista la nuova arnia creata.
        $url = "./select-beehive.php";
        header("Location: $url");
        return $response;
    }

    /**
     * Ritorna le arnie di un determinato utente.
     * @return string[] le arnie di un utente
     */
    public function getBeehive($username)
    {
        $userId = $this->getUserId($username);
        $query = 'SELECT name FROM beehive where user_id = ?';
        $paramType = 's';
        $paramValue = array(
            $userId
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        
        return $memberRecord;
    }   
    
    /**
     * controlla se l'arnia esiste controllando il nome e la data di nascita dell'ape regina.
     * @return boolean true se esiste gia un'arnia con il nome e la data di nascita dell'ape regina uguale
     */
    public function isBeehiveExists($nome)
    {
        $query = 'SELECT * FROM beehive where name = ?';
        $paramType = 's';
        $paramValue = array(
            $nome
        );
        
        $resultArray = $this->ds->select($query, $paramType, $paramValue);
        $count = 0;
        
        if (is_array($resultArray)) {
            $count = count($resultArray);
        }
        if ($count > 0) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    
    public function getBeehiveId($name)
    {
        $query = 'SELECT id FROM beehive WHERE name = ?';
        $paramType = 's';
        $paramValue = array(
            $name
        );
        $beeId = $this->ds->select($query, $paramType, $paramValue);
        $id = $beeId[0];
        return $id['id'];
    }
    
    /**
     * Elimina l'arnia selezionata dell'utente.
     * @return string[] registration status message
     */
    public function deleteBeehive($name)
    {
        $beeId = $this->getBeehiveId($name);
        
        $query = 'DELETE FROM treatment WHERE beehive_id = ?';
        $paramType = 's';
        $paramValue = array(
            $beeId
        );
        $treatId = $this->ds->insert($query, $paramType, $paramValue);
        
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

        $url = "./select-beehive.php";
        header("Location: $url");
        return $response;
    }   
    
    /**
     * Ritorna la stringa contenente il diario.
     * @return string il diario
     */
    public function getDiary($id)
    {
        $query = 'SELECT diary FROM beehive WHERE id = ?';
        $paramType = 's';
        $paramValue = array(
            $id
        );
        $diary = $this->ds->select($query, $paramType, $paramValue);
        $txt = $diary[0];
        if (! empty($diary)) {
            return trim($txt['diary']);
            
        } else {
            return " ";
        }
    }   
    
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
        header("Location: $url"); // ???? senza funziona
        return $response;
    }
    
    /**
     * Ritorna i dati sulle arnie dell'utente.
     * @return string[] i dati sulle arnie dell'utente
     */
    public function getTreatmentData($beehiveId)
    {
//        $query = 'SELECT date AS "Data trattamento", duration AS "Giorni trattamento" FROM beehive, treatment where beehive_id = ?';
        $query = 'SELECT date, duration FROM treatment WHERE beehive_id = ? ORDER BY date';

        $paramType = 's';
        $paramValue = array(
            $beehiveId
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        
        return $memberRecord;
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
    
    /**
     * Setta i cookie con il nome e l'id dell'arnia selezionata e reindirizza alla home page.
     */
    public function selectBeehive($name)
    {
        $query = 'SELECT id, name FROM beehive where name = ?';
        $paramType = 's';
        $paramValue = array(
            $name
        );
        $result = $this->ds->select($query, $paramType, $paramValue);
        
        // gestire ev. errori
        $beehive = $result[0];

        setcookie('beehive-name', $beehive['name']);
        setcookie('beehive-id', $beehive['id']);
//        print_r($_SESSION);
        $url = "./home.php";
        header("Location: $url");
    }
    
    public function registerTreatment()
    {
        
        $query = 'INSERT INTO treatment (date, duration, beehive_id) VALUES (?, ?, ?)';
        $paramType = 'sss';
        $paramValue = array(
            $_POST["treatmentDate"],
            $_POST["treatmentDuration"],
            $_COOKIE['beehive-id']
        );
        var_dump($paramValue);
        $memberId = $this->ds->insert($query, $paramType, $paramValue);
//        $memberId = 1;
        if (! empty($memberId)) {
            $response = array(
                "status" => "success",
                "message" => "Trattamento registrato."
            );
        } else {
            $response = array(
                "status" => "error",
                "message" => "Errore registratione trattamento."
            );
        }
        
        // Refresh della pagina.
        $url = "./home.php";
        header("Location: $url");
        return $response;
    }
    
    
}
