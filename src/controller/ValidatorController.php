<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace controller;

/**
 * Description of ValidatorController
 *
 * @author stagiaire
 */
class ValidatorController{
    
    //protected $nom;
    //protected $prenom;
    //protected $email;
    //protected $pseudo;
    //protected $adresse;
    //protected $ville;
    //protected $cp;
    //protected $email;
    //protected $sexe;
    //protected $pays;
    //protected $titre;
    //protected $description;
    //protected $photo;
    //protected $capacite;
    //protected $categorie;
    //protected $prix;
    //protected $etat;
    //protected $date;
    //protected $commentaire;
    //protected $note;
    
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
     * Fonction qui fonctionne pour les noms qui ne comportent pas de chiffres mais
     * comportent des apostrophes, des tirets et des espaces. Le deuxième argument est
     * le nombre maximum de caractères 
     * 20 caractères
     * @param type $nom
     * @return type string
     * @throws Exception
     */
    
   
    
    /**
     * 
     * @param type STRING $nom : le nom à valider
     * @param type INT $max : le nombre max de caractères admis
     * @return type
     * @throws Exception
     */
    public static function validateNom($nom, $max)
    {
        //A TESTER
        
        if((is_string($nom)) 
                && (is_int($max))
                && ((strlen($nom)<= $max))
                && (preg_match("/^[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\s-]+/",$nom))){
            return $nom;
        }  else {
            throw new Exception('Veuillez saisir un nom de '.$max .' caractères maximum.');
        }
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
        if (filter_var($email, FILTER_VALIDATE_EMAIL)== true){
            return $email;
        } else {
            throw new Exception('Veuillez saisir un email valide.');
        }
    }
    /**
     * 
     * @param type $pseudo
     * @return type
     * @throws Exception
     */
    public static function validatePseudo($pseudo)
    {
        //On autorise les lettres, les chiffres et "_"
        if((is_string($pseudo)) && (strlen($pseudo)<= 30)&& preg_match("/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ#*£$._\s-]+/",$pseudo)){
            return $pseudo;
        }  else {
            throw new \Exception('Seuls les chiffres, les lettres de "a" à "z" et les "_" sont autorisés.');
        }
    }
    /**
     * 
     * @param type $cp
     * @return type
     * @throws Exception
     */
    public static function validateCp($cp)
    {
        //On autorise uniquement les chiffres, au maximum 12 caractères
        $cpInt = (int)($cp);
        if((is_int($cpInt)) && (strlen($cpInt)<= 12)){
            return $cpInt;
        }  else {
            throw new \Exception('Veuillez saisir un code postal valide.');
        }
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
        if(($sexe == 'm')||($sexe == 'f')){
            return $sexe;
        }  else {
            throw new Exception('Veuillez saisir un code postal valide.');
        }
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
        if(in_array($pays, getCountryList())){
            return $pays;
        }  else {
            throw new Exception('Veuillez saisir un pays valide.');
        }
    }
    
}
