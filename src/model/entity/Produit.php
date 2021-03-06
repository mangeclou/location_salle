<?php
/**
 * 
 * Code skeleton generated by dia-uml2php5 plugin
 * written by KDO kdo@zpmag.com
 */
namespace entity; // toujours le même nom que le dossier, pour que l'autoload puisse trouver le fichier

class Produit {

	/**
	 * 
	 * @var integer
	 * @access protected
	 */
	protected  $idProduit;

	/**
	 * 
	 * @var string
	 * @access protected
	 */
	protected  $dateArrivee;

	/**
	 * 
	 * @var string
	 * @access protected
	 */
	protected  $dateDepart;

	/**
	 * 
	 * @var integer
	 * @access protected
	 */
	protected  $idSalle;

	/**
	 * 
	 * @var integer
	 * @access protected
	 */
	protected  $idPromo;

	/**
	 * 
	 * @var integer
	 * @access protected
	 */
	protected  $prix;

	/**
	 * 
	 * @var integer
	 * @access protected
	 */
	protected  $etat;

    
    //----------- GETTERS -----------------
    public function getIdProduit()
    {
        return $this->idProduit;
    }
    public function getDateArrivee()
    {
        return $this->dateArrivee;
    }
    public function getDateDepart()
    {
        return $this->dateDepart;
    }
    public function getIdSalle()
    {
        return $this->idSalle;
    }
    public function getIdPromo()
    {
        return $this->idPromo;
    }
    public function getPrix()
    {
        return $this->prix;
    }
    public function getEtat()
    {
        return $this->etat;
    }
   
    //--------- SETTERS ------------------
    public function setDateArrivee($date)
    {
        $this->dateArrivee = $date;
    }
    public function setDateDepart($date)
    {
        $this->dateDepart = $date;
    }
    public function setPrix($prix)
    {
        if(is_int($prix)){
            return $this->prix = $prix;
        }
    }
    public function setEtat($etat)
    {
        if($etat === '0'|| $etat === '1' || $etat === '2') {
            return $this->etat = $etat;
        }  else {
            echo "Veuillez saisir '0', '1', ou '2'";
        }
    }
}
