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
        // http://php.net/manual/en/class.directoryiterator.php
        //DIRECTORY_SEPARATOR 
        session_start();
        $folder = './uploads';
        if ( !is_dir($folder) ) {
            die('Folder <strong>' . $folder . '</strong> does not exist' );
        }
        $directory = new DirectoryIterator($folder);
         $values = filter_input_array(INPUT_POST);
         echo $values['name'];
        ?>
     
            <li>Image</li>

    </body>
</html>
