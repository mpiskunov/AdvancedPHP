<?php

/**
 * Description of PhoneCRUD
 *
 * @author GFORTI
 */
class DBAddress extends DB implements IDAO {
    //put your code here
    
     function __construct() {
        
        $this->setDns('mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2016');
        $this->setPassword('');
        $this->setUser('root');
        
    }
    
    function create($values){
        
        $db = $this->getDb();
         $stmt = $db->prepare("INSERT INTO address SET fullname = :fullname, email = :email, addressline1 = :addressline1, city = :city, state = :state, zip = :zip, birthday = :birthday");
        $binds = array(
            ":fullname" => $values['fullname'],
            ":email" => $values['email'],
            ":addressline1" => $values['addressline1'],
            ":city" => $values['city'],
            ":state" => $values['state'],
            ":zip" => $values['zip'],
            ":birthday" => $values['birthday'],
        );
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            return true;
        }

        return false;
    
//        $fullname = $values['fullname'];
//        $email = filter_input(INPUT_POST, 'email');
//        $addressline1 = filter_input(INPUT_POST, 'addressline1');
//        $city = filter_input(INPUT_POST, 'city');
//        $state = filter_input(INPUT_POST, 'state');
    }
    function read($id){
        
    }
    function readAll(){
        $db = $this->getDb();
        $stmt = $db->prepare("SELECT * FROM address");

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
