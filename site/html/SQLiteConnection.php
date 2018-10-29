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

    public function addMail($date, $sender, $receiver, $subject, $corpus){
        return $this->pdo->exec("INSERT INTO messages (reception_time, sender, receiver, subject, corpus) 
                                            VALUES ('$date', '$sender', '$receiver', '$subject', '$corpus');");
    }
    
    public function modUserPassword($login, $hash){

         if(!$this->isUserInDb($login) || $hash === NULL)
            return 0;
                
         $stmt = $this->pdo->prepare("UPDATE users SET password=:hash 
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

    public function modUser($login, $role, $validity, $newLogin){

        if(!$this->isUserInDb($login) || $role === NULL)
           return 0;
       
       $stmt = $this->pdo->prepare("UPDATE users SET role=:role,
                                                   login=:newLogin,
                                                   validity=:validity
                                    WHERE login=:login;");
       $stmt->bindParam(':login', $login);
       $stmt->bindParam(':newLogin', $newLogin);
       $stmt->bindParam(':role', $role);
       $stmt->bindParam(':validity', $validity);


       return $stmt->execute();                        
   }

    
    #CAREFUL BROTHER
    public function delUser($login){
    
         if(!$this->isUserInDb($login))
            return 0;
         
         $stmt = $this->pdo->prepare("DELETE FROM users WHERE login=:login;");
         $stmt->bindParam(':login', $login);
         
         return $stmt->execute();
         
    }

    public function delMail($id){
    
        if(!$this->isMailInDb($id))
           return 0;
        
        $stmt = $this->pdo->prepare("DELETE FROM messages WHERE id=:id;");
        $stmt->bindParam(':id', $id);
        
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

    public function isMailInDb($id){
        $result = $this->pdo->query('SELECT id FROM messages');
        foreach ($result as $val){

            if ($val['id'] === $id){
                return true;
            }
        }
        return false;

    }
    
    public function getRole($login){
         $stmt = $this->pdo->prepare("SELECT role FROM users WHERE login=:login;");
         $stmt->bindParam(':login', $login);
         $ret = $stmt->execute();
         $val = $stmt->fetch();

         
         return $val['role'];
    }
    
    public function getValidity($login){
        print_r($login);
        $stmt = $this->pdo->prepare("SELECT validity FROM users WHERE login=:login");
        $stmt->bindParam(':login', $login);
        $ret = $stmt->execute();
        $val = $stmt->fetch();
        return $val['validity'];
    }

    public function checkLogin($login, $password){
        $stmt = $this->pdo->prepare("SELECT password FROM users WHERE login=:login");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        $val = $stmt->fetch();
        if($val["password"] === $password){
            return true;
        }
        return false;
    }


    public function getUserMail($login){
        $index = 0;
        $mails = [];
        $stmt = $this->pdo->prepare("SELECT * FROM messages WHERE receiver=:login");
        $stmt->bindParam(':login', $login);
        $stmt->execute();
        foreach($stmt as $val){
            $mails[$index] = $val;
            $index++;
        }
        return $mails;
    }

    public function getMailById($id){
        $index = 0;
        $mail = [];
        $stmt = $this->pdo->prepare("SELECT * FROM messages WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        //$stmt->fetch();
        foreach ($stmt as $val){
            $mail[$index] = $val;
            $index++;
        }
        return $mail;
    }


    public function getUsersList(){
        $index = 0;
        $users = [];
        $stmt = $this->pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        foreach ($stmt as $val){
            $users[$index] = $val;
            $index++;
        }
        return $users;
   }

   public function getUserById($id){
        $index = 0;
        $user = [];
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        //$stmt->fetch();
        foreach ($stmt as $val){
            $user[$index] = $val;
            $index++;
        }
        return $user;
    }

}

?>
 