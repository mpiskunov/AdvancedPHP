<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DBSpring
 *
 * @author Matt
 */
class DAO extends DB  implements ICRUD{
    //put your code here
    function __construct(){
        
        $this->setDns( 'mysql:host=localhost;port=3306;dbname=PHPAdvClassSpring2016');
        $setUser = $this->setUser('root');
        $this->setPassword('');
       
    }
    
    public function create($values) {
        
    }

    public function delete($id) {
        
    }

    public function read($id) {
        
    }

    public function readAll() {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM address");
        $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
    return $results;
    }

    public function update($values) {
        
    }

}
