<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace view;
include "viewParameters.php";

/**
 * Description of ViewParameters
 *
 * @author Yoann
 */
class ViewManager {
    protected $titlePage;
    
    
    public function getTitlePage ()
    {
        return $this->titlePage;
    }
    
    //créer une méthode qui récupère les noms des méthodes appellées (get_called_method() ?)
    // et appelle ensuite la clé correspondante dans l'array de viewParameters
    //(même principe que pour le controller)
    
}
