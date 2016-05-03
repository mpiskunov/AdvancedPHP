<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Message
 *
 * @author Matt
 */
class Message implements IMessage {
    //put your code here
   
    protected $msg = array();
    
    public function addMessage($key, $msg) {
        return $this->msg[$key] = $msg;
    }
    public function removeMessage($key) {
        unset ($this->msg[$key]);
    }
    public function getAllMessages() {
        return $this->msg;
    }

}
