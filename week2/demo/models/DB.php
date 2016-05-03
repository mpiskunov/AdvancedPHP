<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author Matt
 */
class DB {
    //put your code here
    
    private $db; 
    private $dns;
    private $user;
    private $password;
    

    function getDns() {
        return $this->dns;
    }

    function getUser() {
        return $this->user;
    }

    function getPassword() {
        return $this->password;
    }

    function setDns($dns) {
        $this->dns = $dns;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function __construct($dns, $user, $password) {
        $this->setDns($dns);
        $this->setUser($user);
        $this->setPassword($password);
    }
    

    
public function getDB() {
    try {
        /* Create a Database connection and 
         * save it into the variable */
        $this->db = new PDO($this->getDns(),$this->getUser, $this->getPassword());
        $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (Exception $ex) {
        /* If the connection fails we will close the 
         * connection by setting the variable to null */
        $this->closeDB();
        $message = $ex->getMessage();
        throw new Exception($ex->getMessage());
    }

    return $db;
}

private function closeDB() {
    $this->db = null;
}


    


}
