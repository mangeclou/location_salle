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
    public static function trimValue(&$value)
    {
        //on enlève les espace en début et fin de la valeur
        $value = trim($value);
    }
    
    public static function filterPostString($string)
    {
        $filteredString = trim(filter_input(INPUT_POST, $string, FILTER_SANITIZE_STRING));
        return $filteredString;
    }
    
    public static function filterPostInt($int)
    {
        $filteredInt = trim(filter_input(INPUT_POST, trim($int), FILTER_SANITIZE_NUMBER_INT));
        return $filteredInt;
    }
    
    public static function filterPostEmail($email)
    {
        $filteredEmail = trim(filter_input(INPUT_POST, trim($email), FILTER_SANITIZE_EMAIL));
        return $filteredEmail;
    }
        
    public static function filterPostData()
    {
        array_filter($_POST, self::trimValue());    // the data in $_POST is trimmed
         // set up the filters to be used with the trimmed post array
        $postfilter = array(
            'user_tasks'  =>    array('filter' => FILTER_SANITIZE_STRING,
                'flags' => !FILTER_FLAG_STRIP_LOW),    // removes tags. formatting code is encoded -- add nl2br() when displaying
            'username'    =>    array('filter' => FILTER_SANITIZE_ENCODED,
                'flags' => FILTER_FLAG_STRIP_LOW),    // we are using this in the url
            'mod_title'   =>    array('filter' => FILTER_SANITIZE_ENCODED,
                'flags' => FILTER_FLAG_STRIP_LOW),    // we are using this in the url
            );
    }
    
    
    
}
