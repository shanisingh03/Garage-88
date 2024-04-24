<?php

/**
 * This is Sample Helper Function
 * @param Nill
 * @param Boolean $status
 * @author Shani Singh
 */
if (!function_exists('checkHelperFunction')) {
    function checkHelperFunction()
    {
        return true;
    }
}

/**
 * Get User Type By Value
 * @param Integer $user_type
 * @param String $type
 * @author Shani Singh
 */
if (!function_exists('getUserType')) {
    function getUserType($user_type)
    {
        switch ($user_type) {
            case '1':
                return 'Super Admin';
                break;
            case '2':
                return 'Customer';
                break;
            case '3':
                return 'Garage';
                break;
            case '4':
                return 'Supplier';
                break;
            
            default:
                return 'Super Admin';
                break;
        }
    }
}