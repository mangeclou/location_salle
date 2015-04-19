<?php 
/**
 * Services related to the connexion to the site for a user
 *
 * @author yoann
 */
namespace service;

class UrlService
{
    /**
     * [[Description]]
     * @param [[Type]] $controller [[Description]]
     * @param [[Type]] $method     [[Description]]
     */
    static public function redirect($controller, $method)
    {
        header("location:index.php?controller=" .ucfirst($controller) ."&method=" .$method);
    }    
}