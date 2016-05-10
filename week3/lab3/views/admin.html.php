<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        if($_SESSION['user_id'] == 0)
        {
            echo "no no no";
        }
        else
        {
            echo "yes yes yes";
        }
        ?>
    </body>
</html>
