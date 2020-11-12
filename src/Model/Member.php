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
        $query = 'SELECT * FROM utente where username = ?';
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
        $query = 'SELECT * FROM utente where email = ?';
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
            $query = 'INSERT INTO utente (username, password, email) VALUES (?, ?, ?)';
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
        $query = 'SELECT * FROM utente where username = ?';
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
            //$url = "./home.php";
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
        $query = 'SELECT id FROM utente where username = ?';
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
        
        $isBeehiveExists = $this->isBeehiveExists($_POST["beehive-name"], $_POST["queenBee-info"]);
        
        if ($isBeehiveExists) {
            $response = array(
                "status" => "error",
                "message" => "Arnia già esistente."
            );
        } else {
            $userId = $this->getUserId($username);
            $query = 'INSERT INTO arnia (nome, anno_nascita_regina, utente_id) VALUES (?, ?, ?)';
            $paramType = 'sss';
            $paramValue = array(
                $_POST["beehive-name"],
                $_POST["queenBee-info"],
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
        
        return $response;
    }

    /**
     * Ritorna le arnie di un determinato utente.
     * @return string[] le arnie di un utente
     */
    public function getBeehive ($username)
    {
        $userId = $this->getUserId($username);
        $query = 'SELECT nome FROM arnia where utente_id = ?';
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
    public function isBeehiveExists($nome, $regina)
    {
        $query = 'SELECT * FROM arnia where nome = ? AND anno_nascita_regina = ?';
        $paramType = 'ss';
        $paramValue = array(
            $nome,
            $regina
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
}
