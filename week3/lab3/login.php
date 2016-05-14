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
    <body style="margin-left: auto; margin-right: auto; display: table;">
        <?php
            // put your code here
            require_once './autoload.php';
            session_start();

            $util = new Util();
            $validate = new Validator();
            $userDAO = new UserDAO();
            
            /* Shortcut to get all the values from the form */
            $values = filter_input_array(INPUT_POST);
            
            $email = $values['email'] ;
            $password = $values['password'];
      
             $errors = [];
                if($util->isPostRequest()){
                    if($userDAO->hasEmail($email))
                    {
                        $errors[] = "Email already exists.";
                        $password = "";
                    }
                    
                    if(count($errors == 0))
                    {
                        $user_id = $userDAO->getID($email, $password);
                        if($user_id == 0)
                        {
                            $errors[] = "Login unsuccesful";
                            $password = "";
                        }
                            
                        else
                        {
                            $_SESSION['logged_in'] = true;
                            header("Location: admin.php");
                        }   
                    }
                }
        ?>
        <h3>Log In</h3>
        <form action="#" method="post" >
            <p>UserName: <input name="email" value="<?php echo $email ?>"/></p>
            <p>Password: <input name="password"  value="<?php echo $password ?>" type="password"/></p>
            <button type="submit" value="submit"> Log In</button>
        </form>
        <br>
        <a href="index.php">Sign-up</a> 
    </body>
</html>
