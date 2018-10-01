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
    
    /**
     * add an user in the database. Return 0 if failed, positive integer otherwise
     */
    public function addUser($login, $hash, $validity, $role){
        
        if($this->isUserInDb($login))
            return 0;
            
        return $this->pdo->exec("INSERT INTO users (login, password, validity, role) 
                                            VALUES ('$login', '$hash', '$validity', '$role');");

    }
    
    public function modUser($login, $hash = NULL, $validity = NULL, $role = NULL){
        
        if($role !== NULL){
            
        }
            $role = "HAHA!";
        echo $login." ".$hash." ".$validity." ".$role;
    }
    
    private function isUserInDb($login){
        $result = $this->pdo->query('SELECT login FROM users');
        foreach ($result as $val){
        echo $val['login'];
            if ($val['login'] === $login)
                return true;
        }
        return false;
    }
}

?>
