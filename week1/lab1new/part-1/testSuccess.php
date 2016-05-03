<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './autoload.php';

$successMsg = new SuccessMessage();
$message = "Success Message";
$successMsg->addMessage(1, $message);
echo $successMsg->getAllMessages()[1];