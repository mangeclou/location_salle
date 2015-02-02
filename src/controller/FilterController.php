<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

/**
 * Description of FilterController
 *
 * 
 */
abstract class FilterController extends controller{
    
    //Fonctions de filtre
    //========================
    public function trimValue(&$value)
    {
        //on enlève les espace en début et fin de la valeur
        $value = trim($value);
    }
    
    public function filterPostString($string)
    {
        $filteredString = filter_input(INPUT_POST, $string, FILTER_SANITIZE_STRING);
        return $filteredString;
    }
    
    public function filterPostInt($int)
    {
        $filteredInt = filter_input(INPUT_POST, $int, FILTER_SANITIZE_NUMBER_INT);
        return $filteredInt;
    }
    
    public function filterPostEmail($email)
    {
        $filteredEmail = filter_input(INPUT_POST, $email, FILTER_SANITIZE_EMAIL);
        return $filteredEmail;
    }
    
    
    public function filterPostData()
    {
        array_filter($_POST, self::trimValue());    // the data in $_POST is trimmed

$postfilter =    // set up the filters to be used with the trimmed post array
    array(
            'user_tasks'                        =>    array('filter' => FILTER_SANITIZE_STRING, 'flags' => !FILTER_FLAG_STRIP_LOW),    // removes tags. formatting code is encoded -- add nl2br() when displaying
            'username'                            =>    array('filter' => FILTER_SANITIZE_ENCODED, 'flags' => FILTER_FLAG_STRIP_LOW),    // we are using this in the url
            'mod_title'                            =>    array('filter' => FILTER_SANITIZE_ENCODED, 'flags' => FILTER_FLAG_STRIP_LOW),    // we are using this in the url
        );
    }
    
    
    
}
