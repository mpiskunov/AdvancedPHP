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
        $fileInfo = filter_input_array(INPUT_POST);
        
           if(array_key_exists('delete', $_POST) )
        {
              $filename =  $directory . "/uploads"."/" . $_POST['delete']; // build the full path here
        if (file_exists($filename)){
            unlink($filename);
            echo  'File ' . $filename . ' has been deleted';
            } 
            else{
        echo "Unable to delete " . $filename;
            }
        
        }
        
        if(isset($fileInfo) )
        {
            if($fileInfo['fileType'] == 'jpg' ||  $fileInfo['fileType'] == 'png' || $fileInfo['fileType'] == 'gif'  )
            {
                ?>
                <table class='table'>
                    <tr>
                        <td><?php  echo '<img class="image" height=250 width=250 src=uploads/'.$fileInfo['filePath'].' >'; ?></td>
                        <td>File Size: <?php echo $fileInfo['fileSize'] ?> | </td>
                        <td>File Type: <?php echo $fileInfo['fileType'] ?> | </td>
                        <td>Time Added: <?php echo $fileInfo['fileTime'] ?> | </td>
                        <td>
                            <form method="post" action="./DirectoryIterator.php">
                                <input type="hidden" name="delete" value="<?php echo $fileInfo['fileDetails'] ?>">
                                <input type="submit" value="delete">
                            </form>
                        </td>
                        <td><a href="./DirectoryIterator.php">View All Files</a></td>
                    </tr>
                </table>
        <?php
            }
            else if($fileInfo['fileType'] == 'txt')
            {?>
                
                <table class='table'>
                    <tr>
                        <td><textarea rows='15' columns='15'><?php echo file_get_contents("uploads/".$fileInfo['filePath']);?></textarea></td>
                        <td>File Size: <?php echo $fileInfo['fileSize'] ?> | </td>
                        <td>File Type: <?php echo $fileInfo['fileType'] ?> | </td>
                        <td>Time Added: <?php echo $fileInfo['fileTime'] ?> | </td>
                        <td>
                            <form method="post" action="./DirectoryIterator.php">
                                <input type="hidden" name="delete" value="<?php echo $fileInfo['fileDetails'] ?>">
                                <input type="submit" value="delete">
                            </form>
                        </td>
                        <td><a href="./DirectoryIterator.php">View All Files</a></td>
                    </tr>
                </table>
           <?php  }
           else if($fileInfo['fileType'] == 'pdf')
           {?>
                <iframe  src="uploads/<?php echo $fileInfo['filePath'] ?>" frameborder="1" scrolling="auto" height="1100" width="850" ></iframe>
                <table class='table'>
                    <tr>
                        
                        <td>File Size: <?php echo $fileInfo['fileSize'] ?> | </td>
                        <td>File Type: <?php echo $fileInfo['fileType'] ?> | </td>
                        <td>Time Added: <?php echo $fileInfo['fileTime'] ?> | </td>
                        <td>
                            <form method="post" action="./DirectoryIterator.php">
                                <input type="hidden" name="delete" value="<?php echo $fileInfo['fileDetails'] ?>">
                                <input type="submit" value="delete">
                            </form>
                        </td>
                        <td><a href="./DirectoryIterator.php">View All Files</a></td>
                    </tr>
                </table>
          <?php  }
          else
          {?>
                
                <table class='table'>
                    <tr>
                        <td><a href="uploads/<?php echo $fileInfo['filePath'] ?>" download>Download File</a></td>
                        <td>File Size: <?php echo $fileInfo['fileSize'] ?> | </td>
                        <td>File Type: <?php echo $fileInfo['fileType'] ?> | </td>
                        <td>Time Added: <?php echo $fileInfo['fileTime'] ?> | </td>
                        <td>
                            <form method="post" action="./DirectoryIterator.php">
                                <input type="hidden" name="delete" value="<?php echo $fileInfo['fileDetails'] ?>">
                                <input type="submit" value="delete">
                            </form>
                        </td>
                        <td><a href="./DirectoryIterator.php">View All Files</a></td>
                    </tr>
                </table>
         <?php  }
        }
?>
                <br>
   
 

    </body>
</html>
