<?php

/**
 * Description of DBSpring
 *
 * @author GFORTI
 */
class UserDAO extends DB implements IDAO {
    //put your code here
    
    function __construct() {
        
        $this->setDns('mysql:host=localhost;port=3306;dbname=phpadvclassspring2016');
        $this->setPassword('');
        $this->setUser('root');
        
    }
    
    function readAll() {
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM users");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
           $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $results;
    }
    
    function create($values){
        
        $hash = password_hash($values['password'], PASSWORD_DEFAULT);
        
        $db = $this->getDb();
        $stmt = $db->prepare("INSERT INTO users SET email = :email, password = :password, created = now()");
        $binds = array(
            ":email" => $values['email'],
            ":password" => $hash,
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }
    
    /*
     * Add this custom function to check if the phone has been added to the Database.
     */
     function hasEmail($email){
        
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM users where email = :email");
        $binds = array(
            ":email" => $email          
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }
    
    function getID($email, $password){
        $results = array();
        $db = $this->getDb();
         $stmt = $db->prepare("SELECT password, user_id FROM users where email = :email");
         $binds = array(
             ":email" => $email
         );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
             $results = $stmt->fetch(PDO::FETCH_ASSOC);
             
             if( password_verify( $password,$results['password']) )
             {
                 return $results['user_id'];
             }
        }
        return 0;
    }
    
    function read($id){
        
    }
    
    function update($values){
        
    }
    
    function delete($id){
        
    }

}
