<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace service;

/**
 * Description of SalleValidatorController
 *
 * @author yoann
 */
class SalleValidatorService
{

    private static $countryList = array(
        "AF" => "Afghanistan",
        "ZA" => "Afrique du Sud",
        "AL" => "Albanie",
        "DZ" => "Algérie",
        "DE" => "Allemagne",
        "AD" => "Andorre",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AQ" => "Antarctique",
        "AG" => "Antigua-et-Barbuda",
        "AN" => "Antilles néerlandaises",
        "SA" => "Arabie saoudite",
        "AR" => "Argentine",
        "AM" => "Arménie",
        "AW" => "Aruba",
        "AU" => "Australie",
        "AT" => "Autriche",
        "AZ" => "Azerbaïdjan",
        "BS" => "Bahamas",
        "BH" => "Bahreïn",
        "BD" => "Bangladesh",
        "BB" => "Barbade",
        "BE" => "Belgique",
        "BZ" => "Belize",
        "BM" => "Bermudes",
        "BT" => "Bhoutan",
        "BO" => "Bolivie",
        "BA" => "Bosnie-Herzégovine",
        "BW" => "Botswana",
        "BN" => "Brunéi Darussalam",
        "BR" => "Brésil",
        "BG" => "Bulgarie",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "BY" => "Bélarus",
        "BJ" => "Bénin",
        "KH" => "Cambodge",
        "CM" => "Cameroun",
        "CA" => "Canada",
        "CV" => "Cap-Vert",
        "CL" => "Chili",
        "CN" => "Chine",
        "CY" => "Chypre",
        "CO" => "Colombie",
        "KM" => "Comores",
        "CG" => "Congo",
        "KP" => "Corée du Nord",
        "KR" => "Corée du Sud",
        "CR" => "Costa Rica",
        "HR" => "Croatie",
        "CU" => "Cuba",
        "CI" => "Côte d’Ivoire",
        "DK" => "Danemark",
        "DJ" => "Djibouti",
        "DM" => "Dominique",
        "SV" => "El Salvador",
        "ES" => "Espagne",
        "EE" => "Estonie",
        "FJ" => "Fidji",
        "FI" => "Finlande",
        "FR" => "France",
        "GA" => "Gabon",
        "GM" => "Gambie",
        "GH" => "Ghana",
        "GI" => "Gibraltar",
        "GD" => "Grenade",
        "GL" => "Groenland",
        "GR" => "Grèce",
        "GP" => "Guadeloupe",
        "GU" => "Guam",
        "GT" => "Guatemala",
        "GG" => "Guernesey",
        "GN" => "Guinée",
        "GQ" => "Guinée équatoriale",
        "GW" => "Guinée-Bissau",
        "GY" => "Guyana",
        "GF" => "Guyane française",
        "GE" => "Géorgie",
        "GS" => "Géorgie du Sud et les îles Sandwich du Sud",
        "HT" => "Haïti",
        "HN" => "Honduras",
        "HU" => "Hongrie",
        "IN" => "Inde",
        "ID" => "Indonésie",
        "IQ" => "Irak",
        "IR" => "Iran",
        "IE" => "Irlande",
        "IS" => "Islande",
        "IL" => "Israël",
        "IT" => "Italie",
        "JM" => "Jamaïque",
        "JP" => "Japon",
        "JE" => "Jersey",
        "JO" => "Jordanie",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KG" => "Kirghizistan",
        "KI" => "Kiribati",
        "KW" => "Koweït",
        "LA" => "Laos",
        "LS" => "Lesotho",
        "LV" => "Lettonie",
        "LB" => "Liban",
        "LY" => "Libye",
        "LR" => "Libéria",
        "LI" => "Liechtenstein",
        "LT" => "Lituanie",
        "LU" => "Luxembourg",
        "MK" => "Macédoine",
        "MG" => "Madagascar",
        "MY" => "Malaisie",
        "MW" => "Malawi",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malte",
        "MA" => "Maroc",
        "MQ" => "Martinique",
        "MU" => "Maurice",
        "MR" => "Mauritanie",
        "YT" => "Mayotte",
        "MX" => "Mexique",
        "MD" => "Moldavie",
        "MC" => "Monaco",
        "MN" => "Mongolie",
        "MS" => "Montserrat",
        "ME" => "Monténégro",
        "MZ" => "Mozambique",
        "MM" => "Myanmar",
        "NA" => "Namibie",
        "NR" => "Nauru",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigéria",
        "NU" => "Niue",
        "NO" => "Norvège",
        "NC" => "Nouvelle-Calédonie",
        "NZ" => "Nouvelle-Zélande",
        "NP" => "Népal",
        "OM" => "Oman",
        "UG" => "Ouganda",
        "UZ" => "Ouzbékistan",
        "PK" => "Pakistan",
        "PW" => "Palaos",
        "PA" => "Panama",
        "PG" => "Papouasie-Nouvelle-Guinée",
        "PY" => "Paraguay",
        "NL" => "Pays-Bas",
        "PH" => "Philippines",
        "PN" => "Pitcairn",
        "PL" => "Pologne",
        "PF" => "Polynésie française",
        "PR" => "Porto Rico",
        "PT" => "Portugal",
        "PE" => "Pérou",
        "QA" => "Qatar",
        "HK" => "R.A.S. chinoise de Hong Kong",
        "MO" => "R.A.S. chinoise de Macao",
        "RO" => "Roumanie",
        "GB" => "Royaume-Uni",
        "RU" => "Russie",
        "RW" => "Rwanda",
        "CF" => "République centrafricaine",
        "DO" => "République dominicaine",
        "CD" => "République démocratique du Congo",
        "CZ" => "République tchèque",
        "RE" => "Réunion",
        "EH" => "Sahara occidental",
        "BL" => "Saint-Barthélémy",
        "KN" => "Saint-Kitts-et-Nevis",
        "SM" => "Saint-Marin",
        "MF" => "Saint-Martin",
        "PM" => "Saint-Pierre-et-Miquelon",
        "VC" => "Saint-Vincent-et-les Grenadines",
        "SH" => "Sainte-Hélène",
        "LC" => "Sainte-Lucie",
        "WS" => "Samoa",
        "AS" => "Samoa américaines",
        "ST" => "Sao Tomé-et-Principe",
        "RS" => "Serbie",
        "CS" => "Serbie-et-Monténégro",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapour",
        "SK" => "Slovaquie",
        "SI" => "Slovénie",
        "SO" => "Somalie",
        "SD" => "Soudan",
        "LK" => "Sri Lanka",
        "CH" => "Suisse",
        "SR" => "Suriname",
        "SE" => "Suède",
        "SJ" => "Svalbard et Île Jan Mayen",
        "SZ" => "Swaziland",
        "SY" => "Syrie",
        "SN" => "Sénégal",
        "TJ" => "Tadjikistan",
        "TZ" => "Tanzanie",
        "TW" => "Taïwan",
        "TD" => "Tchad",
        "TF" => "Terres australes françaises",
        "IO" => "Territoire britannique de l'océan Indien",
        "PS" => "Territoire palestinien",
        "TH" => "Thaïlande",
        "TL" => "Timor oriental",
        "TG" => "Togo",
        "TK" => "Tokelau",
        "TO" => "Tonga",
        "TT" => "Trinité-et-Tobago",
        "TN" => "Tunisie",
        "TM" => "Turkménistan",
        "TR" => "Turquie",
        "TV" => "Tuvalu",
        "UA" => "Ukraine",
        "UY" => "Uruguay",
        "VU" => "Vanuatu",
        "VE" => "Venezuela",
        "VN" => "Viêt Nam",
        "WF" => "Wallis-et-Futuna",
        "YE" => "Yémen",
        "ZM" => "Zambie",
        "ZW" => "Zimbabwe",
        "ZZ" => "région indéterminée",
        "EG" => "Égypte",
        "AE" => "Émirats arabes unis",
        "EC" => "Équateur",
        "ER" => "Érythrée",
        "VA" => "État de la Cité du Vatican",
        "FM" => "États fédérés de Micronésie",
        "US" => "États-Unis",
        "ET" => "Éthiopie",
        "BV" => "Île Bouvet",
        "CX" => "Île Christmas",
        "NF" => "Île Norfolk",
        "IM" => "Île de Man",
        "KY" => "Îles Caïmans",
        "CC" => "Îles Cocos - Keeling",
        "CK" => "Îles Cook",
        "FO" => "Îles Féroé",
        "HM" => "Îles Heard et MacDonald",
        "FK" => "Îles Malouines",
        "MP" => "Îles Mariannes du Nord",
        "MH" => "Îles Marshall",
        "UM" => "Îles Mineures Éloignées des États-Unis",
        "SB" => "Îles Salomon",
        "TC" => "Îles Turks et Caïques",
        "VG" => "Îles Vierges britanniques",
        "VI" => "Îles Vierges des États-Unis",
        "AX" => "Îles Åland",
    );
    
    public static function getCountryList()
    {
        return self::$countryList;
    }
    
        
    /**
     * 
     * @param type $nom
     * @return string
     */
    public static function validateVille($ville)
    {
        //A TESTER
        if ($ville ===""){
            return 'Veuillez saisir une ville.';
        }
        if (!is_string($ville)){
            return 'Votre ville ne peut pas contenir uniquement des chiffres.';
        }
        if (!preg_match("/^[a-zA-Z\'áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s-]+/",$ville)){
            return 'Certains caractères ne sont pas supportés.';
        }
        if((strlen($ville)> 50)){
           return 'Votre nom de ville est trop long.';
        }
        return true;
    }
     
    /**
     * 
     * @param type $nom
     * @return string
     */
    public static function validateTitre($titre)
    {
        //A TESTER
        if ($titre ===""){
            return 'Veuillez saisir un titre.';
        }
        if (!is_string($titre)){
            return 'Votre titre ne peut pas contenir uniquement des chiffres.';
        }
        if (!preg_match("/^[a-zA-Z0-9\'áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s-]+/",$titre)){
            return 'Le titre contient des caractères invalides.';
        }
        if((strlen($titre)> 50)){
           return 'Votre titre est trop long.';
        }
        
        return true;
    }
    
    /**
     * 
     * @param type $nom
     * @return string
     */
    public static function validateDescription($description)
    {
        //A TESTER
        if ($description ===""){
            return 'Veuillez saisir une description.';
        }
        if (!is_string($description)){
            return 'Votre description ne peut pas contenir uniquement des chiffres.';
        }
        if (!preg_match("/^[a-zA-Z0-9\'áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s-]+/",$description)){
            return 'La description contient des caractères invalides.';
        }
        
        if((strlen($description)> 255)){
           return 'Votre description est trop longue.';
        }
              
        return true;
    }
       
    /**
     * 
     * @param type $cp
     * @return type
     * @throws Exception
     */
    public static function validateCp($cp)
    {
        if (empty($cp)){
            return 'Veuillez saisir un code postal.';
        } 
        //On autorise au maximum 12 caractères
        if((strlen($cp)> 12)){
           return 'Votre code postal est trop long.';
        }
                
        return true;
    }
   
    /**
     * 
     * @param type $pays
     * @return type
     * @throws Exception
     */
    public static function validatePays($pays)
    {
        //On autorise uniquement les noms de pays valides
        if(!in_array($pays, self::getCountryList())){
          return 'Veuillez saisir un pays valide.';
        }
        return true;
    }
    
    /**
     * 
     * @param type $adresse
     * @return type
     * @throws Exception
     */
    public static function validateAdresse($adresse)
    {
        //On teste la validité de l'email
        
        if (empty($adresse)){
            return 'Veuillez saisir une adresse.';
        } 
        if (strlen($adresse) >250){
            return 'Votre adresse est trop longue.';
        }
        return true;
    }
    
    /**
     * [[Description]]
     * @param  [[Type]]       $adresse [[Description]]
     * @return string|boolean [[Description]]
     */
    public static function validatePhoto($photo)
    {
        //On teste la validité de la photo
        
        if (empty($photo)){
            return 'Veuillez saisir un lien.';
        } 
       /* if (strlen($photo) >250){
            return 'Votre lien est trop long.';
        }*/
        return true;
    }
    
    /**
     * [[Description]]
     * @param  [[Type]]       $capacite [[Description]]
     * @return string|boolean [[Description]]
     */
    public static function validateCapacite($capacite)
    {
        //On teste la validité de la capacite
        
        if (empty($capacite)) {
            return 'Veuillez saisir une capacite.';
        }
        if (!is_numeric($capacite)) {
            return 'Veuillez saisir un nombre entier.';
        }
        if ($capacite >999999){
            return 'Votre capacité est trop grande.';
        }
        return true;
    }
    
     public static function validateCategorie($categorie)
    {
        //On teste la validité de la capacite
        
        if (empty($categorie)) {
            return 'Veuillez saisir une catégorie.';
        }
        if (!is_string($categorie)) {
            return 'Vous devez saisir des caractères.';
        }
        if ($categorie !== "reunion"){
            return "Votre catégorie n'est pas valide.";
        }
        return true;
    }
    
    /**
     * @desc Validateur pour le formulaire inscription, on lui passe $_POST, on peut donc
     * récupérer toutes les valeurs ensuite
     * @param type $form
     * @return boolean
     */
    public function isFormValid(/*$pseudo,$mdp,$prenom,$email,$sexe,$ville,
            $cp,$adresse*/$array){
            //echo 'array de isformvalid';
             //var_dump($array);
             //exit();
        if ((self::validatePays($array['pays']) === true)
            && (self::validateVille($array['ville']) === true)
            && (self::validateAdresse($array['adresse']) === true)
            && (self::validateCp($array['cp']) === true)
            && (self::validateTitre($array['titre']) === true)
            && (self::validateDescription($array['description']) === true)
            && (self::validatePhoto($array['photo']) === true)
            && (self::validateCapacite($array['capacite']) === true)
            && (self::validateCategorie($array['categorie']) === true)
                ){
            return true;
        }  else {
            //Si au moins un validateur renvoie false, on crée un array de
            // toutes les erreurs
            
            return $arrayErrors = [
                "errorPays"        => self::validatePays($array['pays']),
                "errorVille"       => self::validateVille($array['ville']),
                "errorAdresse"     => self::validateAdresse($array['adresse']),
                "errorCp"          => self::validateCp($array['cp']),
                "errorTitre"       => self::validateTitre($array['titre']),
                "errorDescription" => self::validateDescription($array['description']),
                "errorPhoto"       => self::validatePhoto($array['photo']),
                "errorCapacite"    => self::validateCapacite($array['capacite']),
                "errorCategorie"   => self::validateCategorie($array['categorie']),
            ];
        }
    }
}
