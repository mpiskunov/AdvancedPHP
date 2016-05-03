<?php

/**
 * Description of PhoneCRUD
 *
 * @author GFORTI
 */
class PhoneDAO extends DB implements IDAO {
    //put your code here
    
    
     function __construct() {
        
        $this->setDns('mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2016');
        $this->setPassword('');
        $this->setUser('root');
        
    }
    
    function create($values){
        $phoneVal = $values['phone'];
        $phoneType = $values['phonetype'];
        
        $DB = $this->getDB();
        $string = $DB->prepare('INSERT INTO phone SET phone = :phone, phonetype = :phonetype, logged = now(), lastupdated = now()"');
            $binds = array(
        ":phone" => $phone,
        ":phonetype" => $phoneType,
    );
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
        return true;
    }
    }
    function read($id){
        
    }
    function readAll(){
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM phone");

        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $results;
    }  
    function update($values){
        
    }
    function delete($id){
        
    }
}
