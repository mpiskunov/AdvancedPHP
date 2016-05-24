<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    </head>
    <body>
        <?php
        // http://php.net/manual/en/class.directoryiterator.php
        //DIRECTORY_SEPARATOR 
        $folder = './uploads';
        if ( !is_dir($folder) ) {
            die('Folder <strong>' . $folder . '</strong> does not exist' );
        }
        $directory = new DirectoryIterator($folder);
        
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
        
        ?>
        <ol >
            <?php foreach ($directory as $fileInfo) : ?>
            <li>Uploaded: <?php echo date("l F j, Y, g:i a", $fileInfo->getMTime()); ?> | 
                File Size: <?php echo $fileInfo->getSize(); ?>  byte's | 
                File Name: <?php echo $fileInfo->getFileInfo() ?>
                <form method="post">
                    <input type="hidden" name="delete" value="<?php echo $fileInfo ?>">
                    <input type="submit" value="delete">
                </form>
                </li>
                
            <?php endforeach; ?>
        </ol>
        <a href="./upload.php" >Upload Files</a>
    </body>
</html>
