<?php 
// constantes de racine du site et du serveur et
// paramètres de connexion à la BDD

//define("RACINE_SERVEUR",$_SERVER['DOCUMENT_ROOT']);
//define("RACINE_SITE","/location_salle/");

$parameters = array(
    'connect'=> array(
        'host'=>'localhost',
        'type'=>'mysql',
        'dbname'=>'lokisalle',
        'charset'=>'UTF8',
        'user'=>'root',
        'password'=>''
    )/*,
    'siteParam' => array(
        //définir la constante de site et de serveur
        'site_root'=>RACINE_SITE,
        'server'=>RACINE_SERVEUR
    ) */
);

var_dump($parameters);
