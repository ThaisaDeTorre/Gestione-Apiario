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
     * To check if the username already exists.
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
     * To check if the email already exists.
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
     * To signup / register a user.
     *
     * @return string[] registration status message
     */
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
            // hashed the password if it's not empty
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

    /**
     * To get registered user.
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
     * To login a user.
     *
     * @return string
     */
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
            // login sucess so store the member's username in
            // the session
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
    
    /**
     * To get the user id from the username.
     * @return the user id
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
     * To register a new beehive.
     *
     * @return string[] registration status message
     */
    public function registerBeehive($username)
    {
        // checks if the beehive already exists
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
        // Refresh the page to show the updated beehive list.
        $url = "./select-beehive.php";
        header("Location: $url");
        return $response;
    }

    /**
     * to get the beehives of the user.
     * @return string[] the beehives of the user
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
     * Checks if the beehive already exists by the name and the queen bee birthdate.
     *
     * @return boolean true if the beehive already exists
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
    
   /**
     * To get the beehive id from the name.
     *
     * @return the beehive id 
     */
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
     * Deletes the beehive selected.
     * @return string[] registration status message
     */
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
    
    /**
     * To get the notes from the diary.
     * @return string note of the diary
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
            return "";
        }
    }   
    
    /**
     * To update the edits on the diary.
     * @return string[] registration status message
     */
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
    
    /**
     * To get the treatment data from a beehive.
     * @return string[] treatment data of the beehive
     */
    public function getTreatmentData($beehiveId)
    {
        $query = 'SELECT date, duration FROM treatment WHERE beehive_id = ? ORDER BY date';

        $paramType = 's';
        $paramValue = array(
            $beehiveId
        );
        $memberRecord = $this->ds->select($query, $paramType, $paramValue);
        
        return $memberRecord;
    }
    
    /**
     * To get the data of a beehive from its id.
     * @return string[] data of the beehive
     */
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
     * Select the beehive setting the coockie with the id and the name, redirecting
     * the user to the home management page of the beehive.
     */
    public function selectBeehive($name)
    {
        $query = 'SELECT id, name FROM beehive where name = ?';
        $paramType = 's';
        $paramValue = array(
            $name
        );
        $result = $this->ds->select($query, $paramType, $paramValue);
        $beehive = $result[0];

        setcookie('beehive-name', $beehive['name']);
        setcookie('beehive-id', $beehive['id']);
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
        $memberId = $this->ds->insert($query, $paramType, $paramValue);
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
        
        // Refresh the page to show the updated treatment list.
        $url = "./home.php";
        header("Location: $url");
        return $response;
    }
    
    
}
