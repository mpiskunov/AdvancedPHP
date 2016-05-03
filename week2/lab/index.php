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
         require_once './autoload.php';
       
        $util = new Util();
        
        $addressDAO = new DBAddress();
        $values = filter_input_array(INPUT_POST);
        
        $fullname = $values['fullname'];
        $email = $values['email'];
        $addressline1 = $values['addressline1'];
        $city = $values['city'];
        $state = $values['state'];
        $zip = $values['zip'];
        $birthday = $values['birthday'];
       
        $addresses =  $addressDAO->readAll();
        
        if ( count($addresses) > 0 ) : ?>
        <h1>Addresses</h1>
            <table class="table">
                <thead><td><b>Full Name</b><td><b>Email</b><td><b>Address</b><td><b>City</b><td><b>State</b><td><b>Zip</b><td><b>Birthday</b></td></thead>
        <?php foreach( $addresses as $key => $values ) : ?>
                    <tr>
                    <td><?php echo $values['fullname']; ?></td>
                    <td><?php echo $values['email']; ?></td>
                    <td><?php echo $values['addressline1']; ?></td>
                    <td><?php echo $values['city']; ?></td>
                    <td><?php echo $values['state']; ?></td>
                    <td><?php echo $values['zip']; ?></td>
                    <td><?php echo $values['birthday']; ?></td>
                        
                </tr>
        <?php endforeach; ?>
        <?php endif; ?>
            </table>
        <a href="add-address.php">
            Add Address
        </a>
    </body>
</html>
