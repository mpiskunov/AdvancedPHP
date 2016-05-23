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
        session_start();
        $folder = './uploads';
        if ( !is_dir($folder) ) {
            die('Folder <strong>' . $folder . '</strong> does not exist' );
        }
        $directory = new DirectoryIterator($folder);
           
        ?>
        <ol >
            <?php foreach ($directory as $fileInfo) : ?>
            <li>Uploaded: <?php echo date("l F j, Y, g:i a", $fileInfo->getMTime()); ?> | 
                File Size: <?php echo $fileInfo->getSize(); ?> | <?php
                echo $fileInfo->getBasename() ?> byte's | 
                <a href="fileread.php">View Image </a>
                </li>
                
            <?php endforeach; ?>
        </ol>
    </body>
</html>
