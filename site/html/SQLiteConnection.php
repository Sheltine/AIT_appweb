<?php 

require_once('config.php');

class SQLiteConnection {
    /**
     * PDO instance
     * @var type 
     */
    private $pdo;
 
    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
     
    public function connect() {

        if ($this->pdo == null) {

            $this->pdo = new \PDO("sqlite:" . config::PATH_TO_SQLITE_FILE);
        }
        return $this->pdo;
    }
    
    public function addUser($login, $hash, $validity, $role){
    
        return $this->pdo->exec("INSERT INTO users (login, password, validity, role) 
                                            VALUES ('$login', '$hash', '$validity', '$role');");

    }
}

?>
