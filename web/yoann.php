<?php
    echo "hello";
    $url = explode("/", $server['REQUEST_URI']);
    if (isset($url)) {
        switch ($url[i]) {
            case 'produit':
            require_once'../../ProduitController.php';
            echo 'module produit';
            break;
            
            case 'salle':
            echo 'module salle';
            break;
        }
    }
?>
