<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './autoload.php';

$regMsg = new Message();
$message = "Regular Message";
$regMsg->addMessage(1, $message);
echo $regMsg->getAllMessages()[1];