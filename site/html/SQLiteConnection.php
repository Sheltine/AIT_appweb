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
    
    public function modUserPassword($login, $hash){
        
         if(!$this->isUserInDb($login) || $hash === NULL)
            return 0;
        
         $stmt = $this->pdo->prepare("UPDATE users SET hash=:hash 
                                     WHERE login=:login;");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':hash', $hash);

        return $stmt->execute();                             
    }
    
    public function modUserValidity($login, $validity){
        
         if(!$this->isUserInDb($login) || $validity === NULL)
            return 0;
        
        $stmt = $this->pdo->prepare("UPDATE users SET validity=:validity 
                                     WHERE login=:login;");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':validity', $validity);

        return $stmt->execute();                           
    }
    
    public function modUserRole($login, $role){

         if(!$this->isUserInDb($login) || $role === NULL)
            return 0;
        
        $stmt = $this->pdo->prepare("UPDATE users SET role=:role 
                                     WHERE login=:login;");
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':role', $role);

        return $stmt->execute();                        
    }
    
    public function delUser($login){
    
         if(!$this->isUserInDb($login))
            return 0;
         
         $stmt = $this->pdo->prepare("DELETE FROM users WHERE login=:login;");
         $stmt->bindParam(':login', $login);
         
         return $stmt->execute();
         
    }
    
    public function isUserInDb($login){
        $result = $this->pdo->query('SELECT login FROM users');
        foreach ($result as $val){

            if ($val['login'] === $login){
                return true;
            }
        }
        return false;

    }
}

?>
