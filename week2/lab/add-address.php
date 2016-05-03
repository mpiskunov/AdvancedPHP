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
        $validator = new Validator();
        
        $values = filter_input_array(INPUT_POST);
        $fullname = $values['fullname'];
        $email = $values['email'];
        $addressline1 = $values['addressline1'];
        $city = $values['city'];
        $state = $values['state'];
        $zip = $values['zip'];
        $birthday = $values['birthday'];
        $states = array(
            'AL'=>'ALABAMA',
            'AK'=>'ALASKA',
            'AS'=>'AMERICAN SAMOA',
            'AZ'=>'ARIZONA',
            'AR'=>'ARKANSAS',
            'CA'=>'CALIFORNIA',
            'CO'=>'COLORADO',
            'CT'=>'CONNECTICUT',
            'DE'=>'DELAWARE',
            'DC'=>'DISTRICT OF COLUMBIA',
            'FM'=>'FEDERATED STATES OF MICRONESIA',
            'FL'=>'FLORIDA',
            'GA'=>'GEORGIA',
            'GU'=>'GUAM GU',
            'HI'=>'HAWAII',
            'ID'=>'IDAHO',
            'IL'=>'ILLINOIS',
            'IN'=>'INDIANA',
            'IA'=>'IOWA',
            'KS'=>'KANSAS',
            'KY'=>'KENTUCKY',
            'LA'=>'LOUISIANA',
            'ME'=>'MAINE',
            'MH'=>'MARSHALL ISLANDS',
            'MD'=>'MARYLAND',
            'MA'=>'MASSACHUSETTS',
            'MI'=>'MICHIGAN',
            'MN'=>'MINNESOTA',
            'MS'=>'MISSISSIPPI',
            'MO'=>'MISSOURI',
            'MT'=>'MONTANA',
            'NE'=>'NEBRASKA',
            'NV'=>'NEVADA',
            'NH'=>'NEW HAMPSHIRE',
            'NJ'=>'NEW JERSEY',
            'NM'=>'NEW MEXICO',
            'NY'=>'NEW YORK',
            'NC'=>'NORTH CAROLINA',
            'ND'=>'NORTH DAKOTA',
            'MP'=>'NORTHERN MARIANA ISLANDS',
            'OH'=>'OHIO',
            'OK'=>'OKLAHOMA',
            'OR'=>'OREGON',
            'PW'=>'PALAU',
            'PA'=>'PENNSYLVANIA',
            'PR'=>'PUERTO RICO',
            'RI'=>'RHODE ISLAND',
            'SC'=>'SOUTH CAROLINA',
            'SD'=>'SOUTH DAKOTA',
            'TN'=>'TENNESSEE',
            'TX'=>'TEXAS',
            'UT'=>'UTAH',
            'VT'=>'VERMONT',
            'VI'=>'VIRGIN ISLANDS',
            'VA'=>'VIRGINIA',
            'WA'=>'WASHINGTON',
            'WV'=>'WEST VIRGINIA',
            'WI'=>'WISCONSIN',
            'WY'=>'WYOMING'
        );
        $regEx = '/^([A-Za-z0-9 ]{2,250})$/';
        $zipCodeRegEx = '/^\d{5}([\-]?\d{4})?$/';
        $messages = array();

        if ($util-> isPostRequest() ) {
            $error = false;
            if ( !preg_match($regEx, $fullname) || empty($fullname) ) {
                $messages[] = 'Sorry Full Name is Invalid';
                $error = true;
            } if (!$validator->emailIsValid($email) ) {
                $messages[] = 'Sorry Email is Invalid';
                $error = true;
            } if (!$validator->addressIsValid($addressline1)) {
                $messages[] = "Sorry Address is Invalid";
                $error = true;
            } if ( !$validator->cityIsValid($city)) {
                $messages[] = "Sorry City is Invalid";
                $error = true;
            } if ( empty($state)) {
                $messages[] = "Sorry State is Invalid";
                $error = true;
            } if (!$validator->zipIsValid($zip) ) {
                $messages[] = "Sorry Zip is Invalid";
                $error = true;
            } if (empty($birthday)){
                $messages[] = "Sorry Birthday is Invalid";
                $error = true;
            }else if (!$error) {
                $addressDAO->create($values);
                $messages[] = 'Info Added';
                $fullname = '';
                $email = '';
                $addressline1 = '';
                $city = '';
                $state = '';
                $zip = '';
                $birthday = '';
            }
        }
        for ($i = 0; $i < count($messages); $i++)
        {
            ?><p><?php echo $messages[$i]?></p><?php
        }
        ?>
<div class="container">
    <h1>Add Address</h1>
    <form action="#" method="post">   
        <table>
            <tr><td> Full Name: </td><td><input name="fullname" value="<?php echo $fullname; ?>" /></td></tr>
            <tr><td> Email: </td><td><input name="email" value="<?php echo $email; ?>" /></td></tr>
            <tr><td> Address: </td><td><input name="addressline1" value="<?php echo $addressline1; ?>" /></td></tr>
            <tr><td> City: </td><td><input name="city" value="<?php echo $city; ?>" /></td></tr>
            <tr><td> State: </td><td><select name="state">
            <?php 
                foreach( $states as $key => $value ) :  ?> 
                <option value="<?php echo $key ?>" <?php if($key == $states) { echo "selected";} ?>><?php echo $value ?></option>
            <?php endforeach; ?>
        </select></td></tr>
            <tr><td> Zip: </td><td><input name="zip" value="<?php echo $zip; ?>" /></td></tr>
            <tr><td> Birthday: </td><td><input type="date" name="birthday" value="<?php echo $birthday; ?>" /></td></tr>
        </table>
       <input type="submit" value="submit" class="btn btn-primary" />
    </form>
    <a href="index.php">
        View Info
    </a>
    </div>
        </body>
</html>
