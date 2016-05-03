<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once './autoload.php';

$errorMsg = new ErrorMessage();
$message = "Error Message";
$errorMsg->addMessage(1, $message);
echo $errorMsg->getAllMessages()[1];