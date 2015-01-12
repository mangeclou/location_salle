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
   
    
    /**
     * Détermine le répértoire d'include en fonction du nom du controller
     */
    //pour l'instant n'est pas utilisée
    public function getIncDir ($controller)
    {
        if ($controller === "BackController") {
            $IncDir = __DIR__ . '/../../web/back/'; 
            return $IncDir;
        }elseif ($controller === "MembreController"){
            $IncDir = __DIR__ . '/../../web/membre/'; 
            return $IncDir;
        }elseif ($controller === "VisitorController"){
            $IncDir = __DIR__ . '/../../web/visiteur/'; 
            return $IncDir;
        }
    }
    //créer une méthode qui récupère les noms des méthodes appellées (get_called_method() ?)
    // et appelle ensuite la clé correspondante dans l'array de viewParameters
    //(même principe que pour le controller)
   

}
