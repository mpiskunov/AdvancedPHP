<?php

/**
 * Description of Validator
 *
 * @author GFORTI
 */
class Validator {
    /**
     * A method to check if an email is valid.
     *
     * @param {String} [$email] - must be a valid email
     *
     * @return boolean
     */
    public function emailIsValid($email) {
        return ( is_string($email) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false );
    }
   
    public function addressIsValid($addressline1) {
        $regEx = '/^([A-Za-z0-9 ]{2,250})$/';
        return (preg_match($regEx, $addressline1) || empty($addressline1) );
    }
    
    public function cityIsValid($city) {
        $regEx = '/^([A-Za-z0-9 ]{2,250})$/';
        return (preg_match($regEx, $city) || empty($city) );
    }
    
    public function zipIsValid($zip) {
        $zipCodeRegEx = '/^\d{5}([\-]?\d{4})?$/';
        return (preg_match($zipCodeRegEx, $zip));
    }
}
