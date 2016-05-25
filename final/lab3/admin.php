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
            <h3 style="margin-left: auto; margin-right: auto;display:table;">Meme Site</h3>
            <br>
            <br>
            <form method="POST" action="#">
                <input type="submit" value="Log Out " name="btnLogout">
            </form>
            <form method="POST" action="views/upload-form.php">
                <input type="submit" value="Upload " name="btnSubmit">
            </form>
       <?php }
        else
        {
            ;
        }
        
        if (isset($_POST['btnLogout']))
        {
            session_destroy();
            header("Location:index.php");
        }
        ?>
            
    </body>
</html>
