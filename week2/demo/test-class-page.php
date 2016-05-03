<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            
            include './models/TestClass.php';
            
            $test = new TestClass('bro');
            
            echo $test->getTest();
            
            //$test->
        
        ?>
    </body>
</html>
