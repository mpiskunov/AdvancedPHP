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
        http_response_code(404);
        session_start();
       
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true)
        {?>
            <h3 style="margin-left: auto; margin-right: auto;display:table;">Crazy Cool Admin Page</h3>
            <br>
            <br>
            <form method="POST" action="#">
                <input type="submit" value="Log Out " name="btnSubmit">
            </form>
       <?php }
        else
        {
            ;
        }
        
        if (isset($_POST['btnSubmit']))
        {
            session_destroy();
            header("Location:index.php");
        }
        ?>
            
    </body>
</html>
