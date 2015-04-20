<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace service;

/**
 * Description of ValidatorController
 *
 * @author yoann
 */
class ValidatorService
{

    protected $countryList = array(
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
        return $this->countryList;
    }
    
    /**
     * 
     * @param type $nom
     * @return string
     */
    public static function validateNom($nom)
    {
        $valid = array();
        //A TESTER
        if ($nom ==="") {
            //return 'Veuillez saisir un nom.';
            return "Veuillez saisir un nom.";
        }

        if (!preg_match("/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s-]+/", $nom)) {
            //return 'Votre nom ne peut pas contenir de chiffre.';
            return "Certains caractères ne sont pas supportés.";
        }
         
        return true;
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
        if (!preg_match("/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s-]+/",$ville)){
            return 'Certains caractères ne sont pas supportés.';
        }
        return true;
    }
     
    /**
     * 
     * @param type $nom
     * @return string
     */
    public static function validatePrenom($prenom)
    {
        //A TESTER
        if ($prenom ===""){
            return 'Veuillez saisir un prénom.';
        }
        if (!is_string($prenom)){
            return 'Votre prénom ne peut pas contenir uniquement des chiffres.';
        }
        if (!preg_match("/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s-]+/",$prenom)){
            return 'Votre prénom ne peut pas contenir de chiffre.';
        }
              
        return true;
    }
    
    /**
     * 
     * @param type $email
     * @return type
     * @throws Exception
     */
    public static function validateEmail($email)
    {
        //On teste la validité de l'email
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)== false){
            return 'Veuillez saisir un email valide.';
        } 
        if ($email ===""){
            return 'Veuillez saisir un email.';
        }
        //si l'arrayErrors est vide on retourne l'email, sinon on retourne l'arrayErrors
        
        return true;
        
    }
    /**
     * 
     * @param type $email
     * @return type
     * @throws Exception
     */
    public static function validateMdp($mdp)
    {
        if ($mdp ===""){
            return 'Veuillez saisir un mot de passe.';
        }
        if (strlen($mdp)> 30 ){
            return 'Veuillez saisir un mot de passe de moins de 30 caract&egrave;res..';
        }
        if (strlen($mdp)< 7 ){
            return 'Veuillez saisir un pseudo d\'au moins 7 caract&egrave;res.';
        }
        if(!preg_match("/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ#*£$._\s-]+/",$mdp)){
            return 'Vous utilisez des caractères non supportés.';
        }
        return true;
    }
    
    /**
     * Teste si le pseudo est valide, retourne un arrayErrors si c'est le cas et
     * sinon retourne le pseudo
     * @param type $pseudo
     * @return boolean
     */
    public static function validatePseudo($pseudo)
    {
        if ($pseudo ===""){
            return 'Veuillez saisir un pseudo.';
        }
        if (strlen($pseudo)> 30 ){
            return 'Veuillez saisir un pseudo de moins de 30 caract&egrave;res..';
        }
        if (strlen($pseudo)< 3 ){
            return 'Veuillez saisir un pseudo d\'au moins 3 caract&egrave;res.';
        }
        if (!is_string($pseudo)){
            return 'Votre pseudo ne peut pas contenir uniquement des chiffres.';
        }
        if(!preg_match("/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ#*£$._\s-]+/",$pseudo)){
            return 'Vous utilisez des caractères non supportés.';
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
        //On autorise au maximum 12 caractères
        if((strlen($cp)> 12)){
           return 'Votre code postal est trop long.';
        }
                
        return true;
    }
    /**
     * 
     * @param type $sexe
     * @return type
     * @throws Exception
     */
    public static function validateSexe($sexe)
    {
        //On autorise uniquement les lettre "m" ou "f"
        if(!($sexe == 'm')||!($sexe == 'f')){
           return 'Veuillez saisir un sexe valide.';
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
        if(!in_array($pays, getCountryList())){
          return 'Veuillez saisir un pays valide.';
        }
        return true;
    }
    
    /**
     * 
     * @param type $email
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
     * @desc Validateur pour le formulaire inscription, on lui passe $_POST, on peut donc
     * récupérer toutes les valeurs ensuite
     * @param type $form
     * @return boolean
     */
    public static function isFormValid(/*$pseudo,$mdp,$prenom,$email,$sexe,$ville,
            $cp,$adresse*/$array){
            echo 'array de isformvalid';
             var_dump($array);
             //exit();
        if((self::validatePseudo($array['pseudo']) === true)
                && (self::validateMdp($array['mdp']) === true)
                && (self::validateNom($array['nom']) === true)
                && (self::validatePrenom($array['prenom']) === true)
                && (self::validateEmail($array['email']) === true)
                && (self::validateSexe($array['sexe']) === true)
                && (self::validateVille($array['ville']) === true)
                && (self::validateCp($array['cp']) === true)
                && (self::validateAdresse($array['adresse']) === true)
                ){
            return true;
        }  else {
            //Si au moins un validateur renvoie false, on crée un array de
            // toutes les erreurs
            $arrayErrors = [
                errorPseudo => self::validatePseudo(),
                errorMdp => self::validateMdp(),
                errorNom => self::validateNom(),
                errorPrenom => self::validatePrenom(),
                errorEmail => self::validateEmail(),
                errorSexe => self::validateSexe(),
                errorVille => self::validateVille(),
                errorCp => self::validateCp(),
                errorAdresse => self::validateAdresse(),
            ];
        }
    }
}
